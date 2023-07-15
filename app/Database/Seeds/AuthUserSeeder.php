<?php

namespace App\Database\Seeds;

use App\Entities\User;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class AuthUserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();

        $data = [
            'username' => 'sa',
            'email' => 'sa@example.com',
            'password' => 'superadmin',
        ];

        $user = new User($data);
        $user->activate();
        // Insert user
        $userModel->withGroup('Super Admin')->skipValidation(true)->protect(false)->save($user);

        //admin
        $data = [
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin'
        ];

        $user = new User($data);
        $user->activate();
        // Insert user
        $userModel->withGroup('Administrator')->skipValidation(true)->protect(false)->save($user);

        //user
        $data = [
            'username' => 'user',
            'email' => 'user@example.com',
            'password' => 'user'
        ];

        $user = new User($data);
        $user->activate();
        // Insert user
        $userModel->withGroup('User')->skipValidation(true)->protect(false)->save($user);

        //pimpinan
        $data = [
            'username' => 'pimpinan',
            'email' => 'pimpinan@example.com',
            'password' => 'pimpinan'
        ];

        $user = new User($data);
        $user->activate();
        // Insert user
        $userModel->withGroup('Pimpinan')->skipValidation(true)->protect(false)->save($user);


        //kepala desa
        $data = [
            'username' => 'kepaladesa',
            'email' => 'kades@example.com',
            'password' => 'kepaladesa'
        ];

        $user = new User($data);
        $user->activate();
        // Insert user
        $userModel->withGroup('Kepala Desa')->skipValidation(true)->protect(false)->save($user);

        $data = [
            [
                'user_id' => 1,
                'nama_lengkap' => 'Super Admin',
                'nik' => '1234567890123456',
                'alamat' => 'Jl. Super Admin',
                'tanggal_lahir' => '2000-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'telepon' => '081234567890',
                'foto_profil' => '300-29.jpg',
                'created_at' => '2021-07-05 13:38:47',
                'updated_at' => '2021-07-05 13:38:47',
            ],
            [
                'user_id' => 2,
                'nama_lengkap' => 'Administrator',
                'nik' => '1234567890123456',
                'alamat' => 'Jl. Administrator',
                'tanggal_lahir' => '2000-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'telepon' => '081234567890',
                'foto_profil' => '300-27.jpg',
                'created_at' => '2021-07-05 13:38:47',
                'updated_at' => '2021-07-05 13:38:47',
            ],
            [
                'user_id' => 3,
                'nama_lengkap' => 'User',
                'nik' => '1234567890123456',
                'alamat' => 'Jl. User',
                'tanggal_lahir' => '2000-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'telepon' => '081234567890',
                'foto_profil' => '300-27.jpg',
                'created_at' => '2021-07-05 13:38:47',
                'updated_at' => '2021-07-05 13:38:47',
            ],
            [
                'user_id' => 4,
                'nama_lengkap' => 'Pimpinan',
                'nik' => '1234567890123456',
                'alamat' => 'Jl. Pimpinan',
                'tanggal_lahir' => '2000-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'telepon' => '081234567890',
                'foto_profil' => '300-30.jpg',
                'created_at' => '2021-07-05 13:38:47',
                'updated_at' => '2021-07-05 13:38:47',
            ],
            [
                'user_id' => 5,
                'nama_lengkap' => 'Kepala Desa',
                'nik' => '1234567890123456',
                'alamat' => 'Jl. Kepala Desa',
                'tanggal_lahir' => '2000-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'telepon' => '081234567890',
                'foto_profil' => '300-25.jpg',
                'created_at' => '2021-07-05 13:38:47',
                'updated_at' => '2021-07-05 13:38:47',
            ],
        ];

        $this->db->table('profile')->insertBatch($data);
    }
}
