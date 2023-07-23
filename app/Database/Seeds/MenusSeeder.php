<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MenusSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'permission_id' => '4',
                'menu' => 'Menu Management',
                'description' => 'Pengaturan menu',
                'url' => null,
                'icon' => 'ki-outline ki-burger-menu-6',
                'is_active' => '1',
                'is_parent' => '1',
                'is_core' => '1',
                'has_notify' => '0',
                'notify' => '0',
                'sequence' => '1',
                'created_at' => Time::now(),
            ],
            [
                'permission_id' => '1',
                'menu' => 'User Management',
                'description' => 'Pengaturan pengguna',
                'url' => null,
                'icon' => 'ki-outline ki-user',
                'is_active' => '1',
                'is_parent' => '1',
                'is_core' => '1',
                'has_notify' => '0',
                'notify' => '0',
                'sequence' => '2',
                'created_at' => Time::now(),
            ],

            [
                'permission_id' => '5',
                'menu' => 'Data Santri',
                'description' => 'Data santri',
                'url' => 'santri',
                'icon' => 'ki-outline ki-user',
                'is_active' => '1',
                'is_parent' => '0',
                'is_core' => '1',
                'has_notify' => '0',
                'notify' => '0',
                'sequence' => '2',
                'created_at' => Time::now(),
            ],
            [
                'permission_id' => '8',
                'menu' => 'Data Wali',
                'description' => 'Data wali santri',
                'url' => 'wali',
                'icon' => 'ki-outline ki-user',
                'is_active' => '1',
                'is_parent' => '0',
                'is_core' => '1',
                'has_notify' => '0',
                'notify' => '0',
                'sequence' => '2',
                'created_at' => Time::now(),
            ],
            [
                'permission_id' => '6',
                'menu' => 'Data Pengajar',
                'description' => 'Data pengajar',
                'url' => 'pengajar',
                'icon' => 'ki-outline ki-user',
                'is_active' => '1',
                'is_parent' => '0',
                'is_core' => '1',
                'has_notify' => '0',
                'notify' => '0',
                'sequence' => '2',
                'created_at' => Time::now(),
            ],
            [
                'permission_id' => '7',
                'menu' => 'Data Koordinator',
                'description' => 'Data Koordinator',
                'url' => 'koordinator',
                'icon' => 'ki-outline ki-user',
                'is_active' => '1',
                'is_parent' => '0',
                'is_core' => '1',
                'has_notify' => '0',
                'notify' => '0',
                'sequence' => '2',
                'created_at' => Time::now(),
            ],
            [
                'permission_id' => '9',
                'menu' => 'Data Hafalan Santri',
                'description' => 'Data hafalan',
                'url' => 'hafalan',
                'icon' => 'ki-outline ki-user',
                'is_active' => '1',
                'is_parent' => '0',
                'is_core' => '1',
                'has_notify' => '0',
                'notify' => '0',
                'sequence' => '2',
                'created_at' => Time::now(),
            ],
            [
                'permission_id' => '10',
                'menu' => 'Data Ekstrakurikuler',
                'description' => 'Data Ekstrakurikuler',
                'url' => 'ekstrakurikuler',
                'icon' => 'ki-outline ki-user',
                'is_active' => '1',
                'is_parent' => '0',
                'is_core' => '1',
                'has_notify' => '0',
                'notify' => '0',
                'sequence' => '2',
                'created_at' => Time::now(),
            ],


        ];
        $this->db->table('menus');
        $this->db->table('menus')->insertBatch($data);
    }
}
