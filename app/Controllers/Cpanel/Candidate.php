<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\RoleModels;
use App\Models\CandidateModels;
use App\Models\UserModels;
use App\Models\Encrypts;
use App\Models\CI_encrypts;
use App\Models\Upload;

class Candidate extends BaseController
{
	private $title      = 'ứng viên';
	private $template   = 'backend/candidate/';
	var	$path_url 		= 'cpanel/candidate/';
	var $path_dir 		= 'uploads/files/pdf/';
	var $control 		= 'candidate';
	function __construct()
	{
		$this->UserModels = new UserModels();
		$this->Encrypts = new Encrypts();
		$this->Upload = new Upload();
		$this->CI_encrypts = new CI_encrypts();
		$this->RoleModels = new RoleModels();

		$this->CandidateModels = new CandidateModels();
	}
	public function index()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$datas = $this->CandidateModels->select_array();
		foreach ($datas as $key => $val) {
			$number_news = 0;
		}

		$data = [
			'data_index' 	 =>	$data_index,
			'datas'			 =>	$datas,
			'control'		 =>	$this->control,
			'title'			 => 'Quản lý ' . $this->title,
			'template'		 => $this->template . 'index',
			'path_dir_thumb' => $this->path_dir,
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}
	function add()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		if ($this->request->getPost()) {
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$data_post = $this->request->getPost('data_post');

			$cvName = 'CV_'.str_replace(' ', '', trim($data_post['fullname'])).'_'.date('dmYHis').'.pdf';

			if(isset($_FILES['image'])){
				$fullpath = $this->path_dir . date("Y") . '/' . date("m") . '/'. $cvName;
				$data_post['cv_path'] = $fullpath;
				$data_post['cv_name'] = $cvName;
			}
			$file = $this->request->getFile('image');
			$file->move($this->path_dir . date("Y") . '/' . date("m") . '/' , $cvName);
			

			$data_post['created_at'] = date('Y/m/d H:i:s');
			$data_post['updated_at'] = date('Y/m/d H:i:s');

			$result = $this->CandidateModels->add($data_post);

			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with("success", ADD_SUCCESS);
			}
		}
		$data = [
			'data_index' 	 =>	$data_index,
			'control'		 =>	$this->control,
			'title'			 => 'Thêm ' . $this->title,
			'template'		 => $this->template . 'add',
			'path_dir_thumb' => $this->path_dir,
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}
	function edit($id)
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$datas = $this->CandidateModels->find_one($id);
		$fileImage = $this->path_dir . $datas['image'];
		$fileImageThumb = $this->path_dir . $datas['thumb'];

		date_default_timezone_set('Asia/Ho_Chi_Minh');

		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			if ($_FILES['image']['name']) {
				try {
					if (file_exists($fileImage)) {
						if ($datas['image'] != '') {
							unlink($fileImage);
						}
					}
				} catch (\Throwable $th) {
					throw $th;
				}
				$cvName = 'CV_'.str_replace(' ', '', trim($data_post['fullname'])).'_'.date('dmYHis').'.pdf';

				if(isset($_FILES['image'])){
					$fullpath = $this->path_dir . date("Y") . '/' . date("m") . '/'. $cvName;
					$data_post['cv_path'] = $fullpath;
					$data_post['cv_name'] = $cvName;
				}
				$file = $this->request->getFile('image');
				$file->move($this->path_dir . date("Y") . '/' . date("m") . '/' , $cvName);


				if ($data_upload['type'] == "error") {
					return redirect()->to(base_url($this->path_url . "index"))->with('error', $data_upload['message']);
				}
			} else {
				$fullpath = $datas['image'];
			}

			$data_post['updated_at'] = date('Y-m-d H:i:s');

			$result = $this->CandidateModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
			}
		}

		$data = [
			'data_index' =>	$data_index,
			'datas'		=>	$datas,
			'control'	=>	$this->control,
			'title'		=>	'Cập nhật thông tin ' . $this->title,
			'template'	=> 	$this->template . 'edit',
			'path_dir_thumb' => $this->path_dir,
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
		$result = $this->CandidateModels->deleteWhere(array('id' => $id));
	}
	function deleteAll()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$list_id = $this->request->getPost('list_id');
		$list_id_delete = explode(',', $list_id);
		foreach ($list_id_delete as $key => $val) {
			$result = $this->CandidateModels->deleteWhere(array('id' => $val));
			if ($result) {
				echo json_encode(array("result" => "successfully"));
			}
		}
	}
	function check_files()
	{
		$file_size = $_FILES['image']['size'];
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$aler = '';
		$array_filetype =  [
			'application/pdf',
		];
		$fileType = finfo_file($finfo, $_FILES['image']['tmp_name']);
		if (!in_array($fileType, $array_filetype)) {
			echo $alert = "chỉ hổ trợ PDF";
		}
		if ($_FILES['image']['size'] > 2 * 1024 * 1024) {
			echo $alert = "Dung lượng file không được quá 2MB";
		}
	}
}
