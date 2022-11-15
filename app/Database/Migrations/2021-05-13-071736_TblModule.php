<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblModule extends Migration
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
			'parentid'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'name'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'link'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'ctr'=>[
				'type'=>'VARCHAR',
				'constraint'=>50
			],
			'icon'=>[
				'type'=>'VARCHAR',
				'constraint'=>50
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11
			],
			'created_at datetime',
			'updated_at datetime'
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_module');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_module');
	}
}
