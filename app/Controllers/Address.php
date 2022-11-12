<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddressModel;

class Address extends BaseController
{
    public function index()
    {
        //
    }

    public function getAddress()
    {
        $builder = new AddressModel();
        $builder->select('*');
        $builder->where('id = '.user()->address_id);
        $data['addresses'] = $builder->get()->getResult();
        return view('address/index',$data);
        echo json_encode($data);
    }
     public function update($id)
     {
        $addressModel = new AddressModel();

        $session = session();

        $data = [
            "name" => $this->request->getVar("name"),
            "address" => $this->request->getVar("address"),
            "note" => $this->request->getVar("note")
        ];
        if (!$addressModel->update($id,$data)) {
            $data['id'] = $id;
            $data['addresses'] = $data;
            return view('address/index', [
                'errors' => $addressModel->errors(),
                'package'=> $data
            ]);
        } else {
            // $session->setFlashdata("message", "Update Data Package successfully");
            return redirect()->to(base_url('address'))->with('message', "Update Address successfully");
        }
     }
}
