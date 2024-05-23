<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function profile(Request $r) {
        // $r->Session()->flush();
        return view('/profile');
    }
}
