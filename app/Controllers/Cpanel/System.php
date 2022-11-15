<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\SystemModels;
use App\Models\Upload;

class System extends BaseController
{
	private $title 		 	 = 'System';
	private $template  	 	 = 'backend/system/';
	public  $control 		 = 'system/';
	public	$path_url 		 = 'cpanel/favicon/';
	public  $path_dir 		 = 'uploads/images/favicon/';
	public  $path_dir_social = 'uploads/images/social/';
	public  $path_dir_footer = 'uploads/images/footer/';
	public  $path_file 		 = 'uploads/files/';

	// var	$path_dir_thumb = 'uploads/images/favicon/';
	function __construct()
	{
		$this->SystemModels = new SystemModels();
		$this->Upload = new Upload();
	}

	public function index()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}

		$this->checkPermission();

		$data_index   = $this->get_indexBE();
		$datas 		  = $this->SystemModels->where_in(array('type' => 'system'));
		$dataContents = json_decode($datas['contents'], true);
		$files 		  = $this->path_dir . $dataContents['image'];
		$files_thumb  = $this->path_dir . 'thumb/' . $dataContents['thumb'];

		if ($this->request->getPost()) {
			// favicon =======================================================
			if ($_FILES['image']['name']) {
				try {
					if (file_exists($files)) {
						if ($dataContents['image'] != '') {
							unlink($files);
						}
					}
					// 
					if (file_exists($files_thumb)) {
						if ($dataContents['thumb'] != '') {
							unlink($files_thumb);
						}
					}
				} catch (\Throwable $th) {
					//throw $th;
				}
				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, 'favicon', 'favicon', 100, 100, null, null);
				if ($data_upload['type'] == "error") {
					return redirect()->to(base_url(CPANEL . $this->control . 'index'))->with('error', $data_upload['message']);
				} else {
					$image =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$image_thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$image = $dataContents['image'];
				$image_thumb = $dataContents['thumb'];
			}

			// social images =====================================================
			$files_social = $this->path_dir_social . $dataContents['image_social'];
			$files_thumb_social = $this->path_dir_social . 'thumb/' . $dataContents['thumb_social'];
			if ($_FILES['image_social']['name']) {
				try {
					if (file_exists($files_social)) {
						if ($dataContents['image_social'] != '') {
							unlink($files_social);
						}
					}
					if (file_exists($files_thumb_social)) {
						if ($dataContents['thumb_social'] != '') {
							unlink($files_thumb_social);
						}
					}
				} catch (\Throwable $th) {
					throw $th;
				}
				$file_social = $this->request->getFile('image_social');
				$path_dir_social = $this->path_dir_social;
				$data_upload = $this->Upload->upload_image($path_dir_social, $file_social, 'social', 'social', 100, 100, null, null);
				if ($data_upload['type'] == "error") {
					return redirect()->to(base_url(CPANEL . $this->control . 'index'))->with('error', $data_upload['message']);
				} else {
					$image_social =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$image_thumb_social = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$image_social = $dataContents['image_social'];
				$image_thumb_social = $dataContents['thumb_social'];
			}
			// 
			$data_post 				 	= $this->request->getPost('data_post');
			$data_post['image'] 		= $image;
			$data_post['thumb'] 		= $image_thumb;
			$data_post['image_social'] 	= $image_social;
			$data_post['thumb_social'] 	= $image_thumb_social;
			$data_post['month'] 		= date("m");
			$data_post['year'] 		 	= date("Y");
			$contents 				 	= json_encode($data_post);
			$data_update['contents'] 	= $contents;
			$result 					= $this->SystemModels->edit($data_update, array('type' => 'system'));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . 'index'))->with('success', EDIT_SUCCESS);
			}
		}

		// contact
		$contact = $this->SystemModels->where_in(array('type' => 'contact'));
		$contact_js = json_decode($contact['contents'], true);
		// google
		$google = $this->SystemModels->where_in(array('type' => 'google'));
		$google_js = json_decode($google['contents'], true);
		
		// content home
		$homeContent = $this->SystemModels->where_in(array('type' => 'home'));
		$home = json_decode($homeContent['contents'], true);
		$sitemap = 'sitemap.xml';
		// social
		$social	= NULL;
		$social_js 		= $this->SystemModels->where_in(array('type'=>'social'));
		if($social_js != NULL)
		{	
			$social			= json_decode($social_js['contents'],true);
		}
		// slogan
		$slogan	= NULL;
		$slogan_js 		= $this->SystemModels->where_in(array('type'=>'slogan'));
		if($slogan_js != NULL)
		{	
			$slogan			= json_decode($slogan_js['contents'],true);
		}
		$info = $this->SystemModels->select_row('*',['type' => 'info']);
		$info_js = [];
		if ($info != NULL) {
			$info_js = json_decode($info['contents'],true);
		}
		//
		$footer_bner = $this->SystemModels->select_row('*',['type' => 'bannerfooter']); 
		$banner_js = [];
		if ($footer_bner != NULL) {
			$banner_js = json_decode($footer_bner['contents'],true);
		}
		// flashsale
		$flashsale = $this->SystemModels->select_row('*',['type' => 'flashsale']);
		$flashsale_js = [];
		if ($flashsale != NULL) {
			$flashsale_js = json_decode($flashsale['contents'],true);
		}
		$data = array(
			'home'				=> $home,
			'sitemap'			=> $sitemap,
			'data_index'		=>	$data_index,
			'template'			=> $this->template . 'index',
			'datas'				=> $dataContents,
			'contact'			=> $contact_js,
			'google'			=> $google_js,
			'title'				=> $this->title,
			'control'			=> $this->control,
			'path_dir_thumb'	=> $this->path_dir,
			'path_dir_social'	=> $this->path_dir_social,
			'path_dir_footer'	=> $this->path_dir_footer,
			'social'			=> $social,
			'slogan'			=> $slogan,
			'info_js'			=> $info_js,
			'banner_js'			=> $banner_js,
			'flashsale_js'		=> $flashsale_js
		);
		return view('backend/default', isset($data) ? $data : NULL);
	}

	function contact()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		if ($this->request->getPost()) {
			if ($this->checkPermission() != "") {
				return $this->checkPermission();
			} else {
				$data_post 				 = $this->request->getPost('data_post');
				isset($data_post['turn_off_chatbox'])?$turn_off = 1:$turn_off = 0;
				$data_post['turn_off_chatbox'] = $turn_off;
				$contents  				 = json_encode($data_post);
				$data_update['contents'] = $contents;
				$result					 = $this->SystemModels->edit($data_update, array('type' => 'contact'));
				if ($result['type'] == "successful") {
					return redirect()->to(base_url(CPANEL . '/system/index'))->with('success', EDIT_SUCCESS);
				}
			}
		}
	}

	function google()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		if ($this->request->getPost()) {
			if ($this->checkPermission() != "") {
				return $this->checkPermission();
			} else {
				if ($_FILES['sitemaps']['name']) {
					if ($_FILES['sitemaps']['type'] == "text/xml") {
						if (!empty($_FILES['sitemaps'])) {
							$destination_folder = $_SERVER['DOCUMENT_ROOT'];
							$files = $destination_folder . '/sitemap.xml';
							if (file_exists($files)) {
								unlink($files);
							}
							$sitemaps = '';
							$path = $destination_folder . '/' . $_FILES['sitemaps']['name'];
							// echo $path;die;
							if (move_uploaded_file($_FILES['sitemaps']['tmp_name'], $path)) {
								$sitemaps = basename($_FILES['sitemaps']['name']);
								// echo 1;die;

							} else {
								echo "Upload sitemap.html lỗi!";
								die;
							}
						}
					} else {
						return redirect()->to(base_url(CPANEL . '/system/index'))->with('error', "Không đúng định dạng File XML");
					}
				}
				else{
					$sitemaps = 'sitemap.xml';
				}
				$data_post 					= $this->request->getPost('data_post');
				$data_post['sitemaps'] 		= $sitemaps;
				$contents 					= json_encode($data_post);
				$data_update['contents']	= $contents;
				$result 					= $this->SystemModels->edit($data_update, array('type' => 'google'));

				if ($result['type'] == "successful") {
					return redirect()->to(base_url(CPANEL . '/system/index'))->with('success', EDIT_SUCCESS);
				}
			}
		}
	}

	function unlink_Site_map()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$destination_folder = $_SERVER['DOCUMENT_ROOT'];
		$path2 = 'sitemap.xml';
		unlink($path2);
		return redirect()->to(base_url(CPANEL . '/system/index'))->with('success', "đã xóa Site Map");
	}

	function del_image()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		$id = $this->request->getPost('id');
		$contents = $this->SystemModels->where_in(array('type' => 'system'));
		$datas = json_decode($contents['contents'], true);

		$fileName = $this->path_dir . $datas['image'];
		$fileNameThumb = $this->path_dir . $datas['thumb'];
		if ($datas != NULL) {
			try {
				if ($datas['image'] != '') {
					if (file_exists($fileName)) {
						unlink($fileName);
					}
				}
				if ($datas['thumb'] != '') {
					if (file_exists($fileNameThumb)) {
						unlink($fileNameThumb);
					}
				}
			} catch (\Throwable $th) {
				throw $th;
			}
			$data_post['image'] 			= "";
			$data_post['thumb'] 			= "";
			$data_post['image_social']  	= $datas['image_social'];
			$data_post['thumb_social']  	= $datas['thumb_social'];
			$data_post['month'] 			= date("m");
			$data_post['year'] 				= date("Y");
			$data_post['title'] 			= $datas['title'];
			$data_post['meta_keyword'] 		= $datas['meta_keyword'];
			$data_post['meta_description']  = $datas['meta_description'];
			$data_post['key_map'] 			= $datas['key_map'];
			$data_post['email_take'] 		= $datas['email_take'];
			$data_post['schema'] 			= $datas['schema'];
			$contents 						= json_encode($data_post);
			$data_update['contents'] 		= $contents;
			$result 						= $this->SystemModels->edit($data_update, array('type' => 'system'));
			if ($result) {
				echo json_encode(array(
					'result' 	=> "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}

	function del_social()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		$id = $this->request->getPost('id');
		$contents = $this->SystemModels->where_in(array('type' => 'system'));
		$datas = json_decode($contents['contents'], true);

		$fileName = $this->path_dir_social . $datas['image_social'];
		$fileNameThumb = $this->path_dir_social . $datas['thumb_social'];
		if ($datas != NULL) {
			try {
				if ($datas['image'] != '') {
					if (file_exists($fileName)) {
						unlink($fileName);
					}
				}
				if ($datas['thumb'] != '') {
					if (file_exists($fileNameThumb)) {
						unlink($fileNameThumb);
					}
				}
			} catch (\Throwable $th) {
				throw $th;
			}
			$data_post['image'] = $datas['image'];
			$data_post['thumb'] = $datas['thumb'];
			$data_post['image_social'] = "";
			$data_post['thumb_social'] = "";
			$data_post['month'] = date("m");
			$data_post['year'] = date("Y");
			$data_post['title'] = $datas['title'];
			$data_post['meta_keyword'] = $datas['meta_keyword'];
			$data_post['meta_description'] = $datas['meta_description'];
			$data_post['key_map'] = $datas['key_map'];
			$data_post['email_take'] = $datas['email_take'];
			$data_post['schema'] = $datas['schema'];
			$contents = json_encode($data_post);
			$data_update['contents'] = $contents;
			$result = $this->SystemModels->edit($data_update, array('type' => 'system'));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}

	function del_image_footer()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		$contents = $this->SystemModels->where_in(array('type' => 'footer'));
		$datas = json_decode($contents['contents'], true);

		$fileName = $this->path_dir_social . $datas['image_footer'];
		$fileNameThumb = $this->path_dir_social . $datas['thumb_footer'];
		if ($datas != NULL) {
			try {
				if ($datas['image_footer'] != '') {
					if (file_exists($fileName)) {
						unlink($fileName);
					}
				}
				if ($datas['thumb_footer'] != '') {
					if (file_exists($fileNameThumb)) {
						unlink($fileNameThumb);
					}
				}
			} catch (\Throwable $th) {
				throw $th;
			}
			$datas['image_footer'] = '';
			$datas['thumb_footer'] = '';
			
			$contents = json_encode($datas);
			$data_update['contents'] = $contents;
			$result = $this->SystemModels->edit($data_update, array('type' => 'footer'));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}


	function contentHome()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		if ($this->request->getPost()) {
			if ($this->checkPermission() != "") {
				return $this->checkPermission();
			} else {
				$data_post 				 = $this->request->getPost('data_post');
				$contents  				 = json_encode($data_post);
				$data_update['contents'] = $contents;
				$result 				 = $this->SystemModels->edit($data_update, array('type' => 'home'));

				if ($result['type'] == "successful") {
					return redirect()->to(base_url(CPANEL . '/system/index'))->with('success', EDIT_SUCCESS);
				}
			}
		}
	}

	function social()
	{
		if (!session('logged_in') == true) {return redirect()->to(base_url('cpanel/login.html'));}
		if ($this->request->getPost()) {
			$data 					 = $this->SystemModels->select_row('*',array('type'=>'social'));
			$data_post 				 = $this->request->getPost('data_post');
			$contents 				 = json_encode($data_post);
			$data_update['contents'] = $contents;
			if($data == NULL)
			{
				$result 			 = $this->SystemModels->add(['type' => 'social', 'contents' => $contents ]);
			}else
			{
				$result 			 = $this->SystemModels->edit($data_update,array('type'=>'social'));
			}
		
			if ($result['type'] =="successful") {
				return redirect()->to(base_url(CPANEL.'/system/index'))->with('success',EDIT_SUCCESS);
			}
		}
	}
	function slogan()
	{
		if (!session('logged_in') == true) {return redirect()->to(base_url('cpanel/login.html'));}
		if ($this->request->getPost()) {
			$data 					 = $this->SystemModels->select_row('*',array('type'=>'slogan'));
			$data_post 				 = $this->request->getPost('data_post');
			$contents 				 = json_encode($data_post);
			$data_update['contents'] = $contents;
			if($data == NULL)
			{
				$result 			 = $this->SystemModels->add(['type' => 'slogan', 'contents' => $contents ]);
			}else
			{
				$result 			 = $this->SystemModels->edit($data_update,array('type'=>'slogan'));
			}
		
			if ($result['type'] =="successful") {
				return redirect()->to(base_url(CPANEL.'/system/index'))->with('success',EDIT_SUCCESS);
			}
		}
	}
	function info(){
		$datas = $this->SystemModels->select_row('*',['type' => 'info']);
		$info = [];
		if ($datas != NULL) {
			$info = json_decode($datas['contents'],true);
		}
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			// ============ background ================
			if ($_FILES['image_bg']['name'])
			{
				$path_dir_bg = 'uploads/images/bg/';
				if (!is_dir($path_dir_bg)) {
					mkdir($path_dir_bg);
				}
				// ======= check bg old
				$bg_old = $path_dir_bg.$info['image_bg'];
				$bg_old_thumb = $path_dir_bg.$info['image_thumb_bg'];
				// 
				if ($info['image_bg'] !='' && $info['image_bg'] != NULL) {
					if (file_exists($bg_old)) {
						unlink($bg_old);
					}
				}
				if ($info['image_thumb_bg'] !='' && $info['image_thumb_bg'] != NULL) {
					if (file_exists($bg_old_thumb)) {
						unlink($bg_old_thumb);
					}
				}
				// 
				$file_info = $this->request->getFile('image_bg');
				$data_upload = $this->Upload->upload_image($path_dir_bg, $file_info, uniqid().'.'.rand(0,9999), 'bg', 1900, 200, null, null);
				if ($data_upload['type'] == "error")
				{
					return redirect()->to(base_url(CPANEL . $this->control . 'index'))->with('error', $data_upload['message']);
				}
				else
				{
					$image_bg=  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$image_thumb_bg = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			}
			else
			{
				$image_bg 		=	$info['image_bg'];
				$image_thumb_bg =  	$info['image_thumb_bg'];
			}
			$data_post['image_bg'] 			= $image_bg;
			$data_post['image_thumb_bg'] 	= $image_thumb_bg;
			// ================= Logo left ====================
			if ($_FILES['image_left']['name'])
			{
				$path_dir_left = 'uploads/images/logoleft/';
				// ======= check bg old
				$image_left_old = $path_dir_left.$info['image_left'];
				$image_left_old_thumb = $path_dir_left.$info['image_thumb_left'];
				// 
				if ($info['image_left'] !='' && $info['image_left'] != NULL) {
					if (file_exists($image_left_old)) {
						unlink($image_left_old);
					}
				}
				if ($info['image_thumb_left'] !='' && $info['image_thumb_left'] != NULL) {
					if (file_exists($image_left_old_thumb)) {
						unlink($image_left_old_thumb);
					}
				}
				$file_info = $this->request->getFile('image_left');
				$data_upload = $this->Upload->upload_image($path_dir_left, $file_info, uniqid().'.'.rand(0,9999), 'icon', 200, 200, null, null);
				if ($data_upload['type'] == "error")
				{
					return redirect()->to(base_url(CPANEL . $this->control . 'index'))->with('error', $data_upload['message']);
				}
				else
				{
					$image_left =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$image_thumb_left = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			}
			else
			{
				$image_left 		= $info['image_left'];
				$image_thumb_left 	= $info['image_thumb_left'];
			}
			$data_post['image_left'] 			= $image_left;
			$data_post['image_thumb_left'] 		= $image_thumb_left;
			// ================= Logo right ====================
			if ($_FILES['image_logo_right']['name'])
			{
				$path_dir_right = 'uploads/images/logoright/';
				// ======= check bg old
				$image_right_old = $path_dir_right.$info['image_right'];
				$image_right_old_thumb = $path_dir_right.$info['image_thumb_right'];
				// 
				if ($info['image_right'] !='' && $info['image_right'] != NULL) {
					if (file_exists($image_right_old)) {
						unlink($image_right_old);
					}
				}
				if ($info['image_thumb_right'] !='' && $info['image_thumb_right'] != NULL) {
					if (file_exists($image_right_old_thumb)) {
						unlink($image_right_old_thumb);
					}
				}
				// =====================
				$file_info = $this->request->getFile('image_logo_right');
				$data_upload = $this->Upload->upload_image($path_dir_right, $file_info, uniqid().'.'.rand(0,9999), 'icon', 200, 200, null, null);
				if ($data_upload['type'] == "error")
				{
					return redirect()->to(base_url(CPANEL . $this->control . 'index'))->with('error', $data_upload['message']);
				}
				else
				{
					$image_right =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$image_thumb_right = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			}
			else
			{
				$image_right 		= $info['image_right'];
				$image_thumb_right = $info['image_thumb_right'];
			}
			$data_post['image_right'] 			= $image_right;
			$data_post['image_thumb_right'] 	= $image_thumb_right;
			$contents = json_encode($data_post);
			$data_add['contents'] = $contents;
			$data_add['type'] = 'info';
			if ($datas == NULL) {
				$result = $this->SystemModels->add($data_add);
			}
			else{
				$result = $this->SystemModels->edit($data_add,['type' => 'info']);
			}
			if ($result['type'] =="successful") {
				return redirect()->to(base_url(CPANEL.'/system/index'))->with('success',EDIT_SUCCESS);
			}
		}
	}
	function delete_images(){
		$type = $_POST['type'];
		$datas = $this->SystemModels->select_row('*',['type' => 'info']);
		$info = [];
		if ($datas != NULL) {
			$info = json_decode($datas['contents'],true);
		}
		if ($type == 'left') {
			$path_dir_left = 'uploads/images/logoleft/';
			// ================ check bg old ==================
			$image_left_old = $path_dir_left.$info['image_left'];
			$image_left_old_thumb = $path_dir_left.$info['image_thumb_left'];
			// ================================================
			if ($info['image_left'] !='' && $info['image_left'] != NULL) {
				if (file_exists($image_left_old)) {
					unlink($image_left_old);
				}
			}
			if ($info['image_thumb_left'] !='' && $info['image_thumb_left'] != NULL) {
				if (file_exists($image_left_old_thumb)) {
					unlink($image_left_old_thumb);
				}
			}
			$images_left = '';
			$images_thumb_left = '';
			// ============
			$data_post['title'] 				= $info['title'];
			$data_post['des'] 					= $info['des'];
			$data_post['text_btn'] 				= $info['text_btn'];
			$data_post['link'] 					= $info['link'];
			$data_post['link_website'] 			= $info['link_website'];
			$data_post['title_between'] 		= $info['title_between'];
			$data_post['des_between'] 			= $info['des_between'];
			$data_post['title_right'] 			= $info['title_right'];
			$data_post['phone'] 				= $info['phone'];
			$data_post['website'] 				= $info['website'];
			// images left
			$data_post['image_thumb_left'] 		= $images_thumb_left;
			$data_post['image_left'] 			= $images_left;
			// images right
			$data_post['image_right'] 			= $info['image_right'];
			$data_post['image_thumb_right'] 	= $info['image_thumb_right'];
			// bg
			$data_post['image_bg'] 				= $info['image_bg'];
			$data_post['image_thumb_bg'] 		= $info['image_thumb_bg'];
			$contents = json_encode($data_post);
			$data_add['contents'] = $contents;
			$result = $this->SystemModels->edit($data_add,['type' => 'info']);
			if ($result['type'] =="successful") {
				echo json_encode(
					[
						'type'		=> $type,
						'result'	=> '200'
					]
				);
			}
		}
		// ======================= bg ====================
		if ($type == 'bg') {
			$path_dir_bg = 'uploads/images/bg/';
			// ================ check bg old ==================
			$image_bg_old = $path_dir_bg.$info['image_bg'];
			$image_bg_old_thumb = $path_dir_bg.$info['image_thumb_bg'];
			// ================================================
			if ($info['image_bg'] !='' && $info['image_bg'] != NULL) {
				if (file_exists($image_bg_old)) {
					unlink($image_bg_old);
				}
			}
			if ($info['image_thumb_bg'] !='' && $info['image_thumb_bg'] != NULL) {
				if (file_exists($image_bg_old_thumb)) {
					unlink($image_bg_old_thumb);
				}
			}
		
			// ============
			$data_post['title'] 				= $info['title'];
			$data_post['des'] 					= $info['des'];
			$data_post['text_btn'] 				= $info['text_btn'];
			$data_post['link'] 					= $info['link'];
			$data_post['title_between'] 		= $info['title_between'];
			$data_post['des_between'] 			= $info['des_between'];
			$data_post['title_right'] 			= $info['title_right'];
			$data_post['phone'] 				= $info['phone'];
			$data_post['website'] 				= $info['website'];
			$data_post['link_website'] 			= $info['link_website'];
			// images left
			$data_post['image_thumb_left'] 		= $info['image_thumb_left'];
			$data_post['image_left'] 			= $info['image_left'];
			// images right
			$data_post['image_right'] 			= $info['image_right'];
			$data_post['image_thumb_right'] 	= $info['image_thumb_right'];
			// bg
			$data_post['image_bg'] 				= '';
			$data_post['image_thumb_bg'] 		= '';
			$contents = json_encode($data_post);
			$data_add['contents'] = $contents;
			$result = $this->SystemModels->edit($data_add,['type' => 'info']);
			if ($result['type'] =="successful") {
				echo json_encode(
					[
						'type'		=> $type,
						'result'	=> '200'
					]
				);
			}
		}
		// ======================= right ====================
		if ($type == 'right') {
			$path_dir_right = 'uploads/images/logoright/';
			// ================ check bg old ==================
			$image_right_old = $path_dir_right.$info['image_right'];
			$image_right_old_thumb = $path_dir_right.$info['image_thumb_right'];
			// ================================================
			if ($info['image_right'] !='' && $info['image_right'] != NULL) {
				if (file_exists($image_right_old)) {
					unlink($image_right_old);
				}
			}
			if ($info['image_thumb_right'] !='' && $info['image_thumb_right'] != NULL) {
				if (file_exists($image_right_old_thumb)) {
					unlink($image_right_old_thumb);
				}
			}
			// ============
			$data_post['title'] 				= $info['title'];
			$data_post['des'] 					= $info['des'];
			$data_post['text_btn'] 				= $info['text_btn'];
			$data_post['link'] 					= $info['link'];
			$data_post['title_between'] 		= $info['title_between'];
			$data_post['des_between'] 			= $info['des_between'];
			$data_post['title_right'] 			= $info['title_right'];
			$data_post['phone'] 				= $info['phone'];
			$data_post['website'] 				= $info['website'];
			$data_post['link_website'] 			= $info['link_website'];
			// images left
			$data_post['image_thumb_left'] 		= $info['image_thumb_left'];
			$data_post['image_left'] 			= $info['image_left'];
			// images right
			$data_post['image_right'] 			= '';
			$data_post['image_thumb_right'] 	= '';
			// bg
			$data_post['image_bg'] 				= $info['image_bg'];
			$data_post['image_thumb_bg'] 		=  $info['image_thumb_bg'];
			$contents = json_encode($data_post);
			$data_add['contents'] = $contents;
			$result = $this->SystemModels->edit($data_add,['type' => 'info']);
			if ($result['type'] =="successful") {
				echo json_encode(
					[
						'type'		=> $type,
						'result'	=> '200'
					]
				);
			}
		}
	}
	function bannerFooter(){
		$datas = $this->SystemModels->select_row('*',['type' => 'bannerfooter']);
		$info = [];
		if ($datas != NULL) {
			$info = json_decode($datas['contents'],true);
		}
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
				// ================= background ====================
				if ($_FILES['image_bg_footer']['name'])
				{
					$path_dir_bg = 'uploads/images/bgfooter/';
					// ======= check bg old
					if ($info != NULL) {
						$image_bg_old = $path_dir_bg.$info['image_bg_footer'];
						$image_bg_old_thumb = $path_dir_bg.$info['image_thumb_bg_footer'];
						// 
						if ($info['image_bg_footer'] !='' && $info['image_bg_footer'] != NULL) {
							if (file_exists($image_bg_old)) {
								unlink($image_bg_old);
							}
						}
						if ($info['image_thumb_bg_footer'] !='' && $info['image_thumb_bg_footer'] != NULL) {
							if (file_exists($image_bg_old_thumb)) {
								unlink($image_bg_old_thumb);
							}
						}
					}
					
					// =====================
					$file_info = $this->request->getFile('image_bg_footer');
					$data_upload = $this->Upload->upload_image($path_dir_bg, $file_info, uniqid().'.'.rand(0,9999), 'icon', 1900, 400, null, null);
					if ($data_upload['type'] == "error")
					{
						return redirect()->to(base_url(CPANEL . $this->control . 'index'))->with('error', $data_upload['message']);
					}
					else
					{
						$image_bg_footer =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
						$image_thumb_bg_footer = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					}
				}
				else
				{
					$image_bg_footer 		= $info['image_bg_footer'];
					$image_thumb_bg_footer = $info['image_thumb_bg_footer'];
				}
				$data_post['image_bg_footer'] 		= $image_bg_footer;
				$data_post['image_thumb_bg_footer'] = $image_thumb_bg_footer;
				// ==================================================================
				if ($_FILES['image_text']['name'])
				{
					$path_dir_bg = 'uploads/images/bgtext/';
					// ======= check bg old
					if ($info != NULL) {
						$image_text_old = $path_dir_bg.$info['image_text'];
						$image_text_old_thumb = $path_dir_bg.$info['image_thumb_text_footer'];
						// 
						if ($info['image_text'] !='' && $info['image_text'] != NULL) {
							if (file_exists($image_text_old)) {
								unlink($image_text_old);
							}
						}
						if ($info['image_thumb_text_footer'] !='' && $info['image_thumb_text_footer'] != NULL) {
							if (file_exists($image_text_old_thumb)) {
								unlink($image_text_old_thumb);
							}
						}
					}
					// =====================
					$file_info = $this->request->getFile('image_text');
					$data_upload = $this->Upload->upload_image($path_dir_bg, $file_info, uniqid().'.'.rand(0,9999), 'icon', 400, 400, null, null);
					if ($data_upload['type'] == "error")
					{
						return redirect()->to(base_url(CPANEL . $this->control . 'index'))->with('error', $data_upload['message']);
					}
					else
					{
						$image_text_footer =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
						$image_thumb_text_footer = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					}
				}
				else
				{
					$image_text_footer 		= $info['image_text'];
					$image_thumb_text_footer = $info['image_thumb_text_footer'];
				}
				$data_post['image_text'] 		= $image_text_footer;
				$data_post['image_thumb_text_footer'] = $image_thumb_text_footer;
				$contents = json_encode($data_post);
				$data_add['contents'] = $contents;
				$data_add['type'] = 'bannerfooter';
				if ($datas == NULL) {
					$result = $this->SystemModels->add($data_add);
				}
				else{
					$result = $this->SystemModels->edit($data_add,['type' => 'bannerfooter']);
				}
				if ($result['type'] =="successful") {
					return redirect()->to(base_url(CPANEL.'/system/index'))->with('success',EDIT_SUCCESS);
				}	
		}
	}
	function delete_images_bn(){
		$type = $_POST['type'];
		$datas = $this->SystemModels->select_row('*',['type' => 'bannerfooter']);
		$info = [];
		if ($datas != NULL) {
			$info = json_decode($datas['contents'],true);
		}
		if ($type == 'bg_footer') {
			$path_dir_bg = 'uploads/images/bgfooter/';
			// ================ check bg old ==================
			$image_bg_old = $path_dir_bg.$info['image_bg_footer'];
			$image_bg_old_thumb = $path_dir_bg.$info['image_thumb_bg_footer'];
			// 
			if ($info['image_bg_footer'] !='' && $info['image_bg_footer'] != NULL) {
				if (file_exists($image_bg_old)) {
					unlink($image_bg_old);
				}
			}
			if ($info['image_thumb_bg_footer'] !='' && $info['image_thumb_bg_footer'] != NULL) {
				if (file_exists($image_bg_old_thumb)) {
					unlink($image_bg_old_thumb);
				}
			}
			// ============
			$data_post['title'] 				= $info['title'];
			$data_post['text_btn'] 				= $info['text_btn'];
			$data_post['link'] 					= $info['link'];
		
			$data_post['image_bg_footer'] 		= '';
			$data_post['image_thumb_bg_footer'] = '';
			// bg
			$data_post['image_text'] 				= $info['image_text'];
			$data_post['image_thumb_text_footer'] 	= $info['image_thumb_text_footer'];
			$contents = json_encode($data_post);
			$data_add['contents'] = $contents;
			$result = $this->SystemModels->edit($data_add,['type' => 'bannerfooter']);
			if ($result['type'] =="successful") {
				echo json_encode(
					[
						'type'		=> $type,
						'result'	=> '200'
					]
				);
			}
		}
		// ======================= bg ====================
		if ($type == 'text') {
			$path_dir_bg = 'uploads/images/bgtext/';
			// ================ check bg old ==================
			$image_bg_old = $path_dir_bg.$info['image_text'];
			$image_bg_old_thumb = $path_dir_bg.$info['image_thumb_text_footer'];
			// ================================================
			if ($info['image_text'] !='' && $info['image_text'] != NULL) {
				if (file_exists($image_bg_old)) {
					unlink($image_bg_old);
				}
			}
			if ($info['image_thumb_text_footer'] !='' && $info['image_thumb_text_footer'] != NULL) {
				if (file_exists($image_bg_old_thumb)) {
					unlink($image_bg_old_thumb);
				}
			}
		
			// ============
			$data_post['title'] 				= $info['title'];
			$data_post['text_btn'] 				= $info['text_btn'];
			$data_post['link'] 					= $info['link'];
			$data_post['image_bg_footer'] 		= $info['image_bg_footer'];
			$data_post['image_thumb_bg_footer'] =  $info['image_thumb_bg_footer'];
			// bg
			$data_post['image_text'] 				= '';
			$data_post['image_thumb_text_footer'] 		= '';
			$contents = json_encode($data_post);
			$data_add['contents'] = $contents;
			$result = $this->SystemModels->edit($data_add,['type' => 'bannerfooter']);
			if ($result['type'] =="successful") {
				echo json_encode(
					[
						'type'		=> $type,
						'result'	=> '200'
					]
				);
			}
		}
	}
	function flashsale(){
		$datas = $this->SystemModels->select_row('*',['type' => 'flashsale']);
		$info = [];
		if ($datas != NULL) {
			$info = json_decode($datas['contents'],true);
		}
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			if ($_FILES['image_sale']['name']) {
				$path_dir_bg = 'uploads/images/flashsale/';
				if (!is_dir($path_dir_bg)) {
					mkdir($path_dir_bg);
				}
				// ======= check bg old
				if (isset($info['images'])) {
					if ($info['images'] !='' && $info['images'] != NULL) {
						$bg_old = $path_dir_bg.$info['images'];
						if (file_exists($bg_old)) {
							unlink($bg_old);
						}
					}
				}
				if (isset($info['thumb'])) {
					if ($info['thumb'] !='' && $info['thumb'] != NULL) {
						$bg_old_thumb = $path_dir_bg.$info['thumb'];
						if (file_exists($bg_old_thumb)) {
							unlink($bg_old_thumb);
						}
					}
				}
				$file_info = $this->request->getFile('image_sale');
				$data_upload = $this->Upload->upload_image($path_dir_bg, $file_info, uniqid().'.'.rand(0,9999), 'icon', 600, 400, null, null);
				if ($data_upload['type'] == "error")
				{
					return redirect()->to(base_url(CPANEL . $this->control . 'index'))->with('error', $data_upload['message']);
				}
				else
				{
					$image =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			}
			else{
				$image = $info['images'];
				$thumb = $info['thumb'];
			}
			$data_post['images'] 	= $image;
			$data_post['thumb'] 	= $thumb;
			$price = str_replace(',','',$data_post['price']);
			$price_sale = str_replace(',','',$data_post['price_sale']);
			$datetime = $this->request->getPost('datetime');
			$data_post['price'] = $price;
			$data_post['datetime'] = $datetime;
			$data_post['price_sale'] = $price_sale;
			$contents = json_encode($data_post);
			$data_add['contents'] 	= $contents;
			$data_add['type']		= 'flashsale';
			if ($datas == NULL) {
				$result = $this->SystemModels->add($data_add);
			}
			else{
				$result = $this->SystemModels->edit($data_add,['type' => 'flashsale']);
			}
			if ($result['type'] =="successful") {
				return redirect()->to(base_url(CPANEL.'/system/index'))->with('success',EDIT_SUCCESS);
			}	
		}
	}
}
