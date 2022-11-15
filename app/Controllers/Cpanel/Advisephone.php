<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\Upload;
use App\Models\MailsModels;

class Advisephone extends BaseController
{
	private $title         = 'đăng ký khuyến mãi';
	private $template      = 'backend/advisephone/';
	public $control        = 'advisephone';

	function __construct()
	{
		$this->Upload = new Upload();
		$this->MailsModels = new MailsModels();
	}

	public function index()
	{
		if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
		$this->checkPermission();
		$datas  = $this->MailsModels->select_array("*");
		$data_index = $this->get_indexBE();
		$data = [
			'data_index'            => $data_index,
			'datas'                 => $datas,
			'control'               => $this->control,
			'title'                 => 'Quản lý ' . $this->title,
			'template'              => $this->template . 'index'
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
		$result = $this->MailsModels->deleteWhere(array('id' => $id));
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
			$result = $this->MailsModels->deleteWhere(array('id' => $val));
			if ($result) {
				echo json_encode(array("result" => "successfully"));
			}
		}
	}
}
