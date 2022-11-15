<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblNewslandMenu extends Migration
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
			'cateID'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'newslandID'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'created_at datetime',
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_newsland_menu');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_newsland_menu');
	}
}
