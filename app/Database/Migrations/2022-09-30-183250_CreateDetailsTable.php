<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDetailsTable extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'order_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'product_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'size' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'qty' => [
                'type'       => 'INT',
                'constraint' => '5',
            ]
        ]);
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addKey(['order_id', 'product_id']);
        $this->forge->createTable('details');

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('details');
    }
}
