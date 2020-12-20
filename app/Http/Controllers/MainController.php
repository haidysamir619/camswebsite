<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;//
use Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Cart;
use App\Models\Favourite;
use App\Models\Like;
use App\Models\Receipt;

use App\Models\Category;
class MainController extends Controller
{




    public function language($locale)
    {
       App::setLocale($locale);
       session()->put('locale',$locale);
       return redirect()->back();
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
    	$products = Product::where('name_en','LIKE','%'.$search.'%')->orWhere('name_ar','LIKE','%'.$search.'%')->orWhereHas('brand', function($q) use($search)
            {
                $q->where('name_en','like','%'.$search.'%')->orWhere('name_ar','LIKE','%'.$search.'%');
            })->orWhereHas('category', function($q) use($search)
            {
                $q->where('name_en','like','%'.$search.'%')->orWhere('name_ar','LIKE','%'.$search.'%');
            })->get();

        return view('search',compact('products'));
    }
    public function index()
    {
    $products=Product::where(function($q) {
        $q->where('status', 'new')->orWhere('status', 'sale');
    })->get();
    $categories=Category::get();
       return view('index',compact('products','categories'));
    }
    public function catproduct($id){
        $products=Product::with('category')->where('category_id',$id)->get();
        $categoryname=Category::find($id);
        // return $categoryname->name_ar;
        return view('category',compact('products','categoryname','id'));
        // foreach($products as $product)
        // {
        //     return $products->category->name_ar;
        // }
        }

    public function productshow($id){
        $product=Product::find($id);
        $reviews=Feedback::with('user','product')->where('product_id',$id)->get();//user
        return view('product',compact('product','reviews'));

    }


    /***///////////////////////////////// */

    public function reviewlike($id){
        $user = auth()->user();
        if(!$user){
            return redirect()->back()->with(['liked'=>'login first']);

        }else{


        $review=Feedback::find($id);
        $like= new Like();//new row in db
        $like->user_id=$user->id;
        $like->feedback_id=$review->id;
        $like->save();
        return redirect()->back()->with(['liked'=>'liked']);
        }
    }

    public function reviewdislike($id){
        $user = auth()->user();
        if(!$user){
            return redirect()->back()->with(['liked'=>'login first']);

        }else{
        $like=Like::where('user_id',$user->id)->where('feedback_id',$id)->get();
        foreach($like as$lik):
        $lik->delete();
        endforeach;
        return redirect()->back()->with(['liked'=>'disliked']);
    }
    }
    public function leavecomment(Request $request){
        $user = auth()->user();
        if(!$user){
            return redirect()->back()->with(['added'=>'login first']);

        }else{
        $review= new Feedback();//new row in db
        $review->user_id=$user->id;
        $review->comment=$request->comment;
        $stars=$request->input('stars');
        if(!$stars){
                  $review->rate=0;
        }else{
        $review->rate=$request->stars;
        }
        $review->product_id=$request->productid;
        $review->save();
        $totalrating=0;
        if($review->save()){
            $product=Product::find($request->productid);
            $ratings=Feedback::where('product_id',$request->productid)->get();
            foreach ($ratings as $rating){
                $totalrating +=$rating->rate;
            }
            $finalrate=round($totalrating/count($ratings));
            $product->rate=$finalrate;
            $product->save();

        }
        return redirect()->back()->with(['added'=>'comment added']);
    }
    }
    public function getproductsorder(Request $request){
            if($request->selete_product=="toprated"){
                $products=Product::with('category')->where('category_id',$request->cat)->orderBy('rate','desc')->get();
                $categoryname=Category::find($request->cat);
                $id=$request->cat;
             }
            else{
            $products=Product::with('category')->where('category_id',$request->cat)->orderBy('price', $request->selete_product)->get();
            $categoryname=Category::find($request->cat);
            $id=$request->cat;
            }
            if($request->ajax())
            {
                return response()->json(['success'=> 'Added Successfully' ]);
            }
            return view('category',compact('products','categoryname','id'));
            // fo
    }
    public function sortreview(Request $request){
        if($request->selete_review=="recent"){
            $reviews=Feedback::with('user','product')->where('product_id',$request->productid)->orderBy('id','desc')->get();//user
            $product=Product::find($request->productid);

        }

        else{
            $reviews=Feedback::with('user','product')->where('product_id',$request->productid)->orderBy('rate',$request->selete_review)->get();//user
            $product=Product::find($request->productid);

        }
        // if($request->ajax())
        // {
        //     return response()->json(['success'=> 'Added Successfully' ]);
        // }
        return view('product',compact('reviews','product'));
        //
}

}
