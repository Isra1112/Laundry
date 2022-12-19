<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddressModel;
use App\Models\TransactionModel;
use App\Models\MemberModel;
use App\Models\OutletModel;
use App\Models\PackageModel;
use App\Models\ProfileModel;
use App\Models\TrackingModel;
use App\Models\TransactionPackageModel;

use function PHPUnit\Framework\isNull;

class Transaction extends BaseController
{
    public function index()
    {
        $db = new TransactionModel();
        $builder = $db;
        $builder->select('transactions.*,pro.fullname as name,pro.telephone,a.address,count(p.id) as package_selected');
        $builder->join('transactions_packages as tp', 'transactions.id = tp.transaction_id','inner');
        $builder->join('packages as p', 'p.id = tp.package_id','inner');
        $builder->join('users as u', 'u.id = transactions.user_id','inner');
        $builder->join('address as a', 'a.id = u.address_id','inner');
        $builder->join('profiles as pro', 'pro.id = u.profile_id','inner');
        $builder->where('transactions.deleted_at is NULL');
        $builder->orderBy('transactions.created_at','DESC');
        $builder->groupBy('transactions.id');
        $data['transactions'] = $builder->get()->getResult();

        $builder2 = $db;
        $builder2->select('transactions.*,pro.fullname as name,pro.telephone,a.address,count(p.id) as package_selected');
        $builder2->join('transactions_packages as tp', 'transactions.id = tp.transaction_id','inner');
        $builder2->join('packages as p', 'p.id = tp.package_id','inner');
        $builder2->join('users as u', 'u.id = transactions.user_id','inner');
        $builder2->join('address as a', 'a.id = u.address_id','inner');
        $builder2->join('profiles as pro', 'pro.id = u.profile_id','inner');
        $builder2->where('transactions.deleted_at is NULL');
        $builder2->where('transactions.delivery != 0 and transactions.status = "ready"');
        $builder2->orderBy('transactions.created_at','DESC');
        $builder2->groupBy('transactions.id');
        $data['toDelivery'] = $builder2->get()->getResult();

        $builder3 = $db;
        $builder3->select('transactions.*,pro.fullname as name,pro.telephone,a.address,count(p.id) as package_selected');
        $builder3->join('transactions_packages as tp', 'transactions.id = tp.transaction_id','inner');
        $builder3->join('packages as p', 'p.id = tp.package_id','inner');
        $builder3->join('users as u', 'u.id = transactions.user_id','inner');
        $builder3->join('address as a', 'a.id = u.address_id','inner');
        $builder3->join('profiles as pro', 'pro.id = u.profile_id','inner');
        $builder3->where('transactions.deleted_at is NULL');
        $builder3->where('transactions.delivery != 0 and transactions.status = "new"');
        $builder3->orderBy('transactions.created_at','DESC');
        $builder3->groupBy('transactions.id');
        $data['toPickup'] = $builder3->get()->getResult();


        // echo json_encode($data);
        return view('transaction/index', $data);
        // echo "<pre>";
        // print_r($data);
    }

    public function create()
    {
        $profile = new ProfileModel();
        $profile->select('*');
        $profile->where('id = ' . user()->profile_id);
        $profile->where('deleted_at is NULL');
        $data['profile'] = $profile->get()->getResult();

        $profile = new AddressModel();
        $profile->select('*');
        $profile->where('id = ' . user()->address_id);
        $profile->where('deleted_at is NULL');
        $data['addresses'] = $profile->get()->getResult();

        $profile = new PackageModel();
        $profile->select('*');
        $profile->where('deleted_at is NULL');
        $data['packages'] = $profile->get()->getResult();

        $outlet = new OutletModel();
        $outlet->select('*');
        $outlet->where('id = 1');
        $data['outlet'] = $outlet->get()->getResult();
        $lat1 = $data['outlet'][0]->lat;
        $lng1 = $data['outlet'][0]->lng;
        $lat2 = $data['addresses'][0]->lat;
        $lng2 = $data['addresses'][0]->lng;
        $data['distance'] = round($outlet->distance($lat1, $lng1, $lat2, $lng2, "k"), 2);
        if($data['distance'] < 4){
            $data['deliveryPrice'] = 10000;
        }else{
            $data['deliveryPrice'] = 20000;
        }

        return view('transaction/create', $data);
    }

