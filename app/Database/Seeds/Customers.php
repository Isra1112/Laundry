<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class Customers extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'name' => $faker->name,
                'telephone' => $faker->phoneNumber,
                'address' => $faker->address,
            ];
            $this->db->table('customers')->insert($data);
        }
    }
}
