<?php

namespace App\Controllers;
use App\Models\ProductModels;
use App\Models\ProductcolorModels;
use App\Models\OrderModels;
use App\Models\OrderDetailModels;
use App\Models\BankModels;
use App\Controllers\BaseController;
class Cart extends BaseController
{
	private $template = 'frontend/order/';
    public $cart;
	protected $session;
	private $path_dir_product = 'uploads/images/product/';
	private $path_dir_color = 'uploads/images/productcolor/';
	public function __construct()
	{
		$this->cart 			= \Config\Services::cart();
		$this->config_email     = new \Config\Email;
        $this->library_email    = \Config\Services::email();
        $this->ProductModels    = new ProductModels();
        $this->ProductcolorModels    = new ProductcolorModels();
		$this->OrderDetailModels  	= new OrderDetailModels();
		$this->OrderModels  		= new OrderModels();
		$this->BankModels       = new BankModels();
		//==================
		$this->session = \Config\Services::session();
        $this->session->start();
	}

	public function index()
	{
		$data['data_index']    = $this->get_index();
		$data['title']         = 'Giỏ hàng';
		$data['template']      = 'frontend/cart/index';


		$session = session();
		$listCart = $this->session->get("listCart");
		$totalMoney = 0;
		$totalOrigin = 0;
		if($listCart != NULL){
			foreach ($listCart as $key => $val) {
				$productRow = $this->ProductModels->findOne('id, name, alias, thumb, price, price_sale', ['id' => $val['productID']]);
				$listCart[$key]['product_name'] = $productRow['name'];
				$listCart[$key]['product_alias'] = $productRow['alias'];
				$listCart[$key]['product_thumb'] = $this->path_dir_product.$productRow['thumb'];
				if($productRow['price_sale'] > 0){
					$listCart[$key]['product_price'] = number_format($productRow['price_sale']);
					$listCart[$key]['total'] = $productRow['price_sale'] * $val['qty'];
					$listCart[$key]['total_origin'] = $productRow['price'] * $val['qty'];
					$totalMoney = $totalMoney + ($productRow['price_sale'] * $val['qty']);
					$totalOrigin = $totalOrigin + ($productRow['price'] * $val['qty']);
				}else{
					$listCart[$key]['product_price'] = number_format($productRow['price']);
					$listCart[$key]['total'] = $productRow['price'] * $val['qty'];
					$totalMoney = $totalMoney + ($productRow['price'] * $val['qty']);
				}
				$listCart[$key]['color_name'] = '';
				if($val['colorID'] != '0'){
					$productColorRow = $this->ProductcolorModels->findOne('id, name, thumb', ['id' => $val['colorID']]);
					$listCart[$key]['product_thumb'] = $this->path_dir_color.$productColorRow['thumb'];
					$listCart[$key]['color_name'] = $productColorRow['name'];
				}
			}
		}
		
		
		$data['datas'] = $listCart;
		$data['totalOrigin'] = $totalOrigin;
		$data['totalMoney'] = $totalMoney;
		$data['totalSave'] = $totalOrigin - $totalMoney;
		
		return view('frontend/default', isset($data)?$data : []);
	}
	// ĐẶT HÀNG THÀNH CÔNG
	public function notify()
	{
	
		$data_index 	= $this->get_index();
		
		$data = array(
			'data_index'			=> $data_index,
			'template'				=> $this->template . 'notify',
			'title'					=> 'Đặt hàng hàng công',
			'keyword'				=> $data_index['systems']['system']['meta_keyword'],
			'description'			=> $data_index['systems']['system']['meta_description'],
			'image'					=> $data_index['imageShare'],
		);

		return view('frontend/default', isset($data) ? $data : NULL); 
	}
	// lấy giỏ hàng
	public function getAllCart()
	{
		$data['total_item']    = cart()->totalItems();
		$data['total_price']   = cart()->total();
		$data['products_cart'] = cart()->contents();
		if(isset($_POST['view']) && $_POST['view'] == "indexcartdata")
		{
			return view('frontend/cart/indexCartdata', isset($data)?$data : []);
		}else
		{
			return view('frontend/cart/loadCart', isset($data)?$data : []);
		}
	}
    // Thêm vào giỏ hàng 
    public function add_to_cart()
    {
		$productID    = $_POST['productID'];
		$qty          = $_POST['qty'];
		$getProduct   = $this->ProductModels->full_query5(["get_row_array" => "row", "select" => "*", "where" => ["publish" => 1, "id" => $productID]]);
		//======== insert ==========
		$price        =  $getProduct['price_sale'] > 0 ? $getProduct['price_sale'] : $getProduct['price'];
		$data_post    = [];
		$data_post[]  = [
			'id'      => $getProduct['id'],
			'name'    => $getProduct['name'],
			'alias'   => $getProduct['alias'],
			'qty'     => $qty,
			'price'   => $price,
			'image'	  => $getProduct['thumb'],
 			'options' => array('productID' => $getProduct['id'])
		];
		$this->cart->insert($data_post);
		//============================
		$data['total_item']    = cart()->totalItems();
		$data['total_price']   = number_format(cart()->total());
		$data['products_cart'] = cart()->contents();
		return view('frontend/cart/loadCart', isset($data)?$data : []);
    }
    // Cập nhật giỏ hàng
    public function update_in_cart()
    {
		$rowid = $_POST['rowid'];
		$qty   = $_POST['qty'];
		$this->cart->update(['rowid' => $rowid, 'qty' => $qty]);

		$totalItem  = cart()->totalItems();
		$totalPrice = number_format(cart()->total());
		echo  json_encode(["total_items"=> $totalItem, "total_price"=> $totalPrice]);
    }
	// Đổ sản phẩm trong trang thanh toán
	public function getAllPaymentCart()
	{
		$data['total_item']    = cart()->totalItems();
		$data['total_price']   = number_format(cart()->total());
		$data['products_cart'] = cart()->contents();
		if(isset($_POST['view']) && $_POST['view'] == "indexcartdata")
		{
			return view('frontend/cart/indexCartdata', isset($data)?$data : []);
		}else
		{
			return view('frontend/cart/paymentItem', isset($data)?$data : []);
		}
		
	}
    // Xoá 1 sản phẩm xác định trong giỏ hàng
    public function remove_item()
    {
		$rowid  = $_POST['rowid'];
		$this->cart->remove($rowid);
		$data['total_item']    = cart()->totalItems();
		$data['total_price']   = cart()->total();
		$data['products_cart'] = cart()->contents();
		return view('frontend/cart/loadCart', isset($data)?$data : []);
    }
	// add cart
    public function addCart()
    {
		$session = session();
		// $session->remove('listCart');
		$productID = $_POST['productID'];
		$colorID = $_POST['colorID'];
		$qty = $_POST['qty'];
		if($session->has('listCart')){
			$listCart = $this->session->get("listCart");
			$checkExist = 0;
			if($listCart != null){
				foreach ($listCart as $key => $val) {
					if ($val['productID'] == $productID && $val['colorID'] == $colorID) {
						
						$checkExist = $checkExist + 1;
						$listCart[$key]['qty'] = $val['qty'] + $qty;
					}
				}
			}
			if($checkExist == 0){
				$listCart[] = [
					'productID'	=> $productID,
					'colorID'	=> $colorID,
					'qty'		=> $qty,
				];
			}
			$this->session->set('listCart', $listCart);
		}else{
			$listCart = [];
			$listCart[] = [
				'productID'	=> $productID,
				'colorID'	=> $colorID,
				'qty'		=> $qty,
			];
			// var_dump($listCart);die;
			$this->session->set('listCart', $listCart);
		}
		$totalMoney = 0;
		// var_dump($listCart);die;
		if($listCart != NULL){
			foreach ($listCart as $key => $val) {
				$productRow = $this->ProductModels->findOne('id, name, alias, thumb, price, price_sale', ['id' => $val['productID']]);
				$listCart[$key]['product_name'] = $productRow['name'];
				$listCart[$key]['product_alias'] = $productRow['alias'];
				$listCart[$key]['product_thumb'] = $this->path_dir_product.$productRow['thumb'];
				if($productRow['price_sale'] > 0){
					$listCart[$key]['product_price'] = number_format($productRow['price_sale']);
					$totalMoney = $totalMoney + ($productRow['price_sale'] * $val['qty']);
				}else{
					$listCart[$key]['product_price'] = number_format($productRow['price']);
					$totalMoney = $totalMoney + ($productRow['price'] * $val['qty']);
				}
				$listCart[$key]['color_name'] = '';
				if($val['colorID'] != '0'){
					$productColorRow = $this->ProductcolorModels->findOne('id, name, thumb', ['id' => $val['colorID']]);
					$listCart[$key]['product_thumb'] = $this->path_dir_color.$productColorRow['thumb'];
					$listCart[$key]['color_name'] = $productColorRow['name'];
				}
			}
		}
		// var_dump($listCart);
		echo json_encode(['success' => 1, 'listCart' => $listCart, 'total' => count($listCart), 'totalMoney' => number_format($totalMoney)]);
    }
	// update cart
    public function updateCart()
    {
		$session = session();
		$productID = $_POST['productID'];
		$colorID = $_POST['colorID'];
		$qty = $_POST['qty'];
		$listCart = $this->session->get("listCart");
		if($listCart != null){
			foreach ($listCart as $key => $val) {
				if ($val['productID'] == $productID && $val['colorID'] == $colorID) {
					$listCart[$key]['qty'] = $qty;
				}
			}
		}
		$this->session->set('listCart', $listCart);
		$totalMoney = 0;
		$totalOrigin = 0;
		if($listCart != NULL){
			foreach ($listCart as $key => $val) {
				$productRow = $this->ProductModels->findOne('id, name, alias, thumb, price, price_sale', ['id' => $val['productID']]);
				$listCart[$key]['product_name'] = $productRow['name'];
				$listCart[$key]['product_alias'] = $productRow['alias'];
				$listCart[$key]['product_thumb'] = $this->path_dir_product.$productRow['thumb'];
				if($productRow['price_sale'] > 0){
					$listCart[$key]['product_price'] = number_format($productRow['price_sale']);
					$listCart[$key]['total'] = number_format($productRow['price_sale'] * $val['qty']);
					$listCart[$key]['total_origin'] = number_format($productRow['price'] * $val['qty']);
					$totalMoney = $totalMoney + ($productRow['price_sale'] * $val['qty']);
					$totalOrigin = $totalOrigin + ($productRow['price'] * $val['qty']);
				}else{
					$listCart[$key]['product_price'] = number_format($productRow['price']);
					$listCart[$key]['total'] = number_format($productRow['price'] * $val['qty']);
					$totalMoney = $totalMoney + ($productRow['price'] * $val['qty']);
				}
				$listCart[$key]['color_name'] = '';
				if($val['colorID'] != '0'){
					$productColorRow = $this->ProductcolorModels->findOne('id, name, thumb', ['id' => $val['colorID']]);
					$listCart[$key]['product_thumb'] = $this->path_dir_color.$productColorRow['thumb'];
					$listCart[$key]['color_name'] = $productColorRow['name'];
				}
			}
		}
		$totalSave = $totalOrigin - $totalMoney;
		// var_dump($listCart);
		echo json_encode(['success' => 1, 'listCart' => $listCart, 'totalMoney' => number_format($totalMoney), 'totalSave' => number_format($totalSave)]);
    }
	// delete cart
    public function deleteItemCart()
    {
		$session = session();
		$productID = $_POST['productID'];
		$colorID = $_POST['colorID'];
		$listCart = $this->session->get("listCart");
		if($listCart != null){
			foreach ($listCart as $key => $val) {
				if ($val['productID'] == $productID && $val['colorID'] == $colorID) {
					unset($listCart[$key]);
				}
			}
		}
		$this->session->set('listCart', $listCart);
		$totalMoney = 0;
		$totalOrigin = 0;
		if($listCart != NULL){
			foreach ($listCart as $key => $val) {
				$productRow = $this->ProductModels->findOne('id, name, alias, thumb, price, price_sale', ['id' => $val['productID']]);
				$listCart[$key]['product_name'] = $productRow['name'];
				$listCart[$key]['product_alias'] = $productRow['alias'];
				$listCart[$key]['product_thumb'] = $this->path_dir_product.$productRow['thumb'];
				if($productRow['price_sale'] > 0){
					$listCart[$key]['product_price'] = number_format($productRow['price_sale']);
					$listCart[$key]['total'] = number_format($productRow['price_sale'] * $val['qty']);
					$listCart[$key]['total_origin'] = number_format($productRow['price'] * $val['qty']);
					$totalMoney = $totalMoney + ($productRow['price_sale'] * $val['qty']);
					$totalOrigin = $totalOrigin + ($productRow['price'] * $val['qty']);
				}else{
					$listCart[$key]['product_price'] = number_format($productRow['price']);
					$listCart[$key]['total'] = number_format($productRow['price'] * $val['qty']);
					$totalMoney = $totalMoney + ($productRow['price'] * $val['qty']);
				}
				$listCart[$key]['color_name'] = '';
				if($val['colorID'] != '0'){
					$productColorRow = $this->ProductcolorModels->findOne('id, name, thumb', ['id' => $val['colorID']]);
					$listCart[$key]['product_thumb'] = $this->path_dir_color.$productColorRow['thumb'];
					$listCart[$key]['color_name'] = $productColorRow['name'];
				}
			}
		}
		$totalSave = $totalOrigin - $totalMoney;
		// var_dump($listCart);
		echo json_encode(['success' => 1, 'listCart' => $listCart, 'totalMoney' => number_format($totalMoney), 'totalSave' => number_format($totalSave)]);
    }
	// load cart
    public function loadCart()
    {
		$session = session();
		$listCart = $this->session->get("listCart");
		$totalMoney = 0;
		if($listCart != NULL){
			foreach ($listCart as $key => $val) {
				$productRow = $this->ProductModels->findOne('id, name, alias, thumb, price, price_sale', ['id' => $val['productID']]);
				$listCart[$key]['product_name'] = $productRow['name'];
				$listCart[$key]['product_alias'] = $productRow['alias'];
				$listCart[$key]['product_thumb'] = $this->path_dir_product.$productRow['thumb'];
				if($productRow['price_sale'] > 0){
					$listCart[$key]['product_price'] = number_format($productRow['price_sale']);
					$totalMoney = $totalMoney + ($productRow['price_sale'] * $val['qty']);
				}else{
					$listCart[$key]['product_price'] = number_format($productRow['price']);
					$totalMoney = $totalMoney + ($productRow['price'] * $val['qty']);
				}
				$listCart[$key]['color_name'] = '';
				if($val['colorID'] != '0'){
					$productColorRow = $this->ProductcolorModels->findOne('id, name, thumb', ['id' => $val['colorID']]);
					$listCart[$key]['product_thumb'] = $this->path_dir_color.$productColorRow['thumb'];
					$listCart[$key]['color_name'] = $productColorRow['name'];
				}
			}

			echo json_encode(['success' => 1, 'listCart' => $listCart, 'totalMoney' => number_format($totalMoney)]);
		}else{
			echo json_encode(['success' => 0]);
		}
    }
	// Thanh toán
	public function payment()
	{
		$data['data_index']    =  $this->get_index();
		$data['title']         = 'Thanh toán';
		$session = session();
		$listCart = $this->session->get("listCart");
		$totalMoney = 0;
		$totalOrigin = 0;
		if($listCart != NULL){
			foreach ($listCart as $key => $val) {
				$productRow = $this->ProductModels->findOne('id, name, alias, thumb, price, price_sale', ['id' => $val['productID']]);
				$listCart[$key]['product_name'] = $productRow['name'];
				$listCart[$key]['product_alias'] = $productRow['alias'];
				$listCart[$key]['product_thumb'] = $this->path_dir_product.$productRow['thumb'];
				$listCart[$key]['price'] = $productRow['price'];
				$listCart[$key]['price_sale'] = $productRow['price_sale'];
				if($productRow['price_sale'] > 0){
					$listCart[$key]['product_price'] = number_format($productRow['price_sale']);
					$listCart[$key]['total'] = number_format($productRow['price_sale'] * $val['qty']);
					$totalMoney = $totalMoney + ($productRow['price_sale'] * $val['qty']);
					$totalOrigin = $totalOrigin + ($productRow['price'] * $val['qty']);
				}else{
					$listCart[$key]['product_price'] = number_format($productRow['price']);
					$listCart[$key]['total'] = number_format($productRow['price'] * $val['qty']);
					$totalMoney = $totalMoney + ($productRow['price'] * $val['qty']);
				}
				$listCart[$key]['color_name'] = '';
				if($val['colorID'] != '0'){
					$productColorRow = $this->ProductcolorModels->findOne('id, name, thumb', ['id' => $val['colorID']]);
					$listCart[$key]['product_thumb'] = $this->path_dir_color.$productColorRow['thumb'];
					$listCart[$key]['color_name'] = $productColorRow['name'];
				}
			}
		}else{
			return redirect()->to(base_url('gio-hang'));
		}
		$totalHasVAT = $totalMoney + ($totalMoney * 0.1);
		$totalSave = $totalOrigin - $totalMoney;


		// submit
		if ($this->request->getPost()) {
            $data_post = $this->request->getPost('data_post');

			$data_post['code'] 			= $this->createCode();
            $data_post['status']        = 0;
            $data_post['created_at']    = gmdate('Y-m-d H:i:s', time() + 7 * 3600);

			// var_dump($data_post);die;

            $result = $this->OrderModels->add($data_post);
            if ($result['type'] == "successful") {
				//
				$cartDetailInsert = NULL;
				if($listCart != NULL){
					foreach ($listCart as $key => $val) {
						$productRow = $this->ProductModels->findOne('id, name, alias, thumb, price, price_sale', ['id' => $val['productID']]);
						$color_name = '';
						$color_thumb = '';
						if($val['colorID'] > 0){
							$colorRow = $this->ProductcolorModels->findOne('id, name, thumb', ['id' => $val['colorID']]);
							$color_name = $colorRow['name'];
							$color_thumb = $colorRow['thumb'];
						}
						$cartDetailInsert[] = array(
							'orderID'		=>	$result['insertID'],
							'productID'		=>	$val['productID'],
							'colorID'		=>	$val['colorID'],
							'qty'			=>	$val['qty'],
							'price'			=>	$productRow['price'],
							'price_sale'	=>	$productRow['price_sale'],
							'product_name'	=>	$productRow['name'],
							'product_alias'	=>	$productRow['alias'],
							'product_thumb'	=>	$productRow['thumb'],
							'color_name'	=>	$color_name,
							'color_thumb'	=>	$color_thumb,
						);
					}
				}
				if($cartDetailInsert != NULL){
					$this->OrderDetailModels->adds($cartDetailInsert);
				}
				// 
				$session->remove('listCart');
				// send mail
				$subject = 'LAN HƯƠNG LIP - XÁC NHẬN ĐẶT HÀNG THÀNH CÔNG';
				$nickname_email =  $this->get_index()['systems']['contact']['website'];
				$send_to_email = $data_post['email'];
				$CCmail = $this->get_index()['systems']['system']['email_take'];
				// method payment
				if($data_post['pay_method'] == 1){
					$pay_method = 'Thanh toán bằng tiền mặt khi nhận hàng';
				}else{
					$pay_method = 'Thanh toán bằng hình thức chuyển khoản';
				}
				$message  = '
				<!DOCTYPE html>
				<html>
				<head>
					<meta charset="utf-8" />
					<title>Đơn hàng</title>
					<link rel="preconnect" href="https://fonts.googleapis.com">
					<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
					<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
				</head>
				<body>
					<table width="100%" cellspacing="0" cellpadding="0" border="0" style="font-family:roboto,helvetica neue,helvetica,arial,sans-serif; font-size: 15px;">
						<tbody>
							<tr>         
								<td style="padding:20px 0 20px 0" valign="top" align="center">           
									<table style="border:1px solid #c00;" width="650" cellspacing="0" cellpadding="10" border="0" bgcolor="#FFFFFF">        
										<tbody>
											<tr>             
												<td style="padding-left:20px;padding-top:15px">                   
													<a href="#" target="_blank">
														<img src="https://lanhuonglip.optechdemo2.com/uploads/images/logo/2022/08/thumb/logo.png.png" alt="Lan Hương Lip" style="margin-bottom:10px" class="CToWUd" data-bit="iit" border="0">
													</a>               
												</td>               
												<td style="padding-right:20px;padding-top:15px;width:100%" align="right">                 
													<p style="font-size:14px;margin:0"><strong>MÃ ĐƠN HÀNG: #'.$data_post['code'].'</strong></p>                 
													<p style="font-size:14px;margin-top:3px;color:#a29e9ef5;margin-bottom:0px">'.date('d/m/Y H:i:s', strtotime($data_post['created_at'])).'</p> 
												</td>             
											</tr>                                       
											<tr>                 
												<td colspan="2" style="padding-top:5px;padding-bottom:0px;padding:0px 20px">
													<p style="font-size:1px;border-top:1px #e0e0e0 solid">&nbsp;</p>
												</td>             
											</tr>                          
											<tr>               
												<td colspan="2" style="padding-left:20px">                 
													<p style="line-height:22px;margin:0 0 3px 0"><strong>Xin chào '.$data_post['fullname'].',</strong></p>                
													<p style="margin:0">Cảm ơn bạn đã mua hàng tại <strong>'.$this->get_index()['systems']['contact']['company'].'</strong>!<br><br>Dưới đây là chi tiết đơn hàng của bạn:</p>              
												</td>                              
											 </tr>                 
											 <tr>
												 <td colspan="2" style="padding-top:5px;padding-bottom:0px;padding:0px 20px">
													 <p style="font-size:1px;border-top:1px #e0e0e0 solid">&nbsp;</p>
												 </td>                          
											 </tr>
											 <tr>               
												 <td colspan="2" style="padding:10px 20px">                 
													 <table width="650" cellspacing="0" cellpadding="0" border="0">                   
														 <thead>                     
															 <tr>                       
																 <th style="font-size:14px;padding:5px 9px 0px 0px;line-height:1em;color:#a29e9ef5" width="325" bgcolor="white" align="left">Thông tin thanh toán:</th>                       
																 <th width="10"></th> 
																  <th style="font-size:14px;padding:5px 9px 0px 0px;line-height:1em;color:#a29e9ef5" width="325" bgcolor="white" align="left">Phương thức thanh toán:</th>                     
															  </tr>                   
														  </thead>                   
														  <tbody>                     
																<tr>                       
																	<td style="font-size:14px;padding:10px 9px 9px 0px" valign="top">  
																		<p style="margin: 5px 0px;"><strong>'.$data_post['fullname'].'</strong></p>
																		<p style="margin: 5px 0px;"><strong>Đ/c:</strong> '.$data_post['address'].'</p>
																		<p style="margin: 5px 0px;"><strong>Tel:</strong> '.$data_post['phone'].'</p>
																	</td>                       
																	<td>&nbsp;</td> 
																	<td style="font-size:14px;padding:0px 9px 9px 0px" valign="top">                         
																		<p><strong>'.$pay_method.'</strong></p>                       
																	</td>                     
																</tr>                   
														  </tbody>                 
													</table>';
													if($data_post['pay_method'] == 2){
														$message  .= '<table width="650" cellspacing="0" cellpadding="0" border="0">                   
															<thead>                     
																<tr>                       
																	<th style="font-size:14px;padding:5px 9px 0px 0px;line-height:1em;color:#a29e9ef5" width="325" bgcolor="white" align="left">Thông tin chuyển khoản:</th>                       
																	<th width="10"></th> 
																</tr>                   
															</thead>                   
															<tbody>                     
																<tr>                       
																	<td style="font-size:14px;padding:10px 9px 9px 0px" valign="top">  
																		'.$this->get_index()['systems']['system']['info_ck'].'
																	</td>                       
																</tr>                   
															</tbody>                 
														</table>  
														<p style="font-size:14px;margin:10px 0 10px 0"><strong><u>Lưu ý:</u></strong> Khi chuyển khoản Anh/Chị vui lòng ghi nội dung <strong>"thanh toan ma don hang '.$data_post['code'].'"</strong> </p>';
													}
													$message  .= '<table width="650" cellspacing="0" cellpadding="0" border="0">                     
														<tbody>
															<tr>                       
																<td colspan="2" style="padding-top:0px;padding-bottom:0px">
																	<p style="font-size:1px;border-top:1px #e0e0e0 solid">&nbsp;</p>
																</td>                     
															</tr>                 
														</tbody>
													</table>                                  
													<table style="padding-top:10px" width="650" cellspacing="0" cellpadding="0" border="0">        
														<thead>                     
															<tr>                       
																<th style="color:#a29e9ef5;font-size:14px;padding:3px 9px 3px 0px" bgcolor="white" align="left">Sản phẩm</th>                       
																<th style="color:#a29e9ef5;font-size:14px;padding:3px 9px" width="70px" bgcolor="white" align="center">Đơn giá</th>                       
																<th style="color:#a29e9ef5;font-size:14px;padding:3px 9px" width="60px" bgcolor="white" align="center">SL</th>                       
																<th style="color:#a29e9ef5;font-size:14px;padding:3px 9px" width="100px" bgcolor="white" align="right">Thành tiền</th>                     
															</tr>                   
														</thead>';  
													if($listCart != NULL){
														foreach ($listCart as $key_cart => $val_cart) {                                   
															$message  .= '<tbody cellspacing="0" border="0" bgcolor="#FFFFFF">
																<tr> 
																	<td style="font-size:13px;padding:5px 9px 3px 0px;vertical-align:middle" valign="top" align="left"> <strong style="font-size:13px">'.$val_cart['product_name'].'</strong><br/>'.$val_cart['color_name'].'  </td> 
																	<td style="font-size:13px;padding:3px 9px;vertical-align:middle" valign="top" align="center">';
																	if($val_cart['price_sale']>0){
																		$message  .= '<p style="margin:0">'.number_format($val_cart['price_sale']).'</p>';
																	}else{
																		$message  .= '<p style="margin:0">'.number_format($val_cart['price']).'</p>';
																	}
																	if($val_cart['price_sale']>0){
																		$message  .= '<p style="margin:0;text-decoration:line-through;font-size:12px;color:#a29e9ef5">'.number_format($val_cart['price']).'</p>'; 
																	}
																	$message  .= '</td><td style="font-size:13px;padding:3px 9px;vertical-align:middle" valign="top" align="center">'.$val_cart['qty'].'</td> 
																	<td style="font-size:13px;padding:3px 9px;vertical-align:middle" valign="top" align="right"> <span>'.$val_cart['total'].'</span></td> 
																</tr>
															</tbody>';
														}
													}

													$message  .= '<tbody>                         
															<tr>                         
																<td colspan="4" style="padding-top:5px;padding-bottom:5px"><p style="font-size:1px;border-top:1px #e0e0e0 solid">&nbsp;</p>
																</td>                         
															</tr>                     
														</tbody>                   
														<tbody>                      
															<tr> 
																<td colspan="3" style="padding:3px 9px" align="right"> Thành tiền </td> <td style="padding:3px 9px" align="right"> <span>'.number_format($totalMoney).'</span> 
																</td> 
															</tr> 
															<tr> 
																<td colspan="3" style="padding:3px 9px" align="right"> Tiết kiệm </td> 
																<td style="padding:3px 9px" align="right"> <span>'.number_format($totalSave).'</span> </td> 
															</tr> 
															<tr> 
																<td colspan="3" style="padding:3px 9px" align="right"> <strong>Tổng số tiền (gồm VAT) </strong></td> 
																<td style="padding:3px 9px;color:#cc0000" align="right"> <strong><span>'.number_format($totalHasVAT).'</span></strong></td> 
															</tr>                   
														</tbody>                 
													</table>                  
													<p style="font-size:14px;margin:10px 0 10px 0"></p>               
												</td>             
											</tr>                         
											<tr>                
												<td colspan="2" style="padding:0 20px;padding-bottom:10px">                    
													<p style="color:#cc0000;margin:0">Lưu ý:</p>                    
													<ul style="list-style:decimal;margin-top:5px;margin-bottom:5px;line-height:20px;color:black;padding-left:20px;">                        
														<li style="margin:0">Vui lòng kiểm tra sản phẩm khi nhận hàng.</li>                  
														<li style="margin:0">Trong trường hợp có vấn đề phát sinh, '.$this->get_index()['systems']['contact']['company'].' sẽ liên lạc với bạn.</li>       
													</ul>                
												</td>             
											</tr>                          
											<tr>               
												<td colspan="2" style="background:#c00;text-align:center;color:white" bgcolor="cc0000" align="center">
													<center>                   
														<p style="margin:0;font-weight:bold">                     
															<strong>'.$this->get_index()['systems']['contact']['company'].' - Chăm Sóc Khách Hàng</strong><br>Điện thoại hỗ trợ: '.$this->get_index()['systems']['contact']['phone'].' - Email: 
															<a style="color:white" href="mailto:'.$this->get_index()['systems']['contact']['email'].'" target="_blank">'.$this->get_index()['systems']['contact']['email'].'</a>
														</p>                 
													</center>               
												  </td>             
											  </tr>           
										  </tbody>
									  </table>         
								  </td>       
							  </tr>       
							  <tr>         
								  <td style="text-align:center;padding-bottom:20px" align="center">           
									  <p style="font-size:14px;margin:0">Chúng tôi thành thật xin lỗi nếu email này làm phiền bạn!</p>         
								  </td>       
							  </tr>     
						</tbody>
					</table>
				</body>
				</html>
				';
				$this->sendMail($subject, $message, $send_to_email, $nickname_email, $CCmail);
				return redirect()->to(base_url("dat-hang-thanh-cong"))->with('success', ADD_SUCCESS);
			}
        }
		
		
		$data['datas'] = $listCart;
		$data['totalMoney'] = $totalMoney;
		$data['totalSave'] = $totalSave;
		return view('frontend/cart/payment', isset($data)?$data : []);
	}
	function sendMail($subject ='',$message ='',$send_to_email,$nickname_email,$CCmail){
		$config_email   = $this->config_email;
        // lấy SMTPUser từ config
        $SMTPUser       =  $config_email->SMTPUser;
	    //send mail
        $this->library_email->setFrom($SMTPUser, $nickname_email);
		$this->library_email->setTo($send_to_email);
		$this->library_email->setCC($CCmail);
		$this->library_email->setSubject($subject);
		$this->library_email->setMessage($message);
		if ($this->library_email->send()) {
			return true;
		} else{
			return false;
		}
	}
	public function createCode()
	{
		$code = rand(1, 999999);
		$checkOrderRow = $this->OrderModels->findOne('code', ['code' => $code]);
		if($checkOrderRow != NULL){
			$this->createCode();
		}else{
			return $code;
		}
	}
}
