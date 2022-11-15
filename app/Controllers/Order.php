<?php

namespace App\Controllers;

use App\Models\CI_function;
use App\Models\ProductModels;
use App\Models\OrderDetailModels;
use App\Models\OrderModels;
use App\Models\DvtModels;
use App\Controllers\BaseController;
class Order extends BaseController
{
	private $template = 'frontend/order/';
	public $cart = [];
	public function __construct()
	{
		$this->CI_function  		= new CI_function();
		$this->ProductModels  		= new ProductModels();
		$this->OrderDetailModels  	= new OrderDetailModels();
		$this->OrderModels  		= new OrderModels();
		$this->DvtModels  			= new DvtModels();
	}

	public function index()
	{
		$data_index 	= $this->get_index();
		// Sản phẩm
		$product = $this->ProductModels->select_array('*',['publish' => 1],'sort asc, id desc');
		if($product != NULL){
			foreach ($product as $key => $val) {
				$dvt = $this->DvtModels->select_row('id, name',['id' => $val['dvt']]);
				$product[$key]['dvt_name'] = $dvt['name'];
			}
		}
		// =======
		$session = session();
		$cart = [];
		if ($session->has('cart')) {
			$cart = array_values(session('cart'));
		}
		$data = array(
			'data_index'			=> $data_index,
			'template'				=> $this->template . 'index',
			'title'					=> 'Đặt hàng',
			'keyword'				=> $data_index['systems']['system']['meta_keyword'],
			'description'			=> $data_index['systems']['system']['meta_description'],
			'image'					=> $data_index['imageShare'],
			'product'				=> $product,
			'cart'					=> $cart
		);

		return view('frontend/default', isset($data) ? $data : NULL);
	}
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
	function addTocart(){
		$b4_encode = $_POST['id'];
		$b4_decode = explode('.',base64_decode($b4_encode));
		$id = $b4_decode[0];
		$product = $this->ProductModels->select_row('*',['id' => $id]);
		$qty = 1;
		$array = [
			'id'		=> $product['id'],
			'name'		=> $product['name'],
			'dvt'		=> $product['dvt'],
			'price'		=> $product['price'],
			'qty'		=> $qty,
			'status'	=> 0
		];
		echo json_encode($array);
	}
	function exits($id){
		$items = array_values(session('cart'));
		for ($i=0; $i < count($items); $i++) { 
			if ($items[$i]['id'] == $id) {
				return $i;
			}
		}
		return -1;
	}
	function checkrecaptcha(){
		$key = SERVER_CAPTCHA;
		$captcha = $_POST['g-recaptcha-response'];
		$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$key.'&response='.$captcha.'');
		$response_data = json_decode($response);
		if (!$response_data->success) {
			echo json_encode(
				[
					'result'	=> 'error'	
				]
			);
		}
		else{
			echo json_encode(
				[
					'result'	=> 'success'	
				]
			);
		}
	}
	function addcartdb(){
		$name = $_POST['name'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$hours = $_POST['hours'];
		$date_give = $_POST['date_give'];
		$product_array = isset($_POST['datas'])?$_POST['datas']:[];
		$total_qty = 0;
		$total_price = 0;
		if ($product_array != NULL) {
			foreach ($product_array as $key => $value) {
				$total_price += $value['price']*$value['qty']	;
			}
		}
		
		$array_order = [
			'name' 				=> $name,
			'phone' 			=> $phone,
			'address' 			=> $address,
			'hours' 			=> $hours,
			'date_give' 		=> $date_give,
			'total_price' 		=> $total_price,
			'created_at' 		=> gmdate('Y-m-d H:i:s',time() + 7 *3600)
		];
		$result = $this->OrderModels->add($array_order);
		if ($product_array != NULL) {
			foreach ($product_array as $key => $value) {
				$array_detail = [
					'orderID' 		=> $result['insertID'],
					'productID' 	=> $value['id'],
					'qty' 			=> $value['qty'],
					'price' 		=> $value['price'],
					'status' 		=> $value['status'],
				];
				$this->OrderDetailModels->add($array_detail);
			}
		}

	}
}
