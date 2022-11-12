<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\OutletModel;

class Test extends BaseController
{
    public function index()
    {
        return logged_in() ? redirect('dashboard') : view('index');
    }
}
