<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\CategoryModels;
use App\Models\AliasModels;
use App\Models\Upload;
use App\Models\CI_function;
use App\Models\ProductModels;
class MenuProduct extends BaseController
{
	private $title = 'Danh mục sản phẩm';
	private $template = 'backend/menuProduct/';
	var	$path_url = 'cpanel/menuProduct/';
	var $path_dir = 'uploads/images/menuProduct/';
	var $path_dir_webp = 'uploads/webps/menuProduct/';
	var $control = 'menuProduct';
	var $branch = array();
	function __construct()
	{
		$this->CategoryModels = new CategoryModels();
		$this->ProductModels = new ProductModels();
		$this->AliasModels = new AliasModels();
		$this->CI_function = new CI_function();
		$this->Upload = new Upload();
	}
	public function index()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		if ($_GET['parentid']) {
			$datas = $this->CI_function->showMenuProduct($_GET['parentid']);
		} else {
			$datas = $this->CI_function->showMenuProduct(0);
		}
	
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
			$type = 3;
			if ($type > 0) {
				$alias = $this->CI_function->createdAlias($alias, $type);
			}
			// echo $alias;die;
			if ($_FILES['image']['name']) {
				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 600, 600, null, 'webp');
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					$webps 			   = $data_upload['webps'];
					$webps_thumb	   = $data_upload['webps_thumb'];
				}
			}
			$data_post['month'] = date("m");
			$data_post['year'] = date("Y");
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] = $publish;
			$data_post['alias'] = $alias;
			$data_post['type'] = $type;
			$data_post['image'] = $image;
			$data_post['webps']     = $webps;
			$data_post['webps_thumb']       = $webps_thumb;
			$data_post['sort'] = $sort_max['sort'] + 1;
			$data_post['thumb'] = $thumb;
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			// echo '<pre>';
			// print_r($data_post);
			// die;
			$result = $this->CategoryModels->add($data_post);
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', ADD_SUCCESS);
			}
		}
		$menu = $this->CI_function->getSelectCategory(0, '', '', 3);

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
		$menus = $this->CI_function->getSelectCategory(0, '', $datas['parentid'], 3);
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
			$type = 3;
			if ($type > 0) {
				$alias = $this->CI_function->createdAlias($alias, $type, $datas['alias']);
			}
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
				$fileName = $this->request->getFile('image');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 600, 600, null, 'webp');
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
			$data_post['image'] = $image;
			$data_post['thumb'] = $thumb;
			$data_post['webps']             = $webps;
			$data_post['webps_thumb']       = $webps_thumb;
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

		// echo $filename;
		$filenamethumb = $this->path_dir . $datas['thumb'];
		// echo $filenamethumb;
		$web_image = explode('.', $datas['image']);
		$web_thumb = explode('.', $datas['thumb']);
		// images
		// == Năm
		$YearFolder = glob($this->path_dir . $datas['year'] . '*');
		// == tháng
		$MonthFolder = glob($this->path_dir . $datas['year'] . '*' . '/' . $datas['month'] . '/*');
		// echo '<pre>';
		// print_r($thumbFolder);
		// echo $thumbFolder_delete;die;
		// webp
		// == folder năm
		$YearFolder_wp = glob($this->path_dir_webp . $datas['year'] . '*');
		// == folder tháng
		$MonthFolder_wp = glob($this->path_dir_webp . $datas['year'] . '*' . '/' . $datas['month'] . '/*');
		// echo "<pre>";
		// print_r($thumbFolder_wp);
		$fileNamewebp =  $this->path_dir_webp . $web_image[0] . '.webp';
		// echo $fileNamewebp.'<br>';
		$fileNamewebp_thumb =  $this->path_dir_webp . $web_thumb[0] . '.webp';
		// echo $fileNamewebp_thumb;
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
			if ($datas['webps'] !='') {
				if (file_exists($fileNamewebp)) {
					unlink($fileNamewebp);
				}
			}
			if ($datas['webps_thumb'] !='') {
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
			
			if ($thumbFolder == NULL) {
				if (is_dir($thumbFolder_delete)) {
					rmdir($thumbFolder_delete);
				}
			}
			if ($thumbFolder_wp == NULL) {
				if (is_dir($thumbFolder_webp_delete)) {
					rmdir($thumbFolder_webp_delete);
				}
			}
			$alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
			$result = $this->CategoryModels->deleteWhere(array('parentid' => $id));
			$result = $this->CategoryModels->deleteWhere(array('id' => $id));
			$this->ProductModels->edit(array('cateid' => 0),array('cateid' => $id));
		} else {
			$alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
			$result = $this->CategoryModels->deleteWhere(array('parentid' => $id));
			$this->ProductModels->edit(array('cateid' => 0),array('cateid' => $id));
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
				if ($datas['webps'] !='') {
					if (file_exists($fileNamewebp)) {
						unlink($fileNamewebp);
					}
				}
				if ($datas['webps_thumb'] !='') {
					if (file_exists($fileNamewebp_thumb)) {
						unlink($fileNamewebp_thumb);
					}
				}
				$alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
				$this->CategoryModels->edit(['parentid' => 0],array('parentid' => $val));
				$result = $this->CategoryModels->deleteWhere(array('id' => $val));
				$this->ProductModels->edit(array('cateid' => 0),array('cateid' => $val));
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
			$result = $this->CategoryModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
	function delete_option(){
		$this->checkPermission();
		$id = $_POST['id'];
		$num = $_POST['num'];
		$datas = $this->CategoryModels->where_in(array('id' => $id));
		// ============================================================
		$fileName = $this->path_dir . $datas['image'];
		$fileNameThumb = $this->path_dir . $datas['thumb'];
		// explode image
		$webImages = explode(".", $datas['image']);
		$image_webp = $this->path_dir_webp . $webImages[0] . '.webp';
		// echo $image_webp;
		$webImagesThumb = explode(".", $datas['thumb']);
		$image_webp_thumb = $this->path_dir_webp . $webImagesThumb[0] . '.webp';
		// ============================================================
		if ($num =="1") {
			if ($datas['image'] !='') {
				if (file_exists($fileName)) {
					unlink($fileName);
				}
			}
			if ($datas['thumb'] !='') {
				if (file_exists($fileNameThumb)) {
					unlink($fileNameThumb);
				}
			}
			if ($datas['webps'] !='') {
				if (file_exists($image_webp)) {
					unlink($image_webp);
				}
			}
			if ($datas['webps_thumb'] !='') {
				if (file_exists($image_webp_thumb)) {
					unlink($image_webp_thumb);
				}
			}
			$result = $this->CategoryModels->deleteWhere(array('id' => $id));
			$this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
			$this->CategoryModels->edit(['parentid' => 0],array('parentid' => $id));
			$this->ProductModels->edit(array('cateid' => 0),array('cateid' => $id));
			if ($result) {
				echo json_encode(
					array(
						'result' =>'success'
					)
				);
			}
		}
		// Xóa cả danh mục cha và tất cả mục con
		// Xóa ảnh của danh mục cha lẫn danh mục con
		// Xóa Alias của danh mục
		// cập nhật lại cateID khi đã xóa danh mục sp trở về 0
		else if($num =="2"){
			// ========= Cần xóa ảnh và cập nhật những Sp thuộc id cha đầu tiên ===========
			if ($datas['image'] !='') {
				if (file_exists($fileName)) {
					unlink($fileName);
				}
			}
			if ($datas['thumb'] !='') {
				if (file_exists($fileNameThumb)) {
					unlink($fileNameThumb);
				}
			}
			if ($datas['webps'] !='') {
				if (file_exists($image_webp)) {
					unlink($image_webp);
				}
			}
			if ($datas['webps_thumb'] !='') {
				if (file_exists($image_webp_thumb)) {
					unlink($image_webp_thumb);
				}
			}
			$this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
			$this->ProductModels->edit(array('cateid' => 0),array('cateid' => $id));
			$result = $this->CategoryModels->deleteWhere(array('id' => $id));
			// ==== Lấy tất cả id con ============
			$arr = $this->recursive($datas['id']);
			// ============== xóa những gì liên quan của id con ======================
			if ($result) {
				foreach($arr as $key => $val){
					// ========== File hình ================
					$file_child =  $this->path_dir.$val['image'];
					$file_child_thumb = $this->path_dir.$val['thumb'];
					$file_child_webps = $val['webps'];
					$file_child_webps_thumb = $val['webps_thumb'];
					if ($val['image'] !='') {
						if (file_exists($file_child)) {
							unlink($file_child);
						}
					}
					if ($val['thumb'] !='') {
						if (file_exists($file_child_thumb)) {
							unlink($file_child_thumb);
						}
					}
					if ($val['webps'] !='') {
						if (file_exists($file_child_webps)) {
							unlink($file_child_webps);
						}
					}
					if ($val['webps_thumb'] !='') {
						if (file_exists($file_child_webps_thumb)) {
							unlink($file_child_webps_thumb);
						}
					}
					// ================ Xóa alias ======================
					$this->AliasModels->deleteWhere(array('alias' => $val['alias']));
					// ================ Cập nhật lại cateid cho sản phẩm ==================
					$this->ProductModels->edit(array('cateid' => 0),array('cateid' => $val['id']));
				}
				echo json_encode(
					array(
						'result' =>'success'
					)
				);
			}
		}
	}
	function recursive($parentid){
		$elements = $this->CategoryModels->select_array('id,parentid,alias,webps,webps_thumb,image,thumb',['parentid' => $parentid]);
		foreach ($elements as $key => $val) {
			$this->branch[] = $val;           
            $this->recursive($val['id']);
		}
		return $this->branch;
	}
}
