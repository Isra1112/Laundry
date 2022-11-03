<?php

namespace App\Controllers;

use App\Models\TransactionModel;

class Home extends BaseController
{
    public function index()
    {
        
        $judul['judul'] = "Halaman Depan";
        return view('home/index',$judul);
    }
    public function dashboard()
    {
        $db = new TransactionModel();
        $builder = $db;
        $builder->select('sum(total_price) as all_transaction');
        $builder->where('transactions.status = "done"');
        $builder->where('transactions.deleted_at is NULL');
        $builder->orderBy('transactions.created_at','DESC');
        $data['all'] = $builder->get()->getResult();

        $month = (int)date('m');
        $year = (int)date('Y');
        $byMonth = $db;
        $byMonth->select('sum(total_price) as all_transaction');
        $byMonth->where('transactions.status = "done"');
        $byMonth->where("MONTH(created_at) = {$month} AND YEAR(created_at) = {$year}");
        $byMonth->where('transactions.deleted_at is NULL');
        $byMonth->orderBy('transactions.created_at','DESC');
        $data['this_month'] = $byMonth->get()->getResult();
        
        $statusDone = $db;
        $statusDone->select('*');
        $statusDone->where('transactions.paid = transactions.total_price');
        $statusDone->where('transactions.status = "done"');
        $statusDone->where('transactions.deleted_at is NULL');
        $statusDone->orderBy('transactions.created_at','DESC');
        $data['done'] = $statusDone->get()->getResult();
        $data['count_status_done'] = count($data['done']);

        $statusDone = $db;
        $statusDone->select('Count(*) as count');
        $statusDone->where('transactions.paid = transactions.total_price');
        $statusDone->where('transactions.deleted_at is NULL');
        $statusDone->orderBy('transactions.created_at','DESC');
        $data['count_paid'] = $statusDone->get()->getResult()[0]->count;
        $precentage = ($data['count_status_done']/$data['count_paid']) * 100;
        $data['precentage'] = (int)$precentage;

        $upaid = $db;
        $upaid->select('Count(*) as count');
        $upaid->where('transactions.paid != transactions.total_price');
        $upaid->where('transactions.deleted_at is NULL');
        $upaid->orderBy('transactions.created_at','DESC');
        $data['unpaid'] = $upaid->get()->getResult()[0]->count;

        $transactions = $db;
        $transactions->select('transactions.*,c.name,c.telephone,c.address,count(p.id) as package_selected');
        $transactions->join('transactions_packages as tp', 'transactions.id = tp.transaction_id','inner');
        $transactions->join('packages as p', 'p.id = tp.package_id','inner');
        $transactions->join('customers as c', 'c.id = transactions.customer_id','inner');
        // $transactions->join('users as u', 'u.id = transactions.user_id','inner');
        // $transactions->join('roles as r', 'r.id = u.role_id','inner');
        $transactions->where('transactions.paid != transactions.total_price');
        $transactions->where('transactions.deleted_at is NULL');
        $transactions->orderBy('transactions.created_at','DESC');
        $transactions->groupBy('transactions.id');
        $data['transactions'] = $transactions->get()->getResult();

        // echo json_encode($data);
        // echo "<pre>";
        // print_r($data);
        return view('home',$data);
    }

    public function login()
    {
        return view('login');
        // echo "Selamat datang.. Selamat Belajar Web Programming !";
    }
    public function about()
    {
        // $db = \Config\Database::connect();
        // $query   = $db->query('SELECT * FROM detail_transaksi INNER JOIN transaksi ON detail_transaksi.transaksi_id=transaksi.id_transaksi INNER JOIN member ON member.id_member=transaksi.member_id;');
        // $results['transaksi'] = $query->getResult();
        
        // return view('home',$results);
        $judul['judul'] = "Halaman About";
        return view('home/about',$judul);
        // echo "Selamat datang.. Selamat Belajar Web Programming !";
    }
}
