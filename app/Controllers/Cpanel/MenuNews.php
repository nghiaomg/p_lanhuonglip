<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\CategoryModels;
use App\Models\AliasModels;
use App\Models\Upload;
use App\Models\CI_function;

class MenuNews extends BaseController
{
	private $title 		= 'bài viết';
	private $template 	= 'backend/menuNews/';
	var	$path_url 		= 'cpanel/menuNews/';
	var $path_dir 		= 'uploads/images/menuNews/';
	public $path_dir_image = 'uploads/images/menuNews/';
	public $path_dir_thumb  = 'uploads/images/menuNews/thumb';
	var $path_dir_webp 	= 'uploads/webps/menuNews/';
	var $control 		= 'menuNews';

	function __construct()
	{
		$this->CategoryModels = new CategoryModels();
		$this->AliasModels 	  = new AliasModels();
		$this->CI_function 	  = new CI_function();
		$this->Upload 	  	  = new Upload();
	}

	public function index()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		$data_index = $this->get_indexBE();
		$datas = $this->CI_function->showMenuNews(0);
		$data = [
			'data_index'	  => $data_index,
			'datas'			  => $datas,
			'control'		  => $this->control,
			'path_url'		  => $this->path_url,
			'path_dir_thumb'  => $this->path_dir,
			'title'			  => 'Quản lý ' . $this->title,
			'template'		  => $this->template . 'index'
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
		$sort_max = $this->CategoryModels->select_max('sort');

		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$alias = trim($data_post['alias']);
			$type = 1;
			if ($type > 0) {
				$alias = $this->CI_function->createdAlias($alias, $type);
			}
			// echo $alias;die;
			if ($_FILES['image']['name']) {
				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 300, 300, null, 'webp');
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					$webps 			   = $data_upload['webps'];
					$webps_thumb	   = $data_upload['webps_thumb'];
				}
			}
			$data_post['month'] 			= date("m");
			$data_post['year'] 				= date("Y");
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] 			= $publish;
			$data_post['alias'] 			= $alias;
			$data_post['type'] 				= $type;
			// $data_post['image'] 			= $image;
			// $data_post['webps']     		= $webps;
			// $data_post['webps_thumb']       = $webps_thumb;
			$data_post['sort'] 				= $sort_max['sort'] + 1;
			// $data_post['thumb'] 			= $thumb;
			$data_post['created_at'] 		= gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result 						= $this->CategoryModels->add($data_post);

			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', ADD_SUCCESS);
			}
		}

		$menu = $this->CI_function->getSelectCategory(0, '', '', 1);

		$data = [
			'menu'					=> $menu,
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
		$datas = $this->CategoryModels->find_one($id);
		$menus = $this->CI_function->getSelectCategory(0, '', $datas['parentid'], 1);
		$errors = [];
		$image = $this->path_dir . $datas['image'];
		$imagethumb = $this->path_dir . $datas['thumb'];
		// webp
		$image_webp = explode(".", $datas['image']);
		$thumb_webp = explode(".", $datas['thumb']);
		// 
		$webps_image = $this->path_dir_webp . $image_webp[0] . '.webp';
		$webps_thumb =  $this->path_dir_webp . $thumb_webp[0] . '.webp';
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			if ($id == $data_post['parentid']) {
				$errors['parentid'] = 'Vui lòng chọn mục khác';
			}
			$alias = trim($data_post['alias']);
			$type = 1;
			if ($type > 0) {
				$alias = $this->CI_function->createdAlias($alias, $type, $datas['alias']);
			}
			if ($_FILES['image']['name']) {
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
					if (file_exists($webps_image)) {
						unlink($webps_image);
					}
					if (file_exists($webps_thumb)) {
						unlink($webps_thumb);
					}
				} catch (\Throwable $th) {
					throw $th;
				}
				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 300, 300, null, 'webp');
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . '/logo'))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					$webps 			   = $data_upload['webps'];
					$webps_thumb	   = $data_upload['webps_thumb'];
				}
			} else {
				$image = $datas['image'];
				$thumb = $datas['thumb'];
				$webps            = $datas['webps'];
				$webps_thumb      =  $datas['webps_thumb'];
			}

			$data_post['month'] = date("m");
			$data_post['year'] = date("Y");
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] = $publish;
			$data_post['alias'] = $alias;
			// $data_post['image'] = $image;
			// $data_post['thumb'] = $thumb;
			// $data_post['webps']             = $webps;
			// $data_post['webps_thumb']       = $webps_thumb;
			$data_post['updated_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result = $this->CategoryModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', EDIT_SUCCESS);
			}
		}
		$data = [
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

	function delete()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id = $_POST['id'];
		$datas = $this->CategoryModels->where_in(array('id' => $id));
		$filename = $this->path_dir . $datas['image'];
		$filenamethumb = $this->path_dir . $datas['thumb'];
		$web_image = explode('.', $datas['image']);
		$web_thumb = explode('.', $datas['thumb']);
		$YearFolder = glob($this->path_dir . $datas['year'] . '*');
		$MonthFolder = glob($this->path_dir . $datas['year'] . '*' . '/' . $datas['month'] . '/*');
		$YearFolder_wp = glob($this->path_dir_webp . $datas['year'] . '*');
		$MonthFolder_wp = glob($this->path_dir_webp . $datas['year'] . '*' . '/' . $datas['month'] . '/*');
		$fileNamewebp =  $this->path_dir_webp . $web_image[0] . '.webp';
		$fileNamewebp_thumb =  $this->path_dir_webp . $web_thumb[0] . '.webp';
		if ($datas != NULL && $datas['image'] != NULL && $datas['thumb'] != NULL) {
			try {
				if (file_exists($filename) && file_exists($filenamethumb)) {
					unlink($filename);
					unlink($fileNamewebp);
					unlink($filenamethumb);
					unlink($fileNamewebp_thumb);
					//  folder thumb
					$thumbFolder = glob($this->path_dir . $datas['year'] . '*' . '/' . $datas['month'] . '/thumb/*');
					$thumbFolder_delete = $this->path_dir . $datas['year'] . '/' . $datas['month'] . '/thumb';
					// == folder thumb
					$thumbFolder_wp = glob($this->path_dir_webp . $datas['year'] . '*' . '/' . $datas['month'] . '/thumb/*');
					$thumbFolder_webp_delete = $this->path_dir_webp . $datas['year'] . '/' . $datas['month'] . '/thumb';
					// echo 0;
					if ($thumbFolder == NULL && $thumbFolder_wp == NULL) {
						rmdir($thumbFolder_delete);
						rmdir($thumbFolder_webp_delete);
					}
				}
			} catch (\Throwable $th) {
				throw $th;
			}
			$alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
			$result = $this->CategoryModels->deleteWhere(array('id' => $id));
		} else {
			$alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
			$result = $this->CategoryModels->deleteWhere(array('id' => $id));
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
			$datas = $this->CategoryModels->where_in(array('id' => $val));
			$filename = $this->path_dir . $datas['image'];
			$filenamethumb = $this->path_dir_thumb . $datas['thumb'];
			$web_image = explode('.', $datas['image']);
			$web_thumb = explode('.', $datas['thumb']);
			// webp
			$fileNamewebp =  $this->path_dir . $web_image[0] . '.webp';
			$fileNamewebp_thumb =  $this->path_dir . $web_thumb[0] . '.webp';
			if ($datas != NULL) {
				try {
					if (file_exists($filename) && file_exists($filenamethumb)) {
						unlink($filename);
						unlink($fileNamewebp);
						unlink($filenamethumb);
						unlink($fileNamewebp_thumb);
					}
				} catch (\Throwable $th) {
					throw $th;
				}
				$alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
				$result = $this->CategoryModels->deleteWhere(array('id' => $val));
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
		$result = $this->CategoryModels->edit($dataUpdate, array('id' => $id));
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
		$result = $this->CategoryModels->edit($data_update, array('id' => $id));
		if ($result > 0) {
			echo json_encode(array('rs' => 1));
		}
	}
	function del_image()
	{
		$this->checkPermission();
		$id = $this->request->getPost('id');
		$datas = $this->CategoryModels->where_in(array('id' => $id));

		$fileName = $this->path_dir . $datas['image'];
		$fileNameThumb = $this->path_dir . $datas['thumb'];
		$webImages = explode(".", $datas['image']);
		$image_webp = $this->path_dir_webp . $webImages[0] . '.webp';
		$webImagesThumb = explode(".", $datas['thumb']);
		$image_webp_thumb = $this->path_dir_webp . $webImagesThumb[0] . '.webp';
		if ($datas != NULL) {
			try {
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
			} catch (\Throwable $th) {
				throw $th;
			}
			$data_update = array(
				'image'	=> "",
				'thumb'	=> "",
			);
			$result = $this->CategoryModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
}
