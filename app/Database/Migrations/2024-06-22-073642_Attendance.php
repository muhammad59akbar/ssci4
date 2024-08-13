<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Attendance extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'presence_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'photo' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'deduction' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true
            ],
            'entry_time' => [
                'type' => 'TIME',
                'null' => true
            ],
            'exit_time' => [
                'type' => 'TIME',
                'null' => true,
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('presence_id', 'presences', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('attendances');
    }

    public function down()
    {
        $this->forge->dropTable('attendances');
    }
}
