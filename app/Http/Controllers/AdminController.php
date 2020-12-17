<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Brand;
class AdminController extends Controller
{
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
    public function delete_brand(Request $request,$id){

        $brands=Brand::find($id);
        $brands->delete();
        if($request->ajax())
        {
            return response()->json(['success'=> 'Deleted Successfully' ]);
        }
        return back();

    }
    public function edit_brand($id){
        $type="Brand";

        $brand=Brand::find($id);
        // $type='Brands';
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
        if($request->hasFile('image')){//name of field
            $file=$request->file('image');
            $image_name =time().$file->getClientOriginalName();
            $image_path='images/brand_images/';
            $file->move($image_path,$image_name);//move stop me in public folder
            $image=$image_path.$image_name;//هخزن الصور بمسارها
            $brand->image=$image;
        }
        $brand->save();
        // $brand->update($request->all());

        return redirect()->route('get_brands');

    }
}
