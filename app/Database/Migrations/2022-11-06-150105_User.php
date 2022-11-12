<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $fields = [
            'profile_id' => ['type' => 'int', 'constraint'     => '5', 'unsigned'       => TRUE],
            'CONSTRAINT profiles_users_ibfk_1 FOREIGN KEY(`profile_id`) REFERENCES `profiles`(`id`)',
        ];
        $fields2 = [
            'address_id' => ['type' => 'int', 'constraint'     => '5', 'unsigned'       => TRUE],
            'CONSTRAINT address_users_ibfk_1 FOREIGN KEY(`address_id`) REFERENCES `address`(`id`)'
        ];
        $this->forge->addColumn('users', $fields);
        $this->forge->addColumn('users', $fields2);
    }

    public function down()
    {
        //
    }
}
