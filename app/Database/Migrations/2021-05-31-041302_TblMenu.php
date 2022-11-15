<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblMenu extends Migration
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
			'parentid'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'categoryid'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'hot'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'footer'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'main'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'type'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'link'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'created_at datetime',
			'updated_at datetime',
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_menu');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_menu');
	}
}
