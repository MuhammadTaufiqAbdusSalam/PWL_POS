<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\UserModel;
class UserController extends Controller
{
    public function index()
    {
        //$row = DB::update('update m_user set user_id = ?, level_id = ? where username = ?', [4, 4, 'customer-1']);
        //return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        // $data =[
        //     //'username'=>'customer-1',
        //     //'nama'=>'Pelanggan pertama',
        //     //'password'=> Hash::make('12345'),
        //     //'level_id'=> 4
        //     'level_id' => 2,
        //     'username' => 'Manager_tiga',
        //     'nama' => 'Manager 3',A
        //     'password' => Hash::make('12345'),
        // ];
        // UserModel::create($data);

    //    UserModel::where('username','customer-1')->update($data);
    // Mencoba akses model UserModel
    $user = UserModel::where('username', 'manager9')->firstOrFail(); //Mengambil semua data dari tabel m_user
    return view('user', ['data' => $user]);
    }
}
