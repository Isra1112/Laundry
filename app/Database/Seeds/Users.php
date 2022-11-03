<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $roles_data = [
            [
                'name' => 'Admin name',
                'username' => 'admin',
                'email' => 'admin@email.com',
                'password' => password_hash('123', PASSWORD_BCRYPT),
                'role_id' => '1',
            ],
            [
                'name' => 'Cashier name',
                'username' => 'cashier',
                'email' => 'cashier@email.com',
                'password' => password_hash('123', PASSWORD_BCRYPT),
                'role_id' => '2',
            ],
            [
                'name' => 'Cashier name 2',
                'username' => 'cashier2',
                'email' => 'cashier2@email.com',
                'password' => password_hash('123', PASSWORD_BCRYPT),
                'role_id' => '2',
            ], [
                'name' => 'Owner name',
                'username' => 'owner',
                'email' => 'owner@email.com',
                'password' => password_hash('123', PASSWORD_BCRYPT),
                'role_id' => '3',
            ], [
                'name' => 'Customer name',
                'username' => 'customer',
                'email' => 'customer@email.com',
                'password' => password_hash('123', PASSWORD_BCRYPT),
                'role_id' => '4',
            ],
        ];

        foreach ($roles_data as $data) {
            // insert semua data ke tabel
            $this->db->table('users')->insert($data);
        }
    }
}
