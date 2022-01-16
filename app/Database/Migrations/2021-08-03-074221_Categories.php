<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    /**
     *  Create a Categories table
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
            'name'=> [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'descrption'=> [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]   
        );


        $this->forge->addKey('id', true);
        $this->forge->createTable('Categories',true);
    }

    /**
     * Delete a Categories table
     *
     * @return void
     */
    public function down()
    {
            $this->forge->dropTable('Categories');
    }
}
