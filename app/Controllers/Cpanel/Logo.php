<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\PhotoModels;
use App\Models\Upload;

class Logo extends BaseController
{
	private $title = 'logo';
	private $template = 'backend/logo/';
	public	$path_url = 'cpanel/logo/';
	public $path_dir = 'uploads/images/logo/';
	public $path_dir_webp = 'uploads/webps/logo/';
	public	$path_dir_thumb = 'uploads/images/logo/';
	public $control = 'logo';

	function __construct()
	{
		$this->PhotoModels = new PhotoModels();
		$this->Upload = new Upload();
	}

	public function index()
	{
		if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
		$this->checkPermission();

		$datas 			= $this->PhotoModels->where_in(array('type' => $this->control));
		$validation 	=  \Config\Services::validation();
		$imageUpload 	= '';
		$image_footer 	= '';

		if ($this->request->getPost()) {
			$data = $this->PhotoModels->where_in(array('type' => 'logo'));
			$files = $this->path_dir . $data['image'];

			$files_thumb =  $this->path_dir_thumb . $data['thumb'];
			if ($_FILES['image']['name']) {
				try {
					if (file_exists($files)) {
						if ($data['image'] != '') {
							unlink($files);
						}
					}
					// 
					if (file_exists($files_thumb)) {
						if ($data['thumb'] != '') {
							unlink($files_thumb);
						}
					}
				} catch (\Throwable $th) {
					var_dump($th);
				}

				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				// xem kích thước của hình ảnh
				$size = getimagesize($fileName);

				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $_FILES['image']['name'], 'image', 300, 300, null, 'webp');
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
				$image = $data['image'];
				$thumb = $data['thumb'];
				$webps            = $datas['webps'];
				$webps_thumb      =  $datas['webps_thumb'];
			}
			$publish			  = 0;
			$data_post 						= $this->request->getPost('data_post');
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] 			= $publish;
			$data_post['image'] 			= $image;
			$data_post['thumb'] 			= $thumb;
			$data_post['webps']             = $webps;
			$data_post['webps_thumb']       = $webps_thumb;
			$data_post['month'] 			= date("m");
			$data_post['year'] 				= date("Y");
			$result 						= $this->PhotoModels->edit($data_post, array('type' => 'logo'));
			if ($result) {
				return redirect()->to(base_url(CPANEL . '/logo/index'))->with('success', EDIT_SUCCESS);
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
			'template'				=> $this->template . 'index'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

	function del_image()
	{
		$this->checkPermission();

		$id 	= $this->request->getPost('id');
		$datas  = $this->PhotoModels->where_in(array('id' => $id, 'type' => 'logo'));

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
			$data_update = array(
				'image'	=> "",
				'thumb'	=> "",
			);
			$result = $this->PhotoModels->edit($data_update, array('id' => $id, 'type' => 'logo'));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
}