    public function store()
    {
        $transaction = new TransactionModel();
        $data = [
            'invoice' => 'DRY' . user()->id . random_int(1000, 9999),
            'user_id'    => user()->id,
            'delivery' => $this->request->getPost('delivery') == 1 ? $this->request->getPost('deliv-price') : 0,
            'status' => 'new' 
        ];

        $transaction->insert($data);
        $transaction_id = $transaction->getInsertID();
        $data['packageselected'] = $this->request->getPost('selectedpackage') - 1;

        for ($i = 1; $i < $this->request->getPost('selectedpackage'); $i++) {
            if (isNull($this->request->getPost('package' . $i))) {
                $trspack = [
                    "transaction_id" => $transaction_id,
                    "package_id" => $this->request->getPost('package' . $i),
                    "quantity" => $this->request->getPost('qty' . $i),
                    "total_price" => $this->request->getPost('subtotal' . $i),
                    "discount" => 0,
                    "price_after_disc" => $this->request->getPost('subtotal' . $i),
                ];

                $trspackmod = new TransactionPackageModel();
                $trspackmod->insert($trspack);
            };
        }
        $transaction->update($transaction_id, [
            "total_price" => $this->request->getPost('totalPrice'),
            "base_price" => $this->request->getPost('totalPrice')
        ]);
        return redirect()->to(base_url('transaction/create'))->with('message', "Create Transaction successfully");
    }

    public function history()
    {
        $db = new TransactionModel();
        $builder = $db;
        // $builder->select('transactions.*, tp.*, p.name as package_name, c.name as customer_name, c.telephone as customer_telp, c.address as customer_address,u.name as user_name,r.name as role_name');
        $builder->select('transactions.*,count(p.id) as package_selected');
        $builder->join('transactions_packages as tp', 'transactions.id = tp.transaction_id', 'inner');
        $builder->join('packages as p', 'p.id = tp.package_id', 'inner');
        $builder->join('users as u', 'u.id = transactions.user_id', 'inner');
        $builder->where('u.id = ' . user()->id);
        $builder->orderBy('transactions.created_at', 'DESC');
        $builder->groupBy('transactions.id');
        $data['transactions'] = $builder->get()->getResult();

        
        // echo json_encode($data);
        return view('transaction/history', $data);
    }

    public function preview($id)
    {   
        $trs = new TransactionModel();
        $builder = $trs;
        $builder->select('transactions.*,u.email,p.fullname,p.telephone,a.name,a.address,a.note,a.lat,a.lng');
        $builder->join('users as u', 'u.id = transactions.user_id', 'inner');
        $builder->join('profiles as p', 'p.id = u.profile_id', 'inner');
        $builder->join('address as a', 'a.id = u.address_id', 'inner');
        $builder->where('transactions.id = ' .$id);
        $data['transactions'] = $builder->get()->getResult();

        $trspck = new TransactionPackageModel();
        $builder = $trspck;
        $builder->select('transactions_packages.*,p.name,p.price as pack_price');
        $builder->join('transactions as t', 't.id = transactions_packages.transaction_id', 'inner');
        $builder->join('packages as p', 'p.id = transactions_packages.package_id', 'inner');
        $builder->where('transactions_packages.transaction_id = ' .$id);
        $data['packages'] = $builder->get()->getResult();

        $tracking = new TrackingModel();
        $builder = $tracking;
        $builder->select('trackings.*,p.fullname');
        $builder->join('transactions as t', 't.id = trackings.transaction_id', 'inner');
        $builder->join('users as u', 'u.id = trackings.staff_id', 'inner');
        $builder->join('profiles as p', 'p.id = u.profile_id', 'inner');
        $builder->where('trackings.transaction_id = ' .$id);
        $builder->orderBy('created_at DESC');
        $data['trackings'] = $builder->get()->getResult();

        // echo json_encode($data);
        return view('transaction/detail', $data);
    }

    public function delete($id)
    {
        $news = new MemberModel();
        $news->delete($id);
        return redirect('transaction');
    }

