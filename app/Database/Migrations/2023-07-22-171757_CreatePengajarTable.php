<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengajarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nip' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'is_ketua' => [
                'type' => 'BIT',
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addPrimaryKey('nip');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengajar');
    }

    public function down()
    {
        $this->forge->dropTable('pengajar');
    }
}
