<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\AdminModels;
use App\Models\Encrypts;
use App\Models\CI_encrypts;
use App\Models\Upload;

class Profile extends BaseController
{
	private $title = 'Cập nhật thông tin cá nhân';
	private $template = 'backend/profile/';
	var	$path_url = 'cpanel/admin/';
	var $path_dir = 'uploads/images/admin/';
	// var	$path_dir_thumb = 'uploads/admin/thumb/';
	var $control = 'profile';
	function __construct()
	{
		$this->AdminModels = new AdminModels();
		$this->Encrypts = new Encrypts();
		$this->Upload = new Upload();
		$this->CI_encrypts = new CI_encrypts();
	}
	function index()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$session = session();
		$profile = $this->AdminModels->where_in(array('id' => $session->get('id')));
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$nameAvatar = $profile['username'];
			$fileImage = $this->path_dir_image . $profile['image'];
			$fileImageThumb = $this->path_dir_thumb . $profile['thumb'];
			if ($_FILES['image']['name']) {
				if (file_exists($fileImage)) {
					if ($profile['image'] != '') {
						unlink($fileImage);
					}
				}
				if (file_exists($fileImageThumb)) {
					if ($profile['thumb'] != '') {
						unlink($fileImageThumb);
					}
				}
				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $nameAvatar, 'image', 300, null, null);
				if ($data_upload['type'] == "error") {
					return redirect()->to(base_url($this->path_url . "index"))->with('error', $data_upload['message']);
				} else {
					$image =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb =  date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$image = $profile['image'];
				$thumb = $profile['thumb'];
			}
			$data_post['image'] = $image;
			$data_post['thumb'] = $thumb;
			$data_post['updated_at'] = gmdate('Y-d-m H:i:s', time() + 7 * 3600);

			$result = $this->AdminModels->edit($data_post, array('id' => $session->get('id')));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . 'profile'))->with('success', EDIT_SUCCESS);
			}
		}
		$data = [
			'datas'     =>  $profile,
			'data_index' =>	$data_index,
			'control'	=>	$this->control,
			'title'		=> 'Quản lý ' . $this->title,
			'template'	=> $this->template . 'index',
			'path_dir_thumb' => $this->path_dir,
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

	function changepass()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$session = session();
		$password = $this->request->getPost('password');
		$password_confirm = $this->request->getPost('password_confirm');
		$salt = $this->Encrypts->genRndSalt();
		if ($password == $password_confirm) {
			$text_pass = $password;
			$password = $this->CI_encrypts->encryptUserPwd(trim($password), $salt);
			$data_update = array(
				'password'  => $password,
				'text_pass' => $text_pass,
				'salt'      => $salt,
			);
			$result = $this->AdminModels->edit($data_update, array('id' => $session->get('id')));
			if ($result['type'] == "successful") {
				echo json_encode(array(
					'result' => "successful"
				));
			}
		} else {
			echo json_encode(array(
				'result' => "error"
			));
		}
	}
	function check_files()
	{
		// print_r($_FILES['image']['tmp_name']);
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$file_size = $_FILES['image']['size'];
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$aler = '';
		$array_filetype =  [
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
	function del_image()
	{
		$this->checkPermission();
		$id = $this->request->getPost('id');
		$datas = $this->AdminModels->where_in(array('id' => $id));
		$fileName = $this->path_dir . $datas['image'];
		$fileNameThumb = $this->path_dir . $datas['thumb'];
		if ($datas != NULL) {
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
			$data_update = array(
				'image'	=> "",
				'thumb'	=> "",
			);
			$result = $this->AdminModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
}
