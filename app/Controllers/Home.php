<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index',["user_ip"=>$this->getUserIP()]);
    }
}
