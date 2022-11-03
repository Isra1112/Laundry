<?php

namespace App\Database\Seeds;

use App\Models\TransactionModel;
use App\Models\TransactionPackageModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TransactionSeedPrice extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $tp = new TransactionPackageModel();
        $t = new TransactionModel();

        for ($i = 1; $i <= 100; $i++) {
            $transpack = $tp->select('SUM(total_price) as total_price,SUM(discount) as discount')->where('transaction_id = '.$i)->get()->getResult();
            $basePrice = $transpack[0]->total_price;
            $totalDiscount = $transpack[0]->discount;
            $data = [
                'base_price' => $basePrice,
                'total_discount' => $totalDiscount,
                'total_price' => $basePrice - $totalDiscount,
                'paid' => $basePrice - $totalDiscount,
            ];
            $this->db->table('transactions')->update($data , ['id' => $i]);
        }

        for ($i = 101; $i <= 120; $i++) {
            $transpack = $tp->select('SUM(total_price) as total_price,SUM(discount) as discount')->where('transaction_id = '.$i)->get()->getResult();
            $transact = $t->select('status')->where('id = '.$i)->get()->getResult();
            $basePrice = $transpack[0]->total_price;
            $totalDiscount = $transpack[0]->discount;
            $status = $transact[0]->status;
            $data = [
                'base_price' => $basePrice,
                'total_discount' => $totalDiscount,
                'total_price' => $basePrice - $totalDiscount,
                'paid' => $status == 'done' ? $basePrice - $totalDiscount : $faker->numberBetween($min = 2000, $max =$basePrice - $totalDiscount - 5000),
            ];
            $this->db->table('transactions')->update($data , ['id' => $i]);
        }

        for ($i = 121; $i <= 140; $i++) {
            $price = $tp->select('SUM(total_price) as total_price,SUM(discount) as discount')->where('transaction_id = '.$i)->get()->getResult();
            $basePrice = $price[0]->total_price;
            $totalDiscount = $price[0]->discount;
            $data = [
                'base_price' => $basePrice,
                'total_discount' => $totalDiscount,
                'total_price' => $basePrice - $totalDiscount,
                'paid' => 0,
            ];
            $this->db->table('transactions')->update($data , ['id' => $i]);
        }
    }
}
