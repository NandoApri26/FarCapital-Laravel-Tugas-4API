<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AuthpenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('Auth-Pengguna.login');
    }

    public function register()
    {
        return view('Auth-Pengguna.register');
    }

    // Level Pengguna
    public function register_pengguna(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'pengguna'
        ]);
        return redirect('/login_pengguna');
    }

    public function login_pengguna(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (!Auth::attempt($request->only(['email', 'password']))){
            return redirect('/login_pengguna')->with('status', 'Email atau Password salah');
        } else {
            // dd(Auth::user()->level);
            return redirect('/Home_pengguna');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login_pengguna');
    }
}
