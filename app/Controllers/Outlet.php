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


    public function edit($id)
    {

        $outlet = new OutletModel();

        $data = [
            "name" => $this->request->getPost('name'),
            "address" => $this->request->getPost('address'),
            "telephone" => $this->request->getPost('telephone'),
            "lat" => $this->request->getPost('latitude'),
            "lng" => $this->request->getPost('longtitude')
        ];

        if (!$outlet->update($id,$data)) {
            $data['id'] = $id;
            $data['outlet'] = $data;
            $outlet->select('*');
            $outlet->where('id = ' . user()->profile_id);
            $data['outlet'] = $outlet->get()->getResult();
            $data['errors'] =$outlet->errors();
            return view('outlet/index', $data);
        } else {
            return redirect()->to(base_url('outlet'))->with('message', "Update Outlet successfully");
        }

        return redirect('pelanggan');

        // return view('pelanggan/edit', $data);
        // echo json_encode($data['pelanggan']) ;
    }
}
