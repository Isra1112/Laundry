<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type' => 'int',
                'constraint' => '5',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'fullname'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'default' => null
            ],
            'birthdate'       => [
                'type' => 'date',
                'default' => null
            ],
            'gender'       => [
                'type' => 'enum',
                'constraint' => "'f','m'",
                'default' => null
            ],
            'telephone'       => [
                'type' => 'bigint',
                'constraint' => '12',
                'default' => null
            ],
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at DATETIME'
        ]);
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('profiles');
    }

    public function down()
    {
        $this->forge->dropTable('profiles');
    }
}
