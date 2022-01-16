<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContactInfo extends Migration
{
	    /**
     * Create a ContactInfo table
     *
     * @return void
     */
    public function up()
    {	
        $this->forge->addField([
            'id'=> [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'Address' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'Phone' => [
                'type'       => 'INT',
                'constraint'     => 30,
            ],
			'Email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('ContactInfo',true);
    }

    /**
     * Delete a ContactInfo table
     *
     * @return void
     */
    public function down()
    {
            $this->forge->dropTable('ContactInfo');
    }
}
