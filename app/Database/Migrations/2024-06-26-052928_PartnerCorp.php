<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PartnerCorp extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'partnerid' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'imagepartner' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addKey('partnerid', true);
        $this->forge->createTable('partnerCorp');
    }

    public function down()
    {
        $this->forge->dropTable('partnerCorp');
    }
}
