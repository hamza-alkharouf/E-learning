<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContactUs extends Migration
{
	    /**
     * Create a Contact table
     *
     * @return void
     */
    public function up()
    {	
        $this->forge->addField([
            'name'=> [
                'type'           => 'VARCHAR',
                'constraint' => '255',
            ],
            'message' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
           
			'Email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
    
        $this->forge->createTable('Contact',true);
    }

    /**
     * Delete a ContactInfo table
     *
     * @return void
     */
    public function down()
    {
            $this->forge->dropTable('Contact');
    }
}
