<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHafalanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_hafalan' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'santri_nik' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'pengajar_nip' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'surah' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
        ]);

        $this->forge->addPrimaryKey('id_hafalan');
        $this->forge->addForeignKey('santri_nik', 'santri', 'nik_santri', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pengajar_nip', 'pengajar', 'nip_pengajar', 'CASCADE', 'CASCADE');
        $this->forge->createTable('hafalan');
    }

    public function down()
    {
        $this->forge->dropTable('hafalan');
    }
}
