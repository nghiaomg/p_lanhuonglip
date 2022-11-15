<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\ContentsModels;
use App\Models\Upload;

class Banner extends BaseController
{
	private $title = 'banner';
	private $template = 'backend/banner/';
	public	$path_url = 'cpanel/banner/';
	public $path_dir = 'uploads/images/banner/';
	public $path_dir_webp = 'uploads/webps/banner/';
	public	$path_dir_thumb = 'uploads/images/banner/';
	public $control = 'banner';

	function __construct()
	{
		$this->ContentsModels 	= new ContentsModels();
		$this->Upload 			= new Upload();
	}

	public function index()
	{
		if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
		$this->checkPermission();

		$datas_js 			= $this->ContentsModels->where_in(array('key' => $this->control));
		$datas = [];
		if ($datas_js != NULL && $datas_js['content'] !='' && $datas_js['content']  != NULL) {
			$datas = json_decode($datas_js['content'],true);
		}
		$validation 	=  \Config\Services::validation();

		if ($this->request->getPost()) {
			
			$files = $this->path_dir . $datas['image'];
			$files_thumb =  $this->path_dir_thumb . $datas['thumb'];
			$webps =  $datas['webps'];
			$webps_thumb =  $datas['webps_thumb'];
			if ($_FILES['image']['name']) {
				try {
					if (file_exists($files)) {
						if ($datas['image'] != '') {
							unlink($files);
						}
					}
					// 
					if (file_exists($files_thumb)) {
						if ($datas['thumb'] != '') {
							unlink($files_thumb);
						}
					}
					if (file_exists($webps_thumb)) {
						if ($datas['webps_thumb'] != '') {
							unlink($webps_thumb);
						}
					}
					if (file_exists($webps)) {
						if ($datas['webps'] != '') {
							unlink($webps);
						}
					}
				} catch (\Throwable $th) {
					var_dump($th);
				}

				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				// xem kích thước của hình ảnh
				$size = getimagesize($fileName);

				$data_upload = $this->Upload->upload_image($path_dir, $fileName, uniqid().$_FILES['image']['name'], 'image', 800, 800, null, 'webp');
				if ($data_upload['image'] == NULL) {
					return redirect()->to(base_url(CPANEL . '/logo/index'))->with('error', $data_upload['message']);
				} else {
					$image =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb =  date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					$webps 			   = $data_upload['webps'];
					$webps_thumb	   = $data_upload['webps_thumb'];
					// echo $thumb;die;
				}
			} else {
				$image = $datas['image'];
				$thumb = $datas['thumb'];
				$webps            = $datas['webps'];
				$webps_thumb      =  $datas['webps_thumb'];
			}
		
			$data_post 						= $this->request->getPost('data_post');
			$data_properties 				= $this->request->getPost('data_properties');
			if (isset($data_properties) && $data_properties != NULL) {
				$data_post['array_properties']  = $data_properties;
			}
			$data_post['image'] 			= $image;
			$data_post['thumb'] 			= $thumb;
			$data_post['webps']             = $webps;
			$data_post['webps_thumb']       = $webps_thumb;
			$data_update['key'] 			= $this->control;
			
			$data_update['content'] = json_encode($data_post);
			
			if ($datas == NULL) {
				$result 	= $this->ContentsModels->add($data_update);
			}
			else{
				$result 	= $this->ContentsModels->edit($data_update, array('key' => $this->control));
			}
			if ($result) {
				return redirect()->to(base_url(CPANEL .'/'.$this->control. '/index'))->with('success', EDIT_SUCCESS);
			}
		}
		$data_index = $this->get_indexBE();
		$data = [
			'data_index'			=> $data_index,
			'datas'					=> $datas,
			'validation'			=> $this->validator,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir_thumb'		=> $this->path_dir,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'index',
			'datas_js'				=> $datas_js
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

	function del_image()
	{
		$this->checkPermission();

		$id 	= $this->request->getPost('id');
		$datas_js  = $this->ContentsModels->where_in(array('id' => $id, 'key' => $this->control));
		$datas = [];
		if ($datas_js != NULL && $datas_js['content'] !='' && $datas_js['content']  != NULL) {
			$datas = json_decode($datas_js['content'],true);
		}
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
				var_dump($th);
			}
			$data_contents = array(
				'des'				=> $datas['des'],
				'array_properties'	=> $datas['array_properties'],
				'image'	=> "",
				'thumb'	=> "",
				'webps'	=> "",
				'webps_thumb'	=> "",
			);
			$data_update['content'] = json_encode($data_contents);
			$result = $this->ContentsModels->edit($data_update, array('id' => $id, 'key' => $this->control));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
}
