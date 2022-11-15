<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblWard extends Migration
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
			'id_district'=>[
				'type'=>'INT',
				'constraint'=>11,
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
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11
			],
			'created_at datetime',
			'updated_at datetime'
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_ward');
	}


	public function down()
	{
		$this->forge->dropTable('tbl_ward');
	}
}
