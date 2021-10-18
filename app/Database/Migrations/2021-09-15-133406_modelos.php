<?php 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modelos extends Migration{
    public function up(){

        // Uncomment below if want config
        $this->forge->addField([
        		'id'          		=> [
        				'type'           => 'INT',
        				'unsigned'       => TRUE,
        				'auto_increment' => TRUE
        		],
        		'nombre'       		=> [
        				'type'           => 'INT',
        				'constraint'     => '10',
        		],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('modelos');
    }

    public function down(){
        $this->forge->dropTable('modelos');
    }
}