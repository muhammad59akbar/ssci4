<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Salary extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'total_salary' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'deduction' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true
            ],
            'transfer_photo' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'transfer_date' => [
                'type' => 'DATETIME',
            ],
            'note' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
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
        $this->forge->createTable('salaries');
    }

    public function down()
    {
        $this->forge->dropTable('salaries');
    }
}
