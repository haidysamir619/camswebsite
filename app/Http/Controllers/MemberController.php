<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\User;

class MemberController extends Controller
{
    public function get_members(){
        $members=User::get();

        return view('admin/member',compact('members'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name_ar' => ['required', 'string', 'max:255','regex:/^[\p{Arabic} ]+$/u'],
            'name_en' => ['required', 'string', 'max:255','regex:/^[a-zA-Z ]+$/u'],
            'gender' => ['required', 'string'],
            'country' => ['required', 'string'],
            'state' => ['required', 'string'],
            'city' => ['required', 'string'],
            'phone' => ['required', 'min:10','regex:/^\+?\d{10,}$/'],
            'address' => ['required','min:3','regex:/^[\p{Arabic}0-9\-\, ]|[a-zA-Z0-9\-\, ]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'agree' => ['required'],
        ], [
              'name_ar.required' => __('all.name_required'),
              'name_en.required'  => __('all.name_required'),
              'name_en.string'  => __('all.name_string'),
              'name_ar.string'  => __('all.name_string'),
              'name_ar.max'  => __('all.name_max'),
              'name_ar.max'  => __('all.name_max'),

              'name_ar.regex'  => __('all.name_ar_regex'),
              'name_en.regex'  => __('all.name_en_regex'),
            ]);
    }
    public function add_member(Request $request){
        $this->validator($request->all())->validate();
        $member= new User();
        $member->name_ar=$request->get('name_ar');
        $member->name_en=$request->get('name_en');
        $member->email=$request->get('email');
        $member->gender=$request->get('gender');
        $member->phone=$request->get('phone');
        $member->address=$request->get('address');
        $member->type=$request->get('type');
        $member->city=$request->get('city');
        $member->country=$request->get('country');
        $member->state=$request->get('state');
        $member->password=$request->get('password');

        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name =time().$file->getClientOriginalName();
            $image_path='images/brand_images/';
            $file->move($image_path,$image_name);
            $image=$image_path.$image_name;
            $member->image=$image;
        }else{

        }
        $member->save();
        if($request->ajax())
        {
            return response()->json(['success'=> 'Added Successfully' ]);
        }



    }
    public function add_member_page(){

        return view('admin/addmember');
    }
    public function delete_member(Request $request,$id){
        $member=User::find($id);
        $member->delete();
        if($request->ajax())
        {
            return response()->json(['success'=> 'Deleted Successfully' ]);
        }
        return back();


    }
    public function edit_member($id){
        $member=User::find($id);
        return view('admin/editmember',compact('member'));
    }





    public function update_member(Request $request,$id){
        $validated = $request->validate([
            'name_ar' => ['required', 'string', 'max:255','regex:/^[\p{Arabic} ]+$/u'],
            'name_en' => ['required', 'string', 'max:255','regex:/^[a-zA-Z ]+$/u'],
          'gender' => ['required', 'string'],
             'country' => ['required', 'string'],
             'state' => ['required', 'string'],
            'city' => ['required', 'string'],
            'phone' => ['required', 'min:10','regex:/^\+?\d{10,}$/'],
            'address' => ['required','min:3','regex:/^[\p{Arabic}0-9\-\, ]|[a-zA-Z0-9\-\, ]+$/u'],
            'email' => 'required|unique:users,email,' .$id,
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
              'name_ar.required' => __('all.name_required'),
              'name_en.required'  => __('all.name_required'),
              'name_en.string'  => __('all.name_string'),
              'name_ar.string'  => __('all.name_string'),
              'name_ar.max'  => __('all.name_max'),
              'name_ar.max'  => __('all.name_max'),

              'name_ar.regex'  => __('all.name_ar_regex'),
              'name_en.regex'  => __('all.name_en_regex'),
            ]);

        $member=User::find($id);
        if(!$member){
            return  redirect()->back();
        }

        $member->name_ar=$request->get('name_ar');
        $member->name_en=$request->get('name_en');
        $member->email=$request->get('email');
        $member->gender=$request->get('gender');
        $member->phone=$request->get('phone');
        $member->address=$request->get('address');
        $member->type=$request->get('type');
        $member->city=$request->get('city');
        $member->country=$request->get('country');
        $member->state=$request->get('state');
        $member->password=$request->get('password');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image_name =time().$file->getClientOriginalName();
            $image_path='images/brand_images/';
            $file->move($image_path,$image_name);
            $image=$image_path.$image_name;
            $member->image=$image;
        }else{

        }
        $member->save();
        $members=User::get();
        return view('admin/member',compact('members'));
    }
}

