<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAcreage extends Migration
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
			'title'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'acreage_form'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'acreage_come'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'sort'=>[
				'type'=>'INT',
				'constraint'=>11
			],
			'created_at datetime',
			'updated_at datetime'
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_acreage');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_acreage');
	}
}
