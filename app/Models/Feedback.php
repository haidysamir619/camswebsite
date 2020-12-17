<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function product(){
          return  $this->belongsTo('App\Models\Product');
    }
    public function likes(){
        return  $this->hasMany('App\Models\Like');
  }
  public function is_liked_by_user(){
    $id=Auth::id();
    $likers=array();
    foreach($this->likes as $like):
      array_push($likers,$like->user_id);
    endforeach;
    if(in_array($id,$likers)){
        return true;
    }else{
        return false;
    }
  }

    //with out return Call to a member function addEagerConstraints() on null

}
