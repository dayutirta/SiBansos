<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\PenerimaModel;
use App\Models\PengajuanModel;


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
        $penerimaCount = PenerimaModel::where('status', 'Pending')->count();
        $pengajuanCount = pengajuanModel::where('status', 'Pending')->count();
        $user = Auth::user();
        $level = $user->id_level;
        if($level == 1){
            return view('pengaturan.show', ['breadcrumb' => $breadcrumb,'penerimaCount' => $penerimaCount, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu,'pengajuanCount' => $pengajuanCount]);
        }elseif($level == 2){
            $rt_logged_in = Auth::user()->rt;
            $penerimaCount = PenerimaModel::whereHas('user', function($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            $pengajuanCount = pengajuanModel::whereHas('warga', function($query) use ($rt_logged_in) {
                $query->where('rt', $rt_logged_in);
            })->where('status', 'Pending')->count();
            return view('pengaturan.show', ['breadcrumb' => $breadcrumb,'penerimaCount'=>$penerimaCount ,'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu,'pengajuanCount' => $pengajuanCount]);
        }else{
            return view('pengaturan.show', ['breadcrumb' => $breadcrumb,'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
        }   
    }
}
