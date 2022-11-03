<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;

class Role extends BaseController
{
    public function index()
    {
        $roles = new RoleModel();
        $data['role'] = $roles->findAll();
        return view('role/index',$data);
        // echo json_encode($data);
    }
}
