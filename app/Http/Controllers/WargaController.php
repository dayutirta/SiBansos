<?php

namespace App\Http\Controllers;

use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->id_level == '1') {
            $breadcrumb = (object) [
                'title' => 'Admin Page',
                'list' => [
                    'Home',
                ]
            ];
    
            $page = (object) [
                'title' => 'Selamat Datang di Halaman Dashboard',
            ];
    
            $activeMenu = 'user';
    
            $level = WargaModel::all();
    
            return view('admin.index', [
                'breadcrumb' => $breadcrumb,
                'page' => $page,
                'level' => $level,
                'activeMenu' => $activeMenu
            ]);
        } elseif ($user->id_level == '2') {
            $breadcrumb = (object) [
                'title' => 'Admin Page',
                'list' => [
                    'Home',
                ]
            ];
    
            $page = (object) [
                'title' => 'Selamat Datang di Halaman Dashboard',
            ];
    
            $activeMenu = 'user';
    
            $level = WargaModel::all();
    
            return view('rt.index', [
                'breadcrumb' => $breadcrumb,
                'page' => $page,
                'level' => $level,
                'activeMenu' => $activeMenu
            ]);
        } else if ($user->id_level == '3') {
            $breadcrumb = (object) [
                'title' => 'Page Warga',
                'list' => [
                    'Home',
                ]
            ];
    
            $page = (object) [
                'title' => 'Selamat datang di halaman warga',
            ];
    
            $activeMenu = 'user';
    
            $level = WargaModel::all();
    
            return view('user.index', [
                'breadcrumb' => $breadcrumb,
                'page' => $page,
                'level' => $level,
                'activeMenu' => $activeMenu
            ]);
        }
    }
}
