<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class loggedInFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session("logged"))
        {
            return redirect()->to("admin/Dashboard");
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}