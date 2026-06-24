<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = service('uri');
        $segment1 = $uri->getSegment(1); // admin
        $segment2 = $uri->getSegment(2); // login / dashboard
        $isLoggedIn = session()->get('admin_logged_in');
        
        // echo $segment2 ;exit;
        
        // Only apply logic to admin routes
        if ($segment1 !== 'admin') {
            return;
        }

        // 1️⃣ If visiting /admin (no second segment)
        if ($segment1 === 'admin' && empty($segment2)) {
            if ($isLoggedIn) {
                return redirect()->to('/admin/dashboard');
            }
            return redirect()->to('/admin/login');
        }

        // 2️⃣ If logged in and trying to open login page
        if ($isLoggedIn && $segment2 === 'login') {
            return redirect()->to('/admin/dashboard');
        }

        // 3️⃣ If NOT logged in and trying to access protected pages
        if (!$isLoggedIn && !in_array($segment2, ['login', 'authenticate'])) {
            return redirect()->to('/admin/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Nothing here
    }
}
