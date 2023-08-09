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
            'santri_nis' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);

        $this->forge->addForeignKey('ekskul_id', 'ekstrakurikuler', 'id_ekskul', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('santri_nis', 'santri', 'nis_santri', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ekstrakurikuler_santri');
    }

    public function down()
    {
        $this->forge->dropTable('ekstrakurikuler_santri');
    }
}
