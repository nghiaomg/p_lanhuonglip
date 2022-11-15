<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\RoleModels;
use App\Models\ModuleModels;
use App\Models\ModuleDetailsModels;
use App\Models\CI_function;
use App\Models\CI_auth;
use App\Models\PermissionModels;

class Role extends BaseController
{
	private $title 	  = 'nhóm quyền';
	private $template = 'backend/role/';
	var $control 	  = 'role';
	function __construct()
	{
		$this->RoleModels 			= new RoleModels();
		$this->ModuleModels 		= new ModuleModels();
		$this->RoleModels 			= new RoleModels();
		$this->CI_function 			= new CI_function();
		$this->CI_auth 				= new CI_auth();
		$this->ModuleDetailsModels  = new ModuleDetailsModels();
		$this->PermissionModels  	= new PermissionModels();
	}
	public function index()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}

		$this->checkPermission();
		//get data from BaseController
		$data_index = $this->get_indexBE();
		$data = [
			'data_index' =>	$data_index,
			'datas'		 =>	$this->RoleModels->select_array(),
			'control'	 =>	$this->control,
			'title'		 => 'Quản lý ' . $this->title,
			'template'	 => $this->template . 'index'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}
	public function add()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$data_post['publish'] ? $data_post['publish'] = 1 : $data_post['publish'] = 0;
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result = $this->RoleModels->add($data_post);
			if ($result['type'] == "successful") {
				return redirect()->to('index')->with('success', ADD_SUCCESS);
			} else {
				return redirect()->to('index')->with('error', ADD_FAIL);
			}
		}
		$data = array(
			'data_index' =>	$data_index,
			'title'		 => 'Thêm mới ' . $this->title,
			'template'	 => $this->template . 'add',
			'control' 	 => $this->control
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
		$id 					 = $this->request->getVar('id');
		$global 				 = $this->request->getVar('global');
		$properties 			 = $this->request->getVar('properties');
		$dataUpdate[$properties] = $global;
		$result 				 = $this->RoleModels->edit($dataUpdate, array('id' => $id));
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
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$data_post['updated_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			if (!$data_post['publish']) {
				$data_post['publish']  = 0;
			}
			$result = $this->RoleModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
			}
		}

		$data = [
			'data_index' =>	$data_index,
			'datas'		 =>	$this->RoleModels->find_one($id),
			'control'	 =>	$this->control,
			'title'		 =>	'Cập nhật ' . $this->title,
			'template'	 => $this->template . 'edit'
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
		$id = $_POST['id'];
		$result = $this->RoleModels->deleteWhere(array('id' => $id));
	}
	function deleteAll()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$list_id 		= $this->request->getPost('list_id');
		$list_id_delete = explode(',', $list_id);
		foreach ($list_id_delete as $key => $val) {
			$result = $this->RoleModels->deleteWhere(array('id' => $val));
			if ($result) {
				echo json_encode(array("result" => "successfully"));
			}
		}
	}

	#Permission
	public function setPermission($roleID)
	{
		//check login
		if (!session('logged_in')) {
			return redirect()->to(base_url('cpanel/login.html'));
		}

		$this->checkPermission();

		$data_index 	 		 = $this->get_indexBE();
		$roleIDLogged 	 		 = $this->CI_auth->infoAdmin()["id"];
		$getAllModule 	 		 = $this->ModuleModels->select_array("*", array("parentid" => 0), "id ASC");
		$getAllModuleDetail 	 = $this->ModuleDetailsModels->select_array("*", NULL, "id ASC");
		$roleName 			 	 = $this->RoleModels->find_one($roleID);
		$getPermissionByRoleID 	 = $this->PermissionModels->select_array("*", array("roleID" => $roleID));

		if ($getAllModule != NULL && count($getAllModule) > 0) {
			// Add children module
			foreach ($getAllModule as $key => $value) {
				if ($value["parentid"] != "") {
					$getChildModule = $this->ModuleModels->select_array("*", array("parentid" => $value["id"], "name ASC"));
					if ($getChildModule != NULL && count($getChildModule) > 0) {
						foreach ($getChildModule as $key_child => $val_child) {
							// Add module detail
							if ($val_child['id'] != "") {
								$getModuleDetail = $this->ModuleDetailsModels->select_array("id, moduleID, name, ctr, action, sort, roleID", array("moduleID" => $val_child["id"]), "sort ASC");
								if ($getAllModuleDetail != NULL && count($getAllModuleDetail) > 0) {
									$getChildModule[$key_child]["moduleDetail"] = $getModuleDetail;
								}
							}
						}
						$getAllModule[$key]["childrenModule"] = $getChildModule;
					} else {
						// Add modules detail
						if ($value['id'] != "") {
							$getModuleDetail = $this->ModuleDetailsModels->select_array("*", array("moduleID" => $value["id"]), "sort ASC");
							if ($getModuleDetail != NULL && count($getModuleDetail) > 0) {
								$getAllModule[$key]["moduleDetail"] = $getModuleDetail;
							}
						}
					}
				}
			}
		}

		$data = [
			'data_index' 			=>	$data_index,
			'control'	 			=>	$this->control,
			'title'		 			=>  'Phân quyền cho ' . $roleName["name"],
			'template'	 			=>  'backend/permission/set_permission',
			'datas'	 				=>  $getAllModule,
			'roleID'	 			=>  $roleID,
			'permissionOfRole'	 	=>  $getPermissionByRoleID,
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

	function updatePermission()
	{
		//Check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		// Get data from Ajax
		$moduleID 			 = $_POST['moduleID'];
		$controller 		 = $_POST['controller'];
		$action 			 = $_POST['action'];
		$roleID 			 = $_POST['roleID'];
		$moduleID			 = $_POST['moduleID'];
		$isChecked			 = $_POST['isChecked'];
		$data_index 		 = $this->get_indexBE();
		$roleIDLogged 		 = $this->CI_auth->infoAdmin()["id_role"];

		if ($isChecked == 1) {
			$dataInsert = array(
				"roleID" 	 => $roleID,
				"module_id"  => $moduleID,
				"controller" => $controller,
				"action" 	 => $action,
			);
			$result = $this->PermissionModels->add($dataInsert);
			echo json_encode($result);
		} else if ($isChecked == 0) {
			$isSuccess = $this->PermissionModels->deleteWhere(array("controller" => $controller, "action" => $action, "roleID" => $roleID));
		}
	}
}
