<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\ProductModels;
use App\Models\ProductingreModels;
use App\Models\ContentsModels;
use App\Models\Upload;
use App\Models\CI_function;

class Productingre extends BaseController
{
	private $title = 'thành phần';
	private $template = 'backend/productingre/';
	var	$path_url = 'cpanel/productingre/';
	var $path_dir = 'uploads/images/productingre/';
	var $path_dir_webp = 'uploads/webps/productingre/';
	var $control = 'productingre';
	function __construct()
	{
		$this->ProductModels = new ProductModels();
		$this->ProductingreModels = new ProductingreModels();
		$this->ContentsModels = new ContentsModels();
		$this->CI_function = new CI_function();
		$this->Upload = new Upload();
	}
	public function index($productID)
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$datas = $this->ProductingreModels->select_array('*', ['productID' => $productID], 'sort asc,id desc');
		$productRow = $this->ProductModels->findOne('id, name', ['id' => $productID]);

		$ingredientContentJson = $this->ContentsModels->findOne('id, content', ['key' => 'ingredient_content']);
		if($ingredientContentJson != NULL){
			$ingredientContent = json_decode($ingredientContentJson['content'], true);
		}
		
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$data_insert['content']	= json_encode($data_post);
			$result = $this->ContentsModels->edit($data_insert, array('key' => 'ingredient_content'));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index/" . $productID))->with('success', ADD_SUCCESS);
			}
		}
		$data = [
			'data_index'			=> $data_index,
			'datas'					=> $datas,
			'productID'				=> $productID,
			'productRow'			=> $productRow,
			'ingredientContent'		=> $ingredientContent,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir_thumb'		=> $this->path_dir,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'index'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}
	function add($productID)
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$sort_max = $this->ProductingreModels->select_max('sort');
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$alias = $this->CI_function->create_alias($data_post['name']);
			// echo $alias;die;
			if ($_FILES['image']['name']) {
				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, uniqid().'-'.$alias, 'image', 500, 500, null, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			}
			else{
				$image = '';
				$thumb = '';
			}
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] = $publish;
			$data_post['productID'] = $productID;
			$data_post['image'] = $image;
			$data_post['sort'] = $sort_max['sort'] + 1;
			$data_post['thumb'] = $thumb;
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result = $this->ProductingreModels->add($data_post);
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index/" . $productID))->with('success', ADD_SUCCESS);
			}
		}
		$data = [
			'data_index'			=> $data_index,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir'				=> $this->path_dir,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'add',
			'productID'				=> $productID,
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
		$datas 		= $this->ProductingreModels->find_one($id);
		$image 		= $this->path_dir . $datas['image'];
		$imagethumb = $this->path_dir . $datas['thumb'];
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			if ($_FILES['image']['name']) {
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
				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, uniqid().'-'.$_FILES['image']['name'], 'image', 500, 500, null, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					$webps 			   = $data_upload['webps'];
					$webps_thumb	   = $data_upload['webps_thumb'];
				}
			} else {
				$image = $datas['image'];
				$thumb = $datas['thumb'];
			}
			
			isset($data_post['publish'])? $publish = 1 : $publish = 0;
			$data_post['publish'] = $publish;
			$data_post['image'] = $image;
			$data_post['thumb'] = $thumb;
			$data_post['updated_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result = $this->ProductingreModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index/" . $datas['productID']))->with('success', EDIT_SUCCESS);
			}
		}
		$data = [
			'datas'					=> $datas,
			'data_index'			=> $data_index,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir_thumb'		=> $this->path_dir,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'edit'
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
		$datas = $this->ProductingreModels->where_in(array('id' => $id));
		$filename = $this->path_dir . $datas['image'];
		$filenamethumb = $this->path_dir . $datas['thumb'];
		// webp
		if ($datas != NULL) {
			try {
				if ($datas['image'] !='') {
					if (file_exists($filename)) {
						unlink($filename);
					}
				}
				if ($datas['thumb'] !='') {
					if (file_exists($filenamethumb)) {
						unlink($filenamethumb);
					}
				}
			} catch (\Throwable $th) {
				throw $th;
			}
			$result = $this->ProductingreModels->deleteWhere(array('id' => $id));
		} else {
			$result = $this->ProductingreModels->deleteWhere(array('id' => $id));
		}
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
			$datas = $this->ProductingreModels->where_in(array('id' => $val));
			$filename = $this->path_dir . $datas['image'];
			$filenamethumb = $this->path_dir . $datas['thumb'];
			// webp
			if ($datas != NULL) {
				if ($datas['image'] !='') {
					if (file_exists($filename)) {
						unlink($filename);
					}
				}
				if ($datas['thumb'] !='') {
					if (file_exists($filenamethumb)) {
						unlink($filenamethumb);
					}
				}
				$result = $this->ProductingreModels->deleteWhere(array('id' => $val));
				if ($result) {
					echo json_encode(array("result" => "successfully"));
				}
			}
		}
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
		$result = $this->ProductingreModels->edit($dataUpdate, array('id' => $id));
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
		$result = $this->ProductingreModels->edit($data_update, array('id' => $id));
		if ($result > 0) {
			echo json_encode(array('rs' => 1));
		}
	}
	function del_image()
	{
		$this->checkPermission();
		$id = $this->request->getPost('id');
		$datas = $this->ProductingreModels->where_in(array('id' => $id));

		$fileName = $this->path_dir . $datas['image'];
		$fileNameThumb = $this->path_dir . $datas['thumb'];
		// explode image
		$webImages = explode(".", $datas['image']);
		$image_webp = $this->path_dir_webp . $webImages[0] . '.webp';
		// echo $image_webp;
		$webImagesThumb = explode(".", $datas['thumb']);
		$image_webp_thumb = $this->path_dir_webp . $webImagesThumb[0] . '.webp';
		if ($datas != NULL) {
			if ($datas['image']) {
				if (file_exists($fileName)) {
					unlink($fileName);
					unlink($image_webp);
				}
			}

			if ($datas['thumb']) {
				if (file_exists($fileNameThumb)) {
					unlink($fileNameThumb);
					unlink($image_webp_thumb);
				}
			}
			$data_update = array(
				'image'	=> "",
				'thumb'	=> "",
			);
			$result = $this->ProductingreModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
}
