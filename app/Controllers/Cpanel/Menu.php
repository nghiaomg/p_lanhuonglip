<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\CategoryModels;
use App\Models\AliasModels;
use App\Models\Upload;
use App\Models\CI_function;
use App\Models\MenuModels;

class Menu extends BaseController
{
	private $title 			= 'Menu';
	private $template		= 'backend/menu/';
	public	$path_url 		= 'cpanel/menu/';
	public $path_dir 		= 'uploads/images/menu/';
	public $path_dir_image 	= 'uploads/images/menu/';
	public $path_dir_webp  	= 'uploads/webps/menu/';
	public $path_dir_thumb  = 'uploads/images/menu/thumb';
	public $control 		= 'menu';

	function __construct()
	{
		$this->CategoryModels = new CategoryModels();
		$this->AliasModels = new AliasModels();
		$this->CI_function = new CI_function();
		$this->MenuModels = new MenuModels();
		$this->Upload = new Upload();
		$cache = \Config\Services::cache();
	}

	public function index()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();

		$datas = array();
		$datas = $this->CI_function->showMenuTable(0);

		$data = [
			'data_index'			=> $data_index,
			'datas'					=> $datas,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir_thumb'		=> $this->path_dir,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'index'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

	public function showLink()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$dataSelect = $this->CI_function->get_link();

		echo json_encode(['success' => 1, 'resDataSelect' => $dataSelect]);
	}

	public function showType()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$dataSelect = '<option>Chọn danh mục</option>';
		$dataSelect .= $this->CI_function->getSelectCategory(0, '', '', $_POST['type']);
		echo json_encode(['success' => 1, 'resDataSelect' => $dataSelect]);
	}

	function add()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		$data_index = $this->get_indexBE();
		$sort_max = $this->MenuModels->select_max('sort');
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$link = $this->request->getPost('link');

			$link_static = $this->request->getPost('link_static');
			if ($link == '' & $link_static == '') {
				$link = "/";
			} else if ($link_static != '' && $link == '') {
				$link = $this->request->getPost('link_static');
			}

			$data_post['link']       = $link;
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish']    = $publish;
			$data_post['sort']       = $sort_max['sort'] + 1;
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);

			$result = $this->MenuModels->add($data_post);
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', ADD_SUCCESS);
			}
		}
		$menus = $this->CI_function->getSelectMenu2(0);
		$data = [
			'menu'					=> $menus,
			'data_index'			=> $data_index,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir'				=> $this->path_dir,
			'path_dir_thumb'		=> $this->path_dir_thumb,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'add'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

	function edit($id)
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$datas = $this->MenuModels->find_one($id);
		$menus = $this->CI_function->getSelectMenu2(0, '', $datas['parentid']);
		$select_link = $this->CI_function->get_link(0, $datas['link'], $datas['type']);
		$dataSelect = $this->CI_function->getSelectCategory(0, '', $datas['categoryid'], $datas['type']);

		$errors = [];

		// $image = $this->path_dir . $datas['image'];
		// $imagethumb = $this->path_dir . $datas['thumb'];

		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			if ($id == $data_post['parentid']) {
				$errors['parentid'] = 'Vui lòng chọn mục khác';
			}
			$link = $this->request->getPost('link');
			$link_static = $this->request->getPost('link_static');
			if ($link == '' & $link_static == '') {
				$link = "/";
			} else if ($link_static != '' && $link == '') {
				$link = $this->request->getPost('link_static');
			}
			$data_post['link'] = $link;
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] = $publish;
			$data_post['updated_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			if (empty($errors)) {
				$result = $this->MenuModels->edit($data_post, array('id' => $id));
				if ($result['type'] == "successful") {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', EDIT_SUCCESS);
				}
			}
		}
		$data = [
			'dataSelect'			=> $dataSelect,
			'select_link'			=> $select_link,
			'errors'				=> $errors,
			'menu'					=> $menus,
			'datas'					=> $datas,
			'id'					=> $id,
			'data_index'			=> $data_index,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir'				=> $this->path_dir_image,
			'path_dir_thumb'		=> $this->path_dir,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'edit'
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
		$result = $this->MenuModels->edit($dataUpdate, array('id' => $id));
		if ($result) {
			echo json_encode($result);
		}
	}
	public function createSlug()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$slug = $this->CI_function->create_alias($_POST['slug']);
		echo json_encode(array('slug' => $slug));
	}
	public function sort()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id = $_POST['id'];
		$sort = $_POST['sort'];
		$data_update['sort'] = $sort;
		$result = $this->MenuModels->edit($data_update, array('id' => $id));
		if ($result > 0) {
			echo json_encode(array('rs' => 1));
		}
	}
	function delete()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id = $_POST['id'];
		$result = $this->MenuModels->deleteWhere(array('id' => $id));
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
			$result = $this->MenuModels->deleteWhere(array('id' => $val));
			if ($result) {
				echo json_encode(array("result" => "successfully"));
			}
		}
	}
	function delete_option()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id = $_POST['id'];
		$val = (int)$_POST['num'];
		if ($val == 1) {
			$result = $this->MenuModels->deleteWhere(array('id' => $id));
			$this->MenuModels->edit(array('parentid' => 0), array('parentid' => $id));
			if ($result) {
				return json_encode(array(
					"result" => "success",
					"message" => "Xóa thành công"
				));
			}
		} else {
			$result = $this->MenuModels->deleteWhere(array('id' => $id));
			$this->MenuModels->deleteWhere(array('parentid' => $id));
			if ($result) {
				return json_encode(array(
					"result" => "success",
					"message" => "Xóa thành công"
				));
			}
		}
	}
}
