<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        return view('content.index');
    }

    public function create()
    {
        return view('content.create');
    }
}
