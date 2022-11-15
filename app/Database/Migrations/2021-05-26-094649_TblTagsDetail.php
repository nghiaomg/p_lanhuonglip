<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblTagsDetail extends Migration
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
			'tags_id'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'newsID'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'newsLandID'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'created_at datetime',
			
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_tags_detail');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_tags_detail');
	}
}
