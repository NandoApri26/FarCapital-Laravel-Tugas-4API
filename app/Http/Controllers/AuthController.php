<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('Auth.login');
    }

    public function register()
    {
        return view('Auth.register');
    }

    // Level Admin
    public function register_admin(Request $request)
    {
        // return $request;
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'admin'
        ]);
        return redirect('/login');
    }

    public function login_admin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (!Auth::attempt($request->only(['email', 'password']))){
            return redirect('/login')->with('status', 'Email atau Password salah');
        } else {
            return redirect('/Home');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
