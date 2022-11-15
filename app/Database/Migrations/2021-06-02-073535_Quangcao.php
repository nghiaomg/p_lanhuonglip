<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Quangcao extends Migration
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
			'link'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'image'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'thumb'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'month'=>[
				'type'=>'VARCHAR',
				'constraint'=>2,
			],
			'year'=>[
				'type'=>'VARCHAR',
				'constraint'=>4,
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'created_at datetime',
			'updated_at datetime',
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_quang_cao');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_quang_cao');
	}
}
