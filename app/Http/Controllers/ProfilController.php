<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user(); 

        $breadcrumb = (object) [
            'title' => 'Profil Pengguna', 
            'list'  => ['Home', 'Profil'] 
        ];

        $page = (object) [
            'title' => 'Selamat Datang' 
        ];

        $activeMenu = 'profil'; 

        return view('pengaturan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
}
