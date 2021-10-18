<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Marcas extends Migration{
    public function up(){

        // Uncomment below if want config
        $this->forge->addField([
        		'id'          		=> [
        				'type'           => 'INT',
        				'unsigned'       => TRUE,
        				'auto_increment' => TRUE
        		],
        		'nombre'       		=> [
        				'type'           => 'VARCHAR',
        				'constraint'     => '100',
        		],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('marcas');
    }

    public function down(){
        $this->forge->dropTable('marcas');
    }
}