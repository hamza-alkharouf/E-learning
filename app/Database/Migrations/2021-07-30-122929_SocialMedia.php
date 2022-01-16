<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SocialMedia extends Migration
{
	/**
	* Create a SocialMedia table
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
			   'constraint' => '150',
		   ],
		   'link' => [
			'type'       => 'VARCHAR',
			'constraint' => '255',
		   ],
		    'ContactInfoId' => [
			'type'           => 'INT',
			'constraint'     => 11,
	     	],
	   ]);
	   $this->forge->addKey('id', true);
	   $this->forge->createTable('SocialMedia',true);
   }

   /**
	* Delete a SocialMedia table
	*
	* @return void
	*/
   public function down()
   {
		   $this->forge->dropTable('SocialMedia');
   }
}
