<?php

namespace App\Http\Controllers\Api;
use App\Models\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request){
        $validator = Validator::make($request->all(),[
            'username'=>'required',
            'nama'=>'required',
            'password'=>'required|min:5|confirmed',
            'level_id'=>'required'
        ]);

        // jika validasi gagal
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        // create user
        $user = usermodel::create([
            'username' => $request->username,
            'nama'=> $request->nama,
            'password'=> bcrypt($request->password),
            'level_id'=>$request->level_id
        ]);

        // return response json user jika berhasil dibuat
        if($user){
            return response()->json([
                'success'=>true,
                'user'=>$user
            ],201);
        }

        // jika proses create failed
        return response()->json([
            'success'=>false,
        ],409);
    }
}
