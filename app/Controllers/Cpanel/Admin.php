<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\AdminModels;
use App\Models\Encrypts;
use App\Models\CI_encrypts;
use App\Models\Upload;
use App\Models\RoleModels;

class Admin extends BaseController
{
	private $title 					= 'admin';
	private $template 				= 'backend/admin/';
	var	$path_url 					= 'cpanel/admin/';
	var $path_dir 					= 'uploads/images/admin/';
	var $control 					= 'admin';
	function __construct()
	{
		$this->AdminModels 			= new AdminModels();
		$this->Encrypts 			= new Encrypts();
		$this->Upload               = new Upload();
		$this->CI_encrypts 			= new CI_encrypts();
		$this->RoleModels 			= new RoleModels();
	}
	public function index()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index 		 = $this->get_indexBE();
		$session 			 = session();
		$NotIn 				 = [$session->get('id')];
		$datas 				 = $this->AdminModels->where_not_in($NotIn);
		$data 				 = [
			'data_index' 	 =>	$data_index,
			'datas'			 =>	$datas,
			'control'		 =>	$this->control,
			'title'			 => 'Quản lý ' . $this->title,
			'template'		 => $this->template . 'index',
			'path_dir_thumb' => $this->path_dir,
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
			$data_post 				= $this->request->getPost('data_post');
			if ($_FILES['image']['name']) {
				$fileName 			= $this->request->getFile('image');
				$nameAvatar 		= trim($data_post['username']);
				$path_dir 			= $this->path_dir;
				$data_upload 		= $this->Upload->upload_image($path_dir, $fileName, $nameAvatar, 'image', 300, 300, NULL, NULL);
				if ($data_upload['type'] == "error") {
					return redirect()->to(base_url($this->path_url))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
				$data_post['image'] 		= $image;
				$data_post['thumb'] 		= $thumb;
			}
			$data_post['month'] 		= date("m");
			$data_post['year']  		= date("Y");
			$data_post['active'] ? $active = 1 : $active = 0;
			$salt 						= $this->Encrypts->genRndSalt();
			$data_post['text_pass'] 	= $data_post['password'];
			$data_post['salt']  		= $salt;
			$encryptPass 				= $this->CI_encrypts->encryptUserPwd(trim($data_post['password']), $salt);
			$data_post['password'] 		= $encryptPass;
			// $data_post['password'] 		= password_hash(trim($data_post['password']), PASSWORD_BCRYPT);
			$data_post['created_at'] 	= gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result 					= $this->AdminModels->add($data_post);

			if ($result['type'] == "successful") {
				return redirect()->to('index')->with('success', ADD_SUCCESS);
			} else {
				return redirect()->to('index')->with('error', ADD_FAIL);
			}
		}
		$role = $this->RoleModels->select_array();
		$data = array(
			'role'			=> $role,
			'data_index' 	=>	$data_index,
			'title'			=> 'Thêm mới ' . $this->title,
			'template'		=> $this->template . 'add',
			'control' 		=> $this->control,
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
		$dataUpdate[$properties]    = $global;
		$result 					= $this->AdminModels->edit($dataUpdate, array('id' => $id));
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
		$data_index 				= $this->get_indexBE();
		$datas 						= $this->AdminModels->find_one($id);
		$fileImage 					= $this->path_dir . $datas['image'];
		$fileImageThumb 			= $this->path_dir . $datas['thumb'];
		if ($this->request->getPost()) {
			$data_post 				= $this->request->getPost('data_post');
			if ($_FILES['image']['name']) {
				if (file_exists($fileImage)) {
					try {
						if ($datas['image'] != '') {
							unlink($fileImage);
						}
					} catch (\Throwable $th) {
						throw $th;
					}
				}
				// if (file_exists($fileImageThumb)) {if ($datas['thumb'] !='') {unlink($fileImageThumb);}}
				$nameAvatar 		= trim($data_post['username']);
				$fileName 			= $this->request->getFile('image');
				$path_dir 			= $this->path_dir;
				$data_upload 		= $this->Upload->upload_image($path_dir, $fileName, $nameAvatar, 'image', 300, 300, null, null, '');
				if ($data_upload['type'] == "error") {
					return redirect()->to(base_url($this->path_url))->with('error', $data_upload['message']);
				} else {
					$image 			= date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb			= date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$image 				= $datas['image'];
				$thumb 				= $datas['thumb'];
			}
			$data_post['month'] 	  = date("m");
			$data_post['year'] 		  = date("Y");
			$data_post['image'] 	  = $image;
			$data_post['thumb'] 	  = $thumb;
			$data_post['updated_at']  = gmdate('Y-d-m H:i:s', time() + 7 * 3600);
			if (!$data_post['active']) {
				$data_post['active']  = 0;
			}

			$result = $this->AdminModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
			}
		}
		$role = $this->RoleModels->select_array();

		$data = [
			'role'				=> $role,
			'data_index' 		=>	$data_index,
			'datas'				=>	$datas,
			'control'			=>	$this->control,
			'title'				=>	'Cập nhật ' . $this->title,
			'template'			=> 	$this->template . 'edit',
			'path_dir_thumb' 	=> $this->path_dir,
			'image_thumb' 		=> $fileImageThumb,
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
		$id 				= $_POST['id'];
		$datas 				= $this->AdminModels->where_in(array('id' => $id));
		$filename 			= $this->path_dir . $datas['image'];
		$filenamethumb 		= $this->path_dir . $datas['thumb'];
		if ($datas != NULL) {
			try {
				if ($datas['image'] != '') {
					if (file_exists($filename)) {
						unlink($filename);
					}
				}
				if ($datas['thumb'] != '') {
					if (file_exists($filenamethumb)) {
						unlink($filenamethumb);
					}
				}
			} catch (\Throwable $th) {
				throw $th;
			}
			$result = $this->AdminModels->deleteWhere(array('id' => $id));
		}
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
			$datas 				= $this->AdminModels->where_in(array('id' => $val));
			$filename 			= $this->path_dir . $datas['image'];
			$filenamethumb 		= $this->path_dir . $datas['thumb'];
			if ($datas != NULL) {
				try {
					if (file_exists($filename) && file_exists($filenamethumb)) {
						unlink($filename);
						unlink($filenamethumb);
					}
				} catch (\Throwable $th) {
					throw $th;
				}
				$result = $this->AdminModels->deleteWhere(array('id' => $val));
				if ($result) {
					echo json_encode(array("result" => "successfully"));
				}
			}
		}
	}
	function check_files()
	{
		// print_r($_FILES['image']['tmp_name']);
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$file_size 			= $_FILES['image']['size'];
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$aler 				= '';
		$array_filetype 	=  [
			'image/jpg',
			'image/jpeg',
			'image/png',
		];
		$fileType = finfo_file($finfo, $_FILES['image']['tmp_name']);
		if (!in_array($fileType, $array_filetype)) {
			echo $alert = "chỉ hổ trợ png/jpeg/jpg";
		}
		if ($_FILES['image']['size'] > 1 * 1024 * 1024) {
			echo $alert = "Dung lượng hình không được quá 5MB";
		}
	}
	function checkUS()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$username 	= $_POST['username'];
		$result 	= $this->AdminModels->where_in(array('username' => $username));
		if ($result > 0) {
			echo 1;
		} else {
			echo 0;
		}
	}
	function del_image()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id 				= $this->request->getPost('id');
		$datas 				= $this->AdminModels->where_in(array('id' => $id));
		$fileName 			= $this->path_dir . $datas['image'];
		$fileNameThumb 		= $this->path_dir . $datas['thumb'];
		if ($datas != NULL) {
			try {
				if ($datas['image']) {
					if (file_exists($fileName)) {
						unlink($fileName);
					}
				}
				if ($datas['thumb']) {
					if (file_exists($fileNameThumb)) {
						unlink($fileNameThumb);
					}
				}
			} catch (\Throwable $th) {
				throw $th;
			}
			$data_update 	= array(
				'image'	=> "",
				'thumb'	=> "",
			);
			$result = $this->AdminModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result'    => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
	function view_change()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data = [
			'id' => $this->request->getPost('id')
		];
		return view('backend/ajax/change_pass', isset($data) ? $data : NULL);
	}
	function change_pasword()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id 				= $this->request->getPost('id');
		$salt 				= $this->Encrypts->genRndSalt();
		$password_input 	= $this->request->getPost('password_input');
		$encryptPass 		= $this->CI_encrypts->encryptUserPwd(trim($password_input), $salt);
		$arr = array(
			'salt' 		=> $salt,
			'text_pass' => $password_input,
			'password' 	=> $encryptPass,
		);

		$result = $this->AdminModels->edit($arr, array('id' => $id));
		if ($result) {
			echo json_encode(array(
				'result' 	=> "success",
				"message"	=> "Đổi mật khẩu thành công"
			));
		} else {
			echo json_encode(array(
				'result' 	=> "error",
				"message"	=> "Đổi mật khẩu thất bại"
			));
		}
	}
}
