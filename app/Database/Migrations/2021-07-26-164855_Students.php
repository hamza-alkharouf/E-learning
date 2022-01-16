<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Students extends Migration
{
	    /**
     * Create a Students table
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
            'firstname'=> [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'lastname' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'is_active' => [
                'type' => 'BOOLEAN',
                'default' => 1,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Students',true);
    }

    /**
     * Delete a Students table
     *
     * @return void
     */
    public function down()
    {
            $this->forge->dropTable('Students');
    }
}
