<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// route::get('/level', [LevelController::class, 'index']);
// route::get('/kategori', [KategoriController::class, 'index']);
// route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [userController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [userController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [userController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [userController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [userController::class, 'hapus']);
// Route::get('/', [WelcomeController::class, 'index']);
route::get('/', [WelcomeController::class, 'index']);

route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController :: class, 'index' ]);         // menampilkan halaman awal user
    Route::post('/list', [UserController :: class, 'list' ]);     // menampilkan data user dalam bentuk json untuk datables
    Route::get('/create', [UserController :: class, 'create' ]);  // menampilkan halaman form tambah user
    Route::post('/', [UserController :: class, 'store' ]);        // menyimpan data user baru
    Route::get('/{id}', [UserController :: class, 'show']);       // menampilkan detail user
    Route::get('/{id}/edit', [UserController :: class, 'edit' ]); // menampilkan halaman form edit user
    Route::put('/{id}', [UserController :: class, 'update']);     // menyimpan perubahan data user
    Route::delete('/{id}', [UserController :: class, 'destroy']); // menghapus data user
});
