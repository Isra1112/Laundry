<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransactionsPackages extends Migration
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
            'quantity'       => [
                'type' => 'int',
                'constraint' => '5',
                'null' => FALSE,
                'default' => 1
            ],
            'total_price'       => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => FALSE,
                'default' => 0.00
            ],
            'discount'       => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00
            ],
            'price_after_disc'       => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => FALSE,
                'default' => 0.00
            ],
            'transaction_id'       => [
                'type'           => 'int',
                'constraint'     => '5',
                'unsigned'       => TRUE,
            ],
            'package_id'       => [
                'type'           => 'int',
                'constraint'     => '5',
                'unsigned'       => TRUE,
            ],
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            'deleted_at DATETIME'
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('transaction_id', 'transactions', 'id');
        $this->forge->addForeignKey('package_id', 'packages', 'id');

        // Membuat tabel news
        $this->forge->createTable('Transactions_Packages');
    }

    public function down()
    {
        $this->forge->dropTable('Transactions_Packages');
    }
}
