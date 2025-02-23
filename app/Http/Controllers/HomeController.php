<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function music()
    {
        return view('music');
    }

    public function perkenalan()
    {
        return view('perkenalan');
    }

    public function ucapan()
    {
        return view('ucapan');
    }

    public function pesan()
    {
        return view('pesan');
    }

    public function confess()
    {
        return view('confess');
    }

    public function end()
    {
        return view('end');
    }

}
