<?php

namespace App\Http\Controllers;

use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index(){
        $user = Auth::user();
    
        if ($user) {
            if ($user->id_level == '1') {
                return redirect()->intended('admin/index');
            } else if ($user->id_level == '2') {
                return redirect()->intended('rt/index');
            }else if ($user->id_level == '3') {
                return redirect()->intended('user/index');
            }
        }
        return view('login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nokk' => 'required'
        ]);
    
        $nik = $request->input('nik');
        $nokk = $request->input('nokk');
    
        // Cek apakah pengguna ada di database
        $user = WargaModel::where('nik', $nik)->where('nokk', $nokk)->first();
    
        if ($user) {
            // Login pengguna secara manual
            Auth::guard('warga')->login($user);
    
            // Redirect berdasarkan level_id
            if ($user->level_id == '1') {
                return redirect()->intended('admin/index');
            }
            else if ($user->level_id == '2') {
                return redirect()->intended('rt/index');
            }
            else if ($user->level_id == '3') {
                return redirect()->intended('user/index');
            }
            // return redirect()->intended('/');
        }
    
        return redirect('login')
            ->withInput()
            ->withErrors(['login_error' => 'NIK atau NOKK salah']);
    }
    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
}