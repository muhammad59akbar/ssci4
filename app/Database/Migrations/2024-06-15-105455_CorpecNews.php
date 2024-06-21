<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CorpecNews extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'news_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'url_news' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'news_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'image_news' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'news_description' => [
                'type' => 'TEXT',
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
        $this->forge->addKey('news_id', true);
        $this->forge->createTable('corpec_news');
    }

    public function down()
    {
        $this->forge->dropTable('corpec_news');
    }
}
