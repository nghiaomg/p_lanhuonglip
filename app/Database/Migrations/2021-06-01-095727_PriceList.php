<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PriceList extends Migration
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
			'price'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'price_sale'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'day'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'week'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'month'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'content'=>[
				'type'=>'TEXT',
			],
			'created_at datetime',
			'updated_at datetime',
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_price_list');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_price_list');
	}
}
