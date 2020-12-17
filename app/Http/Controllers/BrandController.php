<?php

namespace App\Http\Controllers;
use App\Traits\OfferTrait;
use Redirect;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;

class BrandController extends Controller
{
    public function get_brands(){
        $brands=Brand::all();
        $type="Brand";
        return view('admin/brands',compact('brands','type'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
             'name_ar' => ['required', 'string', 'regex:/^[\p{Arabic} ]+$/u'],
            'name_en' => ['required','string', 'regex:/^[a-zA-Z ]+$/u' ],
            'image' => ['required'],
        ], [
              'name_ar.required' => __('all.name_required'),
              'name_en.required'  => __('all.name_required'),
              'name_en.string'  => 'A article body is string',
              'image.required'  => __('all.image_required'),
            ]);
    }

    public function add_brand(Request $request){
        $this->validator($request->all())->validate();
        $brand= new Brand();
        $brand->name_ar=$request->get('name_ar');
        $brand->name_en=$request->get('name_en');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name =time().$file->getClientOriginalName();
            $image_path='images/brand_images/';
            $file->move($image_path,$image_name);
            $image=$image_path.$image_name;
            $brand->image=$image;
        }else{

        }
        $brand->save();
        if($request->ajax())
        {
            return response()->json(['success'=> 'Added Successfully' ]);
        }

    }
    public function add_brands_page(){
        $type="Brand";
        return view('admin/addbrand',compact('type'));
    }
    public function delete_brands(Request $request,$id){

        $brands=Brand::find($id);
        $brands->delete();
if($request->ajax())
 {
 return response()->json(['success'=> 'Deleted Successfully' ]);
}
return back();
    }
    public function edit_brands($id){
        $type="Brand";
        $brand=Brand::find($id);
        return view('admin/editbrand',compact('brand','type'));
    }
    public function update_brand(Request $request,$id){
        if($request->file('image')==''){
              $request['image']=$request['oldimage'];
        }
        $this->validator($request->all())->validate();

        $brand=Brand::find($id);
        if(!$brand){
            return  redirect()->back();
        }
        $brand->name_ar=$request->get('name_ar');
        $brand->name_en=$request->get('name_en');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name =time().$file->getClientOriginalName();
            $image_path='images/brand_images/';
            $file->move($image_path,$image_name);
            $image=$image_path.$image_name;
            $brand->image=$image;
        }
        $brand->save();
        return redirect()->route('get_brands');

    }

}
