<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('client/dashboard', [
            "title" => "Dasbor",
            "menu" => "dashboard"
        ]);
    }
}
