<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __invoke(Request $request){
        $validator = Validator::make($request->all(),[
            'username'=>'required',
            'password'=>'required'
        ]);

        // jika validator gagal
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $credential = $request->only('username','password');

        // jika auth gagal
        if(!$token = auth()->guard('api')->attempt($credential)){
            return response()->json([
                'success'=>false,
                'message'=>'Username atau Password anda salah'
            ],401);
        }

        // jika auth berhasil
        return response()->json([
            'success'=> true,
            'user'=>auth()->guard('api')->user(),
            'token'=>$token
        ],200);
    }
}