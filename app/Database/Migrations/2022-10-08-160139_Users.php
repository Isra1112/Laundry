<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
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
            'username'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'unique'=>TRUE
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'unique'=>TRUE
            ],
            'password'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255'
            ],
            'role_id'       => [
                'type'           => 'int',
                'constraint'     => '5',
                'unsigned' => TRUE,
            ],
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at DATETIME'
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('role_id', 'roles', 'id');

        // Membuat tabel news
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
