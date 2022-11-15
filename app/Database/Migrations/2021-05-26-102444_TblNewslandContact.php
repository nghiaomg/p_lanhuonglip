<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblNewslandContact extends Migration
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
			'id_admin'=>[
				'type'=>'int',
				'constraint'=>11,
			],
			'id_user'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'content'=>[
				'type'=>'TEXT',
			],
			'created_at datetime',
			
		]);
		$this->forge->addPrimaryKey('id',true);
		// khóa ngoại
		$this->forge->addForeignKey('id_user','tbl_user','id');
		$this->forge->addForeignKey('id_admin','tbl_admin','id');
		$this->forge->createTable('tbl_newsland_contact');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_newsland_contact');
	}
}
