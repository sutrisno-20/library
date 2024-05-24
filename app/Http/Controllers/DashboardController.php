<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(Request $r) {
        // $r->Session()->flush();
        return view('dashboard');
    }
}
