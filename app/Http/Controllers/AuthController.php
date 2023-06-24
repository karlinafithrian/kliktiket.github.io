<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

    public function postregister (Request $request) {
        $user = new \App\Models\User ;
        $user->role="Users";
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str::random(50);
        $user->save();

        return redirect()->route('login');

    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return view('admin.index');
        }
     else {
        Session::flash('error', 'Nama atau kata sandi salah.');
        return redirect()->route('login');
    }
    
}
}

