<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SanggarPenyedia extends BaseController
{

    public function index()
    {
        return view('SanggarPenyedia/penyedia');
    }
}
