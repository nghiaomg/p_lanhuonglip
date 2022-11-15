<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\PhotoModels;
use App\Models\Upload;
use App\Models\CI_function;

class Slide extends BaseController
{
	private $title 			= 'slide';
	private $template 		= 'backend/slide/';
	var	$path_url 			= 'cpanel/slide/';
	var $path_dir 			= 'uploads/images/slide/';
	var $path_dir_webp 		= 'uploads/webps/slide/';
	var	$path_dir_thumb 	= 'uploads/images/slide/';
	var $control 			= 'slide';
	function __construct()
	{
		$this->PhotoModels  = new PhotoModels();
		$this->Upload 		= new Upload();
		$this->CI_function  = new CI_function();
	}
	public function index()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$datas 				= $this->PhotoModels->select_array('*', ["type" =>  $this->control]);

		$data_index = $this->get_indexBE();
		$data = [
			'data_index'			=> $data_index,
			'datas'					=> $datas,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir'		        => $this->path_dir,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'index'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

	function add()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$data_index 			= $this->get_indexBE();
		$sort_max 				= $this->PhotoModels->select_max_where('sort', ["type" => $this->control]);
		if ($this->request->getPost()) {
			$data_post 			= $this->request->getPost('data_post');
			$alias 				= $this->CI_function->create_alias($data_post['name']);
			// echo $alias;die;
			if ($_FILES['image']['name']) {
				$fileName		= $this->request->getFile('image');
				$path_dir 		= $this->path_dir;
				$data_upload 	= $this->Upload->upload_image($path_dir, $fileName, uniqid().'-'.$alias, 'image', 1690, 680, null, 'webp');

				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					$webps 			   = $data_upload['webps'];
					$webps_thumb	   = $data_upload['webps_thumb'];
				}
			} else {
				$image = '';
				$thumb = '';
				$webps 	= '';
				$webps_thumb = '';
			}
			$publish = 0;
			$data_post['month'] 	  = date("m");
			$data_post['year'] 		  = date("Y");
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] 	  = $publish;
			$data_post['image'] 	  = $image;
			$data_post['webps']       = $webps;
			$data_post['webps_thumb'] = $webps_thumb;
			$data_post['sort'] 		  = $sort_max['sort'] + 1;
			$data_post['thumb'] 	  = $thumb;
			$data_post['type']        = $this->control;
			$data_post['created_at']  = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result = $this->PhotoModels->add($data_post);
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control))->with('success', ADD_SUCCESS);
			}
		}
		$data = [
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

	public function edit($id)
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$data_index 	= $this->get_indexBE();
		$datas 			= $this->PhotoModels->find_one($id);
		$image 			= $this->path_dir . $datas['image'];
		$imagethumb 	= $this->path_dir . $datas['thumb'];
		// webp
		$image_webp 	= explode(".", $datas['image']);
		$thumb_webp 	= explode(".", $datas['thumb']);
		// 
		$webps_image 	= $this->path_dir_webp . $image_webp[0] . '.webp';
		$webps_thumb 	=  $this->path_dir_webp . $thumb_webp[0] . '.webp';
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$alias = $this->CI_function->create_alias($data_post['name']);
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
				if (file_exists($webps_image)) {
					unlink($webps_image);
				}
				if (file_exists($webps_thumb)) {
					unlink($webps_thumb);
				}
				$fileName 		= $this->request->getFile('image');
				$path_dir 		= $this->path_dir;
				$data_upload 	= $this->Upload->upload_image($path_dir, $fileName, uniqid().'-'.$alias, 'image', 1690, 680, null, 'webp');
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					$webps 			   = $data_upload['webps'];
					$webps_thumb	   = $data_upload['webps_thumb'];
				}
			} else {
				$image 			  = $datas['image'];
				$thumb 			  = $datas['thumb'];
				$webps            = $datas['webps'];
				$webps_thumb      = $datas['webps_thumb'];
			}

			$data_post['month']   			= date("m");
			$data_post['year'] 				= date("Y");
			isset($data_post['publish']) ? $publish  = 1 : $publish = 0;
			$data_post['publish'] 			= $publish;
			$data_post['image'] 			= $image;
			$data_post['thumb'] 			= $thumb;
			$data_post['webps']             = $webps;
			$data_post['webps_thumb']       = $webps_thumb;
			$data_post['type']              = $this->control;
			$data_post['updated_at'] 		= gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result 						= $this->PhotoModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control))->with('success', EDIT_SUCCESS);
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
		$id 				= $_POST['id'];
		$datas 				= $this->PhotoModels->where_in(array('id' => $id));
		$filename 			= $this->path_dir . $datas['image'];

		// echo $filename;
		$filenamethumb 		= $this->path_dir . $datas['thumb'];
		// echo $filenamethumb;
		$web_image 			= explode('.', $datas['image']);
		$web_thumb 			= explode('.', $datas['thumb']);
		// images
		// == Năm
		$YearFolder 		= glob($this->path_dir . $datas['year'] . '*');
		// == tháng
		$MonthFolder 		= glob($this->path_dir . $datas['year'] . '*' . '/' . $datas['month'] . '/*');
		// == folder năm
		$YearFolder_wp 		= glob($this->path_dir_webp . $datas['year'] . '*');
		// == folder tháng
		$MonthFolder_wp 	= glob($this->path_dir_webp . $datas['year'] . '*' . '/' . $datas['month'] . '/*');
		// echo "<pre>";
		// print_r($thumbFolder_wp);
		$fileNamewebp 		= $this->path_dir_webp . $web_image[0] . '.webp';
		// echo $fileNamewebp.'<br>';
		$fileNamewebp_thumb =  $this->path_dir_webp . $web_thumb[0] . '.webp';
		// echo $fileNamewebp_thumb;
		if ($datas != NULL && $datas['image'] != NULL && $datas['thumb'] != NULL) {
			if (file_exists($filename) && file_exists($filenamethumb)) {
				unlink($filename);
				unlink($fileNamewebp);
				unlink($filenamethumb);
				unlink($fileNamewebp_thumb);
				//  folder thumb
				$thumbFolder 	= glob($this->path_dir . $datas['year'] . '*' . '/' . $datas['month'] . '/thumb/*');
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
			// $alias 	= $this->AliasModels->deleteWhere(array('alias'=>$datas['alias']));
			$result = $this->PhotoModels->deleteWhere(array('id' => $id));
		} else {
			// $alias  = $this->AliasModels->deleteWhere(array('alias'=>$datas['alias']));
			$result = $this->PhotoModels->deleteWhere(array('id' => $id));
		}
	}
	function deleteAll()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$list_id 			= $this->request->getPost('list_id');
		$list_id_delete 	= explode(',', $list_id);
		foreach ($list_id_delete as $key => $val) {
			$datas 			= $this->PhotoModels->where_in(array('id' => $val));
			$filename 		= $this->path_dir . $datas['image'];
			$filenamethumb  = $this->path_dir_thumb . $datas['thumb'];
			$web_image 		= explode('.', $datas['image']);
			$web_thumb 		= explode('.', $datas['thumb']);
			// webp
			$fileNamewebp   = $this->path_dir . $web_image[0] . '.webp';
			$fileNamewebp_thumb =  $this->path_dir . $web_thumb[0] . '.webp';
			if ($datas != NULL) {
				if (file_exists($filename) && file_exists($filenamethumb)) {
					unlink($filename);
					unlink($fileNamewebp);
					unlink($filenamethumb);
					unlink($fileNamewebp_thumb);
				}
				// $alias 	= $this->AliasModels->deleteWhere(array('alias'=>$datas['alias']));
				$result = $this->PhotoModels->deleteWhere(array('id' => $val));
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
		$id 			= $this->request->getVar('id');
		$global 		= $this->request->getVar('global');
		$properties 	= $this->request->getVar('properties');
		$dataUpdate[$properties] = $global;
		$result 		= $this->PhotoModels->edit($dataUpdate, array('id' => $id));
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
		$id 		= $_POST['id'];
		$sort 		= $_POST['sort'];
		$data_update['sort'] = $sort;
		$result 	= $this->PhotoModels->edit($data_update, array('id' => $id));
		if ($result > 0) {
			echo json_encode(array('rs' => 1));
		}
	}
	function del_image()
	{
		$id 			= $this->request->getPost('id');
		$datas 			= $this->PhotoModels->where_in(array('id' => $id));

		$fileName 		= $this->path_dir . $datas['image'];
		$fileNameThumb  = $this->path_dir . $datas['thumb'];
		// explode image
		$webImages		= explode(".", $datas['image']);
		$image_webp 	= $this->path_dir_webp . $webImages[0] . '.webp';
		// echo $image_webp;
		$webImagesThumb 	= explode(".", $datas['thumb']);
		$image_webp_thumb   = $this->path_dir_webp . $webImagesThumb[0] . '.webp';
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
			$result = $this->PhotoModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
}
