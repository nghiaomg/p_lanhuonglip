<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblTags extends Migration
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
			'alias'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_tags');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_tags');
	}
}
