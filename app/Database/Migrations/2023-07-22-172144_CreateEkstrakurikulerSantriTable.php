<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEkstrakurikulerSantriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ekskul_santri' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'tanggal_latihan' => [
                'type' => 'DATE',
            ],
//            'koordinator_nip' => [
//                'type' => 'INT',
//                'unsigned' => true,
//            ],
            'ekskul_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'kelas_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'created_by' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_ekskul_santri', true);
        $this->forge->addForeignKey('ekskul_id', 'ekstrakurikuler', 'id_ekskul', 'CASCADE', 'CASCADE');
//        $this->forge->addForeignKey('koordinator_nip', 'koordinator', 'nip_koordinator', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kelas_id', 'kelas', 'id_kelas', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('created_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ekstrakurikuler_santri');
    }

    public function down()
    {
        $this->forge->dropTable('ekstrakurikuler_santri');
    }
}
