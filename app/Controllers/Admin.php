<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function login(): string
    {
        return view('admin/login');
    }
}
