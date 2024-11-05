<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\kategorimodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index(){
        return kategorimodel::all();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'kategori_kode'=>'required|string|min:3|unique:m_kategori,kategori_kode',
            'kategori_nama'=>'required|string|max:100'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $kategori = kategorimodel::create([
            'kategori_id'=>$request->kategori_id,
            'kategori_kode'=>$request->kategori_kode,
            'kategori_nama'=>$request->kategori_nama
        ]);

        if($kategori){
            return response()->json([
                'success'=>true,
                'user'=>$kategori
            ],201);
        }

        return response()->json([
            'success'=>false,
        ],409);
    }

    public function show(kategorimodel $id){
        return kategorimodel::find($id);
    }

    public function update(Request $request, $id){
        $kategori = kategorimodel::find($id);
        if (!$kategori) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $rules = [
            'kategori_kode'=>'sometimes|string|min:3|unique:m_kategori,kategori_kode,'.$id,
            'kategori_nama'=>'sometimes|string|max:100'
        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $request->all();
        $kategori->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Kategori updated successfully',
            'data' => $kategori
        ]);
    }

    public function destroy(kategorimodel $id){
        $id->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Data terhapus'
        ]);
    }
}