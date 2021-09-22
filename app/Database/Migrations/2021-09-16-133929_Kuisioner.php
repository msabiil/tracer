<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alumni extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'example1'       => [
				'type' 		 => 'VARCHAR',
				'constraint' => '150',

			],
			'example2' 		 => [
				'type' 		 => 'VARCHAR',
				'constraint' => '150',
			],
			'example3'      => [
				'type' 		 => 'VARCHAR',
				'constraint' => '150',
			],
			'example4'       	     => [
				'type'       => 'DATE',
			],
			'example5'          => [
				'type'       	 => 'VARCHAR',
				'constraint' => '150',
			],
			'example6'       => [
				'type'           => 'VARCHAR',
				'constraint' => '150',
			],
			'example7'      => [
				'type'           => 'VARCHAR',
				'constraint' => '150',
			],
			'example8'      => [
				'type'           => 'VARCHAR',
				'constraint' => '150',
			],
			'example9'       	 => [
				'type'           => 'VARCHAR',
				'constraint' => '150',
			],
			'example10'       	 => [
				'type'           => 'VARCHAR',
				'constraint' => '150',
			],
			'example11'       	 => [
				'type'           => 'VARCHAR',
				'constraint' => '150',
			],

		]);
		$this->forge->createTable('kuisioner');
	}

	public function down()
	{
		$this->forge->dropTable('kuisioner');
	}
}
