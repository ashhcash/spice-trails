<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BlogController extends BaseController
{
    public function blog()
    {
        return view('admin/blog/index');
    }

    public function editblog()
    {
        return view('adnin/blog/edit');
    }

    public function updateBlog()
    {
        //
    }

    public function createBlog()
    {
        return view('admin/blog/create');
    }
}
