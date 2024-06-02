<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 

        $breadcrumb = (object) [
            'title' => 'Setting Pengguna', 
            'list'  => ['Home', 'Setting'] 
        ];

        $page = (object) [
            'title' => 'Selamat Datang' 
        ];

        $activeMenu = 'setting'; 

        return view('pengaturan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
}
