<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMerchandiseTable extends Migration
{
    public function up()
    {
        // Cegah error jika tabel sudah ada
        if (!$this->db->tableExists('merchandise')) {

            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                ],
                'description' => [
                    'type' => 'TEXT',
                ],
                'price' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '10,2',
                ],
                'image' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'category' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],
                'stock' => [
                    'type'       => 'INT',
                    'default'    => 0,
                ],
                'status' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 20,
                    'default'    => 'available',
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
            $this->forge->createTable('merchandise');
        }
    }

    public function down()
    {
        $this->forge->dropTable('merchandise', true);
    }
}
