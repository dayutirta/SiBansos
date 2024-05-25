<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->id_level == '1') {
            $breadcrumb = (object) [
                'title' => 'Homepage RW',
                'list' => ['Home','Welcome']
            ];
            $page = (object) ['title' => 'Selamat Datang di Halaman Dashboard'];
    
            $activeMenu = 'dashboard';
    
            return view('admin.index', ['breadcrumb' => $breadcrumb,'page' => $page,'activeMenu' => $activeMenu]);
        } 
        
        elseif ($user->id_level == '2') {
            $breadcrumb = (object) [
                'title' => 'Homepage RT',
                'list' => ['Home','Welcome']
            ];
            $page = (object) ['title' => 'Selamat Datang di Halaman Dashboard'];
    
            $activeMenu = 'dashboard';
    
            return view('rt.index', ['breadcrumb' => $breadcrumb,'page' => $page,'activeMenu' => $activeMenu]);
        } 
        
        else if ($user->id_level == '3') {
            $breadcrumb = (object) [
                'title' => 'Homepage Warga',
                'list' => ['Home','Welcome']
            ];
            $page = (object) ['title' => 'Selamat datang di halaman warga'];
    
            $activeMenu = 'dashboard';
    
            return view('user.index', ['breadcrumb' => $breadcrumb,'page' => $page,'activeMenu' => $activeMenu]);
        }
    }
}