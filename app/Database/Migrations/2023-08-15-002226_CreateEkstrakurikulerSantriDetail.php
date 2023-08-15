<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEkstrakurikulerSantriDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ekskul_santri_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'santri_nis' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
        ]);
        $this->forge->addForeignKey('ekskul_santri_id', 'ekstrakurikuler_santri', 'id_ekskul_santri', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('santri_nis', 'santri', 'nis_santri', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ekstrakurikuler_santri_detail');
    }

    public function down()
    {
        $this->forge->dropTable('ekstrakurikuler_santri_detail', true, true);
    }
}
