<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('web/index');
    }
    public function about(): string
    {
        return view('web/about');
    }
    public function registration(): string
    {
        return view('web/registration');
    }
}
