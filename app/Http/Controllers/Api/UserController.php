<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\usermodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        return usermodel::all();

    }

    public function store(Request $request){
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
            'user_id'=> $request->user_id,
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

    public function show(usermodel $id){
        return usermodel::find($id);
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $rules = [
            'level_id' => 'sometimes|integer',
            'username' => 'sometimes|string|min:3|unique:m_user,username,' . $id . ',id',
            'nama' => 'sometimes|string|max:100',
            'password' => 'sometimes|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Update data dengan hash
        $data = $request->only(['level_id', 'username', 'nama']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'status' => true,
            'message' => 'User updated successfully',
            'data' => $user
        ]);
    }

    public function destroy(usermodel $id){
        $id->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Data terhapus'
        ]);
    }
}