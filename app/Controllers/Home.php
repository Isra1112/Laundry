<?php

namespace App\Controllers;

use App\Models\TransactionModel;

class Home extends BaseController
{
    public function index()
    {
    }
    public function dashboard()
    {
        if (in_groups('user')) {
            return redirect()->to(base_url('profile'));
        } else {
            $db = new TransactionModel();
            $builder = $db;
            $builder->select('sum(total_price) as all_transaction');
            $builder->where('transactions.status = "done"');
            $builder->where('transactions.deleted_at is NULL');
            $builder->orderBy('transactions.created_at', 'DESC');
            $data['all'] = $builder->get()->getResult();

            $month = (int)date('m');
            $year = (int)date('Y');
            $byMonth = $db;
            $byMonth->select('sum(total_price) as all_transaction');
            $byMonth->where('transactions.status = "done"');
            $byMonth->where("MONTH(created_at) = {$month} AND YEAR(created_at) = {$year}");
            $byMonth->where('transactions.deleted_at is NULL');
            $byMonth->orderBy('transactions.created_at', 'DESC');
            $data['this_month'] = $byMonth->get()->getResult();

            $statusDone = $db;
            $statusDone->select('*');
            $statusDone->where('transactions.paid = transactions.total_price');
            $statusDone->where('transactions.status = "done"');
            $statusDone->where('transactions.deleted_at is NULL');
            $statusDone->orderBy('transactions.created_at', 'DESC');
            $data['done'] = $statusDone->get()->getResult();
            $data['count_status_done'] = count($data['done']);

            $statusDone = $db;
            $statusDone->select('Count(*) as count');
            // $statusDone->where('transactions.paid = transactions.total_price');
            $statusDone->where('transactions.deleted_at is NULL');
            $statusDone->orderBy('transactions.created_at', 'DESC');
            $data['count_paid'] = $statusDone->get()->getResult()[0]->count;
            $precentage = ($data['count_status_done'] / $data['count_paid']) * 100;
            $data['precentage'] = (int)$precentage;

            $upaid = $db;
            $upaid->select('Count(*) as count');
            $upaid->where('transactions.paid != transactions.total_price');
            $upaid->where('transactions.deleted_at is NULL');
            $upaid->orderBy('transactions.created_at', 'DESC');
            $data['unpaid'] = $upaid->get()->getResult()[0]->count;

            $transactions = $db;
            $transactions->select('transactions.*,pro.fullname as name,pro.telephone,a.address,count(p.id) as package_selected');
            $transactions->join('transactions_packages as tp', 'transactions.id = tp.transaction_id', 'inner');
            $transactions->join('packages as p', 'p.id = tp.package_id', 'inner');
            $transactions->join('users as u', 'u.id = transactions.user_id', 'inner');
            $transactions->join('address as a', 'a.id = u.address_id', 'inner');
            $transactions->join('profiles as pro', 'pro.id = u.profile_id', 'inner');
            // $transactions->join('roles as r', 'r.id = u.role_id','inner');
            // $transactions->where('transactions.paid != transactions.total_price');
            $transactions->where('transactions.deleted_at is NULL');
            $transactions->orderBy('transactions.created_at', 'DESC');
            $transactions->groupBy('transactions.id');
            $data['transactions'] = $transactions->get()->getResult();

            // echo json_encode($data);
            // echo "<pre>";
            // print_r($data);
            return view('home', $data);
        }
    }
}
