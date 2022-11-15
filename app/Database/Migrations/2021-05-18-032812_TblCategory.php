<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblCategory extends Migration
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
			'des'=>[
				'type'=>'TEXT',
			],
			'parentid'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'home'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'left'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'right'=>[
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
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'link'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'alias'=>[
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
			'title'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'meta_descriptions'=>[
				'type'=>'TEXT',
			],
			'meta_keywords'=>[
				'type'=>'TEXT',
			],
			'content'=>[
				'type'=>'LONGTEXT',
			],
			'content_bottom'=>[
				'type'=>'LONGTEXT',
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_category');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_category');
	}
}
