<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $passwordHash = password_hash(getenv('APP_ADMIN_PASS') ?: 'admin123', PASSWORD_DEFAULT);

        $data = [
            'username'      => getenv('APP_ADMIN_USER') ?: 'admin',
            'password_hash' => $passwordHash,
            'role'          => 'admin',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
    }
}




