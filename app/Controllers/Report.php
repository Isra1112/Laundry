<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Report extends BaseController
{
    public function index()
    {
        return view('report/index');
    }

    public function printReport()
    {
        $date = $this->request->getPost('from');
        echo json_encode([
            "date"=>$this->request->getPost('date'),
            "from"=>$this->request->getPost('from'),
            "to"=>$this->request->getPost('to'),
        ]);
        // return view('report/index');
    }
}
