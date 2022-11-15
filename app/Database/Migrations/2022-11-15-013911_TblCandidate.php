<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblCandidate extends Migration
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
			'fullname'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'phone'=>[
				'type'=>'BIGINT',
				'constraint'=>10,
			],
			'email'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'address'=>[
				'type'=>'VARCHAR',
				'constraint'=>1000,
			],
			'yearofbirth'=>[
				'type'=>'INT',
				'constraint'=>4,
			],
			'CV'=>[
				'type'=>'VARCHAR',
				'constraint'=>1000,
			],
			'created_at datetime',
			'updated_at datetime'
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_candidate');
	}

	public function down()
	{
		//
	}
}
