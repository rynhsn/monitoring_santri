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
    }
}
