<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\UserModel;
class UserController extends Controller
{
    // public function index()
    // {
    //     //$row = DB::update('update m_user set user_id = ?, level_id = ? where username = ?', [4, 4, 'customer-1']);
    //     //return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

    //     // $data =[
    //     //     //'username'=>'customer-1',
    //     //     //'nama'=>'Pelanggan pertama',
    //     //     //'password'=> Hash::make('12345'),
    //     //     //'level_id'=> 4
    //     //     'level_id' => 2,
    //     //     'username' => 'Manager_tiga',
    //     //     'nama' => 'Manager 3',A
    //     //     'password' => Hash::make('12345'),
    //     // ];
    //     // UserModel::create($data);

    // //    UserModel::where('username','customer-1')->update($data);
    // // Mencoba akses model UserModel
    // // $user = UserModel::create(
    // //     [
    // //         'username' => 'manager11',
    // //         'nama' => 'Manager11',
    // //         'password' => Hash::make('12345'),
    // //         'level_id' => 2
    // //     ]
    // // );

    // // $user->username = 'manager12';
    // // $user->isDirty();
    // // $user->isDirty('username');
    // // $user->isDirty('nama');
    // // $user->isDirty(['nama', 'username']);

    // // $user->isClean();
    // // $user->isClean('username');
    // // $user->isClean('nama');
    // // $user->isClean(['nama', 'username']);

    // // $user->save();
    // // $user->wasChanged();
    // // $user->wasChanged('username');
    // // $user->wasChanged(['username', 'level_id']);
    // // $user->wasChanged('nama');
    // // dd($user->wasChanged(['nama', 'username']));
    // // $user->isDirty();
    // // $user->isClean();
    // // dd($user-> isDirty());
    // $user = UserModel::all();
    // return view('user', ['data' => $user]);
    // }
    public function tambah()
    {
        return view('User_tambah');
    }
    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);
        return redirect('/user');
    }
    public function ubah($id) 
    {
     $user = UserModel::find($id);
     return view('user_ubah', ['data' => $user]);   
    }
    public function ubah_simpan($id, Request $request) {
        $user = UserModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;
        $user->save();
        return redirect('/user');
    }
    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        return redirect('/user');
    }
    public function index()
    {
        $user = UserModel::with('level')->get();
        return view('user', ['data' => $user]);
    }
}
