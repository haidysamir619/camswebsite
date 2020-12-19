<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function receipt(){
        return $this->belongsTo('App\Models\Receipt');
    }

    public function products(){
        return $this->belongsTo('App\Models\Product');
    }
    public function product(){//
        return $this->belongsTo('App\Models\Product');
    }
}
