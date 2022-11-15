<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\NewsModels;
use App\Models\MyModels;
use App\Models\AliasModels;
use App\Models\Upload;
use App\Models\TagsdetailModels;
use App\Models\TagsModels;
use App\Models\CI_function; 
use App\Models\SubMenuModels;
use App\Models\NewscategoryModels;
class News extends BaseController
{
	private $title = 'bài viết';
	private $template = 'backend/news/';
	var	$path_url = 'cpanel/news/';
	var $path_dir = 'uploads/images/news/';
	var $path_dir_thumb = 'uploads/images/news/thumb/';
	var $path_dir_webp = 'uploads/webps/news/';
	var $control = 'news';
	function __construct()
	{
		$this->NewsModels = new NewsModels();
		$this->SubMenuModels = new SubMenuModels();
		$this->MyModels = new MyModels();
		$this->TagsdetailModels = new TagsdetailModels();
		$this->NewscategoryModels = new NewscategoryModels();
		$this->TagsModels = new TagsModels();
		$this->AliasModels = new AliasModels();
		$this->CI_function = new CI_function();
		$this->Upload = new Upload();
		$this->db  = \Config\Database::connect('default');
	}
	public function index()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$datas = $this->NewsModels->select_array();
		if ($datas != NULL) {
			foreach ($datas as $key => $val) {
				$cate_name = '(---------)';
				$newsCates = $this->NewscategoryModels->select_array('cateID',['newsID' => $val['id']]);
				$cateIDAr = $this->formatArrCateID($newsCates);
				if($cateIDAr != NULL){
					$builder = $this->db->table('tbl_category');
					$builder->select(
						'id, name'
					);
				
					$builder->whereIn('id', $cateIDAr);
					$query = $builder->get();
					//echo $this->db->getLastQuery();
					$cates = $query->getResult('array');

					if($cates != NULL){
						foreach ($cates as $key_cate => $val_cate) {
							if($key_cate == 0){
								$cate_name = $val_cate['name'];
							}else{
								$cate_name .= ', '.$val_cate['name'];
							}
						}
					}
				}
				$datas[$key]['cate_name'] = $cate_name;
			}
		}
		// var_dump($datas);die;

