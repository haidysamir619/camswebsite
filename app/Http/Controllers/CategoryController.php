<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function get_categories(){
        $type="Category";
        $brands=Category::all();
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
    public function add_category(Request $request){
        $this->validator($request->all())->validate();
        $brand= new Category();
        $brand->name_ar=$request->get('name_ar');
        $brand->name_en=$request->get('name_en');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name =time().$file->getClientOriginalName();
            $image_path='images/category_images/';
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

        return redirect()->route('get_categories');

    }
    public function add_category_page(){
        $type="Category";
        return view('admin/addbrand',compact('type'));
    }
    public function delete_category(Request $request,$id){
        $brand=Category::find($id);
        $brand->delete();
        if($request->ajax())
        {
            return response()->json(['success'=> 'Deleted Successfully' ]);
        }
        return back();


    }
    public function edit_category($id){
         $type="Category";

        $brand=Category::find($id);
        return view('admin/editbrand',compact('brand','type'));
    }
    public function update_category(Request $request,$id){
        if($request->file('image')==''){
            $request['image']=$request['oldimage'];
      }
      $this->validator($request->all())->validate();

        $brand=Category::find($id);
        if(!$brand){
            return  redirect()->back();
        }
        $brand->name_ar=$request->get('name_ar');
        $brand->name_en=$request->get('name_en');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name =time().$file->getClientOriginalName();
            $image_path='images/category_images/';
            $file->move($image_path,$image_name);
            $image=$image_path.$image_name;
            $brand->image=$image;
        }else{

        }
        $brand->save();
        return redirect()->route('get_categories');
    }

}
