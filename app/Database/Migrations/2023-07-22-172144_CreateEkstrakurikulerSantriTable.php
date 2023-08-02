<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEkstrakurikulerSantriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ekskul_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'santri_nik' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);

        $this->forge->addForeignKey('ekskul_id', 'ekstrakurikuler', 'id_ekskul', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('santri_nik', 'santri', 'nik_santri', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ekstrakurikuler_santri');
    }

    public function down()
    {
        $this->forge->dropTable('ekstrakurikuler_santri');
    }
}
