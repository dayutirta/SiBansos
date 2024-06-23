<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenerimaModel;
use App\Models\PengajuanModel;
use Illuminate\Support\Facades\Auth;


class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        $level = $user->id_level;
        $breadcrumb = (object) [
            'title' => 'Setting Pengguna', 
            'list'  => ['Home', 'Setting'] 
        ];

        $page = (object) [
            'title' => 'Selamat Datang' 
        ];
        $penerimaCount = PenerimaModel::where('status', 'Pending')->count();
        $pengajuanCount = pengajuanModel::where('status', 'Pending')->count();
        $activeMenu = 'setting'; 
        if ($level == 1) {
            return view('pengaturan.index', ['breadcrumb' => $breadcrumb,'penerimaCount' => $penerimaCount,'pengajuanCount' => $pengajuanCount, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
        }if ($level == 2) {
            $rt_logged_in = Auth::user()->rt;
            $penerimaCount = PenerimaModel::whereHas('user', function ($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            $pengajuanCount = pengajuanModel::whereHas('user', function ($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            return view('pengaturan.index', ['breadcrumb' => $breadcrumb,'penerimaCount' => $penerimaCount, 'page' => $page, 'user' => $user,'pengajuanCount' => $pengajuanCount, 'activeMenu' => $activeMenu]);
        }else{
            return view('pengaturan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
        }
        
    }
}
