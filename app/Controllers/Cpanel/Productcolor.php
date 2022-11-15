<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\ProductcolorModels;
use App\Models\ProductModels;
use App\Models\MyModels;
use App\Models\Upload;
use App\Models\CI_function; 
class Productcolor extends BaseController
{
	private $title = 'màu sản phẩm';
	private $template = 'backend/productcolor/';
	var	$path_url = 'cpanel/productcolor/';
	var $path_dir = 'uploads/images/productcolor/';
	var $path_dir_thumb = 'uploads/images/productcolor/thumb/';
	var $path_dir_webp = 'uploads/webps/productcolor/';
	var $control = 'productcolor';
	function __construct()
	{
		$this->ProductcolorModels = new ProductcolorModels();
		$this->MyModels = new MyModels();
		$this->ProductModels = new ProductModels();
		$this->CI_function = new CI_function();
		$this->Upload = new Upload();
		$this->db  = \Config\Database::connect('default');
	}
	public function index($productID)
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$datas = $this->ProductcolorModels->select_array('*', ['productID' => $productID]);
		// var_dump($datas);die;
		$productRow = $this->ProductModels->findOne('id, name', ['id' => $productID]);

		$data = [
			'data_index'		=> $data_index,
			'datas'				=> $datas,
			'productID'			=> $productID,
			'productRow'		=> $productRow,
			'control'			=> $this->control,
			'path_url'			=> $this->path_url,
			'path_dir_thumb'	=> $this->path_dir,
			'title'				=> 'Quản lý ' . $this->title,
			'template'			=> $this->template . 'index'
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
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');

			$path_dir = $this->path_dir;
			$alias = $this->CI_function->create_alias(trim($data_post['name']));
			//
			if ($_FILES['image']['name']) {
				$fileName = $this->request->getFile('image');

				// create_alias
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 500, 500, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index/" . $productID))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					// $webps 			   = $data_upload['webps'];
					// $webps_thumb	   = $data_upload['webps_thumb'];
				}
			}
			else{
				$image = '';
				$thumb = '';
			}
			//
			if ($_FILES['image_1']['name']) {
				$fileName = $this->request->getFile('image_1');
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias.'_1', 'image_1', 500, 500, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$image_1 = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb_1 = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			}
			else{
				$image_1 = '';
				$thumb_1 = '';
			}
			//
			if ($_FILES['image_2']['name']) {
				$fileName = $this->request->getFile('image_2');
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias.'_2', 'image_2', 500, 500, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$image_2 = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb_2 = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			}
			else{
				$image_2 = '';
				$thumb_2 = '';
			}
			//
			if ($_FILES['image_3']['name']) {
				$fileName = $this->request->getFile('image_3');
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias.'_3', 'image_3', 500, 500, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$image_3 = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb_3 = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			}
			else{
				$image_3 = '';
				$thumb_3 = '';
			}