    public function print($id)
    {
        $trs = new TransactionModel();
        $builder = $trs;
        $builder->select('transactions.*,u.email,p.fullname,p.telephone,a.name,a.address,a.note,a.lat,a.lng');
        $builder->join('users as u', 'u.id = transactions.user_id', 'inner');
        $builder->join('profiles as p', 'p.id = u.profile_id', 'inner');
        $builder->join('address as a', 'a.id = u.address_id', 'inner');
        $builder->where('transactions.id = ' .$id);
        $data['transactions'] = $builder->get()->getResult();

        $trspck = new TransactionPackageModel();
        $builder = $trspck;
        $builder->select('transactions_packages.*,p.name,p.price as pack_price');
        $builder->join('transactions as t', 't.id = transactions_packages.transaction_id', 'inner');
        $builder->join('packages as p', 'p.id = transactions_packages.package_id', 'inner');
        $builder->where('transactions_packages.transaction_id = ' .$id);
        $data['packages'] = $builder->get()->getResult();

        return view('transaction/print',$data);
        // echo json_encode($data);
    }

    public function toPickUp()
    {
        // $db = new TrackingModel();

        // $builder = $db;
        // $builder->select('*')->where('status_after = "picking up" and isDone is null and staff_id = '.user()->id)->orderBy('created_at',"desc");
        // $data['tracking'] = $builder->get()->getResult();

        // $id = [];

        // foreach ($data['tracking'] as $key => $value) {
        //     array_push($id,(int)$value->transaction_id);
        // }

        // $data['id'] = $id;

        $db = new TransactionModel();
        $builder2 = $db;
        $builder2->select('transactions.*,pro.fullname as name,pro.telephone,a.address,count(p.id) as package_selected');
        $builder2->join('transactions_packages as tp', 'transactions.id = tp.transaction_id','inner');
        $builder2->join('packages as p', 'p.id = tp.package_id','inner');
        $builder2->join('users as u', 'u.id = transactions.user_id','inner');
        $builder2->join('address as a', 'a.id = u.address_id','inner');
        $builder2->join('profiles as pro', 'pro.id = u.profile_id','inner');
        // $builder2->where('transactions.deleted_at is NULL and transactions.id IN ('. implode(', ',$id) .')');
        $builder2->where('transactions.deleted_at IS NULL and transactions.delivery != 0 and transactions.status = "picking up"');
        $builder2->orderBy('transactions.created_at','DESC');
        $builder2->groupBy('transactions.id');
        $data['transactions'] = $builder2->get()->getResult();


        // echo json_encode($data);
        return view('transaction/topickup', $data);
        // echo "<pre>";
        // print_r($data);
    }

    public function toDelivery()
    {
        

        $db = new TransactionModel();
        $builder2 = $db;
        $builder2->select('transactions.*,pro.fullname as name,pro.telephone,a.address,count(p.id) as package_selected');
        $builder2->join('transactions_packages as tp', 'transactions.id = tp.transaction_id','inner');
        $builder2->join('packages as p', 'p.id = tp.package_id','inner');
        $builder2->join('users as u', 'u.id = transactions.user_id','inner');
        $builder2->join('address as a', 'a.id = u.address_id','inner');
        $builder2->join('profiles as pro', 'pro.id = u.profile_id','inner');
        $builder2->where('transactions.deleted_at IS NULL and transactions.delivery != 0 and transactions.status = "on delivery"');
        $builder2->orderBy('transactions.created_at','DESC');
        $builder2->groupBy('transactions.id');
        $data['transactions'] = $builder2->get()->getResult();


        // echo json_encode($data);
        return view('transaction/todelivery', $data);
    }



    public function edit($id)
    {
        $transactionModel = new TransactionModel();

        $data = [
            "paid" => $this->request->getVar("pay")+$this->request->getVar("paid")
        ];
        if (!$transactionModel->update($id,$data)) {
            $data['id'] = $id;
            $data['transactions'] = $data;
            return view('address/index', [
                'errors' => $transactionModel->errors(),
                'package'=> $data
            ]);
        } else {
            return redirect()->to(base_url('transaction/'.$id.'/preview'))->with('message', "Edit Paid successfully");
        }
    }

    
}
