<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $user = User::all()->where('username', $request->username)->first();

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if($user->role_id == '1'){
                return redirect()->intended('/admin/home');
            }else{
                return redirect()->intended('/user/home');
            }
        }

        return back()->with('error', 'Anda Gagal Login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
