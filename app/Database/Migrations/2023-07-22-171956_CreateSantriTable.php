<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSantriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nis_santri' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'wali_nik' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'kelas_id' => [
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
            'tahun_masuk' => [
                'type' => 'INT',
            ],
            'tahun_lulus' => [
                'type' => 'INT',
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->forge->addPrimaryKey('nis_santri');
        $this->forge->addForeignKey('wali_nik', 'wali', 'nik_wali', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kelas_id', 'kelas', 'id_kelas', 'CASCADE', 'CASCADE');
        $this->forge->createTable('santri');
    }

    public function down()
    {
        $this->forge->dropTable('santri');
    }
}
