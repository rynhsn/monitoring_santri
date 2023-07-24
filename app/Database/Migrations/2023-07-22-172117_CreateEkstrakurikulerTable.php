<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEkstrakurikulerTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'koordinator_id' => [
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
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('koordinator_id', 'koordinator', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ekstrakurikuler');
    }

    public function down()
    {
        $this->forge->dropTable('ekstrakurikuler');
    }
}
