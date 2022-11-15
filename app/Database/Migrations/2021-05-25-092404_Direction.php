<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Direction extends Migration
{
	protected $DBGroup = 'default';
	public function up()
	{
		$this->forge->addField([
			'id'=>[
				'type'=>'INT',
				'constraint'=>11,
				'auto_increment'=>true,
			],
			'name'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_direction');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_direction');
	}
}
