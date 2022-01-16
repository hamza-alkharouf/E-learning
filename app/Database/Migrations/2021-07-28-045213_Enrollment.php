<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Enrollment extends Migration
{
	    /**
     * Create a Enrollment table
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
            'studentId'=> [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'courseId' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'enable' => [
                'type'       => 'BOOLEAN',
                'default'    => 0,
            ],
            'Pending' => [
                'type'       => 'BOOLEAN',
                'default'    => 1,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Enrollment',true);
    }

    /**
     * Delete a Enrollment table
     *
     * @return void
     */
    public function down()
    {
            $this->forge->dropTable('Enrollment');
    }
}
