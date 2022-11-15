<?php

namespace App\Controllers;

use App\Models\CI_function;
use App\Models\PhotoModels;
use App\Models\ContentsModels;
use App\Models\VideoModels;
use App\Controllers\BaseController;
use App\Models\ProductModels;
use App\Models\NewsModels;
use App\Models\SystemModels; 
use App\Models\CategoryModels; 
use App\Models\MailsModels;
use App\Models\InstagramModels;
use App\Models\SloganModel;
use App\Models\AboutModel; 
use App\Models\AlbumModels;
use App\Models\RegisstudyModels;

class Home extends BaseController
{
	
	private $template 			  = 'frontend/home/';

	public function __construct()
	{
		$this->CI_function 				= new CI_function();
		$this->ContentsModels 			= new ContentsModels();
		$this->PhotoModels 				= new PhotoModels();
		$this->VideoModels 				= new VideoModels();
		$this->ProductModels 			= new ProductModels();
        $this->NewsModels 				= new NewsModels();
        $this->SystemModels 			= new SystemModels();
        $this->CategoryModels 			= new CategoryModels();
        $this->MailsModels 				= new MailsModels();
        $this->SloganModel 				= new SloganModel();
        $this->InstagramModels 			= new InstagramModels();
        $this->AboutModel 				= new AboutModel();
        $this->AlbumModels 				= new AlbumModels();
        $this->RegisstudyModels 		= new RegisstudyModels();
	}

	public function index()
	{
		$data_index = $this->get_index();
		// slide 
		$slides = $this->PhotoModels->select_array('*',['publish' => 1,'type' =>'slide'],'sort asc');
		// about 
		$aboutRowJson = $this->AboutModel->where_in(array('key' => 'about'));
        //Decode Json
        if ($aboutRowJson != NULL) {
            $aboutRow = json_decode($aboutRowJson['content'], true);
        }
		// ads
		$adss = $this->PhotoModels->select_array('*',['publish' => 1,'type' =>'ads'],'sort asc');
		// banner quảng cáo
		$banner2RowJson = $this->ContentsModels->where_in(array('key' => 'banner2'));
		$banner2Row = json_decode($banner2RowJson['content'], true);
		$banner3RowJson = $this->ContentsModels->where_in(array('key' => 'banner3'));
		$banner3Row = json_decode($banner3RowJson['content'], true);

		

		$cateHomes = $this->CategoryModels->select_array('id, name, alias, thumb',['publish' => 1,'home' => 1],'sort asc,id desc', 0, 3);
		if($cateHomes != NULL){
			foreach ($cateHomes as $key_cateHome => $val_cateHome) {
				$products = $this->ProductModels->select_array('id, name, alias, image, thumb, price_sale, price',['publish' => 1,'cateid' => $val_cateHome['id']],'id desc', 0, 8);
				$cateHomes[$key_cateHome]['products'] = $products;
			}
		}
		// var_dump($cateHomes);die;
		
		// partners
		$instagrams = $this->InstagramModels->select_array('id, name, thumb, link',['publish' => 1],'sort asc,id desc', 0, 12);
		// album
		$albums = $this->AlbumModels->select_array('id, name, image, thumb',['publish' => 1],'sort asc,id desc', 0, 6);
        // slogans
        $slogans = $this->SloganModel->select_array('id, name, thumb, des',['publish' => 1],'sort asc,id desc', 0, 4);
		// slogans
        $videos = $this->VideoModels->select_array('id, name, thumb, link',['publish' => 1],'sort asc,id desc', 0, 6);

		// Flash sale
		$flashsale = $this->SystemModels->where_in(array('type'=>'flashsale'));
		$flashsale_js = json_decode($flashsale['contents'],true);
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$time = date('Y-m-d H:i:s',strtotime($flashsale_js['datetime']));
		$time = date_parse_from_format('Y-m-d H:i:s', $time);
		$time_stamp = mktime($time['hour'],$time['minute'],$time['second'],$time['month'],$time['day'],$time['year']);
		

		$productHomes = $this->ProductModels->select_array('id, name, alias, image, thumb, price_sale, price',['publish' => 1],'sort asc,id desc', 0, 8);

		$newsHomes = $this->NewsModels->select_array('id, name, alias, des, thumb, created_at',['publish' => 1,'home' => 1],'sort asc,id desc', 0, 8);
		$data = array(
			'_this'				    => $this,
			'data_index'			=> $data_index,
			'template'				=> $this->template . 'index',
			'title'					=> $data_index['systems']['system']['title'],
			'keyword'				=> $data_index['systems']['system']['meta_keyword'],
			'description'			=> $data_index['systems']['system']['meta_description'],
			'og_image'				=> $data_index['imageShare'],
			'thumb'					=> $data_index['imageShare'],
			'CI_function'    		=> $this->CI_function,
			'slides'				=> $slides,
			'adss'					=> $adss,
			'banner2Row'			=> $banner2Row,
			'banner3Row'			=> $banner3Row,
			'instagrams'			=> $instagrams,
			'slogans'				=> $slogans,
			'videos'				=> $videos, 
			'productHomes'			=> $productHomes,
			'productKMs'			=> $productKMs,
			'cateHomes'				=> $cateHomes,
			'cateHomes'				=> $cateHomes,
			'newsHomes'				=> $newsHomes,
			'albums'				=> $albums,
			'aboutRow'				=> $aboutRow,
			'flashsale_js'			=> $flashsale_js,
			'time_stamp'			=> $time_stamp
		);
		return view('frontend/default', isset($data) ? $data : NULL);
	}

