<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;

class Report extends BaseController
{
    public function index()
    {
        return view('report/index');
    }

    public function printReport()
    {
        $date = $this->request->getPost('date');

        $db = new TransactionModel();
        $transactions = $db;
        $transactions->select('transactions.*,pro.fullname as name,pro.telephone,a.address,count(p.id) as package_selected');
        $transactions->join('transactions_packages as tp', 'transactions.id = tp.transaction_id', 'inner');
        $transactions->join('packages as p', 'p.id = tp.package_id', 'inner');
        $transactions->join('users as u', 'u.id = transactions.user_id', 'inner');
        $transactions->join('address as a', 'a.id = u.address_id', 'inner');
        $transactions->join('profiles as pro', 'pro.id = u.profile_id', 'inner');
        

        switch ($date) {
            case 'month':
                $month = date('m');
                $transactions->where('MONTH(transactions.created_at) = ',$month);
                
                break;
            case 'date':
                $from = $this->request->getPost('from');
                $to = $this->request->getPost('to');
                ($from and $to) ? $transactions->where('DATE(transactions.created_at) BETWEEN "'. $from .'" AND "'. $to .'"') : (($from) ? $transactions->where('DATE(transactions.created_at) >= ',$from):(($to) ? $transactions->where('DATE(transactions.created_at) <= ',$to):''));
                
                break;

            default:
                # code...
                break;
        }
        $transactions->where('transactions.deleted_at is NULL');
        $transactions->orderBy('transactions.created_at', 'DESC');
        $transactions->groupBy('transactions.id');
        $data['transactions'] = $transactions->get()->getResult();
        return view('report/print',$data);
        // echo json_encode($data);
        // return view('report/index');
    }
}
