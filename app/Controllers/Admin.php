<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function login(): string
    {
        return view('admin/login');
    }

    public function authenticate(){
        $adminpass = env('admin-password');
        $adminemail = env('admin-email');

        $loginEmail = $this->request->getPost('email');
        $loginpass = md5($this->request->getPost('password'));

        if($adminemail === $loginEmail && $adminpass === $loginpass){
            session()->set(
                [
                    'admin_logged_in' => true,
                    'admin_email' => $loginEmail,
                ]
            );
            return redirect()->to('admin/dashboard');

        };
    }

    public function dashboard(){
        return view('admin/dashboard');
    }
}
