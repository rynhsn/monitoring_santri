<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLembagaTable extends Migration
{
    public function up()
    {
        //visi dan misi
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'visi' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'misi' => [
                'type'       => 'TEXT',
            ],
            'sejarah' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('lembaga');
    }

    public function down()
    {
        $this->forge->dropTable('lembaga', true);
    }
}
