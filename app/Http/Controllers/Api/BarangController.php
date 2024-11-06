<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\barangmodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index(){
        return barangmodel::all();
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
                'kategori_id' => 'required|integer',
                'barang_kode' => 'required|string|min:3|unique:m_barang,barang_kode',
                'barang_nama' => 'required|string|max:100',
                'harga_jual' => 'required|integer',
                'harga_beli' => 'required|integer',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        // Menggunakan storeAs untuk menyimpan avatar
        $avatar = $request->avatar->storeAs('avatar_barang', $request->avatar->hashName());


        $barang = barangmodel::create([
            'barang_id'=>$request->barang_Id,
            'kategori_id'=>$request->kategori_id,
            'barang_kode'=>$request->barang_kode,
            'barang_nama'=>$request->barang_nama,
            'harga_jual'=>$request->harga_jual,
            'harga_beli'=>$request->harga_beli,
            'avatar' => $avatar
        ]);

        if($barang){
            return response()->json([
                'success'=>true,
                'user'=>[
                    'barang_id' => $barang->barang_id,
                    'kategori_id' => $barang->kategori_id,
                    'barang_kode' => $barang->barang_kode,
                    'barang_nama' => $barang->barang_nama,
                    'harga_jual' => $barang->harga_jual,
                    'harga_beli' => $barang->harga_beli,
                    'avatar' => 'avatar_barang/' . $barang->avatar, // Path relatif
                    'updated_at' => $barang->updated_at,
                    'created_at' => $barang->created_at,
                ]
            ],201);
        }

        return response()->json([
            'success'=>false,
        ],409);
    }

    public function show(barangmodel $id){
        return barangmodel::find($id);
    }

    public function update(Request $request, $id){
        $barang = barangmodel::find($id);

        if (!$barang) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $rules = [
                'kategori_id' => 'sometimes|integer',
                'barang_kode' => 'sometimes|string|min:3|unique:m_barang,barang_kode,'.$id.',id',
                'barang_nama' => 'sometimes|string|max:100',
                'harga_jual' => 'sometimes|integer',
                'harga_beli' => 'sometimes|integer',
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
        $barang->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Barang updated successfully',
            'data' => $barang
        ]);
    }

    public function destroy(barangmodel $id){
        $id->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Data terhapus'
        ]);
    }
}