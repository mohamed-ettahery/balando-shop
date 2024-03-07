<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'clientName' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'address' => [
                'type' => 'TEXT',
            ],
            'order_date' => [
                'type'       => 'DATETIME',
                'default'    => date("Y-m-d h:i:s")
            ],
            'delivery_date' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'pending'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
