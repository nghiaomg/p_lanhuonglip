<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblCity extends Migration
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
			'alias'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'title'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'meta_keywords'=>[
				'type'=>'TEXT',
			],
			'meta_descriptions'=>[
				'type'=>'TEXT',
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1
			],
			'created_at datetime',
			'updated_at datetime'
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_city');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_city');
	}
}
