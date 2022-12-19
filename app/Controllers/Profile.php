<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;

class Profile extends BaseController
{
    public function index()
    {
        //
    }

    public function getProfile()
    {
        $builder = new ProfileModel();
        $builder->select('*');
        $builder->where('id = ' . user()->profile_id);
        $data['profiles'] = $builder->get()->getResult();
        return view('profile/index', $data);
        // echo json_encode($data);
    }
    public function update($id)
    {
        $profileModel = new ProfileModel();


        $data = [
            "fullname" => $this->request->getVar("fullname"),
            "telephone" => $this->request->getVar("telephone"),
            "birthdate" => $this->request->getVar("birthdate"),
            "gender" => $this->request->getVar("gender"),
        ];
        if (!$profileModel->update($id, $data)) {
            $data['id'] = $id;
            $data['errors'] =  $profileModel->errors();
            $profileModel->select('*');
            $profileModel->where('id = ' . user()->profile_id);
            $data['profiles'] = $profileModel->get()->getResult();
            return view('profile/index', $data);
        } else {
            // $session->setFlashdata("message", "Update Data Package successfully");
            return redirect()->to(base_url('profile'))->with('message', "Update Profile successfully");
        }
    }
}
