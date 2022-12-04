<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Outlet extends Seeder
{
    public function run()
    {
        $data_outelt = [
            [
                'name'       => 'Main Outlet',
                'address'       => 'Jln Raya Tapos Ruko Permata Cimanggis',
                'telephone'       => 8787277,
                'email'       => 'main@isra-km.my.id',
                'lat'       => -6.445433,
                'lng'       => 106.868958
            ]
        ];

        foreach ($data_outelt as $data) {
            // insert semua data ke tabel
            $this->db->table('outlet')->insert($data);
        }
    }
}
