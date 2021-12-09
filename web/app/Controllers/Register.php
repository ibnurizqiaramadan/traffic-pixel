<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index()
    {
        return view('frontend/register', [
            'title' => "Daftar"
        ]);
    }
}