		$data = [
			'data_index'		=> $data_index,
			'datas'				=> $datas,
			'control'			=> $this->control,
			'path_url'			=> $this->path_url,
			'path_dir_thumb'	=> $this->path_dir,
			'title'				=> 'Quản lý ' . $this->title,
			'template'			=> $this->template . 'index'
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
		$sort_max = $this->NewsModels->select_max('sort');
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$data_parent = $this->request->getPost('data_parent');
			
			$alias = trim($data_post['alias']);
			$type = 4;
			if ($type > 0) {
				$alias = $this->CI_function->createdAlias($alias, $type);
			}
			if ($_FILES['image']['name']) {
				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 400, 400, null, 'webp');
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					$webps 			   = $data_upload['webps'];
					$webps_thumb	   = $data_upload['webps_thumb'];
				}
			}
			else{
				$image = '';
				$thumb = '';
				$webps = '';
				$webps_thumb = '';
			}
			// check nhập title, meta keywords ,meta description
			if ($data_post['title'] == "") {
				$data_post['title'] = $data_post['name'];
			}
			if ($data_post['meta_keywords'] == "") {
				$data_post['meta_keywords'] = $data_post['name'];
			}
			if ($data_post['meta_descriptions'] == "") {
				$data_post['meta_descriptions'] = $data_post['name'];
			}


			$tags = $data_post['tags'];
			$data_post['tags'] = $tags;
			$data_post['month'] = date("m");
			$data_post['year'] = date("Y");
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] = $publish;
			$data_post['alias'] = $alias;
			$data_post['image'] = $image ? $image : '';
			$data_post['sort'] = $sort_max['sort'] + 1;
			$data_post['thumb'] 			= $thumb ? $thumb : '';
			$data_post['webps']             = $webps ? $webps : '';
			$data_post['webps_thumb']       = $webps_thumb ? $webps_thumb : '';
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			
			$result = $this->NewsModels->add($data_post);
			if (isset($data_parent) && $data_parent !== NULL) {
				foreach($data_parent as $key => $val){
					$array_parent = array(
						'IDnews' 	=> $result['insertID'],
						'parentid'	=> 0,
						'title'		=> $val['title'],
						'keywords'		=> $val['keyword'],
						'number'	=> $val['number']
					);
					$parent = $this->SubMenuModels->add($array_parent);
					if (isset($val['sub']) && $val['sub'] != NULL) {
						foreach($val['sub'] as $keysub => $val_sub){
							$array_child = array(
								'IDnews' => $result['insertID'],
								'parentid'	=> $parent['insertID'],
								'title'		=> $val_sub['title'],
								'keywords'		=> $val_sub['keyword'],
								'number'	=> $val_sub['number']
							);
							$this->SubMenuModels->add($array_child);
						}
					}
				}
			}
			if ($tags != '') {
				$this->addTags($tags, $result['insertID']);
			}
			if ($result['type'] == "successful") {
				$data_post_cateid = $this->request->getPost('data_post_cateid');
				$data_news_cate_insert = NULL;
				if($data_post_cateid['cateid'] != NULL){
					foreach ($data_post_cateid['cateid'] as $key_data_post_cateid => $val_data_post_cateid) {
						$data_news_cate_insert[] = array(
							'newsID' => $result['insertID'],
							'cateID' => $val_data_post_cateid,
							'created_at' => gmdate('Y-m-d H:i:s', time() + 7 * 3600)
						);
					}
				}
				if($data_news_cate_insert != NULL){
					$this->NewscategoryModels->adds($data_news_cate_insert);
				}

				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', ADD_SUCCESS);
			}
		}
		$menu = $this->CI_function->getSelectCategory(0, '', NULL, 1);
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
		$datas = $this->NewsModels->find_one($id);
		$newsCates = $this->NewscategoryModels->select_array('cateID',['newsID' => $datas['id']]);
		$cateIDAr = $this->formatArrCateID($newsCates);
		$menu = $this->CI_function->getSelectCategory2(0, '', $cateIDAr, 1);
		
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
			$data_parent = $this->request->getPost('data_parent');
			
			$alias = trim($data_post['alias']);
			$this->SubMenuModels->deletewhere(array('IDnews' => $id));
			$type = 4;
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
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 400, 400, null, 'webp');
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . '/logo'))->with('error', $data_upload['message']);
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
				$webps_thumb      =  $datas['webps_thumb'];
			}
			$tags = $data_post['tags'];
			if ($tags != '') {
				$this->addTags($tags, $id);
			}

			$data_post_cateid = $this->request->getPost('data_post_cateid');
			$data_news_cate_insert = NULL;
			if($data_post_cateid['cateid'] != NULL){
				$this->NewscategoryModels->deleteWhere(array('newsID' => $datas['id']));
				foreach ($data_post_cateid['cateid'] as $key_data_post_cateid => $val_data_post_cateid) {
					$data_news_cate_insert[] = array(
						'newsID' => $datas['id'],
						'cateID' => $val_data_post_cateid,
						'created_at' => gmdate('Y-m-d H:i:s', time() + 7 * 3600)
					);
				}
			}
			if($data_news_cate_insert != NULL){
				$this->NewscategoryModels->adds($data_news_cate_insert);
			}

			$data_post['tags'] = $tags;
			$data_post['month'] = date("m");
			$data_post['year'] = date("Y");
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] = $publish;
			$data_post['alias'] = $alias;
			$data_post['image'] = $image;
			$data_post['thumb'] = $thumb;
			$data_post['webps']             = $webps;
			$data_post['webps_thumb']       = $webps_thumb;
			$data_post['updated_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result = $this->NewsModels->edit($data_post, array('id' => $id));
			if (isset($data_parent) && $data_parent !== NULL) {
				foreach($data_parent as $key => $val){
					$array_parent = array(
						'IDnews' 		=> $id,
						'parentid'		=> 0,
						'title'			=> $val['title'],
						'keywords'		=> $val['keyword'],
						'number'		=> $val['number']
					);
					$parent = $this->SubMenuModels->add($array_parent);
					if (isset($val['sub']) && $val['sub'] != NULL) {
						foreach($val['sub'] as $keysub => $val_sub){
							$array_child = array(
								'IDnews' 		=> $id,
								'parentid'		=> $parent['insertID'],
								'title'			=> $val_sub['title'],
								'keywords'		=> $val_sub['keyword'],
								'number'		=> $val_sub['number']
							);
							$this->SubMenuModels->add($array_child);
						}
					}
				}
			}
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', EDIT_SUCCESS);
			}
		}
		$parentMenu = $this->SubMenuModels->select_array('*',array('IDnews' => $id,'parentid' => 0),'number asc');
		foreach($parentMenu as $key => $val){
			$submenu = $this->SubMenuModels->select_array('*',array('IDnews' => $id,'parentid' => $val['id']),'number asc');
			$parentMenu[$key]['sub'] = $submenu;
		}
		
		$data = [
			'parentMenu'			=> $parentMenu,
			'menu'					=> $menu,
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
		$datas = $this->NewsModels->where_in(array('id' => $id));
		$filename = $this->path_dir . $datas['image'];
		$filenamethumb = $this->path_dir . $datas['thumb'];
		// echo $filenamethumb;
		$web_image = explode('.', $datas['image']);
		$web_thumb = explode('.', $datas['thumb']);
		// images
		// == Năm
		$YearFolder = glob($this->path_dir . $datas['year'] . '*');
		// == tháng
		$MonthFolder = glob($this->path_dir . $datas['year'] . '*' . '/' . $datas['month'] . '/*');
		// webp
		// == folder năm
		$YearFolder_wp = glob($this->path_dir_webp . $datas['year'] . '*');
		// == folder tháng
		$MonthFolder_wp = glob($this->path_dir_webp . $datas['year'] . '*' . '/' . $datas['month'] . '/*');
		$fileNamewebp =  $this->path_dir_webp . $web_image[0] . '.webp';
		$fileNamewebp_thumb =  $this->path_dir_webp . $web_thumb[0] . '.webp';
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
			if ($datas['webps']!='') {
				if (file_exists($fileNamewebp)) {
					unlink($fileNamewebp);
				}
			}
			if ($datas['webps_thumb']!='') {
				if (file_exists($fileNamewebp_thumb)) {
					unlink($fileNamewebp_thumb);
				}
			}
			//  folder thumb
			$thumbFolder = glob($this->path_dir . $datas['year'] . '*' . '/' . $datas['month'] . '/thumb/*');
			$thumbFolder_delete = $this->path_dir . $datas['year'] . '/' . $datas['month'] . '/thumb';
			// == folder thumb
			$thumbFolder_wp = glob($this->path_dir_webp . $datas['year'] . '*' . '/' . $datas['month'] . '/thumb/*');
			$thumbFolder_webp_delete = $this->path_dir_webp . $datas['year'] . '/' . $datas['month'] . '/thumb';
			// echo 0;
			if ($thumbFolder == NULL){
				rmdir($thumbFolder_delete);
			}
			if ($thumbFolder_wp == NULL) {
				rmdir($thumbFolder_webp_delete);
			}
			$alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
			$result = $this->NewsModels->deleteWhere(array('id' => $id));
			$this->SubMenuModels->deleteWhere(array('IDnews' => $id));
			$this->NewscategoryModels->deleteWhere(array('newsID' => $id));
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
			$datas = $this->NewsModels->where_in(array('id' => $val));
			$filename = $this->path_dir . $datas['image'];
			$filenamethumb = $this->path_dir . $datas['thumb'];

			$web_image = explode('.', $datas['image']);
			$web_thumb = explode('.', $datas['thumb']);
			// webp
			$fileNamewebp =  $this->path_dir_webp . $web_image[0] . '.webp';
			$fileNamewebp_thumb =  $this->path_dir_webp . $web_thumb[0] . '.webp';

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
					if ($datas['webps']!='') {
						if (file_exists($fileNamewebp)) {
							unlink($fileNamewebp);
						}
					}
					if ($datas['webps_thumb']!='') {
						if (file_exists($fileNamewebp_thumb)) {
							unlink($fileNamewebp_thumb);
						}
					}
				} catch (\Throwable $th) {
					throw $th;
				}
				$alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
				$result = $this->NewsModels->deleteWhere(array('id' => $val));
				$this->SubMenuModels->deleteWhere(array('IDnews' => $val));
				$this->NewscategoryModels->deleteWhere(array('newsID' => $val));
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
		$result = $this->NewsModels->edit($dataUpdate, array('id' => $id));
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
		$result = $this->NewsModels->edit($data_update, array('id' => $id));
		if ($result > 0) {
			echo json_encode(array('rs' => 1));
		}
	}
	function del_image()
	{
		$this->checkPermission();
		$id = $this->request->getPost('id');
		$datas = $this->NewsModels->where_in(array('id' => $id));

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
			$result = $this->NewsModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
	public function addTags($tags, $id)
	{
		$this->TagsdetailModels->deleteWhere(array('newsID' => $id));
		if ($tags != '') {
			$arr_tags = explode(',', $tags);
			if ($arr_tags != NULL) {
				$data_insert_tags = NULL;
				foreach ($arr_tags as $key_arr_tags => $val_arr_tags) {
					$checkTags = $this->TagsModels->select_array('id,name', array('name' => $val_arr_tags));
					if ($checkTags == NULL) {
						$data_tags = array(
							'name'	=>	$val_arr_tags,
							'alias'	=>	$this->CI_function->create_alias($val_arr_tags),
						);
						$result = $this->TagsModels->add($data_tags);
						$tagsID = $result['insertID'];
					} else {
						$tagsID = $checkTags['id'];
					}
					$checkTagsDetail = $this->TagsdetailModels->select_row('id,tagsID,newsID', array('tagsID' => $checkTags['id'], 'newsID' => $id));
					if ($checkTagsDetail == NULL) {
						$data_tags_detail = array(
							'tags_id'	=>	$tagsID,
							'newsID'	=>	$id,
							'created_at'		=>	gmdate('Y-m-d H:i:s', time() + 7 * 3600)
						);
						$this->TagsdetailModels->add($data_tags_detail);
					}
				}
			}
		}
	}
	public function changeProminent()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();

		// Get data from Ajax
		$id = $this->request->getVar('id');
		$global = $this->request->getVar('global');
		$properties = $this->request->getVar('properties');

		$dataUpdate[$properties] = $global;
		$result = $this->NewsModels->edit($dataUpdate, array('id' => $id));
		if ($result) {
			echo json_encode($result);
		}
	}
	private function formatArrCateID($arrayData)
	{
		$results = NULL;
		if($arrayData != NULL){
			foreach ($arrayData as $key => $val) {
				$results[] = $val['cateID'];
			}
		}
		return $results;
	}
}
