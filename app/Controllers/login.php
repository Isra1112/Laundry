<?php

namespace App\Controllers;

use App\Models\UserModel;

class login extends BaseController
{
    public function index()
    {

        return view('login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->select('users.*, roles.name as role_name')->join('roles', 'roles.id = users.role_id', 'inner')->where('username', $username)->get()->getResultArray();

        if ($data) {
            $result = $data[0];
            $pass = $result['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'user_id'       => $result['id'],
                    'user_name'     => $result['username'],
                    'user_email'    => $result['email'],
                    'roles' => $result['role_name'],
                    'logged_in'     => TRUE
                ];
                if ($result['role_name'] == 'Admin') {
                    $ses_data["module"] = [
                        'dashboard', 'transaksi', 'customer','user','outlet','package'
                    ];
                } elseif ($result['role_name'] == 'Cashier') {
                    $ses_data["module"] = ['dashboard', 'transaksi','customer'];
                } elseif ($result['role_name'] == 'Owner') {
                    $ses_data["module"] = ['dashboard', 'transaksi', 'customer','outlet','package'];
                }

                $session->set($ses_data);
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
    public function loggedIn()
    {
        $session = session();
        echo "Welcome back, " . json_encode($session->get('module'));
    }
}
