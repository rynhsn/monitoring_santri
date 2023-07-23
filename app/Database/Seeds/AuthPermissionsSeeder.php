<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthPermissionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'manage-user', 'description' => 'Users Management'],
            ['name' => 'manage-permission','description' => 'Permission Management'],
            ['name' => 'manage-role','description' => 'Role Management'],
            ['name' => 'manage-menu','description' => 'Menu Management'],

            ['name' => 'manage-santri','description' => 'Management Santri'],
            ['name' => 'manage-pengajar','description' => 'Management Pengajar'],
            ['name' => 'manage-koordinator','description' => 'Management Koordinator'],
            ['name' => 'manage-wali','description' => 'Management Wali'],
            ['name' => 'manage-hafalan','description' => 'Management Hafalan'],
//            ['name' => 'manage-kegiatan','description' => 'Management Kegiatan'],
            ['name' => 'manage-ekstrakurikuler','description' => 'Management Ekstrakurikuler'],
            ['name' => 'manage-laporan','description' => 'Laporan Management'],
        ];

        // Using Query Builder
        $this->db->table('auth_permissions')->insertBatch($data);
    }
}
