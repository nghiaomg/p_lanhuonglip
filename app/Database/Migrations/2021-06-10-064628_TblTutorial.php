<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblTutorial extends Migration
{
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
			'content'=>[
				'type'=>'LONGTEXT',
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'title'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'meta_keywords'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'meta_descriptions'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],		
			'created_at datetime',
			'updated_at datetime',
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_tutorial');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_tutorial');
	}
}
