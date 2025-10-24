<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePhotosTable extends Migration
{
    public function up()
    {
        // Cegah error kalau tabel sudah ada
        if (!$this->db->tableExists('photos')) {

            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'title' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'caption' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'image' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
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
            $this->forge->createTable('photos');
        }
    }

    public function down()
    {
        // true = drop jika ada, tidak error kalau sudah dihapus
        $this->forge->dropTable('photos', true);
    }
}
