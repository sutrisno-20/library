<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function authenticating(Request $r) {
        $credentials = $r->validate([
            'username' => ['required' ],
            'password' => ['required'],
        ]);

        // is login valid?
        if (Auth::attempt($credentials)) {
            // is user active?
            if(Auth::user()->status != 'active'){
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account have not actived. Please contact admin!');
                return redirect('/login');
            }
            
            // $r->session()->regenerate();
            // return redirect()->intended('dashboard');
        }

        // if account invalid?
        Session::flash('status', 'failed');
        Session::flash('message', 'Login invalid');
        return redirect('/login');

    }
}
