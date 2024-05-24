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
                return redirect()->intended(route('admin.index'));
            } else if ($user->id_level == '2') {
                return redirect()->intended(route('rt.index'));
            }else if ($user->id_level == '3') {
                return redirect()->intended(route('user.index'));
            }
        }
        return view('login');
    }

    public function proses_login(Request $request){
        $request->validate([
            'nik' =>'required',
            'nokk' => 'required'
        ]);
    
        $user = WargaModel::where('nik', $request->nik)->first();
    
        if ($user && $request->nokk == $user->nokk) {
            Auth::login($user);
    
            if ($user->id_level == '1') {
                return redirect()->intended(route('admin.index'));
            } elseif ($user->id_level == '2') {
                return redirect()->intended(route('rt.index'));
            } else if ($user->id_level == '3') {
                return redirect()->intended(route('user.index'));
            }
            return redirect()->intended('/');
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