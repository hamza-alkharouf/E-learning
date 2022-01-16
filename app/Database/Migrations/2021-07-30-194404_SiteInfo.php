<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiteInfo extends Migration
{
	public function up()
    {
        $this->forge->addField([
            'id'=> [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'image'=> [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('SiteInfo',true);
    }
    
    /**
     * Delete a user table
     *
     * @return void
     */
    public function down()
    {
            $this->forge->dropTable('SiteInfo');
    }
}
