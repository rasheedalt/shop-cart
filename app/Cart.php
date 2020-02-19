<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'user_id', 'created_at', 'updated_at', 'product_id'
    ];

    public function user(){
        return $this->hasMany('App\User');
    }

    public function product(){
        return $this->hasMany('App\Product', 'id');
    }
}
