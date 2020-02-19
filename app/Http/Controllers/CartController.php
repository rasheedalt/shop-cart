<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Cart;

class CartController extends Controller
{
    public function myCart(){
        $userID = JWTAuth::user()->id;
        $items = Cart::where('user_id', $userID)->with('product')->get();
        return $this->response('success', 'cart items fetched successfully', $items);
    }

    public function addToCart($id){
        $userID = JWTAuth::user()->id;
        $item['user_id'] = $userID;
        $item['product_id'] = $id;
        $saved = Cart::create($item);
        return $this->response('success', 'cart item added successfully', $item);
    }

    public function removeFromCart($id){
        $userID = JWTAuth::user()->id;
        $item = Cart::where('user_id', $userID)->where('product_id', $id)->delete();
        return $this->response('success', 'item removed from cart successfully', '');
    }
}
