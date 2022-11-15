<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\CI_function;
use App\Models\ContactModels;

class Contact extends BaseController
{
	var $title              = 'Liên hệ';
	var $template           = 'backend/contact/';
	var $control            = 'contact';
	var $per_page           = 10;
	var $numb_button        = 3;
	public function __construct()
	{
		$this->ContactModels =  new ContactModels();
		$this->CI_function   = new CI_function();
	}

	public function index()
	{
		$this->checkPermission();
		$data_index         = $this->get_indexBE();
		$param_query_1      = [ "select" => "*" ];
		$datas_all 			= $this->ContactModels->full_query($param_query_1);
		$total_rows 	    = count($datas_all);
		$per_page           = $this->per_page;
		$total_page         = ceil($total_rows / $per_page);
		$page_click         = 1;    				// active button khi click chuyển trang
		$number_button_page = $this->numb_button;  // số lượng button muốn hiển thị 
		$page               = 1;
		$page 				= ($page > $total_page) ? $total_page : $page;
		$page 				= ($page < 1) ? 1 : $page;
		$page 				= $page - 1;
		//=======================================
		$where              = NULL;
		$start              = $page * $per_page;
		$limit 			    = $per_page;
		$datas			    = [];
		if ($total_rows > 0) {
			$param_query_2  = [
				"select" => "*, DATE_FORMAT(created_at, '%d/%m/%Y') as created_at",
				"limit"	 => ["start" => $start, "limit" => $limit]
			];
			$datas 			= $this->ContactModels->full_query($param_query_2);
		}
		// Button phân trang
		$button_pagination = $this->CI_function->button_pagination($number_button_page, $total_rows, $per_page, $page_click);
		$data = [
			'data_index'			=> $data_index,
			'datas'					=> $datas,
			'control'				=> $this->control,
		
			'title'					=> $this->title,
			'button_pagination'     => $button_pagination,
			'template'				=> $this->template . 'index'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

	// phân trang + tìm kiếm 
	public function search_pagination()
	{
		$key_word  = NULL;
		$where     = [];
		// số trang vừa chọn
		$page      = 1;
		if (isset($_POST['page']) && $_POST['page'] != "") {
			$page = $_POST['page'];
		}
		if (isset($_POST['keyword']) && $_POST['keyword'] != "") {
			$key_word = $_POST['keyword'];
		}
		//======================================
		$likeValue          = $key_word;
		$param_query_1      = [
								"select" => "*",
								"like"          =>  [               
														["column" => "phone", "value"=> $likeValue],
														["column" => "email", "value"=> $likeValue],
													],
							  ];
		$datas_all 			= $this->ContactModels->full_query($param_query_1);
		
		$total_rows 	    = count($datas_all);
		$per_page           = $this->per_page;
		$total_page         = ceil($total_rows / $per_page);
		$page_click         = $page;    			// active button khi click chuyển trang
		$number_button_page = $this->numb_button;  // số lượng button muốn hiển thị 
		$page 				= ($page > $total_page) ? $total_page : $page;
		$page 				= ($page < 1) ? 1 : $page;
		$page 				= $page - 1;
		//=======================================
		$start              = $page * $per_page;
		$limit 			    = $per_page;
		$datas              = [];
		if ($total_rows > 0) {
			$param_query_2  = [
				"select" => "*, DATE_FORMAT(created_at, '%d/%m/%Y') as created_at",
				"like"   => [               
								["column" => "phone", "value"=> $likeValue],
								["column" => "email", "value"=> $likeValue],
							],
				"limit"	 => ["start" => $start, "limit" => $limit]
			];
			$datas 			= $this->ContactModels->full_query($param_query_2);
			
		}
		// Button phân trang
		$button_pagination 			= $this->CI_function->button_pagination($number_button_page, $total_rows, $per_page, $page_click);
		$data['button_pagination']  = $button_pagination;
		$data['datas']   		    = $datas;
		$data['control']			= $this->control;
		
		return view('backend/contact/loadTable', isset($data) ? $data : NULL);
	}

	function delete()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id     = $_POST['id'];
		$result = $this->ContactModels->deleteWhere(array('id' => $id));
	}
	function deleteAll()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$list_id        = $this->request->getPost('list_id');
		$list_id_delete = explode(',', $list_id);
		foreach ($list_id_delete as $key => $val) {
			$result     = $this->ContactModels->deleteWhere(array('id' => $val));
			if ($result) {
				echo json_encode(array("result" => "successfully"));
			}
		}
	}
}
