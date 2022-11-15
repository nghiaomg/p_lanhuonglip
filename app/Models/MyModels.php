<?php

namespace App\Models;

use CodeIgniter\Model;

class MyModels extends Model
{
	function __construct()
	{
		$this->db  = \Config\Database::connect('default');
	}
	public function add($data = null)
	{
		$builder = $this->db->table($this->table);
		$result =  $builder->insert($data);
		$insertID = $this->db->insertID();
		// echo '<pre>';
		// print_r($result);
		// die;
		// echo $this->db->getLastQuery();die;
		if ($result) {
			return array(
				'insertID' => $insertID,
				'type' => 'successful'
			);
		}
	}
	public function adds($data = null)
	{
		$builder = $this->db->table($this->table);
		$result =  $builder->insertBatch($data);
		if ($result) {
			return array(
				'insertID' 	=>	$insertID,
				'result'	=>	true,
				'message'	=>	'Thêm dữ liệu thành công'
			);
		}else{
			return array(
				'result'	=>	false,
				'message'	=>	'Thêm dữ liệu không thành công'
			);
		}
	}
	public function selectArray($data = '*', $where = NULL, $order = 'id DESC', $start = NULL, $limit = NULL, $likeArray = NULL, $fieldWhereIn = '', $whereIn = NULL)
	{
		$builder = $this->db->table($this->table);
		if ($data != '') {
			$builder->select($data);
		}
		if ($where != null) {
			$builder->where($where);
		}
		if($likeArray != NULL){
			if(count($likeArray) > 1){
				$i = 0;
				foreach ($likeArray as $key => $val) {
					if($i == 0){
						$builder->like($key, $val);
					}else{
						$builder->orLike($key, $val);
					}
					$i += 1;
				}
			}else{
				foreach ($likeArray as $key => $val) {
					$builder->like($key, $val);
				}
			}
		}
		if($fieldWhereIn != '' && $whereIn != NULL){
			$builder->whereIn($fieldWhereIn, $whereIn);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		if ($limit != NULL) {
			$builder->limit($limit, $start);
		}
		$query   = $builder->get();
		// echo $this->db->getLastQuery().'<br>';
		return $query->getResult('array');
	}
	function selectCount($where = NULL, $likeArray = NULL, $fieldWhereIn = '', $whereIn = NULL)
	{
		$builder = $this->db->table($this->table);
		if ($where != NULL) {
			$builder->where($where);
		}
		if($likeArray != NULL){
			if(count($likeArray) > 1){
				$i = 0;
				foreach ($likeArray as $key => $val) {
					if($i == 0){
						$builder->like($key, $val);
					}else{
						$builder->orLike($key, $val);
					}
					$i += 1;
				}
			}else{
				foreach ($likeArray as $key => $val) {
					$builder->like($key, $val);
				}
			}
		}
		if($fieldWhereIn != '' && $whereIn != NULL){
			$builder->whereIn($fieldWhereIn, $whereIn);
		}
		return $builder->countAllResults();
	}
	public function select_max_where($field, $where = NULL)
	{
		$builder = $this->db->table($this->table);
		if ($where != NULL) {
			$builder->where($where);
		}
		$builder->selectMax($field);
		$query   = $builder->get();
		return $query->getRowArray();
	}
	public function full_query($param = [])
	{
		$array_assoc = [
			"get_row_array" => "array",          // array là lấy array, row là lấy row
			"select"        =>  "*",             // ví dụ
			"table"         =>  $this->table,        // ví dụ
			"join"          =>  [                // ví dụ    
				// ["join_table" => '',"query_join"=> '',"type" => ''],
				// ["join_table" => '',"query_join"=> '',"type" => ''],
			],
			"where"            =>  [
				//"publish" => 1
			], // ví dụ
			"where_not_in"  =>  [
				// "column" => "", 
				// "value" => [1,2,3,4] 
			], // ví dụ
			"where_in"      =>  [
				// "column" => "", 
				// "value" => [1,2,3,4] 
			], // ví dụ
			"like"          =>  [                 // ví dụ
				// ["column" => "", "value"=> ""],
				// ["column" => "", "value"=> ""],
			],
			"orderby"       =>  "id desc",
			"groupby"       =>  [],   // ví dụ["id","name"]         
			"limit"         =>  []    // ví dụ ["start" => 0,"limit" => 10]  
		];
		//===============================================
		$array_assoc                  = array_merge($array_assoc, $param);
		$array_assoc['table']         = $array_assoc['table']         != NULL ? $array_assoc['table'] : $this->table;
		$array_assoc['orderby']       = $array_assoc['orderby']       != NULL ? $array_assoc['orderby'] : "id desc";
		$array_assoc['get_row_array'] = $array_assoc['get_row_array'] != NULL ? $array_assoc['get_row_array'] : "array";
		//================================================

		$builder = $this->db->table($array_assoc['table']);
		// SELECT
		if ($array_assoc['select'] != NULL) {
			$builder->select($array_assoc['select']);
		}
		// JOIN
		if ($array_assoc['join'] != NULL) {
			foreach ($array_assoc['join'] as $key => $val) {
				$builder->join($val['join_table'], $val['query_join'], $val['type']);
			}
		}
		// WHERE
		if ($array_assoc['where'] != NULL) {
			$builder->where($array_assoc['where']);
		}
		// WHERE NOT IN
		if ($array_assoc['where_not_in'] != NULL) {
			$builder->whereNotIn($array_assoc['where_not_in']['column'], $array_assoc['where_not_in']['value']);
		}
		// WHERE IN 
		if ($array_assoc['where_in'] != NULL) {
			$builder->whereIn($array_assoc['where_in']['column'], $array_assoc['where_in']['value']);
		}
		// LIKE 
		if ($array_assoc['like'] != NULL) {
			foreach ($array_assoc['like'] as $key => $val) {

				if ($val['value'] != NULL  && $val['value'] != '') {
					if ($key <= 0) {
						$builder->like($val['column'], $val['value']);
					} else {
						$builder->orLike($val['column'], $val['value']);
					}
				}
			}
		}
		// ORDERBY
		if ($array_assoc['orderby'] != NULL) {
			$builder->orderBy($array_assoc['orderby']);
		}
		// GROUPBY
		if ($array_assoc['groupby'] != NULL) {
			$builder->groupBy($array_assoc['groupby']);
		}
		// LIMIT
		if ($array_assoc['limit'] != NULL) {

			$builder->limit($array_assoc['limit']['limit'], $array_assoc['limit']['start']);
		}
		//=======================================
		$query   = $builder->get();
		//echo $this->db->getLastQuery();die;
		if ($array_assoc['get_row_array'] == "array") {
			return $query->getResult('array');
		} else {
			return $query->getRowArray();
		}
	}
	public function full_query5($param = [], $orderBy = '')
    {
        $array_assoc = [
            "get_row_array" => "array",          // array là lấy array, row là lấy row
            "select"        =>  "*",             // ví dụ
            "table"         =>  $this->table,        // ví dụ
            "join"          =>  [                // ví dụ    
                // ["join_table" => '',"query_join"=> '',"type" => ''],
                // ["join_table" => '',"query_join"=> '',"type" => ''],
            ],
            "where"         =>  [
                //"publish" => 1
            ], 
			"or_where_group"         =>  [
					// ["price >" => 0, "price <" => 500000],
					// ["price >" => 500000, "price <" => 1500000],					
            ], 
            "where_not_in"  =>  [
                // "column" => "", 
                // "value" => [1,2,3,4] 
            ], 
            "where_in"      =>  [
                // "column" => "", 
                // "value" => [1,2,3,4] 
            ],
			"where_in_multi"=> [
				// ["column" => "cateid", "value" => [1,2,3,4]  ],
				// ["column" => "brandid", "value" => [1,2]  ],
			],
            "like"          =>  [                 // ví dụ
                // ["column" => "", "value"=> ""],
                // ["column" => "", "value"=> ""],
            ],
            "orderby"       =>  "id desc",         
            "groupby"       =>  [],   // ví dụ["id","name"]         
            "limit"         =>  []    // ví dụ ["start" => 0,"limit" => 10]  
        ];
        //===============================================
        $array_assoc                  = array_merge($array_assoc, $param);
        $array_assoc['table']         = $array_assoc['table']         != NULL ? $array_assoc['table'] : $this->table;
        $array_assoc['orderby']       = $array_assoc['orderby']       != NULL ? $array_assoc['orderby'] : "id desc";
        $array_assoc['get_row_array'] = $array_assoc['get_row_array'] != NULL ? $array_assoc['get_row_array'] : "array";
        //================================================
        $builder = $this->db->table($array_assoc['table']);
        // SELECT
        if ($array_assoc['select'] != NULL) {
            $builder->select($array_assoc['select']);
        }
        // JOIN
        if ($array_assoc['join'] != NULL) {
            foreach ($array_assoc['join'] as $key => $val) {
                $builder->join($val['join_table'], $val['query_join'], $val['type']);
            }
        }
       
        // WHERE NOT IN
        if ($array_assoc['where_not_in'] != NULL) {
            $builder->whereNotIn($array_assoc['where_not_in']['column'], $array_assoc['where_not_in']['value']);
        }
        // WHERE IN 
        if ($array_assoc['where_in'] != NULL) {
            $builder->whereIn($array_assoc['where_in']['column'], $array_assoc['where_in']['value']);
        }
        // LIKE 
        if ($array_assoc['like'] != NULL) {
            foreach ($array_assoc['like'] as $key => $val) {

                if ($val['value'] != NULL  && $val['value'] != '') {
                    if ($key <= 0) {
                        $builder->like($val['column'], $val['value']);
                    } else {
                        $builder->orLike($val['column'], $val['value']);
                    }
                }
            }
        }
		// WHERE
		if ($array_assoc['where'] != NULL) {
            $builder->where($array_assoc['where']);
        }
		// OR WHERE
        if ($array_assoc['or_where_group'] != NULL) {
			$builder->groupStart();
			foreach ($array_assoc['or_where_group'] as $key => $val) {
			   if($key == 0)
			   {	
				   foreach ($val as $key_group => $val_group) {
					   if($key_group == 0)
					   {
						   $builder->where($val_group);
					   }else
					   {
						   $builder->where($val_group);
					   }
				   }
				   
			   }else
			   {
				   foreach ($val as $key_group => $val_group) {
					   if($key_group == 0)
					   {
						   $builder->orWhere($val_group);
					   }
					   else
					   {
						   $builder->where($val_group);
					   }
				   }
			   }
		   }
		   $builder->groupEnd();
	    }
	    // MULTI WHEREIN 
		if ($array_assoc['where_in_multi'] != NULL) {
			foreach ($array_assoc['where_in_multi'] as $key => $val) {
				$builder->whereIn($val['column'], $val['value']);
			}
		}
        // ORDERBY
        if ($array_assoc['orderby'] != NULL) {
        	$builder->orderBy($array_assoc['orderby']);
        }
          // GROUPBY
        if ($array_assoc['groupby'] != NULL) {
            $builder->groupBy($array_assoc['groupby']);
        }
        // LIMIT
        if ($array_assoc['limit'] != NULL) {

            $builder->limit($array_assoc['limit']['limit'],$array_assoc['limit']['start']);
        }
        //=======================================
        $query   = $builder->get();
        // echo $this->db->getLastQuery();die;
        if ($array_assoc['get_row_array'] == "array") {
            return $query->getResult('array');
        } else {
            return $query->getRowArray();
        }
    }
	public function full_query3($param = [])
    {
        $array_assoc = [
            "get_row_array" => "array",          // array là lấy array, row là lấy row
            "select"        =>  "*",             // ví dụ
            "table"         =>  $this->table,        // ví dụ
            "join"          =>  [                // ví dụ    
                // ["join_table" => '',"query_join"=> '',"type" => ''],
                // ["join_table" => '',"query_join"=> '',"type" => ''],
            ],
            "where"         =>  [
                //"publish" => 1
            ], 
			"or_where_group"         =>  [
					// ["price >" => 0, "price <" => 500000],
					// ["price >" => 500000, "price <" => 1500000],					
            ], 
            "where_not_in"  =>  [
                // "column" => "", 
                // "value" => [1,2,3,4] 
            ], 
            "where_in"      =>  [
                // "column" => "", 
                // "value" => [1,2,3,4] 
            ],
			"where_in_multi"=> [
				// ["column" => "cateid", "value" => [1,2,3,4]  ],
				// ["column" => "brandid", "value" => [1,2]  ],
			],
            "like"          =>  [                 // ví dụ
                // ["column" => "", "value"=> ""],
                // ["column" => "", "value"=> ""],
            ],
            "orderby"       =>  "id desc",         
            "groupby"       =>  [],   // ví dụ["id","name"]         
            "limit"         =>  []    // ví dụ ["start" => 0,"limit" => 10]  
        ];
        //===============================================
        $array_assoc                  = array_merge($array_assoc, $param);
        $array_assoc['table']         = $array_assoc['table']         != NULL ? $array_assoc['table'] : $this->table;
        $array_assoc['orderby']       = $array_assoc['orderby']       != NULL ? $array_assoc['orderby'] : "id desc";
        $array_assoc['get_row_array'] = $array_assoc['get_row_array'] != NULL ? $array_assoc['get_row_array'] : "array";
        //================================================
        $builder = $this->db->table($array_assoc['table']);
        // SELECT
        if ($array_assoc['select'] != NULL) {
            $builder->select($array_assoc['select']);
        }
        // JOIN
        if ($array_assoc['join'] != NULL) {
            foreach ($array_assoc['join'] as $key => $val) {
                $builder->join($val['join_table'], $val['query_join'], $val['type']);
            }
        }
       
        // WHERE NOT IN
        if ($array_assoc['where_not_in'] != NULL) {
            $builder->whereNotIn($array_assoc['where_not_in']['column'], $array_assoc['where_not_in']['value']);
        }
        // WHERE IN 
        if ($array_assoc['where_in'] != NULL) {
            $builder->whereIn($array_assoc['where_in']['column'], $array_assoc['where_in']['value']);
        }
        // LIKE 
        if ($array_assoc['like'] != NULL) {
            foreach ($array_assoc['like'] as $key => $val) {

                if ($val['value'] != NULL  && $val['value'] != '') {
                    if ($key <= 0) {
                        $builder->like($val['column'], $val['value']);
                    } else {
                        $builder->orLike($val['column'], $val['value']);
                    }
                }
            }
        }
		// WHERE
		if ($array_assoc['where'] != NULL) {
            $builder->where($array_assoc['where']);
        }
		// OR WHERE
        if ($array_assoc['or_where_group'] != NULL) {
			$builder->groupStart();
			foreach ($array_assoc['or_where_group'] as $key => $val) {
			   if($key == 0)
			   {	
				   foreach ($val as $key_group => $val_group) {
					   if($key_group == 0)
					   {
						   $builder->where($val_group);
					   }else
					   {
						   $builder->where($val_group);
					   }
				   }
				   
			   }else
			   {
				   foreach ($val as $key_group => $val_group) {
					   if($key_group == 0)
					   {
						   $builder->orWhere($val_group);
					   }
					   else
					   {
						   $builder->where($val_group);
					   }
				   }
			   }
		   }
		   $builder->groupEnd();
	    }
	    // MULTI WHEREIN 
		if ($array_assoc['where_in_multi'] != NULL) {
			foreach ($array_assoc['where_in_multi'] as $key => $val) {
				$builder->whereIn($val['column'], $val['value']);
			}
		}
        // ORDERBY
        if ($array_assoc['orderby'] != NULL) {
        	$builder->orderBy($array_assoc['orderby']);
        }
          // GROUPBY
        if ($array_assoc['groupby'] != NULL) {
            $builder->groupBy($array_assoc['groupby']);
        }
        // LIMIT
        if ($array_assoc['limit'] != NULL) {

            $builder->limit($array_assoc['limit']['limit'],$array_assoc['limit']['start']);
        }
        //=======================================
        $query   = $builder->get();
        //echo $this->db->getLastQuery();
        if ($array_assoc['get_row_array'] == "array") {
            return $query->getResult('array');
        } else {
            return $query->getRowArray();
        }
    }
	public function full_query2($param = [], $orderBy = '')
    {
        $array_assoc = [
            "get_row_array" => "array",          // array là lấy array, row là lấy row
            "select"        =>  "*",             // ví dụ
            "table"         =>  $this->table,        // ví dụ
            "join"          =>  [                // ví dụ    
                // ["join_table" => '',"query_join"=> '',"type" => ''],
                // ["join_table" => '',"query_join"=> '',"type" => ''],
            ],
            "where"         =>  [
                //"publish" => 1
            ], 
			"or_where_group"         =>  [
					// ["price >" => 0, "price <" => 500000],
					// ["price >" => 500000, "price <" => 1500000],					
            ], 
            "where_not_in"  =>  [
                // "column" => "", 
                // "value" => [1,2,3,4] 
            ], 
            "where_in"      =>  [
                // "column" => "", 
                // "value" => [1,2,3,4] 
            ],
			"where_in_multi"=> [
				// ["column" => "cateid", "value" => [1,2,3,4]  ],
				// ["column" => "brandid", "value" => [1,2]  ],
			],
            "like"          =>  [                 // ví dụ
                // ["column" => "", "value"=> ""],
                // ["column" => "", "value"=> ""],
            ],
            "orderby"       =>  "id desc",         
            "groupby"       =>  [],   // ví dụ["id","name"]         
            "limit"         =>  []    // ví dụ ["start" => 0,"limit" => 10]  
        ];
        //===============================================
        $array_assoc                  = array_merge($array_assoc, $param);
        $array_assoc['table']         = $array_assoc['table']         != NULL ? $array_assoc['table'] : $this->table;
        $array_assoc['orderby']       = $array_assoc['orderby']       != NULL ? $array_assoc['orderby'] : "id desc";
        $array_assoc['get_row_array'] = $array_assoc['get_row_array'] != NULL ? $array_assoc['get_row_array'] : "array";
        //================================================
        $builder = $this->db->table($array_assoc['table']);
        // SELECT
        if ($array_assoc['select'] != NULL) {
            $builder->select($array_assoc['select']);
        }
        // JOIN
        if ($array_assoc['join'] != NULL) {
            foreach ($array_assoc['join'] as $key => $val) {
                $builder->join($val['join_table'], $val['query_join'], $val['type']);
            }
        }
       
        // WHERE NOT IN
        if ($array_assoc['where_not_in'] != NULL) {
            $builder->whereNotIn($array_assoc['where_not_in']['column'], $array_assoc['where_not_in']['value']);
        }
        // WHERE IN 
        if ($array_assoc['where_in'] != NULL) {
            $builder->whereIn($array_assoc['where_in']['column'], $array_assoc['where_in']['value']);
        }
        // LIKE 
        if ($array_assoc['like'] != NULL) {
            foreach ($array_assoc['like'] as $key => $val) {

                if ($val['value'] != NULL  && $val['value'] != '') {
                    if ($key <= 0) {
                        $builder->like($val['column'], $val['value']);
                    } else {
                        $builder->orLike($val['column'], $val['value']);
                    }
                }
            }
        }
		// WHERE
		if ($array_assoc['where'] != NULL) {
            $builder->where($array_assoc['where']);
        }
		// OR WHERE
        if ($array_assoc['or_where_group'] != NULL) {
			$builder->groupStart();
			foreach ($array_assoc['or_where_group'] as $key => $val) {
			   if($key == 0)
			   {	
				   foreach ($val as $key_group => $val_group) {
					   if($key_group == 0)
					   {
						   $builder->where($val_group);
					   }else
					   {
						   $builder->where($val_group);
					   }
				   }
				   
			   }else
			   {
				   foreach ($val as $key_group => $val_group) {
					   if($key_group == 0)
					   {
						   $builder->orWhere($val_group);
					   }
					   else
					   {
						   $builder->where($val_group);
					   }
				   }
			   }
		   }
		   $builder->groupEnd();
	    }
	    // MULTI WHEREIN 
		if ($array_assoc['where_in_multi'] != NULL) {
			foreach ($array_assoc['where_in_multi'] as $key => $val) {
				$builder->whereIn($val['column'], $val['value']);
			}
		}
        // ORDERBY
        if ($array_assoc['orderby'] != NULL) {
        	$builder->orderBy($array_assoc['orderby']);
        }
          // GROUPBY
        if ($array_assoc['groupby'] != NULL) {
            $builder->groupBy($array_assoc['groupby']);
        }
        // LIMIT
        if ($array_assoc['limit'] != NULL) {

            $builder->limit($array_assoc['limit']['limit'],$array_assoc['limit']['start']);
        }
        //=======================================
        $query   = $builder->get();
        // echo $this->db->getLastQuery();die;
        if ($array_assoc['get_row_array'] == "array") {
            return $query->getResult('array');
        } else {
            return $query->getRowArray();
        }
    }
	public function find_one($id)
	{
		$builder = $this->db->table($this->table);
		$builder->where('id', $id);
		$result  = $builder->get();
		//  echo $this->db->getLastQuery();die;
		return $result->getRowArray();
	}
	public function findOne($data = '*', $where = NULL, $order = 'id DESC')
	{
		$builder = $this->db->table($this->table);
		if ($data != '') {
			$builder->select($data);
		}
		if($where != NULL){
			$builder->where($where);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		$result  = $builder->get();
		//  echo $this->db->getLastQuery();die;
		return $result->getRowArray();
	}

	public function edit($data = null, $where = null)
	{
		$builder = $this->db->table($this->table);
		if ($data != null && $where != null) {
			$result = $builder->update($data, $where);
			// echo $this->db->getLastQuery();die;
			if ($result) {
				return array(
					'type'		=> 'successful',
					'message'	=> 'Update value successful!',
				);
			}
		}
	}
	public function deleteWhere($where)
	{
		$builder = $this->db->table($this->table);
		$result  = $builder->delete($where);
		//   echo $this->db->getLastQuery();die;
		return $result;
	}
	public function where_not_in($arr)
	{
		$builder = $this->db->table($this->table);
		$builder->whereNotIn('id', $arr);
		$result = $builder->get();
		return $result->getResult('array');
	}
	public function where_in($where)
	{
		$builder = $this->db->table($this->table);
		$builder->where($where);
		$result  = $builder->get();
		//  echo $this->db->getLastQuery();die;
		return $result->getRowArray();
	}
	public function select_array($data = '*', $where = NULL, $order = 'id DESC', $start = NULL, $limit = NULL)
	{
		$builder = $this->db->table($this->table);
		if ($data != '') {
			$builder->select($data);
		}
		if ($where != null) {
			$builder->where($where);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		if ($limit != NULL) {
			$builder->limit($limit, $start);
		}
		$query   = $builder->get();
		// echo $this->db->getLastQuery();die;
		return $query->getResult('array');
	}
	public function select_array_like($data = '*', $where = NULL, $like = '', $order = 'id desc', $start = NULL, $limit = NULL)
	{
		$builder = $this->db->table($this->table);
		if ($data != '') {
			$builder->select($data);
		}
		if ($where != null) {
			$builder->where($where);
		}
		if ($like != '') {
			$builder->like('name', $like);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		if ($limit != NULL) {
			$builder->limit($limit, $start);
		}
		$query   = $builder->get();
		// echo $this->db->getLastQuery();die;
		return $query->getResult('array');
	}
	function select_row($data = '*', $where = NULL, $order = 'id desc', $start = NULL, $limit = NULL)
	{
		$builder = $this->db->table($this->table);
		if ($data != '') {
			$builder->select($data);
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		if ($limit != NULL) {
			$builder->limit($limit, $start);
		}
		$query   = $builder->get();
		//  echo $this->db->getLastQuery();
		return $query->getRowArray();
	}

	function select_count($data = '*', $where = NULL, $arr_not_in = NULL)
	{
		$builder = $this->db->table($this->table);
		if ($data != '') {
			$builder->select($data);
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($arr_not_in != NULL) {
			$builder->whereNotIn('id', $arr_not_in);
		}
		return $builder->countAllResults();
	}
	public function select_max($field, $where = NULL)
	{
		if ($where != NULL && count($where) > 0) {
			$builder = $this->db->table($this->table)->where($where);
		} else {
			$builder = $this->db->table($this->table);
		}
		$builder->selectMax($field);
		$query   = $builder->get();
		return $query->getRowArray();
	}

	public function get_num_rows($where = NULL)
	{
		$builder = $this->db->table($this->table);
		if ($where != NULL) {
			$builder->where($where);
		}
		$query   = $builder->get();
		// echo $this->db->getLastQuery();die;
		return $query->getNumRows();
	}
	public function select_array_like_wherein_notin(
		$data = NULL,
		$where = NULL,
		$field_where_in = NULL,
		$ar_where_in = NULL,
		$field_where_notin = NULL,
		$ar_where_notin = NULL,
		$order = 'id desc',
		$start = NULL,
		$limit = NULL,
		$likeValue = NULL,
		$column_1 = NULL
	) {
		$builder = $this->db->table($this->table);
		if ($data != NULL) {
			$builder->select($data);
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($likeValue != NULL) {
			if ($column_1 != NULL) {
				$builder->like($column_1, $likeValue);
			}
		}
		if ($ar_where_in != NULL && $field_where_in != '') {
			$builder->whereIn($field_where_in, $ar_where_in);
		}
		if ($ar_where_notin != NULL && $field_where_notin != '') {
			$builder->whereNotIn($field_where_in, $ar_where_in);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		if ($limit != NULL) {
			$builder->limit($limit, $start);
		}
		$query   = $builder->get();
		return $query->getResult('array');
	}
	public function select_array_like_multi_column(
		$data = NULL,
		$where = NULL,
		$order = 'id desc',
		$start = NULL,
		$limit = NULL,
		$likeValue = NULL,
		$column_1 = NULL,
		$column_2 = NULL,
		$column_3 = NULL,
		$column_4 = NULL,
		$column_5 = NULL
	) {
		$builder = $this->db->table($this->table);
		if ($data != NULL) {
			$builder->select($data);
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($likeValue != NULL) {
			if ($column_1 != NULL) {
				$builder->like($column_1, $likeValue);
			}
			if ($column_2 != NULL) {
				$builder->orLike($column_2, $likeValue);
			}
			if ($column_3 != NULL) {
				$builder->orLike($column_3, $likeValue);
			}
			if ($column_4 != NULL) {
				$builder->orLike($column_4, $likeValue);
			}
			if ($column_5 != NULL) {
				$builder->orLike($column_5, $likeValue);
			}
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		if ($limit != NULL) {
			$builder->limit($limit, $start);
		}
		$query   = $builder->get();
		return $query->getResult('array');
	}
	public function select_array_wherein_like_join_multi_column(
		$data = NULL,
		$where = NULL,
		$order = 'id desc',
		$start = NULL,
		$limit = NULL,
		$likeValue = NULL,
		$join_table_1 = NULL,
		$query_join_1 = NULL,
		$type_1 = NULL,
		$join_table_2 = NULL,
		$query_join_2 = NULL,
		$type_2 = NULL,
		$join_table_3 = NULL,
		$query_join_3 = NULL,
		$type_3 = NULL,
		$join_table_4 = NULL,
		$query_join_4 = NULL,
		$type_4 = NULL,
		$column_1     = NULL,
		$column_2     = NULL,
		$column_3 = NULL,
		$ar_where_in  = NULL,
		$field_in     = NULL
	) {
		$builder = $this->db->table($this->table);
		if ($data != NULL) {
			$builder->select($data);
		}
		// join
		if ($join_table_1 != NULL) {
			$builder->join($join_table_1, $query_join_1, $type_1);
		}
		if ($join_table_2 != NULL) {
			$builder->join($join_table_2, $query_join_2, $type_2);
		}
		if ($join_table_3 != NULL) {
			$builder->join($join_table_3, $query_join_3, $type_3);
		}
		if ($join_table_4 != NULL) {
			$builder->join($join_table_4, $query_join_4, $type_4);
		}
		//end join
		if ($likeValue != NULL) {
			if ($column_1 != NULL) {
				$builder->like($column_1, $likeValue);
			}
			if ($column_2 != NULL) {
				$builder->orLike($column_2, $likeValue);
			}
			if ($column_3 != NULL) {
				$builder->orLike($column_3, $likeValue);
			}
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($ar_where_in != NULL && $field_in != NULL) {
			$builder->whereIn($field_in, $ar_where_in);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		if ($limit != NULL) {
			$builder->limit($limit, $start);
		}
		$query   = $builder->get();
		// echo $this->db->getLastQuery();die;
		return $query->getResult('array');
	}
	public function select_array_like_join_multi_column(
		$data = NULL,
		$where = NULL,
		$order = 'id desc',
		$start = NULL,
		$limit = NULL,
		$likeValue = NULL,
		$join_table_1 = NULL,
		$query_join_1 = NULL,
		$type_1 = NULL,
		$join_table_2 = NULL,
		$query_join_2 = NULL,
		$type_2 = NULL,
		$join_table_3 = NULL,
		$query_join_3 = NULL,
		$type_3 = NULL,
		$join_table_4 = NULL,
		$query_join_4 = NULL,
		$type_4 = NULL,
		$column_1 = NULL,
		$column_2 = NULL,
		$column_3 = NULL,
		$column_4 = NULL,
		$column_5 = NULL
	) {
		$builder = $this->db->table($this->table);
		if ($data != NULL) {
			$builder->select($data);
		}
		// join
		if ($join_table_1 != NULL) {
			$builder->join($join_table_1, $query_join_1, $type_1);
		}
		if ($join_table_2 != NULL) {
			$builder->join($join_table_2, $query_join_2, $type_2);
		}
		if ($join_table_3 != NULL) {
			$builder->join($join_table_3, $query_join_3, $type_3);
		}
		if ($join_table_4 != NULL) {
			$builder->join($join_table_4, $query_join_4, $type_4);
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		//end join
		if ($likeValue != NULL) {
			if ($column_1 != NULL) {
				$builder->like($column_1, $likeValue);
			}
			if ($column_2 != NULL) {
				$builder->orLike($column_2, $likeValue);
			}
			if ($column_3 != NULL) {
				$builder->orLike($column_3, $likeValue);
			}
			if ($column_4 != NULL) {
				$builder->orLike($column_4, $likeValue);
			}
			if ($column_5 != NULL) {
				$builder->orLike($column_5, $likeValue);
			}
		}

		if ($where != NULL) {
			$builder->where($where);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		if ($limit != NULL) {
			$builder->limit($limit, $start);
		}
		$query   = $builder->get();
		// echo $this->db->getLastQuery();
		return $query->getResult('array');
	}
	function select_array_wherein($data = NULL, $where = NULL, $field = NULL, $ar_where = NULL, $order = 'id desc', $start = NULL, $limit = NULL)
	{

		$builder = $this->db->table($this->table);
		if ($data != NULL) {
			$builder->select($data);
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($ar_where != NULL && $field != '') {
			$builder->whereIn($field, $ar_where);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		if ($limit != NULL) {
			$builder->limit($limit, $start);
		}
		$query   = $builder->get();
		return $query->getResult('array');
	}
	public function select_where_not_in($where  = NULL, $notin = null)
	{
		$builder = $this->db->table($this->table);
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($notin != NULL) {
			$builder->whereNotIn('id', $notin);
		}
		$result = $builder->get();

		return $result->getResult('array');
	}
	// ================================== search the specified table==========================================================
	function select_array_table($table = NULL, $data = '*', $where = NULL, $order = 'id desc')
	{
		$builder = $this->db->table($table);
		if ($data != '') {
			$builder->select($data);
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		$query   = $builder->get();
		//  echo $this->db->getLastQuery();die;
		return $query->getResult('array');
	}

	function select_row_table($table = NULL, $data = '*', $where = NULL, $order = 'id desc')
	{
		$builder = $this->db->table($table);
		if ($data != '') {
			$builder->select($data);
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		$query   = $builder->get();
		// echo $this->db->getLastQuery();die;
		return $query->getRowArray();
	}
	function delete_where_table($table = '', $where = NULL)
	{
		if ($table != '') {
			$builder = $this->db->table($table);
		}
		if ($where != NULL) {
			$result = $builder->delete($where);
		}
		//   echo $this->db->getLastQuery();die;
		return $result;
	}

	// SELECT tbl_news_land.*, like_table.productID as like_newsland
	// FROM tbl_news_land
	// LEFT JOIN
	// (   SELECT tbl_product_like.productID
	// FROM tbl_news_land
	// LEFT JOIN tbl_product_like  ON tbl_product_like.productID = tbl_news_land.id WHERE tbl_product_like.id_user = 72
	// ) as like_table

	function select_likenewsLand($table = NULL, $data = '*')
	{
		$builder = $this->db->table($table);
		if ($data) {
			$builder->select($data);
		}
	}
	// ===================================
	function select_array_two($data = '*', 
		$where = NULL, 
		$order = 'id DESC', 
		$start = 0,
		$limit = 0,
		$likeValue = '',
		$join = NULL,
		$column_like = NULL,
		$ar_where_in  = NULL,
		$field_in     = '',
		$array_not_in = NULL,
		$field_not_in = ''
	)
	{
		$builder = $this->db->table($this->table);
		if ($data != NULL) {
			$builder->select($data);
		}
		// join
		if ($join != NULL) {
			
			foreach($join as $key => $val){
			
				$builder->join($val[0], $val[1], $val[2]);
			}
		}
		//end join
		if ($likeValue != '' && $column_like != NULL) {
			foreach($column_like as $key => $val){
				if ($key == 0) {
					$builder->like($val, $likeValue);
				}
				else{
					$builder->orLike($val, $likeValue);
				}
			}
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($ar_where_in != NULL && $field_in != '') {
			$builder->whereIn($field_in, $ar_where_in);
		}
		if ($array_not_in != NULL && $field_not_in != '') {
			$builder->whereNotIn($field_not_in, $array_not_in);
		}
		if ($order != '') {
			$builder->orderBy($order);
		}
		if ($limit  > 0) {
			$builder->limit($limit, $start);
		}
		$query   = $builder->get();
		//  echo $this->db->getLastQuery().'<br>';
		return $query->getResultArray();
	}
	function select_row_two(
		$data = '*',
		$where = NULL, 
		$likeValue = '',
		$join = NULL,
		$column_like = NULL,
		$array_not_in = NULL,
		$field_not_in = '',
		$orwhere = NULL
	)
	{
		$builder = $this->db->table($this->table);
		if ($data != NULL) {
			$builder->select($data);
		}
		// join
		if ($join != NULL) {
			foreach($join as $key => $val){
				$builder->join($val[0], $val[1], $val[2]);
			}
		}
		//end join
		if ($likeValue != '' && $column_like != NULL) {
			foreach($column_like as $key => $val){
				if ($key == 0) {
					$builder->like($val, $likeValue);
				}
				else{
					$builder->orLike($val, $likeValue);
				}
			}
		}
		if ($where != NULL) {
			$builder->where($where);
		}
		if ($orwhere != NULL) {
			$builder->orWhere($orwhere);
		}
		if ($array_not_in != NULL && $field_not_in != '') {
			$builder->whereNotIn($field_not_in, $array_not_in);
		}
		$query   = $builder->get();
		// echo $this->db->getLastQuery().'<br>';
		return $query->getRowArray();
	}
}
