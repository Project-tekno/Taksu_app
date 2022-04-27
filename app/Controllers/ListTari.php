<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ListTari extends BaseController
{

    public function index()
    {
        return view('ListTari/DaftarTari');
    }
}
