<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class Admins extends Migration
{
	    /**
     * Create a Admins table
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
                'Default' => 1,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Admins',true);
    }

    /**
     * Delete a admin table
     *
     * @return void
     */
    public function down()
    {
            $this->forge->dropTable('Admins');
    }
}
