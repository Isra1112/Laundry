<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tracking extends Migration
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
            'customer_id'       => [
                'type'           => 'int',
                'constraint'     => '5',
                'unsigned'       => TRUE,
            ],
            'staff_id'       => [
                'type'           => 'int',
                'constraint'     => '5',
                'unsigned'       => TRUE,
            ],
            'transaction_id'       => [
                'type'           => 'int',
                'constraint'     => '5',
                'unsigned'       => TRUE,
            ],
            'description'       => [
                'type'           => 'varchar',
                'constraint'     => '255',
            ],
            'status_before'       => [
                'type'           => 'ENUM',
                'constraint'     =>  "'process','ready','done','picking up','on delivery','new'",
                'default'        => 'process',
                'null'           => FALSE
            ],
            'status_after'       => [
                'type'           => 'ENUM',
                'constraint'     =>  "'process','ready','done','picking up','on delivery','new'",
                'default'        => 'process',
                'null'           => FALSE
            ],
            'paid'       => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                // 'null' => FALSE,
                'default' => 0.00
            ],
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at DATETIME'
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('customer_id', 'users', 'id');
        $this->forge->addForeignKey('staff_id', 'users', 'id');
        $this->forge->addForeignKey('transaction_id', 'transactions', 'id');

        // Membuat tabel news
        $this->forge->createTable('trackings');
    }

    public function down()
    {
        $this->forge->dropTable('trackings');
    }
}
