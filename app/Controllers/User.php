<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;
use App\Models\RoleModel;
use Myth\Auth\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        
        $users = new UserModel();
        $users->select('users.*');
        $users->where('active = 1');
        $data['users'] = $users->findAll();
        return view('user/index',$data);
    }

    public function create()
    {
        $roles = new RoleModel();
        $roles->select('*');
        $roles->where('deleted_at is null');
        $data['roles'] = $roles->get()->getResult();
        // echo json_encode($data);
        return view('user/create',$data);
    }

    public function delete($id){
        $builder = new UserModel();
        $builder->update($id,[
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->to(base_url('user'))->with('message', "Delete User successfully");;
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
    public function isLogin()
    {
        return logged_in() ? redirect('dashboard') : view('index');
    }
    
}
