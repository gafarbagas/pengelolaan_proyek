<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class AuthController extends Controller
{
    public function login ()
    {
        return view ('pages.login');
    }

    public function register ()
    {
        return view ('pages.register');
    }

    public function lupapassword ()
    {
        return redirect('/login')->with('lupas','Lupa password? Silahkan hubungi Admin.');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        if(Auth::attempt($request->only('username','password'))){
            return redirect('/');
        }
        return redirect('/login')->with('error','Username atau Password Anda Salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect ('/login');
    }
}
