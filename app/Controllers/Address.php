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
        $add = new AddressModel();
        $data['addresses'] = $add->getAddress();
        return view('address/index',$data);
        // echo json_encode($data);
    }

     public function update($id)
     {
        $add = new AddressModel();

        $data['address'] = [
            "id"=>$id,
            "name" => $this->request->getVar("name"),
            "address" => $this->request->getVar("address"),
            "note" => $this->request->getVar("note"),
            "lat" => $this->request->getVar("latitude"),
            "lng" => $this->request->getVar("longtitude"),
        ];
        if (!$add->update($id,$data['address'])) {
            $data['id'] = $id;
            $data['addresses'] = $add->getAddress();
            $data['errors'] = $add->errors();
            // $data['addresses'] = $data;
            // $data['addresses'] = $add->getAddress();
            return view('address/index', $data);
            // echo json_encode([
            //     'errors' => $add->errors(),
            //     'addresses'=> $data['addresses']
            // ]);
        } else {
            return redirect()->to(base_url('address'))->with('message', "Update Address successfully");
        }
     }
}
