<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Cegah error jika tabel sudah ada
        if (!$this->db->tableExists('users')) {

            $this->forge->addField([
                'id' => [
                    'type'           => 'SERIAL',
                ],
                'username' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],
                'password_hash' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                ],
                'role' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20,
                    'default'    => 'admin',
                ],
                'created_at' => [
                    'type' => 'TIMESTAMP',
                    'null' => true,
                ],
                'updated_at' => [
                    'type' => 'TIMESTAMP',
                    'null' => true,
                ],
            ]);

            $this->forge->addKey('id', true);
            $this->forge->createTable('users');
        }
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
