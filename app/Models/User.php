<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'gender',
        'country',
        'state',
        'city',
        'phone',
        'address',
        'type',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts(){
            $this->hasMany('App\Model\Cart');
        }
    public function receipts(){
            return  $this->hasMany('App\Models\Receipt');
      }
    public function feedbacks(){
            $this->hasMany('App\Model\Feedback');
    }
    public function orders(){
        $this->hasMany('App\Model\Order');
}
    public function favourites(){
    $this->hasMany('App\Model\Favourite');

}



}
