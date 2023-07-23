<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHafalanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'santri_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'pengajar_nip' => [
                'type' => 'varchar',
                'constraint' => 100,
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

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('santri_id', 'santri', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('pengajar_nip', 'pengajar', 'nip', 'CASCADE', 'CASCADE');
        $this->forge->createTable('hafalan');
    }

    public function down()
    {
        $this->forge->dropTable('hafalan');
    }
}
