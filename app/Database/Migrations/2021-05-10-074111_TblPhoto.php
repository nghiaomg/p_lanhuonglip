<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblPhoto extends Migration
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
			'text_link'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'text_des'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'image'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'type'=>[
				'type'=>'varchar',
				'constraint'=>50,
			],
			'des'=>[
				'type'=>'text',
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_photo');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_photo');
	}
}
