<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login

        $breadcrumb = (object) [
            'title' => 'Profil Pengguna', // Ganti judul sesuai kebutuhan
            'list'  => ['Home', 'Profil'] // Sesuaikan breadcrumb dengan kebutuhan
        ];

        $page = (object) [
            'title' => 'Profil Pengguna' // Sesuaikan judul halaman dengan kebutuhan
        ];

        $activeMenu = 'profil'; // Ubah menu aktif sesuai kebutuhan

        return view('pengaturan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
}
