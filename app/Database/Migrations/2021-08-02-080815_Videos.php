<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Videos extends Migration
{
        /**
     * Create a CoursesVideoes table
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
                'constraint' => '255',
            ],
            'path'=> [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'videoDuration'=> [
                'type'       => 'FLOAT',
            ],
            'id_course' => [
                'type'       => 'INT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Videos',true);
    }
    
    /**
     * Delete a CoursesVideoes table
     *
     * @return void
     */
    public function down()
    {
            $this->forge->dropTable('Videos');
    }
}

