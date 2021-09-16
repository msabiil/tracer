<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alumni extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_alumni'          => [
				'type'           => 'BIGINT',
				'constraint'     => 200,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama_lengkap'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
			],
			'tempat_lahir' 		 => [
				'type' 		 => 'VARCHAR',
				'constraint' => '30',
			],
			'tanggal_lahir'      => [
				'type'       => 'DATE',
			],
			'alamat'       	     => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'no_telpon'          => [
				'type'       	 => 'VARCHAR',
				'constraint' 	 => '20',
			],
			'email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'password'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'program_studi'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '20',
			],
			'kelulusan'       	 => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],

		]);
		$this->forge->addKey('id_alumni', true);
		$this->forge->createTable('alumni');
	}

	public function down()
	{
		$this->forge->dropTable('alumni');
	}
}
