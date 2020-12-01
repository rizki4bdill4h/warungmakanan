<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class myusers extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'user_id' => [
				'type' => 'INT',
				'constraint' => 5,
				'unsigned' => true,
				'auto_increment' => true
			],
			'first_name' => [
				'type' => 'VARCHAR',
				'constraint' => 70
			],
			'last_name' => [
				'type' => 'VARCHAR',
				'constraint' => 70
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => 70
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 70
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 70
			]
		]);

		$this->forge->addKey('user_id', true);
		$this->forge->createTable('myusers');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('myusers');
	}
}
