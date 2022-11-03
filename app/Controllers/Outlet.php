<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;
use App\Models\OutletModel;
use App\Models\PaketModel;

class Outlet extends BaseController
{
    public function index()
    {
        
        return view('outlet/index');
    }

    public function create()
    {
        
        return view('outlet/create');
    }

    public function delete($id){
        $news = new MemberModel();
        $news->delete($id);
        return redirect('paket');
    }

    public function edit($id){
       
        $Pelanggan = new MemberModel();
        $data['pelanggan'] = $Pelanggan->where('id_member', $id)->first();
        
        
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
