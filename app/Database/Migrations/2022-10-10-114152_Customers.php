<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customers extends Migration
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
            'telephone'       => [
                'type'           => 'int',
                'constraint'     => '255'
            ],
            'address'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                
            ],
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at DATETIME'
        ]);
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('customers');
    }

    public function down()
    {
        $this->forge->dropTable('customers');
    }
}
