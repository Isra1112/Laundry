<?php

namespace App\Database\Seeds;

use App\Models\TransactionPackageModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Transactions extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $tp = new TransactionPackageModel();
        // for ($i = 0; $i < 100; $i++) {
        //     $price = $tp->select('SUM(total_price) as total_price,SUM(discount) as discount')->where('transaction_id = 1')->get()->getResult();
        //     $basePrice = $price[0]->total_price;
        //     $totalDiscount = $price[0]->discount;
        //     // echo json_encode($price[0]->discount);
        //     // foreach ($price as $key => $value) {
        //     //     $base = $value->total_price;
        //     //     $discount = $value->total_discount;
        //     // }
        //     // $basePrice = $faker->numberBetween($min = 8000, $max = 10000000);
        //     // $totalDiscount = $faker->numberBetween($min = 2000, $max = 100000);
        //     $dates = $faker->dateTimeBetween('-1 year','now')->format('Y-m-d H:i:s'); 
        //     $data = [
        //         'invoice' => 'DRY'.strval($faker->randomNumber($nbDigits = NULL, $strict = false)),
        //         'base_price' => $basePrice,
        //         'total_discount' => $totalDiscount,
        //         'total_price' => $basePrice - $totalDiscount,
        //         'paid' => $basePrice - $totalDiscount,
        //         'user_id' => $faker->numberBetween($min = 1, $max = 4),
        //         'customer_id' => $faker->numberBetween($min = 1, $max = 100),
        //         'status' => $faker->randomElement($array = array ('process','ready','done')),
        //         'created_at' => $dates,
        //         'updated_at' => $dates,
        //     ];
        //     $this->db->table('transactions')->insert($data);
        // }
        // for ($i = 0; $i < 20; $i++) {
        //     $basePrice = $faker->numberBetween($min = 8000, $max = 10000000);
        //     $totalDicount = $faker->numberBetween($min = 2000, $max = 100000);
        //     $dates = $faker->dateTimeBetween('-1 year','now')->format('Y-m-d H:i:s'); 
        //     $data = [
        //         'invoice' => 'DRY'.strval($faker->randomNumber($nbDigits = NULL, $strict = false)),
        //         'base_price' => $basePrice,
        //         'total_discount' => $totalDicount,
        //         'total_price' => $basePrice - $totalDicount,
        //         'paid' => $faker->numberBetween($min = 2000, $max =$basePrice - $totalDicount - 5000),
        //         'user_id' => $faker->numberBetween($min = 1, $max = 4),
        //         'customer_id' => $faker->numberBetween($min = 1, $max = 100),
        //         'status' => $faker->randomElement($array = array ('process','ready','done')),
        //         'created_at' => $dates,
        //         'updated_at' => $dates,
        //     ];
        //     $this->db->table('transactions')->insert($data);
        // }
        // for ($i = 0; $i < 10; $i++) {
        //     $basePrice = $faker->numberBetween($min = 8000, $max = 10000000);
        //     $totalDicount = $faker->numberBetween($min = 2000, $max = 100000);
        //     $dates = $faker->dateTimeBetween('-1 year','now')->format('Y-m-d H:i:s'); 
        //     $data = [
        //         'invoice' => 'DRY'.strval($faker->randomNumber($nbDigits = NULL, $strict = false)),
        //         'base_price' => $basePrice,
        //         'total_discount' => $totalDicount,
        //         'total_price' => $basePrice - $totalDicount,
        //         'paid' => $basePrice - $totalDicount,
        //         'user_id' => $faker->numberBetween($min = 1, $max = 4),
        //         'customer_id' => $faker->numberBetween($min = 1, $max = 100),
        //         'status' => $faker->randomElement($array = array ('process','ready','done')),
        //         'created_at' => $dates,
        //         'updated_at' => $dates,
        //         'deleted_at' => $dates,
        //     ];
        //     $this->db->table('transactions')->insert($data);
        // }

        for ($i = 1; $i <= 120; $i++) {
            
            $dates = $faker->dateTimeBetween('-1 year','now')->format('Y-m-d H:i:s'); 
            $data = [
                'invoice' => 'DRY'.strval($faker->randomNumber($nbDigits = NULL, $strict = false)),
                'base_price' => 0,
                'total_discount' => 0,
                'total_price' => 0,
                'paid' => 0,
                // 'user_id' => $faker->numberBetween($min = 1, $max = 4),
                'customer_id' => $faker->numberBetween($min = 1, $max = 100),
                'status' => $faker->randomElement($array = array ('process','ready','done')),
                'created_at' => $dates,
                'updated_at' => $dates,
            ];
            $this->db->table('transactions')->insert($data);
        }
        for ($i = 1; $i <= 20; $i++) {
            
            $dates = $faker->dateTimeBetween('-1 year','now')->format('Y-m-d H:i:s'); 
            $data = [
                'invoice' => 'DRY'.strval($faker->randomNumber($nbDigits = NULL, $strict = false)),
                'base_price' => 0,
                'total_discount' => 0,
                'total_price' => 0,
                'paid' => 0,
                // 'user_id' => $faker->numberBetween($min = 1, $max = 4),
                'customer_id' => $faker->numberBetween($min = 1, $max = 100),
                'status' => $faker->randomElement($array = array ('process','ready','done')),
                'created_at' => $dates,
                'updated_at' => $dates,
                'deleted_at' => $dates,
            ];
            $this->db->table('transactions')->insert($data);
        }
    }
}
