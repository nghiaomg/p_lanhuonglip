<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\UserModels;
use App\Models\Encrypts;
use App\Models\CI_encrypts;
use App\Models\Upload;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\RoleModels;

class Users extends BaseController
{
	private $title      = 'thành viên';
	private $template   = 'backend/users/';
	var	$path_url 		= 'cpanel/users/';
	var $path_dir 		= 'uploads/images/users/';
	var $control 		= 'users';
	function __construct()
	{
		$this->UserModels = new UserModels();
		$this->Encrypts = new Encrypts();
		$this->Upload = new Upload();
		$this->CI_encrypts = new CI_encrypts();
		$this->RoleModels = new RoleModels();
	}
	public function index()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$datas = $this->UserModels->select_array();
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
			$data_post = $this->request->getPost('data_post');
			$data_post['created_at'] = gmdate('d-m/Y H:i:s', time() + 7 * 3600);
			$result = $this->UserModels->add($data_post);
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with("success", ADD_SUCCESS);
			}
		}
		$data = [
			'data_index' 	 =>	$data_index,
			'control'		 =>	$this->control,
			'title'			 => 'Quản lý ' . $this->title,
			'template'		 => $this->template . 'add',
			'path_dir_thumb' => $this->path_dir,
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
		$id = $this->request->getVar('id');
		$global = $this->request->getVar('global');
		$properties = $this->request->getVar('properties');
		$dataUpdate[$properties] = $global;
		$result = $this->UserModels->edit($dataUpdate, array('id' => $id));
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
		$datas = $this->UserModels->find_one($id);
		$fileImage = $this->path_dir . $datas['image'];
		$fileImageThumb = $this->path_dir . $datas['thumb'];
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
				$nameAvatar = trim($data_post['username']);
				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $nameAvatar, 'image', 300, null, null, '');
				if ($data_upload['type'] == "error") {
					return redirect()->to(base_url($this->path_url . "index"))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$image = $datas['image'];
				$thumb = $datas['thumb'];
			}
			$data_post['month'] = date("m");
			$data_post['year'] = date("Y");
			$data_post['image'] = $image;
			$data_post['thumb'] = $thumb;
			$data_post['updated_at'] = gmdate('Y-d-m H:i:s', time() + 7 * 3600);
			if (!$data_post['active']) {
				$data_post['active']  = 0;
			}
			$result = $this->UserModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
			}
		}
		$role = $this->RoleModels->select_array();
		$data = [
			'role'		=> $role,
			'data_index' =>	$data_index,
			'datas'		=>	$datas,
			'control'	=>	$this->control,
			'title'		=>	'Cập nhật ' . $this->title,
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
		$result = $this->UserModels->deleteWhere(array('id' => $id));
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
			$result = $this->UserModels->deleteWhere(array('id' => $val));
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
		$username = $_POST['username'];
		$result = $this->UserModels->where_in(array('username' => $username));
		if ($result > 0) {
			echo 1;
		} else {
			echo 0;
		}
	}
	function export()
	{
		if ($this->checkPermission() != "") {
			return $this->checkPermission();
		} else {
			$datas 		 = $this->UserModels->select_array();
			$file_name 	 = 'danhsachthanhvien.xlsx';
			$spreadsheet = new Spreadsheet();
			$sheet 		 = $spreadsheet->getActiveSheet();
			$spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(30);
			$styleArray = [
				'font' => [
					'bold'  => true,
					'color' => array('rgb' => '0B3B0B'),
				],
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				],
				'borders' => [
					'top' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
				],
				'fill' => [],
			];
			$styleArray_value = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
				],
				'borders' => [
					'top' => [
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
				],
			];
			$sheet->setCellValue('A1', 'Họ tên');
			$sheet->setCellValue('B1', 'Email');
			$sheet->setCellValue('C1', 'Số điện thoại');
			$sheet->setCellValue('D1', 'Ngày đăng ký');

			$spreadsheet->getActiveSheet()->getStyle('A1:B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
			$count = 2;
			foreach ($datas as $key => $val) {
				$spreadsheet->getActiveSheet()->getStyle('A1:A' . $count . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
				$spreadsheet->getActiveSheet()->getStyle('B1:B' . $count . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
				$spreadsheet->getActiveSheet()->getStyle('C1:C' . $count . '')->applyFromArray($styleArray_value);
				$spreadsheet->getActiveSheet()->getStyle('D1:D' . $count . '')->applyFromArray($styleArray_value);
				$sheet->setCellValue('A' . $count, $val['fullname']);
				$sheet->setCellValue('B' . $count, $val['email']);
				$sheet->setCellValue('C' . $count, $val['phone']);
				$sheet->setCellValue('D' . $count, date('d/m/Y', strtotime($val['created_at'])));
				$count++;
			}
			$writer = new Xlsx($spreadsheet);
			$writer->save(WRITEPATH . 'uploads/' . $file_name);
			$file = WRITEPATH . 'uploads/' . $file_name;

			// Open save file
			header("Conent-Type:application/vnd.ms-excel");
			header("Content-Disposition:attachment;filename=" . basename(WRITEPATH . 'uploads/' . $file) . "");
			header("Expires:0");
			header("Cache-Control:must-revalidate");
			header("Pragma:public");
			header("Content-Length:" . filesize($file));
			flush();
			readfile($file);
			exit;
		}
	}
}
