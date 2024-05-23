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
            // dd(Auth::user());
            $r->session()->regenerate();
            // redirect to admin pag
            if(Auth::user()->role_id == 1){
                return redirect('dashboard');
            }

            // direct to user page
            if(Auth::user()->role_id == 2){
                return redirect('profile');
            }

            // return redirect();
        }

        // if account invalid?
        Session::flash('status', 'failed');
        Session::flash('message', 'Login invalid');
        return redirect('/login');

    }
}
