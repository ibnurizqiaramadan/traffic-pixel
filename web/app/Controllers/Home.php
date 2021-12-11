<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('frontend/home');
    }

    public function scan()
    {
        return view('frontend/scan');
    }

    public function scan2()
    {
        return view('frontend/scan2');
    }
}
