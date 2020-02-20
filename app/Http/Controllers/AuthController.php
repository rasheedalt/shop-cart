<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use JWTFactory;
use JWTAuth;
use Illuminate\Support\Str;
use Validator;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request){
        if (!$token = JWTAuth::attempt($request->all())) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
                'user'    =>  JWTAuth::user()
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $token,

        ]);
        
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required | unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
            }
         $input = $request->all();
         $input['password'] = hash::make($input['password']);
            $user =  User::create($input);
            return response()->json([$user], 200);
            
    }

    public function now(Request $request){
        dd($request->file);
    }
}
