<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use App\Product;
use App\User;

class ProductController extends Controller
{
    public function products(){
        $products = Product::inRandomOrder()->get();
        return $this->response('success', 'Products fetched successfully', $products);
    }

    public function addProduct(Request $request){
        $role = JWTAuth::user()->role;
        if($role !== 'admin'){
            return $this->response('error', 'You are not authorized', '');
        }
        $validator =
            Validator::make($request->all(),[
                'name' => 'required',
                'description' => 'required ',
                'price' => 'required',
            ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }
        $product = Product::create($request->all());
        return $this->response('success', 'Products added successfully', $product);
    }


    public function editProduct(Request $request, $id){
        $role = JWTAuth::user()->role;
        if($role !== 'admin'){
            return $this->response('error', 'You are not authorized', '');
        }
        $product = Product::find($id);
        $product->update($request->all());
        return $this->response('success', 'Product Updated successfully', $product);
    }


    public function deleteProduct($id){
        $role = JWTAuth::user()->role;
        if($role !== 'admin'){
            return $this->response('error', 'You are not authorized', '');
        }
        $product = Product::findorFail($id)->delete();
        return $this->response('success', 'Products deleted successfully', '');
    }
}
