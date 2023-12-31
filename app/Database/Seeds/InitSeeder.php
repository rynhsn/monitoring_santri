<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder
{
    public function run()
    {
        $this->call('AuthSeeder');
        $this->call('MenuSeeder');
        $this->call('LembagaSeeder');
        $this->call('KelasSeeder');
        $this->call('LembagaSeeder');
    }
}
