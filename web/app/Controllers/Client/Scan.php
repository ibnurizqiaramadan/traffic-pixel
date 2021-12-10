<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class Scan extends BaseController
{
    public function index()
    {
        return view('client/scan');
    }
}
