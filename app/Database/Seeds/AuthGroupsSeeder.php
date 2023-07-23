<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsSeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'name' => 'Super Admin',
                'description' => 'Overpower Administrator',
            ],
            [
                'name' => 'Administrator',
                'description' => 'Administrator',
            ],
            [
                'name' => 'Pengajar',
                'description' => 'Teacher',
            ],
            [
                'name' => 'Koordinator',
                'description' => 'Coordinator',
            ],
            [
                'name' => 'Wali',
                'description' => 'Guardian',
            ],
        ];

        // Using Query Builder
        $this->db->table('auth_groups')->insertBatch($data);
    }
}
