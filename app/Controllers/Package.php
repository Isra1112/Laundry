<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;
use App\Models\PackageModel;

class Package extends BaseController
{
    public function index()
    {
        $packages = new PackageModel();
        $packages->select('*');
        $packages->where('deleted_at is NULL');
        $data['packages'] = $packages->get()->getResult();
        return view('package/index', $data);
    }

    public function create()
    {

        return view('package/create');
    }

    public function store()
    {
        $packageModel = new PackageModel();

        $session = session(); // loading session service

        $data = [
            "name" => $this->request->getVar("name"),
            "price" => $this->request->getVar("price"),
        ];
        if ($packageModel->save($data) === false) {
            return view('package/create', [
                'errors' => $packageModel->errors()
            ]);
        } else {
            $session->setFlashdata("success", "Data saved successfully");
            return redirect()->to(base_url('package/create'));
        }
    }

    public function delete($id)
    {
        $packageModel = new PackageModel();
        $data = [
            "deleted_at" => date('Y-m-d H:i:s')
        ];
        echo $id;
        $packageModel->update($id,$data);
        return redirect()->to(base_url('package'))->with('message', "Delete Package successfully");
    }

    public function edit($id)
    {
        $packageModel = new PackageModel();
        $dataPackage = $packageModel->find($id);
        if (empty($dataPackage)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Package Tidak ditemukan !');
        }
        $data['package'] = $dataPackage;
        return view('package/edit', $data);
    }
    
    public function update($id)
    {
        $packageModel = new PackageModel();

        $session = session(); // loading session service

        $data = [
            "name" => $this->request->getVar("name"),
            "price" => $this->request->getVar("price"),
        ];
        if (!$packageModel->update($id,$data)) {
            $data['id'] = $id;
            $data['package'] = $data;
            return view('package/edit', [
                'errors' => $packageModel->errors(),
                'package'=> $data
            ]);
        } else {
            $session->setFlashdata("message", "Update Data Package successfully");
            return redirect()->to(base_url('package'));
        }
    }
}
