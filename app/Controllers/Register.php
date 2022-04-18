<?php

namespace App\Controllers;

use App\Models\RegisterSanggar;

class Register extends BaseController
{
    public function index()
    {
        return view('auth/Register');
    }

    public function tambah_sanggar()
    {
        $tambah = new RegisterSanggar();
        $tambah->insert($_POST);
        return view('auth/Register');
    }
}
