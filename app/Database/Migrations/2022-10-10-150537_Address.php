<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Address extends Migration
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
            'name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'address'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false
            ],
            'note'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'           => false
            ],
            'lat'       => [
                'type' => 'FLOAT',
                'constraint' => "10, 6",
                'null' => false,
                'default' => 0
            ],
            'lng'       => [
                'type' => 'FLOAT',
                'constraint' => '10, 6',
                'null' => false,
                'default' => 0
            ],
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at DATETIME'
        ]);
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('address');
    }

    public function down()
    {
        $this->forge->dropTable('address');
    }
}
