<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\BaogiaModels;
use App\Models\CI_function;
use App\Models\CI_auth;
use App\Models\ContentsModels;
use App\Models\Upload;

class Baogia extends BaseController
{
	private $title 	  = 'Báo giá';
	private $template = 'backend/baogia/';
	var $control 	  = 'baogia';
	public $path_dir = 'uploads/images/baogia/';
	function __construct()
	{
		$this->BaogiaModels 			= new BaogiaModels();
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
		// =================================
		$config_js = $this->ContentsModels->where_in(array('key' => $this->control));
		$config = [];
		if ($config_js != NULL && $config_js['content'] !='' && $config_js['content']  != NULL) {
			$config = json_decode($config_js['content'],true);
		}
		// =================================
		if ($this->request->getPost())
		{	

			$data_post = $this->request->getPost('data_post');
			$data_update['content'] = [];
			$data_update['key'] = $this->control;
			if (isset($data_post) && $data_post != NULL) {
				$data_update['content'] = json_encode($data_post);
			}
			if ($config == NULL) {
				$result 	= $this->ContentsModels->add($data_update);
			}
			else{
				$result 	= $this->ContentsModels->edit($data_update, array('key' => $this->control));
			}
			if ($result) {
				return redirect()->to(base_url(CPANEL .'/'.$this->control. '/index'))->with('success', EDIT_SUCCESS);
			}
		}
		$data = [
			'data_index' =>	$data_index,
			'datas'		 =>	$this->BaogiaModels->select_array(),
			'control'	 =>	$this->control,
			'title'		 => 'Quản lý '.$this->title,
			'template'	 => $this->template . 'index',
			'path_dir'	 => $this->path_dir,
			'config'	 => $config
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
		$sort_max   = $this->BaogiaModels->select_max('sort');
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$data_post_contents = $this->request->getPost('data_content');
			$contents = '';
			if ($data_post_contents != NULL)
			{
				$contents = json_encode($data_post_contents);
			}
			$data_post['price'] = str_replace(',','',$data_post['price']);
			$data_post['price_sale'] = str_replace(',','',$data_post['price_sale']);
			$data_post['content'] = $contents;
			$data_post['publish'] ? $data_post['publish'] = 1 : $data_post['publish'] = 0;
			$data_post['sort']       = $sort_max['sort'] + 1;
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result = $this->BaogiaModels->add($data_post);
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
		$result 				 = $this->BaogiaModels->edit($dataUpdate, array('id' => $id));
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
			$data_post_contents = $this->request->getPost('data_content');
			$contents = '';
			if ($data_post_contents != NULL)
			{
				$contents = json_encode($data_post_contents);
			}
			$data_post['price'] = str_replace(',','',$data_post['price']);
			$data_post['price_sale'] = str_replace(',','',$data_post['price_sale']);
			$data_post['content'] = $contents;
			$data_post['updated_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			if (!$data_post['publish']) {
				$data_post['publish']  = 0;
			}
			$result = $this->BaogiaModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
			}
		}

		$data = [
			'data_index' =>	$data_index,
			'datas'		 =>	$this->BaogiaModels->find_one($id),
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
		$result = $this->BaogiaModels->deleteWhere(array('id' => $id));
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
			$result = $this->BaogiaModels->deleteWhere(array('id' => $val));
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
        $result              = $this->BaogiaModels->edit($data_update, array('id' => $id));
        if ($result > 0) echo json_encode(array('rs' => 1));
    }

}
