<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Packages extends Seeder
{
    public function run()
    {
        $packages_data = [
            [
                'name' => 'Cuci Setrika Wangi Reguler',
                'price' => 8000.00,               
            ],
            [
                'name' => 'Cuci Setrika Wangi Express 1 Hari',
                'price' => 15000.00,
            ],
            [
                'name' => 'Cuci Setrika Wangi Express 6 Jam',
                'price' => 20000.00,
            ], 
            [
                'name' => 'Cuci Setrika Wangi Bulanan 30 KG',
                'price' => 250000.00,
            ],
            [
                'name' => 'Cuci Setrika Wangi Bulanan 50 KG',
                'price' => 400000.00,
            ],
        ];

        foreach ($packages_data as $data) {
            // insert semua data ke tabel
            $this->db->table('packages')->insert($data);
        }
    }
}
