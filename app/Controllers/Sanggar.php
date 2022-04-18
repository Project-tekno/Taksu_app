<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Sanggar extends BaseController
{

    public function index()
    {
        return view('sanggar/index');
    }
}
