<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Details extends BaseController
{
    public function index()
    {
        return view('details');
    }
}
