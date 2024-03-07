<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        return view('about',["user_ip"=>$this->getUserIP()]);
    }
}
