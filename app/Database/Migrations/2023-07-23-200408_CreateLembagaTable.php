<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLembagaTable extends Migration
{
    public function up()
    {
        //visi dan misi
        $this->forge->addField([
            'id_lembaga' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'visi' => [
                'type'       => 'TEXT',
            ],
            'misi' => [
                'type'       => 'TEXT',
            ],
            'sejarah' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_lembaga');
        $this->forge->createTable('lembaga');
    }

    public function down()
    {
        $this->forge->dropTable('lembaga', true);
    }
}
