<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        return view('web.home');
    }

    public function details($id)
    {
        return view('web.details', compact('id'));
    }



    public function faq_index()
    {
        return view('faq.index');
    }
}
