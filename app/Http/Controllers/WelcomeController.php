<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Selamat Datang',
            'list' => ['Hmoe', 'welcome']
        ];
        $activeMenu = 'dashboard';
        return view('welcome', ['breadcrumb'=> $breadcrumb, 'activeMenu' => $activeMenu]);
    }
    public function landing()
    {
        return view('landing'); // Pastikan Anda membuat view landing.blade.php
    }
}
