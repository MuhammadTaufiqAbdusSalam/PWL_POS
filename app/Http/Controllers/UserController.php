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
    $user = UserModel::create(
        [
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2
        ]
    );

    $user->username = 'manager12';
    // $user->isDirty();
    // $user->isDirty('username');
    // $user->isDirty('nama');
    // $user->isDirty(['nama', 'username']);

    // $user->isClean();
    // $user->isClean('username');
    // $user->isClean('nama');
    // $user->isClean(['nama', 'username']);

    $user->save();
    $user->wasChanged();
    $user->wasChanged('username');
    $user->wasChanged(['username', 'level_id']);
    $user->wasChanged('nama');
    dd($user->wasChanged(['nama', 'username']));
    // $user->isDirty();
    // $user->isClean();
    // dd($user-> isDirty());
    //return view('user', ['data' => $user]);
    }
}
