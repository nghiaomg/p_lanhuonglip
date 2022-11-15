<?php

namespace App\Controllers;

use App\Models\ModuleModels;
use CodeIgniter\Controller;
use App\Models\MyModels;
use App\Models\ContentsModels;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\CI_auth;
use App\Models\PermissionModels;
use App\Libraries\Mobile_Detect;
use App\Models\SystemModels;
use App\Models\ServiceModels;
use App\Models\BranchModels;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	protected $helpers = ['form', 'url', 'text', 'date', 'array'];
	const PERCENT_DEF  = 0.6; // 60%
	const CHECKED  	   = "checked"; // Check checkbox is checked
	protected $viewMoreConstructionLink = "cong-trinh-tieu-bieu"; // Check checkbox is checked
	protected $session;

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();
		$this->MyModels 		= new MyModels();
		$this->ContentsModels 	= new ContentsModels();
		$this->ServiceModels 			= new ServiceModels();
		$this->db  = \Config\Database::connect('default');
		$this->db->reconnect();
		//==================
		$this->session = \Config\Services::session();
        $this->session->start();

		$this->Mobile_Detect = new Mobile_Detect();
	}
	//--------------------------------------------------------------------
	// get data for FE
	//--------------------------------------------------------------------
	protected function get_index()
	{
		$data['systems']     	= $this->get_system();
		$data['getinfoUser'] 	= $this->getinfoUser();
		$data['getlogo']		= $this->getlogo();
		$data['footerInfo']		= $this->footerInfo();
		$data['branchs']		= $this->branchs();
		$data['socials']		= $this->socials();
		$data['box_ads'] 		= $this->box_ads();
		$data['crt'] 			= $this->get_control();
		$data['act'] 			= $this->get_act();
		$data['imageShare'] 	= $this->get_image_share();
		$data['check_Browser'] 	= $this->check_Browser();
		$data['checkScreen'] 	= $this->checkScreen();
		$data['cateMain'] 		= $this->getCateMain();
		$data['menuFooter']		= $this->menuFooter();
		$data['menuTop']		= $this->menuTop();
		$data['getCateRight']	= $this->getCateRight();
		$data['getCateLeft']	= $this->getCateLeft();
		$data['getCatefooter']	= $this->getCatefooter();
		$data['getmethodpay']	= $this->getmethodpay();
		$data['getkeys']		= $this->getkeys();
		$data['getCateTop']		= $this->getCateTop();
		$data['getbanner']		= $this->getbanner();
		$data['getServices']	= $this->getServices();
		$data['slogan'] 		= $this->getSlogan();
		$data['totalItemCart'] 	= $this->totalItemCart();
		return $data;
	}

	//--------------------------------------------------------------------
	// get data for BE
	//--------------------------------------------------------------------
	protected function get_indexBE()
	{
		$data['get_module'] 	= $this->get_module();
		$data['get_profile'] 	= $this->get_profile();
		$data['thumb_profile']  = $this->get_path_dir_thumb_profile();
		$data['systems'] 	 	= $this->get_system();
		$data['getlogo']		= $this->getlogo();
		return $data;
	}
	protected function getSlogan(){
		$slogan = NULL;
		$slogan_js 		= $this->SystemModels->where_in(array('type'=>'slogan'));
		if($slogan_js != NULL)
		{	
			$slogan	= json_decode($slogan_js['contents'],true);
		}
		return $slogan;
	}
	protected function totalItemCart(){
		$session = session();
		$listCart = $this->session->get("listCart");
		if($listCart == NULL){
			return 0;
		}else{
			return count($listCart);
		}
	}
	
	protected function getCateMain()
	{
		$data = $this->db->table('tbl_menu')->select('id,name,name_en,link,type,categoryid')->where(array('publish' => 1,'main' => 1))->orderBy('sort asc,id desc')->get()->getResultArray();

		if ($data != NULL) {
			foreach ($data as $key => $val) {
				if ($val['type'] == 0) {
					$url = $val['link'];
				} else {
					$cate = $this->db->table('tbl_category')->select('id,alias')->where(array('id' => $val['categoryid']))->get()->getRowArray();
					$url = $cate['alias'];
				}
				$data[$key]['url'] = $url;
				$temp_url          = $url;

				// menu child
				$dataChild =  $this->db->table('tbl_menu')->select('id,name,link,type,categoryid')->where(array('publish' => 1, 'parentid' => $val['id']))->orderBy('sort asc,id desc')->get()->getResultArray();
				if ($dataChild != NULL) {
					foreach ($dataChild as $key_child => $val_child) {
						if ($val_child['type'] == 0) {
							$url = $val_child['link'];
						} else {
							$cate_child = $this->db->table('tbl_category')->select('id,alias,type')->where(array('id' => $val_child['categoryid']))->get()->getRowArray();
							$url = $cate_child['alias'];
							if ($cate_child['type'] == 12) {
								$url = "du-an/" . $cate_child['alias'];
							}
						}
						$dataChild2 = $this->db->table('tbl_menu')->select('id,name,link,type,categoryid')->where(array('publish' => 1, 'parentid' => $val_child['id']))->orderBy('sort asc,id desc')->get()->getResultArray();
						if ($dataChild2 != NULL) {
							foreach ($dataChild2 as $key_child2 => $val_child2) {
								if ($val_child2['type'] == 0) {
									$url = $val_child2['link'];
								} else {
									$cate_child2 = $this->db->table('tbl_category')->select('id,alias,type')->where(array('id' => $val_child2['categoryid']))->get()->getRowArray();
									$url = $cate_child2['alias'];
									
								}
								$dataChild2[$key_child2]['url'] = $url;
							}
						}
						$dataChild[$key_child]['url'] = $url;
						$dataChild[$key_child]['child'] = $dataChild2;
					}
					$data[$key]['child'] = $dataChild;
				}
			}
		}
		return $data;
	}
	protected function menuFooter(){
		$data = $this->MyModels->select_array_table('tbl_menu','*',array('footer'=>1,'publish' => 1,'parentid'=>0),'sort asc');
		foreach($data as $key => $val){
			$children = $this->MyModels->select_array_table('tbl_menu','*',array('publish'=>1,'parentid'=>$val['id']),'sort asc');
			$data[$key]['children'] = $children;
			foreach($data[$key]['children'] as $key2 => $val2)
			{	
				$cate = $this->db->table('tbl_category')->select('id,alias')->where(array('id' => $val2['categoryid']))->get()->getRowArray();
				if($cate != NULL)
				{
					if($data[$key]['children'][$key2]['link'] == "" || $data[$key]['children'][$key2]['link'] == "/")
					{
						$data[$key]['children'][$key2]['link'] = $cate['alias'];
					}
				}
				
			}
		}
		return $data;
	}
	protected function menuTop(){
		$data = $this->db->table('tbl_menu')->select('id,name,name_en,link,type,categoryid')->where(array('publish' => 1,'top' => 1))->orderBy('sort asc,id desc')->get()->getResultArray();

		if ($data != NULL) {
			foreach ($data as $key => $val) {
				if ($val['type'] == 0) {
					$url = $val['link'];
				} else {
					$cate = $this->db->table('tbl_category')->select('id,alias')->where(array('id' => $val['categoryid']))->get()->getRowArray();
					$url = $cate['alias'];
				}
				$data[$key]['url'] = $url;
				$temp_url          = $url;
			}
		}
		return $data;
	}
	protected function getCateRight()
	{
		$data = $this->db->table('tbl_menu')->select('id,name,link,type,categoryid')->where(array('publish' => 1, 'hot' => 1))->orderBy('sort asc,id desc')->get()->getResultArray();

		if ($data != NULL) {
			foreach ($data as $key => $val) {
				if ($val['type'] == 0) {
					$url = $val['link'];
				} else if ($val['type'] == 3) {
					$url = $val['link'];
				} else {
					$cate = $this->db->table('tbl_category')->select('id,alias')->where(array('id' => $val['categoryid']))->get()->getRowArray();
					$url = $cate['alias'];
				}
				$data[$key]['url'] = $url;
				$temp_url          = $url;

				// menu child
				$dataChild =  $this->db->table('tbl_menu')->select('id,name,link,type,categoryid')->where(array('publish' => 1, 'parentid' => $val['id']))->orderBy('sort asc,id desc')->get()->getResultArray();
				if ($dataChild != NULL) {
					foreach ($dataChild as $key_child => $val_child) {
						if ($val_child['type'] == 0) {
							$url = $val_child['link'];
						} else if ($val_child['type'] == 3) {
							$url = $val_child['link'];
						} else {
							$cate_child = $this->db->table('tbl_category')->select('id,alias,type')->where(array('id' => $val_child['categoryid']))->get()->getRowArray();
							$url = $cate_child['alias'];
						}
						$dataChild2 = $this->db->table('tbl_menu')->select('id,name,link')->where(array('publish' => 1, 'parentid' => $val_child['id']))->orderBy('sort asc,id desc')->get()->getResultArray();;
						$dataChild[$key_child]['url'] = $url;
						$dataChild[$key_child]['child'] = $dataChild2;
					}
					$data[$key]['child'] = $dataChild;
				}
			}
		}
		return $data;
	}
	protected function getCateLeft()
	{
		$data = $this->db->table('tbl_menu')->select('id,name,link,type,categoryid')->where(array('publish' => 1, 'bottom' => 1))->orderBy('sort asc,id desc')->get()->getResultArray();

		if ($data != NULL) {
			foreach ($data as $key => $val) {
				if ($val['type'] == 0) {
					$url = $val['link'];
				} else {
					$cate = $this->db->table('tbl_category')->select('id,alias')->where(array('id' => $val['categoryid']))->get()->getRowArray();
					$url = $cate['alias'];
				}
				$data[$key]['url'] = $url;
				$temp_url          = $url;

				// menu child
				$dataChild =  $this->db->table('tbl_menu')->select('id,name,link,type,categoryid')->where(array('publish' => 1, 'parentid' => $val['id']))->orderBy('sort asc,id desc')->get()->getResultArray();
				if ($dataChild != NULL) {
					foreach ($dataChild as $key_child => $val_child) {
						if ($val_child['type'] == 0) {
							$url = $val_child['link'];
						} else {
							$cate_child = $this->db->table('tbl_category')->select('id,alias,type')->where(array('id' => $val_child['categoryid']))->get()->getRowArray();
							$url = $cate_child['alias'];
						}
						$dataChild2 = $this->db->table('tbl_menu')->select('id,name,link')->where(array('publish' => 1, 'parentid' => $val_child['id']))->orderBy('sort asc,id desc')->get()->getResultArray();;
						$dataChild[$key_child]['url'] = $url;
						$dataChild[$key_child]['child'] = $dataChild2;
					}
					$data[$key]['child'] = $dataChild;
				}
			}
		}
		return $data;
	}
	protected function getCatefooter()
	{
		$data = $this->db->table('tbl_menu')->select('id,name,link,type,categoryid')->where(array('publish' => 1, 'footer' => 1))->orderBy('sort asc,id desc')->get()->getResultArray();

		if ($data != NULL) {
			foreach ($data as $key => $val) {
				if ($val['type'] == 0) {
					$url = $val['link'];
				} else if ($val['type'] == 3) {
					$url = $val['link'];
				} else {
					$cate = $this->db->table('tbl_category')->select('id,alias')->where(array('id' => $val['categoryid']))->get()->getRowArray();
					$url = $cate['alias'];
				}
				$data[$key]['url'] = $url;
				$temp_url          = $url;

				// menu child
				$dataChild =  $this->db->table('tbl_menu')->select('id,name,link,type,categoryid')->where(array('publish' => 1, 'parentid' => $val['id']))->orderBy('sort asc,id desc')->get()->getResultArray();
				if ($dataChild != NULL) {
					foreach ($dataChild as $key_child => $val_child) {
						if ($val_child['type'] == 0) {
							$url = $val_child['link'];
						} else if ($val_child['type'] == 3) {
							$url = $val_child['link'];
						} else {
							$cate_child = $this->db->table('tbl_category')->select('id,alias,type')->where(array('id' => $val_child['categoryid']))->get()->getRowArray();
							$url = $cate_child['alias'];
						}
						$dataChild2 = $this->db->table('tbl_menu')->select('id,name,link')->where(array('publish' => 1, 'parentid' => $val_child['id']))->orderBy('sort asc,id desc')->get()->getResultArray();;
						$dataChild[$key_child]['url'] = $url;
						$dataChild[$key_child]['child'] = $dataChild2;
					}
					$data[$key]['child'] = $dataChild;
				}
			}
		}
		return $data;
	}
	protected function getCateTop()
	{
		$data = $this->db->table('tbl_menu')->select('id,name,link,type,categoryid')->where(array('publish' => 1, 'main' => 1))->orderBy('sort asc,id desc')->get()->getResultArray();

		if ($data != NULL) {
			foreach ($data as $key => $val) {
				if ($val['type'] == 0) {
					$url = $val['link'];
				} else {
					$cate = $this->db->table('tbl_category')->select('id,alias')->where(array('id' => $val['categoryid']))->get()->getRowArray();
					$url = $cate['alias'];
				}
				$data[$key]['url'] = $url;
				$temp_url          = $url;

				// menu child
				$dataChild =  $this->db->table('tbl_menu')->select('id,name,link,type,categoryid')->where(array('publish' => 1, 'parentid' => $val['id']))->orderBy('sort asc,id desc')->get()->getResultArray();
				if ($dataChild != NULL) {
					foreach ($dataChild as $key_child => $val_child) {
						if ($val_child['type'] == 0) {
							$url = $val_child['link'];
						} else if ($val_child['type'] == 3) {
							$url = $val_child['link'];
						} else {
							$cate_child = $this->db->table('tbl_category')->select('id,alias,type')->where(array('id' => $val_child['categoryid']))->get()->getRowArray();
							$url = $cate_child['alias'];
						}
						$dataChild2 = $this->db->table('tbl_menu')->select('id,name,link')->where(array('publish' => 1, 'parentid' => $val_child['id']))->orderBy('sort asc,id desc')->get()->getResultArray();;
						$dataChild[$key_child]['url'] = $url;
						$dataChild[$key_child]['child'] = $dataChild2;
					}
					$data[$key]['child'] = $dataChild;
				}
			}
		}
		return $data;
	}
	function getmethodpay(){
		return $this->db->table('tbl_method_pay')->select('*')->where(array('publish' => 1))->orderBy('sort asc,id desc')->get()->getResultArray();
	}
	protected function get_module()
	{
		$this->CI_auth 				= new CI_auth();
		$this->PermissionModels  	= new PermissionModels();

		//lấy ID của user đang đăng nhập
		$adminIDLogged 				= $this->CI_auth->infoAdmin()["id"];
		$getAdmin 					= $this->CI_auth->infoAdmin();
		$roleIDLogged 				= $getAdmin['id_role'];
		$getPermissionByRoleID 		= $this->PermissionModels->select_array("*", array("roleID" => $roleIDLogged));

		$allowed = array();
		$data = $this->MyModels->select_array_table('tbl_module', '*', array('publish' => 1, 'parentid' => 0), 'sort asc,id desc');
		if ($roleIDLogged != 0) {
			// Get parents allowed accessed
			foreach ($data as $key => $val) {
				$childModule  = $this->MyModels->select_array_table('tbl_module', '*', array('publish' => 1, 'parentid' => $val['id']), 'sort asc,id desc');
				if (count($childModule) == 0) {
					if (count($getPermissionByRoleID) > 0) {
						foreach ($getPermissionByRoleID as $key_per => $val_per) {
							if ($val['link'] != "") {
								if ($val_per['controller'] . "/" . $val_per['action'] == $val['link']) {
									array_push($allowed, $val);
									break;
								}
							}
						}
					}
				} elseif (count($childModule) != 0) {
					foreach ($childModule as $key_child => $val_child) {
						$count = 0;
						if (count($getPermissionByRoleID) > 0) {
							foreach ($getPermissionByRoleID as $key_per => $val_per) {
								if ($val_child["link"] != "" && $val_per['controller'] . "/" . $val_per['action'] == $val_child['link']) {
									$count += 1;
									break;
								}
							}
						}
						if ($count > 0) {
							array_push($allowed, $val);
							break;
						}
					}
				}
			}

			// Get child modules
			foreach ($allowed as $key_allow => $val_allow) {
				$childHavePermission = array();
				$childModule  = $this->MyModels->select_array_table('tbl_module', '*', array('publish' => 1, 'parentid' => $val_allow['id']), 'sort asc,id desc');
				if ($getPermissionByRoleID != NULL && count($getPermissionByRoleID) > 0) {
					foreach ($getPermissionByRoleID as $key_per => $val_per) {
						foreach ($childModule as $key_child => $val_child) {
							if ($val_child['link'] != "") {
								if ($val_per['controller'] . "/" . $val_per['action'] == $val_child['link']) {
									array_push($childHavePermission, $val_child);
								}
							}
						}
					}
					if (count($childHavePermission) > 0) {
						$allowed[$key_allow]["child"] = $childHavePermission;
					}
				}
			}
			return $allowed;
		} else {
			foreach ($data as $key => $val) {
				$data[$key]['child']  = $this->MyModels->select_array_table('tbl_module', '*', array('publish' => 1, 'parentid' => $val['id']), 'sort asc,id desc');
			}
			return $data;
		}
	}

	//check screen is mobile
	// protected function checkScreen()
	// {
	// 	$detect = new Mobile_Detect();
	// 	var_dump($detect);die;
	// 	if ( $detect->isMobile() ) {
	// 		die('okk');
	// 	}
	// 	if( $detect->isTablet() && $detect->isMobile() ){
	// 		die('okk222');
	// 	}
	// 	// Exclude tablets.
	// 	if( $detect->isMobile() && !$detect->isTablet() ){
	// 		die('okk333');
	// 	}
	// 	return $result;
	// }
	protected function checkScreen()
	{
		$agent = $this->request->getUserAgent();
		// var_dump($agent);die;
		if ($agent->isMobile('iphone') || $agent->isMobile('Android')) {
			$result = 'mobile';
		} elseif ($agent->isMobile()) {
			$result = 'tablet';
		} else {
			$result = 'destop';
		}
		// echo $result;
		return $result;
	}

	protected function get_profile()
	{
		$session = session();
		$data = $this->MyModels->select_row_table('tbl_admin', '*', array('id' => $session->get('id')));
		return $data;
	}
	protected function get_path_dir_thumb_profile()
	{
		$session = session();
		$data = $this->MyModels->select_row_table('tbl_admin', '*', array('id' => $session->get('id')));
		if ($data['thumb'] != '') {
			$thumb =  $path_dir_thumb = 'uploads/images/admin/' . $data['thumb'];
			if (file_exists($thumb)) {
				return $path_dir_thumb = 'uploads/images/admin/' . $data['thumb'];
			}
		}
	}
	protected function get_system()
	{
		$system = $this->MyModels->select_row_table('tbl_system', 'contents', array('type' => 'system'));
		$data['system'] = json_decode($system['contents'], true);
		//contact 
		$contact = $this->MyModels->select_row_table('tbl_system', 'contents', array('type' => 'contact'));
		$data['contact'] = json_decode($contact['contents'], true);
		//google 
		$google = $this->MyModels->select_row_table('tbl_system', 'contents', array('type' => 'google'));
		$data['google'] = json_decode($google['contents'], true);
		//content home 
		$homeContent = $this->MyModels->select_row_table('tbl_system', 'contents', array('type' => 'home'));
		$data['homeContent'] = json_decode($homeContent['contents'], true);
		//content home 
		$socialContent = $this->MyModels->select_row_table('tbl_system', 'contents', array('type' => 'social'));
		$data['social'] = json_decode($socialContent['contents'], true);
		//content info 
		$infoContent = $this->MyModels->select_row_table('tbl_system', 'contents', array('type' => 'info'));
		$data['info'] = json_decode($infoContent['contents'], true);
		//content banner footer 
		$bnfooter = $this->MyModels->select_row_table('tbl_system', 'contents', array('type' => 'bannerfooter'));
		$data['bnfooter'] = json_decode($bnfooter['contents'], true);
		return $data;
	}
	// ===================================== front end =============================================================
	protected function getinfoUser()
	{
		return $this->MyModels->select_row_table('tbl_user', 'id,fullname,phone,email,balance,password', array('id' => session('id_user')));
	}

	protected function getlogo()
	{
		$data =  $this->db->table('tbl_photo')->select('*')->where(array('type' => 'logo'))->get()->getRowArray();
		$data['path_dir'] = 'uploads/images/logo/';
		return $data;
	}

	protected function get_act()
	{
		$router = service('router');
		return $router->methodName();
	}

	protected function get_control()
	{
		$router = service('router');
		return $router->controllerName();
	}

	protected function get_image_share()
	{
		$data =  $this->db->table('tbl_photo')->select('*')->where(array('type' => 'logo'))->get()->getRowArray();
		return 'uploads/images/logo/'.$data['thumb'];
	}

	protected function box_ads()
	{
		return $this->db->table('tbl_quang_cao')->select('thumb,id,link,name,webps_thumb')->where(array('publish' => 1))->orderBy('sort asc,id desc')->get()->getResultArray();
	}

	function check_Browser()
	{
		$browser = "";
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') && !strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome')) {
			$browser = true;
		} else {
			$browser = false;
		}
		return $browser;
	}

	# Check permission each choose feature
	protected function checkPermission()
	{
		$this->CI_auth 				= new CI_auth();
		$this->PermissionModels  	= new PermissionModels();

		//lấy ID của user đang đăng nhập
		$adminIDLogged 			 = $this->CI_auth->infoAdmin()["id"];
		$getAdmin 				 = $this->CI_auth->infoAdmin();
		$roleIDLogged 			 = $getAdmin['id_role'];
		$getAllPermission 		 = $this->PermissionModels->select_array("*", array("roleID" => $roleIDLogged));

		// Get current Routes
		$request 				 = \Config\Services::request();
		$uri 					 = $request->uri;
		$path 					 = $uri->getSegments();

		if ($roleIDLogged != 0) {
			$currentController 	 = $path[1];
			$currentAction 		 = $path[2];

			$getPermissionDetail = $this->PermissionModels->select_row("*", array("roleID" => $roleIDLogged, "controller" => $currentController, "action" => $currentAction));

			// Không có quyền truy cập
			if ($getPermissionDetail == NULL) {
				# Kiem tra request duoc goi boi Ajax hay khong?
				if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
					echo json_encode(array("type" => "error", "redirect" => 'not-permission'));
					die;
				} else {
					return $this->response->redirect(base_url("not-permission"));
				}
			}
		}
	}

	public function redirectPermission()
	{
		if (!$this->checkPermission()) {
			return $this->response->redirect(base_url("not-permission"));
		}
	}

	protected function branchs()
	{
		$this->BranchModels = new BranchModels();
		$branch = $this->BranchModels->select_array('*', ['publish' => 1], "sort asc"); // chi nhánh  
		return $branch;
	}

	# Load page not permission page when not have permission
	public function notPermission()
	{
		//Check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$data_index 	    = $this->get_indexBE();
		$data = array(
			'title'		 	=>  'Thông báo quyền truy cập',
			'template'	 	=>  'backend/permission/not_permission',
			'data_index' 	=>  $data_index,
		);
		return view('backend/default', isset($data) ? $data : NULL);
	}

	public  function footerInfo()
	{
		// footer
		$this->SystemModels = new SystemModels();
		$footerContent = $this->SystemModels->where_in(array('type' => 'footer'));
		$footer = json_decode($footerContent['contents'], true);

		return $footer;
	}

	public function socials()
	{
		// footer
		$this->SystemModels = new SystemModels();
		$socialsContent = $this->SystemModels->where_in(array('type' => 'social'));
		$socials = json_decode($socialsContent['contents'], true);

		return $socials;
	}
	/*-------------- Tinh tien lai ngan hang ------------------
	| $loan: So tien vay
	| $borrowedTime: Thoi gian cho vay
	| $interestRate: Lai xuat cho vay
	|----------------------------------------------------------*/
	public function calculateInterestRate($loan, $borrowedTime = 1, $interestRate)
	{
		$interestPerMonthArr 		 = array();
		$interestPerMonthArr['info'] = array();

		$principalPerMonth      = (int) $loan / $borrowedTime; // Tien goc/thang
		$interestPercent        = (int) $interestRate / $borrowedTime; // % Lai suat/thang

		if ($borrowedTime > 1) {
			$totalPrincipal 			= (int) $principalPerMonth * $borrowedTime;
			$totalInterest  			= 0.0;
			$totalPrincipalAndInterest  = 0.0;

			$remainingPrincipal = $loan;
			for ($i = 1; $i <= $borrowedTime; $i++) {
				$remainingPrincipal    -= (int) $principalPerMonth; // Tien goc con lai
				$interest               = (int) $remainingPrincipal * $interestPercent / 100; //Lai xuat
				$principalAndInterest   = (int) $principalPerMonth + $interest;   // Goc + Lai

				$totalInterest += (int) $interest;
				$totalPrincipalAndInterest += (int) $principalAndInterest;

				// Add information of month to array
				$item = array(
					"month"                    => $i,
					"remainingPrincipal"       => $this->numberFormat($remainingPrincipal, 0, ".", '.'),
					"principal"                => $this->numberFormat($principalPerMonth, 0, ".", '.'),
					"interest"                 => $this->numberFormat($interest, 0, ".", '.'),
					"principalAndInterest"     => $this->numberFormat($principalAndInterest, 0, ".", '.'),
					// "principalAndInterest"     => $principalAndInterest
				);
				array_push($interestPerMonthArr['info'], $item);
			}

			$interestPerMonthArr["totalPrinciple"]            = $this->numberFormat($totalPrincipal, 0, ".", '.');
			$interestPerMonthArr["totalInterest"]             = $this->numberFormat($totalInterest, 0, ".", '.');
			$interestPerMonthArr["totalPrincipalAndInterest"] = $this->numberFormat($totalPrincipalAndInterest, 0, ".", '.');
		}
		return $interestPerMonthArr;
	}

	// Format currency
	function numberFormat($number, $decimals = 0, $decPoint = '.', $thousandsSep = ',')
	{
		$negation 	 = ($number < 0) ? (-1) : 1;
		$coefficient = pow(10, $decimals);
		$number 	 = $negation * floor((string)(abs($number) * $coefficient)) / $coefficient;
		// return $number;
		return number_format($number, $decimals, $decPoint, $thousandsSep);
	}
	/* ----------------------------------------- End - tinh lai xuat ngan hang ------------------------------------------------- */



	/*-------------- Du tinh dien tich xay dung ------------------
	| $landArea: Dien tich dat
	| $constructArea: Dien tich xau dung
	| $tunnel: Ham (A number)
	| $groundFloor: Tang tret
	| $mezzanine: Lung
	| $floor: Lau
	| $terrace: San thuong
	| $roof: Mai
	|----------------------------------------------------------*/
	public function getConstructArea()
	{
		$landArea = $_POST['landArea'];
		echo $landArea < 90 ? $landArea : round($landArea * BaseController::PERCENT_DEF);
	}



	public function getCoefficient($arr, $value)
	{
		# * Chu y: $value la he so
		$coefficient = 0;
		foreach ($arr as $key => $val) {
			if ($val['coefficient'] != NULL && $val['coefficient'] >= 0) {
				return $value == ($val["coefficient"] / 100) ? ($val['coefficient'] / 100) : null;
			}
		}
	}
	/* ----------------------------------------- End - Du tinh dien tich xay dung ------------------------------------------------- */

	//check screen is mobile
	protected function checkIsMobileScreen()
	{
		$isScreen = '';
		$detect = new Mobile_Detect();
		if ($detect->isMobile()) {
			$isScreen = 'mobile';
		}
		if ($detect->isTablet()) {
			$isScreen = 'tablet';
		}
		return $isScreen;
	}
	function getkeys(){
		$data = $this->db->table('tbl_constants')->select('*')->get()->getResultArray();
		$arr_key = NULL;
		if(isset($data) && $data != NULL){
			foreach ($data as $key => $val) {
                $arr_key[trim($val['key_constants'])] = $val['name'.session('lang').''];
            }
		}
		return $arr_key;
	}
	// // Get capacity profile
	// public function getCapacityProfile()
	// {
	// 	$systemObj = new SystemModels();
	// 	$capacityProfile = $systemObj->where_in(array('type' => 'capacity'));
	// 	$capacity = json_decode($capacityProfile['contents'], true);
	// 	return ($capacity != NULL) ? $capacity : NULL;
	// }
	function getbanner(){
		$banner_js = $this->ContentsModels->where_in(array('key' => 'banner'));
		$banner = [];
		if ($banner_js != NULL && $banner_js['content'] !='' && $banner_js['content']  != NULL) {
			$banner = json_decode($banner_js['content'],true);
		}
		// var_dump($banner);die;
		return 	$banner;
	}
	function getServices(){
		// Service
		$service = $this->ServiceModels->select_array('*',['publish' => 1],'sort asc,id desc');
		return $service;
	}
}