			$data_post['productID'] = $productID;
			$data_post['month'] = date("m");
			$data_post['year'] = date("Y");
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] = $publish;
			
			$data_post['image'] = $image ? $image : '';
			$data_post['thumb'] = $thumb ? $thumb : '';
			// $data_post['webps'] = $webps ? $webps : '';
			// $data_post['webps_thumb'] = $webps_thumb ? $webps_thumb : '';
			//
			$data_post['image_1'] = $image_1 ? $image_1 : '';
			$data_post['thumb_1'] = $thumb_1 ? $thumb_1 : '';
			//
			$data_post['image_2'] = $image_2 ? $image_2 : '';
			$data_post['thumb_2'] = $thumb_2 ? $thumb_2 : '';
			//
			$data_post['image_3'] = $image_3 ? $image_3 : '';
			$data_post['thumb_3'] = $thumb_3 ? $thumb_3 : '';
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);

			$result = $this->ProductcolorModels->add($data_post);
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index/" .$productID))->with('success', ADD_SUCCESS);
			}
			
		}
		$data = [
			'data_index'			=> $data_index,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir'				=> $this->path_dir,
			'path_dir_thumb'		=> $this->path_dir_thumb,
			'productID'				=> $productID,
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
		$datas = $this->ProductcolorModels->find_one($id);
		
		$image = $this->path_dir . $datas['image'];
		$imagethumb = $this->path_dir . $datas['thumb'];
		// webp
		$image_webp = explode(".", $datas['image']);
		$thumb_webp = explode(".", $datas['thumb']);
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			//
			$path_dir = $this->path_dir;
			$alias = $this->CI_function->create_alias(trim($data_post['name']));
			//
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
				} catch (\Throwable $th) {
					throw $th;
				}
				$fileName = $this->request->getFile('image');
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 500, 500, null, 'webp');
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index/" . $datas['productID']))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$image 			  = $datas['image'];
				$thumb 			  = $datas['thumb'];
			}
			//
			if ($_FILES['image_1']['name']) {
				$urlImage_1 = $this->path_dir . $datas['image_1'];
				$urlImageThumb_1 = $this->path_dir . $datas['thumb_1'];
				try {
					if (file_exists($urlImage_1) && $datas['image_1'] != '') {
						unlink($urlImage_1);
					}
					if (file_exists($urlImageThumb_1) && $datas['thumb_1'] != '') {
						unlink($urlImageThumb_1);
					}
					
				} catch (\Throwable $th) {
					throw $th;
				}
				$fileName = $this->request->getFile('image_1');
				
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias.'_1', 'image_1', 500, 500, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index/" . $datas['productID']))->with('error', $data_upload['message']);
				} else {
					$image_1 = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb_1 = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$image_1 = $datas['image_1'];
				$thumb_1 = $datas['thumb_1'];
			}
			//
			if ($_FILES['image_2']['name']) {
				$urlImage_2 = $this->path_dir . $datas['image_2'];
				$urlImageThumb_2 = $this->path_dir . $datas['thumb_2'];
				try {
					if (file_exists($urlImage_2) && $datas['image_2'] != '') {
						unlink($urlImage_2);
					}
					if (file_exists($urlImageThumb_2) && $datas['thumb_2'] != '') {
						unlink($urlImageThumb_2);
					}
					
				} catch (\Throwable $th) {
					throw $th;
				}
				$fileName = $this->request->getFile('image_2');
				
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias.'_2', 'image_2', 500, 500, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index/" . $datas['productID']))->with('error', $data_upload['message']);
				} else {
					$image_2 = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb_2 = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$image_2 = $datas['image_2'];
				$thumb_2 = $datas['thumb_2'];
			}
			//
			if ($_FILES['image_3']['name']) {
				$urlImage_3 = $this->path_dir . $datas['image_3'];
				$urlImageThumb_3 = $this->path_dir . $datas['thumb_3'];
				try {
					if (file_exists($urlImage_3) && $datas['image_3'] != '') {
						unlink($urlImage_3);
					}
					if (file_exists($urlImageThumb_3) && $datas['thumb_3'] != '') {
						unlink($urlImageThumb_3);
					}
					
				} catch (\Throwable $th) {
					throw $th;
				}
				$fileName = $this->request->getFile('image_3');
				
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias.'_3', 'image_3', 500, 500, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index/" . $datas['productID']))->with('error', $data_upload['message']);
				} else {
					$image_3 = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb_3 = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$image_3 = $datas['image_3'];
				$thumb_3 = $datas['thumb_3'];
			}

			$data_post['month'] = date("m");
			$data_post['year'] = date("Y");
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] = $publish;
			$data_post['image'] = $image;
			$data_post['thumb'] = $thumb;
			//
			$data_post['image_1'] = $image_1;
			$data_post['thumb_1'] = $thumb_1;
			//
			$data_post['image_2'] = $image_2;
			$data_post['thumb_2'] = $thumb_2;
			//
			$data_post['image_3'] = $image_3;
			$data_post['thumb_3'] = $thumb_3;
			$data_post['updated_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result = $this->ProductcolorModels->edit($data_post, array('id' => $id));

			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index/" . $datas['productID']))->with('success', EDIT_SUCCESS);
			}
		}
		
		$data = [
			'datas'					=> $datas,
			'id'					=> $id,
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
		$datas = $this->ProductcolorModels->where_in(array('id' => $id));
		$filename = $this->path_dir . $datas['image'];
		$filenamethumb = $this->path_dir . $datas['thumb'];
		// echo $filenamethumb;
		$web_image = explode('.', $datas['image']);
		$web_thumb = explode('.', $datas['thumb']);
		if ($datas != NULL) {
			if ($datas['image']!='') {
				if (file_exists($filename)) {
					unlink($filename);
				}
			}
			
			if ($datas['thumb']!='') {
				if (file_exists($filenamethumb)) {
					unlink($filenamethumb);
				}
			}
			//
			$urlImage_1 = $this->path_dir . $datas['image_1'];
			$urlImageThumb_1 = $this->path_dir . $datas['thumb_1'];
			if (file_exists($urlImage_1) && $datas['image_1'] != '') {
				unlink($urlImage_1);
			}
			if (file_exists($urlImageThumb_1) && $datas['thumb_1'] != '') {
				unlink($urlImageThumb_1);
			}
			//
			$urlImage_2 = $this->path_dir . $datas['image_2'];
			$urlImageThumb_2 = $this->path_dir . $datas['thumb_2'];
			if (file_exists($urlImage_2) && $datas['image_2'] != '') {
				unlink($urlImage_2);
			}
			if (file_exists($urlImageThumb_2) && $datas['thumb_2'] != '') {
				unlink($urlImageThumb_2);
			}
			//
			$urlImage_3 = $this->path_dir . $datas['image_3'];
			$urlImageThumb_3 = $this->path_dir . $datas['thumb_3'];
			if (file_exists($urlImage_3) && $datas['image_3'] != '') {
				unlink($urlImage_3);
			}
			if (file_exists($urlImageThumb_3) && $datas['thumb_3'] != '') {
				unlink($urlImageThumb_3);
			}

			$result = $this->ProductcolorModels->deleteWhere(array('id' => $id));
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
			$datas = $this->ProductcolorModels->where_in(array('id' => $val));
			$filename = $this->path_dir . $datas['image'];
			$filenamethumb = $this->path_dir . $datas['thumb'];

			if ($datas != NULL) {
				try {
					if ($datas['image'] !='') {
						if (file_exists($filename)) {
							unlink($filename);
						}
					}
					if ($datas['thumb']!='') {
						if ($filenamethumb) {
							unlink($filenamethumb);
						}
					}
				} catch (\Throwable $th) {
					throw $th;
				}

				//
				$urlImage_1 = $this->path_dir . $datas['image_1'];
				$urlImageThumb_1 = $this->path_dir . $datas['thumb_1'];
				if (file_exists($urlImage_1) && $datas['image_1'] != '') {
					unlink($urlImage_1);
				}
				if (file_exists($urlImageThumb_1) && $datas['thumb_1'] != '') {
					unlink($urlImageThumb_1);
				}
				//
				$urlImage_2 = $this->path_dir . $datas['image_2'];
				$urlImageThumb_2 = $this->path_dir . $datas['thumb_2'];
				if (file_exists($urlImage_2) && $datas['image_2'] != '') {
					unlink($urlImage_2);
				}
				if (file_exists($urlImageThumb_2) && $datas['thumb_2'] != '') {
					unlink($urlImageThumb_2);
				}
				//
				$urlImage_3 = $this->path_dir . $datas['image_3'];
				$urlImageThumb_3 = $this->path_dir . $datas['thumb_3'];
				if (file_exists($urlImage_3) && $datas['image_3'] != '') {
					unlink($urlImage_3);
				}
				if (file_exists($urlImageThumb_3) && $datas['thumb_3'] != '') {
					unlink($urlImageThumb_3);
				}
				$result = $this->ProductcolorModels->deleteWhere(array('id' => $val));
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
		$result = $this->ProductcolorModels->edit($dataUpdate, array('id' => $id));
		if ($result) {
			echo json_encode($result);
		}
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
		$result = $this->ProductcolorModels->edit($data_update, array('id' => $id));
		if ($result > 0) {
			echo json_encode(array('rs' => 1));
		}
	}
	function del_image()
	{
		$this->checkPermission();
		$id = $this->request->getPost('id');
		$datas = $this->ProductcolorModels->where_in(array('id' => $id));

		$fileName = $this->path_dir . $datas['image'];
		$fileNameThumb = $this->path_dir . $datas['thumb'];
		// explode image
		$webImages = explode(".", $datas['image']);
		$image_webp = $this->path_dir_webp . $webImages[0] . '.webp';
		// echo $image_webp;
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
			$result = $this->ProductcolorModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
	function del_image2()
	{
		$this->checkPermission();
		$id = $this->request->getPost('id');
		$image_name = $this->request->getPost('image_name');
		$thumb_name = $this->request->getPost('thumb_name');
		$datas = $this->ProductcolorModels->where_in(array('id' => $id));

		$fileName = $this->path_dir . $datas[$image_name];
		$fileNameThumb = $this->path_dir . $datas[$thumb_name];
		if ($datas != NULL) {
			try {
				if ($datas[$image_name] != '') {
					if (file_exists($fileName)) {
						unlink($fileName);
					}
				}

				if ($datas[$thumb_name] != '') {
					if (file_exists($fileNameThumb)) {
						unlink($fileNameThumb);
					}
				}
			} catch (\Throwable $th) {
				throw $th;
			}
			$data_update = array(
				$image_name	=> "",
				$thumb_name	=> "",
			);
			$result = $this->ProductcolorModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
}
