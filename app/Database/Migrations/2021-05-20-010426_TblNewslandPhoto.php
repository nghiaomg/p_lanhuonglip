<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblNewslandPhoto extends Migration
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
			'image'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'thumb'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'uuid'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'month'=>[
				'type'=>'VARCHAR',
				'constraint'=>10,
			],
			'year'=>[
				'type'=>'VARCHAR',
				'constraint'=>10,
			],
			'newslandID'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'created_at datetime',
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_newsland_photo');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_newsland_photo');
	}
}
