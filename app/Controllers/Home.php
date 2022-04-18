<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('auth/Login');
    }
    public function register()
    {
        return view('auth/Register');
    }
    public function sanggar()
    {
        return view('sanggar/index');
    }
}
