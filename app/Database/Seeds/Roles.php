<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
    public function run()
    {
        $roles_data = [
			[   
                
				'name' => 'Admin'
			],
			[
				'name' => 'Cashier'
			],
			[
				'name' => 'Owner'
			],
			[
				'name' => 'Customer'
			]
		];

		foreach($roles_data as $data){
			// insert semua data ke tabel
			$this->db->table('roles')->insert($data);
		}
    }
}
