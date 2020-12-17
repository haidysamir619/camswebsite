<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=['name_ar','name_en','image'];
    //Add [_token] to fillable property to allow mass assignment on [App\Models\Brand].
    use HasFactory;
    public function products(){
        return $this->hasMany('App\Models\Product','brand_id','id');
    }
}
