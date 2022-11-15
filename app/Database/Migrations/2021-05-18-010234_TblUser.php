<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUser extends Migration
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
			'username'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'code'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'password'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'salt'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'text_password'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'fullname'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'email'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'phone'=>[
				'type'=>'VARCHAR',
				'constraint'=>10,
			],
			'active'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'created_at datetime',
			'updated_at datetime'
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_user');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_user');
	}
}
