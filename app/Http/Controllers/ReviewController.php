<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\User;

class ReviewController extends Controller
{
    public function get_reviews(){
        $reviewsexist=Feedback::get();
        if($reviewsexist->isEmpty()){
            return view('admin/reviews')->with('session','no review to show');
        }
        else{
        $reviews=Feedback::with('user','product')->get();//user
                return view('admin/reviews',compact('reviews'));
        }

    }
    public function delete_review(Request $request,$id){
        $review=Feedback::find($id);
        $review->delete();
        // return redirect()->back();
        if($request->ajax())
        {
            return response()->json(['success'=> 'Deleted Successfully' ]);
        }
        return back();


    }

}
