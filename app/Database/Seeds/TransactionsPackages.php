<?php

namespace App\Database\Seeds;

use App\Models\PackageModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class TransactionsPackages extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $packages = new PackageModel();
        $packages->select('*');
        $datas = $packages->get()->getResult();
        for ($i = 0; $i < 400; $i++) {
            foreach ($datas as $key => $value) {
                $packageId = $faker->numberBetween($min = 1, $max = 5);
                if ((int)$value->id == 1 ) {
                    $packagePrice = $value->price;
                    $qty = $faker->numberBetween($min = 1, $max = 15);
                    $disc = 0;
                    $qty >= 10 ? $disc = 0.15 : ($qty >= 5 ? $disc = 0.1 : $disc = 0);
                    $disc = $disc == 0 ? 0 : $qty * $packagePrice * $disc;
                    $data = [
                        'quantity' => $qty,
                        'discount' => $disc,
                        'total_price' => $qty * $packagePrice,
                        'price_after_disc' => $qty * $packagePrice - $disc,
                        'transaction_id' => $faker->numberBetween($min = 1, $max = 140),
                        'package_id' => $packageId,
                    ];
                    $this->db->table('Transactions_Packages')->insert($data);
                };
            }
        }
    }
}
