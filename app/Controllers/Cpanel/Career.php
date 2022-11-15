<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\CareerModels;

class Career extends BaseController
{
	private $title      = "ngành nghề";
	private $template   = 'backend/career/';
	var	$path_url 		= 'cpanel/career/';
	var $path_dir 		= 'uploads/images/career/';
	var $control 		= 'career';
	function __construct()
	{
		$this->CareerModels = new CareerModels();
	}
	public function index()
	{
		//Check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$datas 		= $this->CareerModels->select_array();
		foreach ($datas as $key => $val) {
			$number_news = 0;
		}
		$data = [
			'data_index' 	 =>	$data_index,
			'datas'			 =>	$datas,
			'control'		 =>	$this->control,
			'title'			 => 'Quản lý ' . $this->title,
			'template'		 => $this->template . 'index',
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}
	function add()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$sort_max 					= $this->CareerModels->select_max('sort');
		$data_index = $this->get_indexBE();
		if ($this->request->getPost()) {
			$data_post 				 = $this->request->getPost('data_post');
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$data_post['sort'] 		 = $sort_max['sort'] + 1;
			$result 				 = $this->CareerModels->add($data_post);
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with("success", ADD_SUCCESS);
			}
		}
		$data = [
			'data_index' 	 =>	$data_index,
			'control'		 =>	$this->control,
			'title'			 => 'Quản lý ' . $this->title,
			'template'		 => $this->template . 'add',
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}
	function checkglobals()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id 				 	 = $this->request->getVar('id');
		$global 				 = $this->request->getVar('global');
		$properties 			 = $this->request->getVar('properties');
		$dataUpdate[$properties] = $global;
		$result 				 = $this->CareerModels->edit($dataUpdate, array('id' => $id));
		if ($result) {
			echo json_encode($result);
		}
	}
	function edit($id)
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission(); //Phân quyền
		$data_index 				   = $this->get_indexBE();
		$parentid 					   = $this->CareerModels->select_array(NULL, array('parentid' => 0));
		if ($this->request->getPost()) {
			$data_post 				   = $this->request->getPost('data_post');
			$data_post['updated_at']   = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			if (!$data_post['publish']) {
				$data_post['publish']  = 0;
			}
			$result = $this->CareerModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
			}
		}

		$data = [
			'data_index' =>	$data_index,
			'datas'		 =>	$this->CareerModels->find_one($id),
			'control'	 =>	$this->control,
			'title'		 =>	'Cập nhật ' . $this->title,
			'template'	 => $this->template . 'edit',
			'parentid'	 => $parentid
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}
	function delete()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id 	= $_POST['id'];
		$result = $this->CareerModels->deleteWhere(array('id' => $id));
	}
	function deleteAll()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$list_id = $this->request->getPost('list_id');
		$list_id_delete = explode(',', $list_id);
		foreach ($list_id_delete as $key => $val) {
			$result = $this->CareerModels->deleteWhere(array('id' => $val));
			if ($result) {
				echo json_encode(array("result" => "successfully"));
			}
		}
	}
	function checkUS()
	{
		$username = $_POST['username'];
		$result = $this->CareerModels->where_in(array('username' => $username));
		if ($result > 0) {
			echo 1;
		} else {
			echo 0;
		}
	}
}
