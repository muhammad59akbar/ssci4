<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Presence extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'company_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'start_time' => [
                'type' => 'TIME',
            ],
            'max_start_time' => [
                'type' => 'TIME',
            ],
            'end_time' => [
                'type' => 'TIME',
            ],
            'max_end_time' => [
                'type' => 'TIME',
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('presences');
    }

    public function down()
    {
        $this->forge->dropTable('presences');
    }
}
