<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblNews extends Migration
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
			'cateid'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'name'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'title'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'alias'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'image'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'thumb'=>[
				'type'=>'VARCHAR',
				'constraint'=>255
			],
			'des'=>[
				'type'=>'TEXT',
			],
			'content'=>[
				'type'=>'LONGTEXT',
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1
			],
			'home'=>[
				'type'=>'TINYINT',
				'constraint'=>1
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11
			],
			'meta_keywords'=>[
				'type'=>'TEXT',
			],
			'meta_descriptions'=>[
				'type'=>'TEXT',
			],
			'tags'=>[
				'type'=>'TEXT',
			],
			'created_at datetime',
			'updated_at datetime'
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_news');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_news');
	}
}
