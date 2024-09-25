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
}
