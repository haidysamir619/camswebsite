<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;


class ProductController extends Controller
{
    public function get_products(){
        $products=Product::with('category','brand')->get();
return view('admin/products',compact('products'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
             'name_ar' => ['required', 'string', 'regex:/^[\p{Arabic} ]+$/u'],
            'name_en' => ['required','string', 'regex:/^[a-zA-Z ]+$/u' ],
            'description_en' => ['required','string', 'regex:/^[a-zA-Z ]+$/u' ],
            'description_ar' => ['required', 'string', 'regex:/^[\p{Arabic} ]+$/u'],
            'item_price'  =>['required'],
            'item_status' =>['required'],
            'product_category' =>['required'],
            'product_brand'=>['required'],
            'image' => ['required'],
            'item_rating'=>['required'],
            'item_quantity'=>['required'],
        ], [
              'name_ar.required' => __('all.name_required'),
              'name_en.required'  => __('all.name_required'),
              'name_en.string'  => __('all.name_string'),
              'name_ar.string'  => __('all.name_string'),
              'name_ar.regex'  => __('all.name_ar_regex'),
              'name_en.regex'  => __('all.name_en_regex'),

            'description_ar.required' => __('all.desc_required'),
            'description_en.required'  => __('all.desc_required'),
            'description_ar.string'  => __('all.desc_string'),
            'description_en.string'  => __('all.desc_string'),
            'description_en.regex'  => __('all.desc_ar_regex'),
            'description_en.regex'  => __('all.desc_en_regex'),
              'image.required'  => __('all.image_required'),
              'item_price.required'=>__('all.price_required'),
              'item_status.required' =>__('all.status_required'),
            'product_category.required' =>__('all.category_required'),
            'product_brand.required'=>__('all.brand_required'),
            'item_rating.required'=>__('all.rate_required'),
            ]);
    }
    public function add_product(Request $request){
        $this->validator($request->all())->validate();
        $product= new Product();
        $product->name_ar=$request->get('name_ar');
        $product->name_en=$request->get('name_en');
        $product->description_ar=$request->get('description_ar');
        $product->description_en=$request->get('description_en');
        $product->price=$request->get('item_price');
        $product->rate=$request->get('item_rating');
        $product->quantity=$request->get('item_quantity');

        $product->status=$request->get('item_status');
        $product->category_id=$request->get('product_category');
        $product->brand_id=$request->get('product_brand');

        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name =time().$file->getClientOriginalName();
            $image_path='images/product_images/';
            $file->move($image_path,$image_name);
            $image=$image_path.$image_name;
            $product->image=$image;
        }

        $product->save();
        if($request->ajax())
        {
            return response()->json(['success'=> 'Added Successfully' ]);
        }

        return redirect()->route('get_products');
    }

    public function add_product_page(){
        $categories=Category::get();
        $brands=Brand::get();

        return view('admin/addproduct',compact('categories','brands'));
    }
    public function delete_product(Request $request,$id){
        $product=Product::find($id);
        $product->delete();
        if($request->ajax())
        {
            return response()->json(['success'=> 'Deleted Successfully' ]);
        }
        return back();

    }
    public function edit_product($id){
        $product=Product::find($id);
        $categories=Category::get();
        $brands=Brand::get();
        return view('admin/editproduct',compact('product','categories','brands'));
    }
    public function update_product(Request $request,$id){
        if($request->file('image')==''){
            $request['image']=$request['oldimage'];
      }
      $this->validator($request->all())->validate();

        $product=Product::find($id);
        if(!$product){
            return  redirect()->back();
        }
        $product->name_ar=$request->get('name_ar');
        $product->name_en=$request->get('name_en');
        $product->description_ar=$request->get('description_ar');
        $product->description_en=$request->get('description_en');
        $product->price=$request->get('item_price');
        $product->rate=$request->get('item_rating');
        $product->quantity=$request->get('item_quantity');

        $product->status=$request->get('item_status');
        $product->category_id=$request->get('product_category');
        $product->brand_id=$request->get('product_brand');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name =time().$file->getClientOriginalName();
            $image_path='images/product_images/';
            $file->move($image_path,$image_name);
            $image=$image_path.$image_name;
            $product->image=$image;
        }else{

        }
        $product->save();
        return redirect()->route('get_products');
    }
}
