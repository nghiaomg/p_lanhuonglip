<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\ModuleModels;
use App\Models\ModuleDetailsModels;
use App\Models\RoleModels;
use App\Models\CI_function;
use App\Models\CI_auth;
use App\Models\PermissionModels;

class Permission extends BaseController
{
	private $title 					= 'phân quyền';
	private $template 				= 'backend/permission/';
	private $control 				= 'permission';

	function __construct()
	{
		$this->ModuleModels 		= new ModuleModels();
		$this->RoleModels 			= new RoleModels();
		$this->CI_function 			= new CI_function();
		$this->CI_auth 				= new CI_auth();
		$this->ModuleDetailsModels  = new ModuleDetailsModels();
		$this->PermissionModels  	= new PermissionModels();
	}

	public function index()
	{
		//Check login
		if (!session('logged_in')) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		$roleIDLogged 	 = $this->CI_auth->infoAdmin()["id"];
		$data_index 	 = $this->get_indexBE();
		$roles 			 = $this->RoleModels->select_array();
		$data = [
			'data_index' =>	$data_index,
			'datas'		 =>	$roles,
			'control'	 =>	$this->control,
			'title'		 => 'Quản lý ' . $this->title,
			'template'	 => $this->template . 'index'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

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
								$getModuleDetail = $this->ModuleDetailsModels->select_array("id, moduleID, name, ctr, action, sort, roleID", array("moduleID" => $val_child["id"], "sort ASC"));
								if ($getAllModuleDetail != NULL && count($getAllModuleDetail) > 0) {
									$getChildModule[$key_child]["moduleDetail"] = $getModuleDetail;
								}
							}
						}
						$getAllModule[$key]["childrenModule"] = $getChildModule;
					} else {
						// Add modules detail
						if ($value['id'] != "") {
							$getModuleDetail = $this->ModuleDetailsModels->select_array("*", array("moduleID" => $value["id"], "name ASC"));
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
			'template'	 			=>  $this->template . 'set_permission',
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
