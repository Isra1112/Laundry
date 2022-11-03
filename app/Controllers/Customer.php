<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class Customer extends BaseController
{
    public function index()
    {
        $customers = new CustomerModel();
        $data['customers'] = $customers->findAll();
        return view('customer/index',$data);
        // echo json_encode($data);
    }

    public function create()
    {
        
        return view('customer/create');
    }

    public function delete($id){
        $news = new CustomerModel();
        $news->delete($id);
        return redirect('pelanggan');
    }

    public function edit($id){
        $Pelanggan = new CustomerModel();
        $data['pelanggan'] = $Pelanggan->where('id_member', $id)->first();
        
        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_member' => 'required',
            'alamat_member' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $Pelanggan->update($id, [
                "nama_member" => $this->request->getPost('nama_member'),
                "alamat_member" => $this->request->getPost('alamat_member'),
                "jenis_kelamin" => $this->request->getPost('jenis_kelamin'),
                "telp_member" => $this->request->getPost('telp_member'),
                "no_ktp" => $this->request->getPost('no_ktp')
            ]);
            return redirect('pelanggan');
        }

        return view('pelanggan/edit', $data);
        // echo json_encode($data['pelanggan']) ;
    }
}
