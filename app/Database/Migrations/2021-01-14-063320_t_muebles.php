<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TMuebles extends Migration
{
	public function up()
        {
                $this->forge->addField([
                        'id_mueble'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'nombre'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'tipoMadera'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
                        ],
                        'costoVenta'       => [
                                'type'           => 'float'
                        ],
                        'costoCompra'       => [
                                'type'           => 'float'
                        ],
                        'fecha'       => [
                                'type'           => 'date'
                        ]
                        
                ]);
                $this->forge->addKey('id_mueble', true);
                $this->forge->createTable('t_muebles');
        }

        public function down()
        {
                $this->forge->dropTable('t_muebles');
        }
}
