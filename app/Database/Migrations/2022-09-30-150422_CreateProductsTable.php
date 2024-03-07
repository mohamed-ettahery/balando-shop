<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'price' => [
                'type'       => 'DOUBLE',
            ],
            'desription' => [
                'type'       => 'TEXT',
            ],
            'rating' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'id_cat' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'id_gender' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_cat', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_gender', 'gender', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products');

        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
