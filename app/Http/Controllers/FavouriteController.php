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

class FavouriteController extends Controller
{
    public function favouritelist(){
        $user = auth()->user();
        if(!$user){
            return redirect()->route('login');

        }else{
        $favourites=Favourite::with('product')->where('user_id',$user->id)->get();

        return view('favouritelist',compact('favourites'));
        }
    }
    public function addtofavourite(Request $request,$id){
        $user = auth()->user();
        if($user){
        $exist=Favourite::where('product_id',$id)->where('user_id',$user->id)->get();
        if($exist->isEmpty()){
            $favourite= new Favourite();//new row in db
            $favourite->user_id=$user->id;
            $favourite->product_id=$id;
            $favourite->save();
            return redirect()->back()->with(['added'=>'added to favourite']);
        }else{

        return redirect()->back()->with(['added'=>'already added to favouritelist']);

        }
    }else{
        return redirect()->back()->with(['added'=>'please login first']);

    }

    }
    public function deletefromfavourite($id){
        $user = auth()->user();
        $product=Favourite::where('product_id',$id)->where('user_id',$user->id)->select();
         $product->delete();
         return redirect()->back()->with(['added'=>'deleted from cart']);
        // return route('cart');

    }
}
