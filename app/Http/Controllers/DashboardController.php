<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        dd(\Auth::user());
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
