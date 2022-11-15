<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\ServiceModels;
use App\Models\CI_function;
use App\Models\CI_auth;
use App\Models\ContentsModels;
use App\Models\Upload;

class Service extends BaseController
{
	private $title 	  = 'dịch vụ';
	private $template = 'backend/service/';
	var $control 	  = 'service';
	public $path_dir = 'uploads/images/service/';
	function __construct()
	{
		$this->ServiceModels 			= new ServiceModels();
		$this->CI_function 				= new CI_function();
		$this->CI_auth 					= new CI_auth();
		$this->ContentsModels 			= new ContentsModels();
		$this->Upload 					= new Upload();
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
			'datas'		 =>	$this->ServiceModels->select_array(),
			'control'	 =>	$this->control,
			'title'		 => 'Quản lý '.$this->title,
			'template'	 => $this->template . 'index',
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
		$sort_max   = $this->ServiceModels->select_max('sort');
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			
			$data_post['publish'] ? $data_post['publish'] = 1 : $data_post['publish'] = 0;
			$data_post['sort']       = $sort_max['sort'] + 1;
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result = $this->ServiceModels->add($data_post);
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
		$result 				 = $this->ServiceModels->edit($dataUpdate, array('id' => $id));
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
			$result = $this->ServiceModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
			}
		}

		$data = [
			'data_index' =>	$data_index,
			'datas'		 =>	$this->ServiceModels->find_one($id),
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
		$datas = $this->ServiceModels->find_one($id);
		$image = $this->path_dir . $datas['image'];
		$imagethumb = $this->path_dir . $datas['thumb'];
		try {
			if (file_exists($image)) {
				if ($datas['image'] != '') {
					unlink($image);
				}
			}
			if (file_exists($imagethumb)) {
				if ($datas['thumb'] != '') {
					unlink($imagethumb);
				}
			}
		} catch (\Throwable $th) {
			throw $th;
		}
		$result = $this->ServiceModels->deleteWhere(array('id' => $id));
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
			$datas = $this->ServiceModels->find_one($val);
			$image = $this->path_dir . $datas['image'];
			$imagethumb = $this->path_dir . $datas['thumb'];
			try {
				if (file_exists($image)) {
					if ($datas['image'] != '') {
						unlink($image);
					}
				}
				if (file_exists($imagethumb)) {
					if ($datas['thumb'] != '') {
						unlink($imagethumb);
					}
				}
			} catch (\Throwable $th) {
				throw $th;
			}
			$result = $this->ServiceModels->deleteWhere(array('id' => $val));
			if ($result) {
				echo json_encode(array("result" => "successfully"));
			}
		}
	}
	public function sort()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $id                  = $_POST['id'];
        $sort                = $_POST['sort'];
        $data_update['sort'] = $sort;
        $result              = $this->ServiceModels->edit($data_update, array('id' => $id));
        if ($result > 0) echo json_encode(array('rs' => 1));
    }

}
