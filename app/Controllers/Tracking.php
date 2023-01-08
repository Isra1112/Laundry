<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TrackingModel;
use App\Models\TransactionModel;

class Tracking extends BaseController
{
    public function index()
    {
        
    }

    public function status($code, $trsId)
    {
        $transaction = new TransactionModel();
        $transaction->select('*')->where('id = ' . $trsId);
        $trs['trs'] = $transaction->get()->getResult();

        $tracking = new TrackingModel();
        $data = [
            'transaction_id'    => $trsId,
            'staff_id' => user()->id,
            'status_before' => $trs['trs'][0]->status,
            'paid' => 0
        ];


        $dataTrs = [
            // 'status' => 'new',
        ];

        switch ($code) {
            case 1:
                $data['description'] = 'Staff Picking Up Laundry';
                $data['status_after'] = 'picking up';
                $dataTrs['status'] = 'picking up';
                break;
            case 2:
                $data['description'] = 'Staff Picked Up Laundry And Ready To Process';
                $data['status_after'] = 'process';
                $dataTrs['status'] = 'process';
                break;
            case 3:
                $data['description'] = 'Staff Is Delivering Laundry To Your Address';
                $data['status_after'] = 'on delivery';
                $dataTrs['status'] = 'on delivery';
                break;
            case 4:
                $data['description'] = 'Your laundry has been delivered';
                $data['status_after'] = 'done';
                $dataTrs['status'] = 'done';
                break;
            case 5: 
                $data['description'] = 'Your laundry is complete and ready to be delivered';
                $data['status_after'] = 'ready';
                $dataTrs['status'] = 'ready';
                break;
            case 6:
                $data['description'] = 'Your laundry is being processed';
                $data['status_after'] = 'process';
                $dataTrs['status'] = 'process';
                break;
            case 7:
                $data['description'] = 'Your laundry is complete and ready to be picked up';
                $data['status_after'] = 'ready';
                $dataTrs['status'] = 'ready';
                break;
            case 8:
                $data['description'] = 'You have taken the laundry';
                $data['status_after'] = 'done';
                $dataTrs['status'] = 'done';
                break;
            default:
                break;
        }
        $transaction2 = new TransactionModel();
        $transaction2->update($trsId, $dataTrs);
        $tracking->insert($data);
        $tracking_id = $tracking->getInsertID();

        $tracking2 = new TrackingModel();
        $tracking2->select('*')->where('id = ' . $tracking_id);
        $dd['tracking'] = $tracking2->get()->getResult();
        return redirect()->to(base_url('transaction/'.$trsId.'/preview'))->with('message', $data['description']);
        // return json_encode($dataTrs);
    }
}
