<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddressModel;
use App\Models\MemberModel;
use App\Models\OutletModel;
use App\Models\ProfileModel;

class Outlet extends BaseController
{

    public function getLocation()
    {
        $builder = new AddressModel();
        $builder->select('*');
        $builder->where('id = ' . user()->address_id);
        $data['addresses'] = $builder->get()->getResult();

        $outlet = new OutletModel();
        $outlet->select('*');
        $outlet->where('id = 1');
        $data['outlet'] = $outlet->get()->getResult();
        $lat1 = $data['outlet'][0]->lat;
        $lng1 = $data['outlet'][0]->lng;
        $lat2 = $data['addresses'][0]->lat;
        $lng2 = $data['addresses'][0]->lng;
        $data['distance'] = round($outlet->distance($lat1, $lng1, $lat2, $lng2, "k"), 2);
        return view('outlet/user', $data);
        // echo json_encode($data);
    }



    public function index()
    {
        if (in_groups('user')) {
            $builder = new AddressModel();
            $builder->select('*');
            $builder->where('id = ' . user()->address_id);
            $data['addresses'] = $builder->get()->getResult();

            $outlet = new OutletModel();
            $outlet->select('*');
            $outlet->where('id = 1');
            $data['outlet'] = $outlet->get()->getResult();
            $lat1 = $data['outlet'][0]->lat;
            $lng1 = $data['outlet'][0]->lng;
            $lat2 = $data['addresses'][0]->lat;
            $lng2 = $data['addresses'][0]->lng;
            $data['distance'] = round($outlet->distance($lat1, $lng1, $lat2, $lng2, "k"), 2);
            return view('outlet/user', $data);
        } else {
            $outlet = new OutletModel();
            $outlet->select('*');
            $outlet->where('id = 1');
            $data['outlet'] = $outlet->get()->getResult();
            return view('outlet/index', $data);
        }
    }

    public function create()
    {

        return view('outlet/create');
    }

    public function delete($id)
    {
        $news = new MemberModel();
        $news->delete($id);
        return redirect('paket');
    }

    public function edit($id)
    {

        $Pelanggan = new MemberModel();
        $data['pelanggan'] = $Pelanggan->where('id_member', $id)->first();


        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_member' => 'required',
            'alamat_member' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
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
