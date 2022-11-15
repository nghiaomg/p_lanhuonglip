<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAlias extends Migration
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
				'type'=>'INT',
				'constraint'=>11,
			],
			'alias'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'created_at datetime',
			'updated_at datetime'
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_alias');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_alias');
	}
}
