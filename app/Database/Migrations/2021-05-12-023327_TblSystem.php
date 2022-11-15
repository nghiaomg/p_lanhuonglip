<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblSystem extends Migration
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
			'type'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'contents'=>[
				'type'=>'LONGTEXT',
			],
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_system');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_system');
	}
}
