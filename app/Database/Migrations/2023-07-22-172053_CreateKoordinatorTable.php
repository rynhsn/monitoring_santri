<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKoordinatorTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nip_koordinator' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'jk' => [
                'type' => 'ENUM',
                'constraint' => ['L', 'P'],
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ],
            'jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'is_ketua' => [
                'type' => '',
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addPrimaryKey('nip_koordinator');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('koordinator');
    }

    public function down()
    {
        $this->forge->dropTable('koordinator');
    }
}
