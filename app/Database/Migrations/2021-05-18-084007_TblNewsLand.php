<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblNewsLand extends Migration
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
			'role_id'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'id_admin'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'name'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'title'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'cateid'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'projectName'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'city_id'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'district_id'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'ward_id'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'street_id'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'city_id'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'map_lat'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'map_long'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'address'=>[
				'type'=>'TEXT',
			],
			'direction_id'=>[
				'type'=>'INT',
				'constraint'=>255,
			],
			'alias'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'price'=>[
				'type'=>'double',
			],
			'unit'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'price_detail'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'area'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'facade'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'highway'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'number_floor'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'room'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'toliet'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'video'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'map'=>[
				'type'=>'TEXT',
			],
			'des'=>[
				'type'=>'TEXT',
			],
			'content'=>[
				'type'=>'LONGTEXT',
			],
			'meta_keyword'=>[
				'type'=>'TEXT',
			],
			'meta_description'=>[
				'type'=>'TEXT',
			],
			'image'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'thumb'=>[
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
			'code'=>[
				'type'=>'VARCHAR',
				'constraint'=>50,
			],
			'hot'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'publish'=>[
				'type'=>'TINYINT',
				'constraint'=>1,
			],
			'projectID'=>[
				'type'=>'INT',
				'constraint'=>11,
			],
			'tags'=>[
				'type'=>'TEXT',
			],
			'furniture'=>[
				'type'=>'VARCHAR',
				'constraint'=>255,
			],
			'balcony_direction_id'=>[
					'type'=>'INT',
					'constraint'=>11,
			],
			'legal_construction'=>[
				'type'=>'TEXT',
			],
			'hired'=>[
				'type'=>'TINYINT',
				'constraint'=>4,
			],
			'status'=>[
				'type'=>'INT',
				'constraint'=>11,
			]
			'sold'=>[
				'type'=>'TINYINT',
				'constraint'=>4,
			],
			'created_at datetime',
			'updated_at datetime'
		]);
		$this->forge->addPrimaryKey('id',true);
		$this->forge->createTable('tbl_news_land');
	}

	public function down()
	{
		$this->forge->dropTable('tbl_news_land');
	}
}