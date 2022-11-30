<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transactions extends Migration
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
            'invoice'          => [
                'type' => 'varchar',
                'constraint' => '100',
                'default' =>'DRY'
            ],
            'base_price'       => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                // 'null' => FALSE,
                'default' => 0.00
            ],
            'total_discount'       => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00
            ],
            'total_price'       => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                // 'null' => FALSE,
                'default' => 0.00
            ],
            'delivery'       => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                // 'null' => FALSE,
            ],
            'paid'       => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                // 'null' => FALSE,
                'default' => 0.00
            ],
            'user_id'       => [
                'type'           => 'int',
                'constraint'     => '11',
                'unsigned'       => TRUE,
                'null'           => TRUE

            ],
            'status'       => [
                'type'           => 'ENUM',
                'constraint'     =>  "'process','ready','done','picking up','on delivery','new'",
                'default'        => 'process',
                'null'           => FALSE
            ],
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at DATETIME'
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('user_id', 'users', 'id');

        // Membuat tabel news
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
