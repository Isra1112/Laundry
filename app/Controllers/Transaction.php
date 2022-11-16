<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddressModel;
use App\Models\TransactionModel;
use App\Models\MemberModel;
use App\Models\PackageModel;
use App\Models\ProfileModel;

class Transaction extends BaseController
{
    public function index()
    {
        $db = new TransactionModel();
        $builder = $db; 
        // $builder->select('transactions.*, tp.*, p.name as package_name, c.name as customer_name, c.telephone as customer_telp, c.address as customer_address,u.name as user_name,r.name as role_name');
        $builder->select('transactions.*,c.name,c.telephone,c.address,count(p.id) as package_selected');
        $builder->join('transactions_packages as tp', 'transactions.id = tp.transaction_id','inner');
        $builder->join('packages as p', 'p.id = tp.package_id','inner');
        $builder->join('customers as c', 'c.id = transactions.customer_id','inner');
        // $builder->join('users as u', 'u.id = transactions.user_id','inner');
        // $builder->join('roles as r', 'r.id = u.role_id','inner');
        // $builder->where('transactions.deleted_at is NOT NULL');
        $builder->where('transactions.deleted_at is NULL');
        $builder->orderBy('transactions.created_at','DESC');
        $builder->groupBy('transactions.id');
        $data['transactions'] = $builder->get()->getResult();
        // echo json_encode($data);
        return view('transaction/index',$data);
        // echo "<pre>";
        // print_r($data);
    }

    public function create()
    {
        $profile = new ProfileModel(); 
        $profile->select('*');
        $profile->where('id = '.user()->profile_id);
        $profile->where('deleted_at is NULL');
        $data['profile'] = $profile->get()->getResult();

        $profile = new AddressModel(); 
        $profile->select('*');
        $profile->where('id = '.user()->address_id);
        $profile->where('deleted_at is NULL');
        $data['address'] = $profile->get()->getResult();

        $profile = new PackageModel(); 
        $profile->select('*');
        $profile->where('deleted_at is NULL');
        $data['packages'] = $profile->get()->getResult();

        return view('transaction/create',$data);
    }

    public function delete($id)
    {
        $news = new MemberModel();
        $news->delete($id);
        return redirect('transaction');
    }

    public function edit($id)
    {
        // $news = new MemberModel();
        // $news->delete($id);
        // return view('pelanggan/edit');


        // ambil artikel yang akan diedit
        // $Pelanggan = new MemberModel();
        // $data['pelanggan'] = $Pelanggan->where('id_member', $id)->first();

        // // lakukan validasi data artikel
        // $validation =  \Config\Services::validation();
        // $validation->setRules([
        //     'nama_member' => 'required',
        //     'alamat_member' => 'required'
        // ]);
        // $isDataValid = $validation->withRequest($this->request)->run();
        // // jika data vlid, maka simpan ke database
        // if ($isDataValid) {
        //     $Pelanggan->update($id, [
        //         "nama_member" => $this->request->getPost('nama_member'),
        //         "alamat_member" => $this->request->getPost('alamat_member'),
        //         "jenis_kelamin" => $this->request->getPost('jenis_kelamin'),
        //         "telp_member" => $this->request->getPost('telp_member'),
        //         "no_ktp" => $this->request->getPost('no_ktp')
        //     ]);
        //     return redirect('pelanggan');
        // }

        // tampilkan form edit
        // return view('pelanggan/edit', $data);
        return view('transaction/edit');
        // echo json_encode($data['pelanggan']) ;
    }

    public function konfirmasi()
    {

        $db = \Config\Database::connect();
        $query   = $db->query('SELECT * FROM detail_transaksi INNER JOIN transaksi ON detail_transaksi.transaksi_id=transaksi.id_transaksi 
        INNER JOIN member ON member.id_member=transaksi.member_id where transaksi.status_bayar = "belum"');
        $results['transaksi'] = $query->getResult();

        // echo json_encode($results);
        return view('transaksi/konfirmasi', $results);
    }
}
