<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function carts(){//
        return $this->hasMany('App\Models\Cart');
    }
    public function feedback(){//
       return $this->hasMany('App\Models\Feedback');
    }
    public function orders(){//
        return $this->hasMany('App\Models\Order');
    }
    public function favourite(){//
       return $this->hasMany('App\Models\Favourite');
    }
    public function brand(){//
        return $this->belongsTo('App\Models\Brand');
    }
    public function category(){//
        return $this->belongsTo('App\Models\Category');
    }
    public function product_colors()
    {
        return $this->hasMany('App\Models\ProductColor');
    }
    public function product_sizes()
    {
        return $this->hasMany('App\Models\ProductSize');
    }
    public function is_liked_by_user(){

    }


}
