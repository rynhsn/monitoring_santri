<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEkstrakurikulerTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ekskul' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'koordinator_nip' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'ekskul' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'hari' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'pukul' => [
                'type' => 'VARCHAR',
                'constraint' => 15,
            ]
        ]);

        $this->forge->addPrimaryKey('id_ekskul');
        $this->forge->addForeignKey('koordinator_nip', 'koordinator', 'nip_koordinator', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ekstrakurikuler');
    }

    public function down()
    {
        $this->forge->dropTable('ekstrakurikuler');
    }
}
