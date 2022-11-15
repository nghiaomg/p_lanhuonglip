<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblProductLike extends Migration
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
			'producrID'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_user'=>[
				'type'=>'INT',
				'constraint'=>11,
			],	
			'created_at datetime',
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_product_like');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_product_like');
	}
}
