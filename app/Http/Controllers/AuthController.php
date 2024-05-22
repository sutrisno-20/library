<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $r) {
        return view('login');
    }

    public function register() {
        return view('register');
    }
}
