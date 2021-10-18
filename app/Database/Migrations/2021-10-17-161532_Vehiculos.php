<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Vehiculos extends Migration
{
    public function up(){

        // Uncomment below if want config
        $this->db->disableForeignKeyChecks();

        $this->forge->addField([
        		'id'          		=> [
        				'type'           => 'INT',
        				'unsigned'       => TRUE,
        				'auto_increment' => TRUE
        		],
        		'id_marca'       		=> [
                        'type'          => 'INT',
                        'unsigned'       => TRUE,
                        'null'          => true,
        		],
                'id_modelo'       		=> [
                        'type'          => 'INT',
                        'unsigned'       => TRUE,
                        'null'          => true,
                ],
                'id_tipo'       		=> [
                        'type'          => 'INT',
                        'unsigned'       => TRUE,
                        'null'          => true,
                ],
                'id_color'       		=> [
                        'type'          => 'INT',
                        'unsigned'       => TRUE,
                        'null'          => true,
                ],
                'precio_compra'       		=> [
                        'type'          => 'INT',
                        'null'          => true,
                ],
                'precio_venta'       	=> [
                        'type'          => 'INT',
                ],
                'cantidad'       		=> [
                        'type'          => 'INT',
                ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('id_marca','marcas','id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('id_modelo','modelo','id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('id_tipo','tipo','id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('id_color','color','id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('vehiculos');
        $this->db->enableForeignKeyChecks();
    }

    public function down(){
        $this->forge->dropTable('colores');
    }
}
