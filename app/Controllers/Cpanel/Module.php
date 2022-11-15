<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\ModuleModels;
use App\Models\ModuleDetailsModels;
use App\Models\CI_function;
use App\Models\CI_auth;

class Module extends BaseController
{
	private $title 					= 'module';
	private $template 				= 'backend/module/';
	var $control 					= 'module';

	function __construct()
	{
		$this->ModuleModels 		= new ModuleModels();
		$this->CI_function 			= new CI_function();
		$this->CI_auth 				= new CI_auth();
		$this->ModuleDetailsModels  = new ModuleDetailsModels();
	}
	public function index()
	{
		//Check login
		if (!session('logged_in')) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		$roleID 						= $this->CI_auth->infoAdmin()["id_role"];
		$data_index 					= $this->get_indexBE();
		$module 						= $this->ModuleModels->select_array(NULL, array('parentid' => 0), 'sort asc,id desc');
		if ($module != NULL) {
			foreach ($module as $key => $val) {
				$module[$key]['child']  = $this->ModuleModels->select_array(NULL, array('parentid' => $val['id']), 'sort asc,id desc');
			}
		}
		$data = [
			'data_index' =>	$data_index,
			'datas'		 =>	$module,
			'control'	 =>	$this->control,
			'title'		 => 'Quản lý ' . $this->title,
			'template'	 => $this->template . 'index'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

	public function add()
	{
		//Check login
		if (!session('logged_in')) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index 					= $this->get_indexBE();
		$roleID 						= $this->CI_auth->infoAdmin()["id_role"];
		$parentid 						= $this->ModuleModels->select_array(NULL, array('parentid' => 0));
		$sort_max 						= $this->ModuleModels->select_max('sort');
		if ($this->request->getPost()) {
			$data_post 				 	= $this->request->getPost('data_post');
			$data_module_detail 		= $this->request->getPost('data_module_detail');
			$data_post['publish'] ? $data_post['publish'] = 1 : $data_post['publish'] = 0;
			$data_post['created_at'] 	= gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$data_post['sort'] 			= $sort_max['sort'] + 1;
			$result 					= $this->ModuleModels->add($data_post);	//Add module

			// Insert module detail 
			if ($result['type'] == "successful") {
				if ($data_module_detail != NULL) {
					foreach ($data_module_detail as $key => $val) {
						$insert_ModulesDetail = array(
							'moduleID' 		=>  $result['insertID'],
							'name' 			=> 	$val['name_action'],
							'ctr' 			=> 	$data_post['ctr'],
							'action' 		=>  $val['action'],
							'sort' 			=> 	$val['sort'],
							'roleID' 		=> 	$roleID,
							'created_at'	=>	gmdate('Y-m-d H:i:s', time() + 7 * 3600)
						);
						$this->ModuleDetailsModels->add($insert_ModulesDetail);
					}
				}
				return redirect()->to('index')->with('success', ADD_SUCCESS);
			} else {
				return redirect()->to('index')->with('error', ADD_FAIL);
			}
		}
		$data = array(
			'data_index' =>	$data_index,
			'title'		 => 'Thêm mới ' . $this->title,
			'template'	 => $this->template . 'add',
			'control' 	 => $this->control,
			'parentid'	 => $parentid
		);
		return view('backend/default', isset($data) ? $data : NULL);
	}

	function checkglobals()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id 						= $this->request->getVar('id');
		$global 					= $this->request->getVar('global');
		$properties 				= $this->request->getVar('properties');
		$dataUpdate[$properties] 	= $global;
		$result 					= $this->ModuleModels->edit($dataUpdate, array('id' => $id));
		if ($result) {
			echo json_encode($result);
		}
	}

	function edit($id)
	{
		//Check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index 				   = $this->get_indexBE();
		$roleID 					   = $this->CI_auth->infoAdmin()["id_role"];
		$parentid 					   = $this->ModuleModels->select_array(NULL, array('parentid' => 0));
		$moduleDetail				   = $this->ModuleDetailsModels->select_array("*", array("moduleID" => $id), "sort ASC");

		if ($this->request->getPost()) {
			$data_post 				   = $this->request->getPost('data_post');
			$data_module_detail 	   = $this->request->getPost('data_module_detail');

			$data_post['updated_at']   = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			if (!$data_post['publish']) {
				$data_post['publish']  = 0;
			}
			$result = $this->ModuleModels->edit($data_post, array('id' => $id));

			// Insert module detail
			if ($result['type'] == "successful") {

				// Delete all module detail has moduleID, before insert again
				if (count($moduleDetail) > 0) {
					foreach ($moduleDetail as $key_detail => $val_detail) {
						if ($val_detail["moduleID"] != "") {
							$result = $this->ModuleDetailsModels->deleteWhere(array('moduleID' => $id));
						}
					}
				}
				if ($data_module_detail != NULL) {
					foreach ($data_module_detail as $key => $val) {
						$insert_ModulesDetail = array(
							'moduleID' 		=>  $id,
							'name' 			=> 	$val['name_action'],
							'ctr' 			=> 	$data_post['ctr'],
							'action' 		=>  $val['action'],
							'sort' 			=> 	$val['sort'],
							'roleID' 		=> 	$roleID,
							'created_at'	=>	gmdate('Y-m-d H:i:s', time() + 7 * 3600)
						);
						$this->ModuleDetailsModels->add($insert_ModulesDetail);
					}
				}
				return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
			} else {
				return redirect()->to('index')->with('error', EDIT_FAIL);
			}
		}

		$data = [
			'data_index' 	 =>	$data_index,
			'datas'		 	 =>	$this->ModuleModels->find_one($id),
			'control'	 	 =>	$this->control,
			'title'		 	 =>	'Cập nhật ' . $this->title,
			'template'	 	 => $this->template . 'edit',
			'parentid'	 	 => $parentid,
			'moduleDetail'	 => $moduleDetail,
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
		$result = $this->ModuleModels->deleteWhere(array('id' => $id));
		$resultDetail = $this->ModuleDetailsModels->deleteWhere(array('moduleID' => $id));
	}

	function deleteAll()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		$list_id 				= $this->request->getPost('list_id');
		$list_id_delete 		= explode(',', $list_id);
		foreach ($list_id_delete as $key => $val) {
			$result 			= $this->ModuleModels->deleteWhere(array('id' => $val));
			$resultDetail 		= $this->ModuleDetailsModels->deleteWhere(array('moduleID' => $val));
			if ($result) {
				echo json_encode(array("result" => "successfully"));
			}
		}
	}

	public function sort()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		$id 				 = $_POST['id'];
		$sort 				 = $_POST['sort'];
		$data_update['sort'] = $sort;
		$result 			 = $this->ModuleModels->edit($data_update, array('id' => $id));
		if ($result > 0) {
			echo json_encode(array('rs' => 1));
		}
	}
}
