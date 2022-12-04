<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    protected static function preparePassword(string $password): string
    {
        return base64_encode(hash('sha384', $password, true));
    }
    public function run()
    {
        $config = config('Auth');

        if (
            (defined('PASSWORD_ARGON2I') && $config->hashAlgorithm === PASSWORD_ARGON2I)
            || (defined('PASSWORD_ARGON2ID') && $config->hashAlgorithm === PASSWORD_ARGON2ID)
        ) {
            $hashOptions = [
                'memory_cost' => $config->hashMemoryCost,
                'time_cost'   => $config->hashTimeCost,
                'threads'     => $config->hashThreads,
            ];
        } else {
            $hashOptions = [
                'cost' => $config->hashCost,
            ];
        }

        $pass = password_hash(
            self::preparePassword('!p4ssw0rd'),
            $config->hashAlgorithm,
            $hashOptions
        );

        $user_data = [
            [
                'active' => 1,
                'username' => 'admin',
                'email' => 'admin@isra-km.my.id',
                'password_hash' => $pass,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'profile_id' => 1,
                'address_id' => 1
            ],
            [
                'active' => 1,
                'username' => 'staff',
                'email' => 'staff@isra-km.my.id',
                'password_hash' => $pass,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'profile_id' => 2,
                'address_id' => 2
            ],
            [
                'active' => 1,
                'username' => 'staff2',
                'email' => 'staff2@isra-km.my.id',
                'password_hash' => $pass,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'profile_id' => 3,
                'address_id' => 3
            ],
            [
                'active' => 1,
                'username' => 'user',
                'email' => 'user@isra-km.my.id',
                'password_hash' => $pass,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'profile_id' => 4,
                'address_id' => 4
            ],
        ];

        $auth_group_data = [
            [
                'name' => 'admin',
                'description' => 'Administrator Web',
            ],
            [
                'name' => 'staff',
                'description' => 'Staff Outlet',
            ],
            [
                'name' => 'user',
                'description' => 'Customer',
            ],
        ];

        $auth_group_user_data = [
            [
                'group_id' => 1,
                'user_id' => 1,
            ],
            [
                'group_id' => 2,
                'user_id' => 2,
            ],
            [
                'group_id' => 2,
                'user_id' => 3,
            ],
            [
                'group_id' => 3,
                'user_id' => 4,
            ],
        ];

        $address_data = [
            [
                'name' => 'Rumah Admin',
            ], [
                'name' => 'Rumah Staff',
            ], [
                'name' => 'Rumah Staff2',
            ], [
                'name' => 'Rumah Customer',
                'address' => 'Jln Raya Tapos Rt 2',
                'note' => 'Pager Coklat',
                'lat' => -6.448024,
                'lng' => 106.88015,
            ],
        ];

        $profile_data = [
            [
                'fullname' => 'Administrator Name',
            ], [
                'fullname' => 'Staff Name',
            ],
            [
                'fullname' => 'Staff2 Name',
            ],
            [
                'fullname' => 'Customer Name',
            ],
        ];


        foreach ($profile_data as $data) {
            // insert semua data ke tabel
            $this->db->table('profiles')->insert($data);
        }
        foreach ($address_data as $data) {
            // insert semua data ke tabel
            $this->db->table('address')->insert($data);
        }
        foreach ($user_data as $data) {
            // insert semua data ke tabel
            $this->db->table('users')->insert($data);
        }

        foreach ($auth_group_data as $data) {
            // insert semua data ke tabel
            $this->db->table('auth_groups')->insert($data);
        }

        foreach ($auth_group_user_data as $data) {
            // insert semua data ke tabel
            $this->db->table('auth_groups_users')->insert($data);
        }

        $transaction_data = [
            [
                'invoice' => 'DRY0000' . 4 . random_int(1000, 9999),
                'base_price' => 31000,
                'total_discount' => 0,
                'total_price' => 41000,
                'paid' => 0,
                'delivery' => 10000,
                'user_id' => 4,
                'status' => 'new',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'invoice' => 'DRY' . 4 . random_int(1000, 9999),
                'base_price' => 60000,
                'total_discount' => 0,
                'total_price' => 70000,
                'paid' => 70000,
                'delivery' => 10000,
                'user_id' => 4,
                'status' => 'done',
                'created_at' => date("Y-m-d H:i:s",strtotime('-4 day')),
                'updated_at' => date("Y-m-d H:i:s",strtotime('-4 day')),
            ],
        ];

        $transaction_package_data = [
            [
                'quantity' => 2,
                'discount' => 0 ,
                'total_price' => 16000,
                'price_after_disc' => 16000,
                'transaction_id' => 1,
                'package_id' => 1,
            ],
            [
                'quantity' => 1,
                'discount' => 0 ,
                'total_price' => 15000,
                'price_after_disc' => 15000,
                'transaction_id' => 1,
                'package_id' => 2,
            ],
            [
                'quantity' => 3,
                'discount' => 0 ,
                'total_price' => 60000,
                'price_after_disc' => 60000,
                'transaction_id' => 2,
                'package_id' => 3,
            ],
        ];

        foreach ($transaction_data as $data) {
            // insert semua data ke tabel
            $this->db->table('transactions')->insert($data);
        }

        foreach ($transaction_package_data as $data) {
            // insert semua data ke tabel
            $this->db->table('Transactions_Packages')->insert($data);
        }
    }
}