	public function showCalInterestTable()
	{
		// Get data from Ajax
		$loan = $_POST['loan'] != NULL ? $_POST['loan'] : "";
		$borrowedTime = $_POST['borrowTime'] != NULL ? $_POST['borrowTime'] : 1;
		$interestRate = $_POST['interestPercent'] ? $_POST['interestPercent'] : "";

		$data = $this->calculateInterestRate($loan, $borrowedTime, $interestRate);
		$data['loan'] = $loan;
		return view('frontend/home/table_cal_interest', $data);
	}

	public function footer_contact()
	{
		$param_query_2  = ["get_row_array" => "row", "select" => "*", "where"	=> ["phone" => $_POST['phone']]];
		$checkExist		= $this->AdvisephoneModels->full_query($param_query_2);
		if ($checkExist == NULL) {
			$this->AdvisephoneModels->add(["phone" => $_POST['phone']]);
			echo json_encode(["type" => "success", "mess" => "Chúc mừng bạn đã gửi liên hệ thành công"]);
		} else {
			echo json_encode(["type" => "error", "mess" => "Số điện thoại bạn đã tồn tại trên hệ thống. Xin cảm ơn!"]);
		}
	}
	public function regisStudy() 
	{
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			
			$data_post['created_at'] = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
			$result = $this->RegisstudyModels->add($data_post);
			if ($result['type'] == "successful") {
				return redirect()->to('dang-ky-khoa-hoc-thanh-cong')->with('success', ADD_SUCCESS);
			} else {
				return redirect()->to('dang-ky-khoa-hoc-thanh-cong')->with('error', ADD_FAIL);
			}
		}
	}
	public function regisStudyNotify()
	{
		$data_index = $this->get_index();
		
		$data = array(
			'_this'				    => $this,
			'data_index'			=> $data_index,
			'template'				=> $this->template . 'regisStudyNotify',
			'title'					=> $data_index['systems']['system']['title'],
			'keyword'				=> $data_index['systems']['system']['meta_keyword'],
			'description'			=> $data_index['systems']['system']['meta_description'],
			'og_image'				=> $data_index['imageShare'],
			'thumb'					=> $data_index['imageShare'],
		);
		return view('frontend/default', isset($data) ? $data : NULL);
	}


	function trip_tags($string, $character_limiter = 100)
	{
		// ----- remove HTML TAGs -----
		$string = preg_replace('/<[^>]*>/', ' ', $string);
		// ----- remove control characters -----
		$string = str_replace("\r", '', $string);    // --- replace with empty space
		$string = str_replace("\n", ' ', $string);   // --- replace with space
		$string = str_replace("\t", ' ', $string);   // --- replace with space
		// ----- remove multiple spaces -----
		$string = trim(preg_replace('/ {2,}/', ' ', $string));
		$string = character_limiter($string, $character_limiter);
		return $string;
	}
	function changeLang(){
		$value = $_POST['value'];
		$session = session();
		if ($value == 'en') {
			$session->set('lang','_en');
		}
		else if($value == 'vn'){
			if ($session->has('lang')) {
				$session->remove('lang');
			}
		}
		echo json_encode(
			[
				'result'	=> true
			]
		);
	}
	public function footer_register()
	{
		$param_query_2  = [
								"get_row_array" => "row", 
								"select" 		=> "*",
								"where"	 		=> ["email" => $_POST['email']]
			 				  ];
		$checkExist		= $this->MailsModels->full_query($param_query_2);
		if($checkExist == NULL)
		{
			$this->MailsModels->add(["email"=> $_POST['email']]);
			echo json_encode(["type" => "success", "mess" => "Chúc mừng bạn đã đăng ký thành công"]);	
		}else
		{
			echo json_encode(["type" => "error", "mess" => "Email của bạn đã tồn tại trên hệ thống. Xin cảm ơn!"]);
		}
		
	}
	function show404(){
		$data_index 	= $this->get_index();
		$data = array(
			'data_index'		=> $data_index,
			'title'	 			=> 'Trang 404',
		);
		//=========================
		return view('frontend/show404', isset($data) ? $data : NULL);
	}
}
