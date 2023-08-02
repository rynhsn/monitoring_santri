<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kelas' => '1A (Satu A)'],
            ['kelas' => '1B (Satu B)'],
            ['kelas' => '2A (Dua A)'],
            ['kelas' => '2B (Dua B)'],
            ['kelas' => '3A (Tiga A)'],
            ['kelas' => '3B (Tiga B)'],
        ];

        $this->db->table('kelas')->insertBatch($data);
    }
}
