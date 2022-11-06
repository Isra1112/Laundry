<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DbSeeder extends Seeder
{
    public function run()
    {
        // $this->call('Roles');
        $this->call('Customers');
        // $this->call('Users');
        $this->call('Packages');
        
        $this->call('Transactions');
        $this->call('TransactionsPackages');
        $this->call('TransactionSeedPrice');
        
    }
}
