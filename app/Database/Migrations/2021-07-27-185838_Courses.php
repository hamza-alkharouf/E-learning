<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Courses extends Migration
{
	    /**
     * Create a Courses table
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
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'language_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'id_category' => [
                'type'       => 'INT',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at datetime default current_timestamp',
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Courses',true);
    }

    /**
     * Delete a Courses table
     *
     * @return void
     */
    public function down()
    {
            $this->forge->dropTable('Courses');
    }
}
?>