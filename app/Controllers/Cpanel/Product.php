<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\ProductModels;
use App\Models\MyModels;
use App\Models\AliasModels;
use App\Models\Upload;
use App\Models\TagsdetailModels;
use App\Models\TagsModels;
use App\Models\CI_function;
use App\Models\CategoryModels;
use App\Models\PhotoProductModels;
use App\Models\StatusProductModels;
use App\Models\BrandModels;
use App\Models\ProductcolorModels;  
use App\Models\ProductvideoModels; 
use App\Models\CommunityModels;
use App\Models\ProductinfoModels;
use App\Models\ProductingreModels;
class Product extends BaseController
{
	private $title = 'Sản phẩm';
	private $template = 'backend/product/';
	var	$path_url = 'cpanel/product/';
	var $path_dir = 'uploads/images/product/';
	var $path_dir_webp = 'uploads/webps/product/';
	var $control = 'product';
	var $type = 5;
	var $path_video = 'uploads/video/product/';
	function __construct()
	{
		$this->ProductModels = new ProductModels();
		$this->PhotoProductModels = new PhotoProductModels();
		$this->CategoryModels = new CategoryModels();
		$this->MyModels = new MyModels();
		$this->TagsdetailModels = new TagsdetailModels();
		$this->TagsModels = new TagsModels();
		$this->AliasModels = new AliasModels();
		$this->CI_function = new CI_function();
		$this->Upload = new Upload();
		$this->db  = \Config\Database::connect('default');
		$this->StatusProductModels  = new StatusProductModels();
		$this->BrandModels  = new BrandModels();
		$this->ProductcolorModels  = new ProductcolorModels();
		$this->ProductvideoModels  = new ProductvideoModels();
		$this->CommunityModels  = new CommunityModels();
		$this->ProductinfoModels  = new ProductinfoModels();
		$this->ProductingreModels  = new ProductingreModels();
	}
	public function index()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$param = [
			"select"  => "tbl_product.*,tbl_category.name as name_cate",
			"orderby" => "tbl_product.id desc",
			"join"    => [
				["join_table" => 'tbl_category',"query_join"=> 'tbl_product.cateid = tbl_category.id',"type" => 'LEFT']
			] 
		];
		$datas = $this->ProductModels->full_query($param);
		if($datas != NULL){
			foreach ($datas as $key => $val) {
				$check_colors = $this->ProductcolorModels->selectCount(['productID' => $val['id']]);
				$datas[$key]['total_color'] = $check_colors;

				$check_videos = $this->ProductvideoModels->selectCount(['productID' => $val['id']]);
				$datas[$key]['total_video'] = $check_videos;

				$check_ingres = $this->ProductingreModels->selectCount(['productID' => $val['id']]);
				$datas[$key]['total_ingre'] = $check_ingres;

				$check_communitys = $this->CommunityModels->selectCount(['productID' => $val['id']]);
				$datas[$key]['total_community'] = $check_communitys;
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
		$sort_max = $this->ProductModels->select_max('sort');
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$data_content = $this->request->getPost('data_content');
			
			$contents = json_encode($data_content);

			$data_post_productinfo = $this->request->getPost('data_post_productinfo');
			$data_post['info_orther'] = json_encode($data_post_productinfo);
			//format giá
			$data_post['price'] = str_replace('.', '', $data_post['price']);
			$data_post['price_sale'] = str_replace('.', '', $data_post['price_sale']);
			$alias = trim($data_post['alias']);
			$alias = $this->CI_function->createdAlias($alias, $this->type);
			if ($_FILES['images']['name']) {
				$fileName = $this->request->getFile('images');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 600, 400, null, 'webp');
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
					$webps 			   = $data_upload['webps'];
					$webps_thumb	   = $data_upload['webps_thumb'];
				}
			}
			//
			$orther_img = '';
			$orther_thumb = '';
			if ($_FILES['orther_img']['name']) {
				$fileName = $this->request->getFile('orther_img');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias.'_1', 'orther_img', 600, 400, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$orther_img = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$orther_thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			}
			$data_post['orther_img'] = $orther_img;
			$data_post['orther_thumb'] = $orther_thumb;
			//
			$orther2_img = '';
			$orther2_thumb = '';
			if ($_FILES['orther2_img']['name']) {
				$fileName = $this->request->getFile('orther2_img');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias.'_2', 'orther2_img', 600, 400, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$orther2_img = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$orther2_thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			}
			$data_post['orther2_img'] = $orther2_img;
			$data_post['orther2_thumb'] = $orther2_thumb;
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
			$data_post['month'] = date("m");
			$data_post['year'] = date("Y");
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] = $publish;
			// $data_post['new'] ? $new = 1 : $new = 0;
			// $data_post['new'] = $new;
			// $data_post['hot'] ? $hot = 1 : $hot = 0;
			// $data_post['hot'] = $hot;
			$data_post['properties'] = $contents;
			$data_post['alias'] = $alias;
			$data_post['image'] = $image ? $image : '';
			$data_post['sort'] = $sort_max['sort'] + 1;
			$data_post['thumb'] 			= $thumb ? $thumb : '';
			$data_post['webps']             = $webps ? $webps : '';
			$data_post['webps_thumb']       = $webps_thumb ? $webps_thumb : '';
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$results = $this->ProductModels->add($data_post);
			// ảnh chi tiết
			$input1_count       =  $this->request->getPost('input1_count');
			$date = gmdate('Y-d-m H:i:s',time()+7*3600);
			$dates = str_replace(' ',"-",$date);
			$name_date = str_replace(':','-',$dates);
			if ($input1_count > 0) {
				for ($i = 0; $i < $input1_count; $i++) {
					$inputName             = 'image' . $i;
					if ($_FILES[$inputName]['name'] != "") {
						$fileName          = $this->request->getFile($inputName);
						$path_dir_detail          = $this->path_dir . 'detail/';
						$data_upload       = $this->Upload->upload_image($path_dir_detail, $fileName, $name_date.$i.$_FILES[$inputName]['name'], $inputName, 500, 500, null, 'webp');
						//==================================
						if ($data_upload['type'] == 'error') {
							return redirect()->to(base_url(CPANEL . $this->control . '/' . '/edit' . '/' . $id))->with('error', $data_upload['message']);
						} else {
							$image_detail     		   = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
							$thumb_detail     		   = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
							$webps_detail	  		   = $data_upload['webps'];
							$webps_thumb_detail	   	   = $data_upload['webps_thumb'];
							$data_add_photo = array(
								'ProductID'    => $results['insertID'],
								'image'		   => $image_detail,
								'thumb'		   => $thumb_detail,
								'webps'		   => $webps_detail,
								'webps_thumb'  => $webps_thumb_detail,
								'created_at'  => gmdate('Y-m-d H:i:s',time() + 7 *3600)
							);
							$result = $this->PhotoProductModels->add($data_add_photo);
						}
					}
				}
			}
			if ($tags != '') {
				$this->addTags($tags, $results['insertID']);
			}
			if ($results['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', ADD_SUCCESS);
			}
		}
		$menu = $this->CI_function->getSelectCategory(0, '', '', 3);
		$statusProduct = $this->StatusProductModels->full_query(["select" => "*"]);
		$productinfos = $this->ProductinfoModels->select_array('id, name', ['publish' => 1],'sort asc,id desc');
	
		$data = [
			'menu'					=> $menu,
			'data_index'			=> $data_index,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir'				=> $this->path_dir,
			'path_dir_thumb'		=> $this->path_dir_thumb,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'add',
			'statusProduct'			=> $statusProduct,
			'productinfos'			=> $productinfos
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
		$datas = $this->ProductModels->find_one($id);
		$photolist = $this->PhotoProductModels->select_array('*',array('ProductID' => $datas['id']));
		$properties = json_decode($datas['properties'],true);
		$infoorthers = json_decode($datas['info_orther'],true);
		$menu = $this->CI_function->getSelectCategory(0, '', $datas['cateid'], 3);
		$image = $this->path_dir . $datas['image'];
		$imagethumb = $this->path_dir . $datas['thumb'];
		// webp
		$image_webp = explode(".", $datas['image']);
		$thumb_webp = explode(".", $datas['thumb']);
		// 
		$webps_image = $this->path_dir_webp . $image_webp[0] . '.webp';
		$webps_thumb =  $this->path_dir_webp . $thumb_webp[0] . '.webp';
		//
		$orther_img = $this->path_dir . $datas['orther_img'];
		$orther_thumb = $this->path_dir . $datas['orther_thumb'];
		//
		$orther2_img = $this->path_dir . $datas['orther2_img'];
		$orther2_thumb = $this->path_dir . $datas['orther2_thumb'];
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$data_content = $this->request->getPost('data_content');
			$contents = json_encode($data_content);

			$data_post_productinfo = $this->request->getPost('data_post_productinfo');
			$data_post['info_orther'] = json_encode($data_post_productinfo);
			//format giá
			$data_post['price'] = str_replace('.', '', $data_post['price']);
			$data_post['price_sale'] = str_replace('.', '', $data_post['price_sale']);
			
			$alias = trim($data_post['alias']);
			$alias = $this->CI_function->createdAlias($alias, $this->type, $datas['alias']);
			if ($_FILES['images']['name']) {
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
				if ($datas['webps'] !='') {
					if (file_exists($webps_image)) {
						unlink($webps_image);
					}
				}
				if ($datas['webps_thumb'] !='') {
					if (file_exists($webps_thumb)) {
						unlink($webps_thumb);
					}
				}
				$fileName = $this->request->getFile('images');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 600, 400, null, 'webp');
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
			//
			if ($_FILES['orther2_img']['name']) {
				
				if ($datas['orther2_img'] != '' && file_exists($orther2_img)) {
					unlink($orther2_img);
				}
				if ($datas['orther2_thumb'] != '' && file_exists($orther2_thumb)) {
					unlink($orther2_thumb);
				}
				
				$fileName = $this->request->getFile('orther2_img');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias.'_2', 'orther2_img', 600, 400, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$orther2_img = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$orther2_thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$orther2_img = $datas['orther2_img'];
				$orther2_thumb = $datas['orther2_thumb'];
			}
			$data_post['orther2_img'] = $orther2_img;
			$data_post['orther2_thumb'] = $orther2_thumb;
			//
			if ($_FILES['orther_img']['name']) {
				
				if ($datas['orther_img'] != '' && file_exists($orther_img)) {
					unlink($orther_img);
				}
				if ($datas['orther_thumb'] != '' && file_exists($orther_thumb)) {
					unlink($orther_thumb);
				}
				
				$fileName = $this->request->getFile('orther_img');
				$path_dir = $this->path_dir;
				$data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias.'_1', 'orther_img', 600, 400, null);
				if ($data_upload['type'] == 'error') {
					return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
				} else {
					$orther_img = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
					$orther_thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				}
			} else {
				$orther_img = $datas['orther_img'];
				$orther_thumb = $datas['orther_thumb'];
			}
			$data_post['orther_img'] = $orther_img;
			$data_post['orther_thumb'] = $orther_thumb;
			// =======================ảnh chi tiết=====================
			$input1_count       =  $this->request->getPost('input1_count');
			$date = gmdate('Y-d-m H:i:s',time()+7*3600);
			$dates = str_replace(' ',"-",$date);
			$name_date = str_replace(':','-',$dates);
			if ($input1_count > 0) {
				for ($i = 0; $i < $input1_count; $i++) {
					$inputName             = 'image' . $i;
					if ($_FILES[$inputName]['name'] != "") {
						$fileNameDetail          = $this->request->getFile($inputName);
						$path_dir_detail          = $this->path_dir . 'detail/';
						$data_upload       = $this->Upload->upload_image($path_dir_detail, $fileNameDetail, $name_date.$i.$_FILES[$inputName]['name'], $inputName, 500, 500, null, 'webp');
						//==================================
						if ($data_upload['type'] == 'error') {
							return redirect()->to(base_url(CPANEL . $this->control . '/' . '/edit' . '/' . $id))->with('error', $data_upload['message']);
						} else {
							$image_detail     		   = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
							$thumb_detail     		   = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
							$webps_detail	  		   = $data_upload['webps'];
							$webps_thumb_detail	   = $data_upload['webps_thumb'];
							$data_add_photo = array(
								'ProductID'    => $id,
								'image'		   => $image_detail,
								'thumb'		   => $thumb_detail,
								'webps'		   => $webps_detail,
								'webps_thumb'  => $webps_thumb_detail,
								'created_at'  => gmdate('Y-m-d H:i:s',time() + 7 *3600)
							);
							
							$result = $this->PhotoProductModels->add($data_add_photo);
						}
					}
				}
			}
			// ==================================================
			if ($data_post['title'] == "") {
				$data_post['title']            = $data_post['name'];
			}
			if ($data_post['meta_keywords'] == "") {
				$data_post['meta_keywords']     = $data_post['name'];
			}
			if ($data_post['meta_descriptions'] == "") {
				$data_post['meta_descriptions'] = $data_post['name'];
			}
			$data_post['month'] 		= date("m");
			$data_post['year'] 			= date("Y");
			$data_post['publish'] ? $publish = 1 : $publish = 0;
			$data_post['publish'] 		= $publish;
			// $data_post['new'] ? $new = 1 : $new = 0;
			// $data_post['new'] = $new;
			// $data_post['hot'] ? $hot = 1 : $hot = 0;
			// $data_post['hot'] = $hot;
			$data_post['alias'] 		= $alias;
			$data_post['image'] 		= $image;
			$data_post['thumb'] 		= $thumb;
			$data_post['webps']         = $webps;
			$data_post['webps_thumb']   = $webps_thumb;
			$data_post['properties']	= $contents;
			$data_post['updated_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			// echo "<pre>";
			// print_r($data_post);die;
			$result = $this->ProductModels->edit($data_post, array('id' => $id));
			if ($result['type'] == "successful") {
				return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', EDIT_SUCCESS);
			}
		}
		$distance = array();
		if($properties != NULL)
		{
			foreach ($properties as $key => $row) {
				$distance[$key]  = $row['number'];
			}
			array_multisort($distance, SORT_ASC, $properties);
		}
		// sắp xếp lại thứ tự xuất hiện theo giá trị number
		
		$statusProduct = $this->StatusProductModels->full_query(["select" => "*"]);
		$productinfos = $this->ProductinfoModels->select_array('id, name', ['publish' => 1],'sort asc,id desc');
		$data 	= [
			'properties'			=> $properties,
			'infoorthers'			=> $infoorthers,
			'photolist'				=> $photolist,
			'menu'					=> $menu,
			'datas'					=> $datas,
			'id'					=> $id,
			'data_index'			=> $data_index,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'path_dir'				=> $this->path_dir_image,
			'path_dir_thumb'		=> $this->path_dir,
			'path_video'			=> $this->path_video,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'edit',
			'statusProduct'			=> $statusProduct,
			'productinfos'			=> $productinfos
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
		$datas = $this->ProductModels->where_in(array('id' => $id));
		
		$filename = $this->path_dir . $datas['image'];
		$filenamethumb = $this->path_dir . $datas['thumb'];
		$video = $this->path_video.$datas['video'];
		// echo $filenamethumb;
		$web_image = explode('.', $datas['image']);
		$web_thumb = explode('.', $datas['thumb']);
		//
		$orther_img = $this->path_dir . $datas['orther_img'];
		$orther_thumb = $this->path_dir . $datas['orther_thumb'];
		//
		$orther2_img = $this->path_dir . $datas['orther2_img'];
		$orther2_thumb = $this->path_dir . $datas['orther2_thumb'];
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
			$photolist = $this->PhotoProductModels->select_array('*',array('ProductID' => $id));
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
			if ($datas['orther_img'] != '' && file_exists($orther_img)) {
				unlink($orther_img);
			}
			if ($datas['orther_thumb'] != '' && file_exists($orther_thumb)) {
				unlink($orther_thumb);
			}
			if ($datas['orther2_img'] != '' && file_exists($orther2_img)) {
				unlink($orther2_img);
			}
			if ($datas['orther2_thumb'] != '' && file_exists($orther2_thumb)) {
				unlink($orther2_thumb);
			}
			$path_dir_detail          = $this->path_dir . 'detail/';
			foreach($photolist as $key => $val){
				$image_detail = $path_dir_detail.$val['image'];
				$thumb_detail = $path_dir_detail.$val['thumb'];
				$webps_detail = $path_dir_detail.$val['webps'];
				$webps_thumb_detail = $path_dir_detail.$val['webps_thumb'];
				if ($val['image']!='') {
					if (file_exists($image_detail)) {
						unlink($image_detail);
					}
				}
				if ($val['thumb']!='') {
					if (file_exists($thumb_detail)) {
						unlink($thumb_detail);
					}
				}
				if ($val['webps']!='') {
					if (file_exists($webps_detail)) {
						unlink($webps_detail);
					}
				}
				if ($val['webps_thumb']!='') {
					if (file_exists($webps_thumb_detail)) {
						unlink($webps_thumb_detail);
					}
				}
			}
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
			$alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
			$result = $this->ProductModels->deleteWhere(array('id' => $id));
			$this->PhotoProductModels->deleteWhere(array('ProductID' => $id));
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
		$path_dir_detail          = $this->path_dir . 'detail/';
		foreach ($list_id_delete as $key => $val) {
			$datas = $this->ProductModels->where_in(array('id' => $val));
			$photolist = $this->PhotoProductModels->select_array('*',array('ProductID' => $val));
			foreach($photolist as $key_photo => $val_photo){
				$image_detail = $path_dir_detail.$val_photo['image'];
				$thumb_detail = $path_dir_detail.$val_photo['thumb'];
				$webps_detail = $path_dir_detail.$val_photo['webps'];
				$webps_thumb_detail = $path_dir_detail.$val_photo['webps_thumb'];
				if ($val_photo['image']!='') {
					if (file_exists($image_detail)) {
						unlink($image_detail);
					}
				}
				if ($val_photo['thumb']!='') {
					if (file_exists($thumb_detail)) {
						unlink($thumb_detail);
					}
				}
				if ($val_photo['webps']!='') {
					if (file_exists($webps_detail)) {
						unlink($webps_detail);
					}
				}
				if ($val_photo['webps_thumb']!='') {
					if (file_exists($webps_thumb_detail)) {
						unlink($webps_thumb_detail);
					}
				}
			}
			$filename = $this->path_dir . $datas['image'];
			$filenamethumb = $this->path_dir . $datas['thumb'];
			$web_image = explode('.', $datas['image']);
			$web_thumb = explode('.', $datas['thumb']);
			// webp
			$fileNamewebp =  $this->path_dir_webp . $web_image[0] . '.webp';
			$fileNamewebp_thumb =  $this->path_dir_webp . $web_thumb[0] . '.webp';
			//
			$orther_img = $this->path_dir . $datas['orther_img'];
			$orther_thumb = $this->path_dir . $datas['orther_thumb'];
			//
			$orther2_img = $this->path_dir . $datas['orther2_img'];
			$orther2_thumb = $this->path_dir . $datas['orther2_thumb'];
			if ($datas != NULL) {
				if (file_exists($filename)) {
					unlink($filename);
				}
				if ($filenamethumb) {
					unlink($filenamethumb);
				}
				if (file_exists($fileNamewebp)) {
					unlink($fileNamewebp);
				}
				if (file_exists($fileNamewebp_thumb)) {
					unlink($fileNamewebp_thumb);
				}
				if ($datas['orther_img'] != '' && file_exists($orther_img)) {
					unlink($orther_img);
				}
				if ($datas['orther_thumb'] != '' && file_exists($orther_thumb)) {
					unlink($orther_thumb);
				}
				if ($datas['orther2_img'] != '' && file_exists($orther2_img)) {
					unlink($orther2_img);
				}
				if ($datas['orther2_thumb'] != '' && file_exists($orther2_thumb)) {
					unlink($orther2_thumb);
				}

				$alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
				$result = $this->ProductModels->deleteWhere(array('id' => $val));
				$this->PhotoProductModels->deleteWhere(array('ProductID' => $id));
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
		$result = $this->ProductModels->edit($dataUpdate, array('id' => $id));
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
		$result = $this->ProductModels->edit($data_update, array('id' => $id));
		if ($result > 0) {
			echo json_encode(array('rs' => 1));
		}
	}
	function del_image()
	{
		$this->checkPermission();
		$id = $this->request->getPost('id');
		$datas = $this->ProductModels->where_in(array('id' => $id));

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
			$result = $this->ProductModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
	// 
	function checkVideo(){
		if ($_FILES['video']['name']) {
			$errors = [];
			if ($_FILES['video']['type'] !="video/mp4") {
				$arr = array(
					'result'	=> 'false',
					'message'	=> 'Sai định dạng video'
				);
				array_push($errors,$arr);
			}
			else{
				if ($_FILES['video']['size'] > 2*1024*1024) {
					$arr = array(
						'result'	=> 'false',
						'message'	=> 'Kích thước file phải nhỏ hơn 2MB'
					);
					array_push($errors,$arr);
				}
				else{
					$arr = array(
						'result'	=> 'true',
						'message'	=> ''
					);
					array_push($errors,$arr);
				}
			}
			echo json_encode($errors);
		}
	}
	function move(){
		$date = gmdate('Y-d-m H',time()+7*3600);
		$dates = str_replace(' ',"-",$date);
		$name_date = str_replace(':','-',$dates);
		if ($_REQUEST) {
			$filePath = $this->path_video;
			if (!file_exists($filePath)) { 
				if (!mkdir($filePath, 0777, true)) {
					verbose(0, "Failed to create $filePath");
				}
			}
			$fileName = isset($_REQUEST["name"]) ? $_REQUEST["name"] : $_FILES["file"]["name"];
			$filePath = $filePath . DIRECTORY_SEPARATOR . $_REQUEST['file_id'].'-'.$fileName;
			$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
			$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
			$out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");
			if ($out) {
				$in = @fopen($_FILES['file']['tmp_name'], "rb");
				if ($in) {
				while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
				} else {
					echo json_encode(["ok" => 0,"info" => "Failed to open input stream"]);
				}
				@fclose($in);
				@fclose($out);
				@unlink($_FILES['file']['tmp_name']);
			} else {
					echo json_encode(["ok" => 0,"info" => "Failed to open output stream"]);
			}
			if (!$chunks || $chunk == $chunks - 1) {
				rename("{$filePath}.part", $filePath);
			}
			echo json_encode(["ok" => 1,"info" => $_REQUEST['file_id'].'-'.$fileName]);
			$array = array(
				'courseID' 		=> 0,
				'name'			=> $_REQUEST['file_id'].'-'.$fileName,
				'created_at'	=> gmdate('Y-m-d H:i:s',time() + 7 *3600)
			);
			$this->VideoModels->add($array);
		}
		
			
	}
	
	function deldropzonebyID(){
		$id   = $_POST['id'];
		$data = $this->PhotoProductModels->select_row('*', array('id' => $id));
		$file  = $this->path_dir . 'detail/' . $data['image'];
		$thumb =  $this->path_dir . 'detail/' . $data['thumb'];
		// webp
		$webpImage      = explode(".", $data['image']);
		$webpImageThumb = explode(".", $data['thumb']);
		$imageWebp      = $this->path_dir_webp . 'detail/' . $webpImage[0] . '.webp';
		$imageWebpThumb = $this->path_dir_webp . 'detail/' . $webpImageThumb[0] . '.webp';
		// 
		if($data['image']!=''){
			if (file_exists($file)) {
				unlink($file);
			}
		}
		if ($data['thumb'] !='') {
			if (file_exists($thumb)) {
				unlink($thumb);
			}
		}
		if ($data['webps'] !='') {
			if (file_exists($imageWebp)) {
				unlink($imageWebp);
			}
		}
		if ($data['webps_thumb'] !='') {
			if (file_exists($imageWebpThumb)) {
				unlink($imageWebpThumb);
			}
		}
		$this->PhotoProductModels->deleteWhere(array('id' => $id));
	}
	function checkcode(){
		$arr = [];
		$data  = $this->ProductModels->select_array('*',array('code' => $_POST['code']));
		if (count($data) > 0) {
			$array = array(
				'result' => 'false',
				'message'	=> 'Mã sản phẩm đã được sử dụng',
				'type'		=> 'code'
			);
			array_push($arr,$array);
		}
		else{
			$array = array(
				'result' 	=> 'true',
				'message'	=> '',
				'type'		=> 'code'
			);
			array_push($arr,$array);
		}
		echo json_encode($arr);
	}
	function checkcodeEdit(){
		$arr = [];
		$data  = $this->ProductModels->select_where_not_in(array('code' => $_POST['code']),array($_POST['id']));
		if (count($data) > 0) {
			$array = array(
				'result' => 'false',
				'message'	=> 'Mã sản phẩm đã được sử dụng',
				'type'		=> 'code'
			);
			array_push($arr,$array);
		}
		else{
			$array = array(
				'result' 	=> 'true',
				'message'	=> '',
				'type'		=> 'code'
			);
			array_push($arr,$array);
		}
		echo json_encode($arr);
	}
	function del_image2()
	{
		$this->checkPermission();
		$id = $this->request->getPost('id');
		$image_name = $this->request->getPost('image_name');
		$thumb_name = $this->request->getPost('thumb_name');
		$datas = $this->ProductModels->where_in(array('id' => $id));

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
			$result = $this->ProductModels->edit($data_update, array('id' => $id));
			if ($result) {
				echo json_encode(array(
					'result' => "success",
					"message"	=> "Xóa hình thành công"
				));
			}
		}
	}
}
