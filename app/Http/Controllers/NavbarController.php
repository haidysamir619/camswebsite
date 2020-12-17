<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Feedback;

class NavbarController extends Controller
{
    /*admin navbar*/
    public function adminarea(){
        $members=User::all();//user
        $categories=Category::all();//user
        $products=Product::all();//user
        $brands=Brand::all();//user
        $reviews=Feedback::all();//user

        return view('admin/admin',compact('members','categories','products','brands','reviews'));
    }

    public function profile(){
        $user = auth()->user();
        $reviews=Feedback::with('user','product')->where('user_id',$user->id)->get();//user
                return view('admin/myprofile',compact('reviews'));

    }
    public function profilechange(Request $request,$id){
        $member=User::find($id);
        if(!$member){
            return  redirect()->back();
        }
        $member->name_ar=$request->get('name_ar');
        $member->name_en=$request->get('name_en');
        $member->email=$request->get('email');
        $member->gender=$request->get('gender');


        if($request->hasFile('image')){//name of field
            $file=$request->file('image');
            $image_name =time().$file->getClientOriginalName();
            $image_path='images/brand_images/';
            $file->move($image_path,$image_name);//move stop me in public folder
            $image=$image_path.$image_name;//هخزن الصور بمسارها
            $member->image=$image;
        }else{

        }
        $member->save();
        // $brand->update($request->all());
        return redirect()->route('profile');
    }

}
