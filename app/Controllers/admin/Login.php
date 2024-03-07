<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Login extends BaseController
{
    // public function __CONSTRUCT()
    // {
    // }
    public function index()
    {
        return view("admin/login");
    }
    public function auth()
    {
        $email = $this->request->getPost('email');
        $psw = $this->request->getPost('psw');
        if($email != "admin@admin.com" || $psw != "admin")
        {
            return redirect()->back()->with("error",'Email or password incorrect !')->withInput();
        }
        else
        {
            $session = session();
            $session->regenerate();
            $session->set("logged",true);
            $session->set("admin",true);

            return redirect()->to("admin/dashboard");
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to("admin/login");
    }
}
