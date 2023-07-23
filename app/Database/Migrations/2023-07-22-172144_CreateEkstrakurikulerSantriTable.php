<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEkstrakurikulerSantriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ekstrakurikuler_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'santri_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('ekstrakurikuler_id', 'ekstrakurikuler', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('santri_id', 'santri', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ekstrakurikuler_santri');
    }

    public function down()
    {
        $this->forge->dropTable('ekstrakurikuler_santri');
    }
}
