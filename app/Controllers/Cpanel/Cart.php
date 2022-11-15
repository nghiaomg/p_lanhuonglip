<?php

namespace App\Controllers\Cpanel;
use App\Controllers\BaseController;
use App\Models\OrderModels;
use App\Models\OrderDetailModels;
class Cart extends BaseController
{
	private $title 				= 'Đơn đặt hàng';
	private $template 			= 'backend/cart/';
	var	$path_url 			    = 'cpanel/cart/';
	var $path_dir               = 'uploads/images/product/';
	var $control 			    = 'cart';
	function __construct(){
        $this->OrderModels 		= new OrderModels();
		$this->OrderDetailModels = new OrderDetailModels();
	}
	public function index()
	{
		//check login
		if (!session('logged_in') == true) {return redirect()->to(base_url('cpanel/login.html'));}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
	
		// system
		$data_cart = $this->OrderModels->select_array('*', NULL, 'status asc, id desc');
		$data = [
			'data_index'     => $data_index,
			
			'datas'          => $data_cart,
			'control'	     => $this->control,
			'title'		     => 'Quản lý '.$this->title,
			'template'	     => $this->template.'index',
			'path_dir_thumb' =>$this->path_dir,
		];
		return view('backend/default', isset($data)?$data:NULL);
	}

    public function view()
    {
		if (!session('logged_in') == true) {return redirect()->to(base_url('cpanel/login.html'));}
        $id = $_POST['id'];
		$orderRow = $this->OrderModels->findOne('id, code', ['id' => $id]);
		$datas = $this->OrderDetailModels->select_array('*',['orderID' => $id],'id desc');

		$totals = 0;
		if($datas != NULL){
			foreach ($datas as $key => $val) {
				if($val['price_sale'] > 0){
					$total = $val['price_sale'] * $val['qty'];
					$totals = $totals + $total;
				}else{
					$total = $val['price'] * $val['qty'];
					$totals = $totals + $total;
				}
				$datas[$key]['total'] = $total;
			}
		}
		$data['orderRow'] = $orderRow;
		$data['datas'] = $datas;
		$data['totals'] = $totals;
      	return  view('backend/cart/view', isset($data)?$data:NULL);
    }
	function changeStatus()
    {
        //check login
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));

        $id = $_POST['id'];
        $status = $_POST['status'];
        $dataUpdate['status'] = $status;
        $result = $this->OrderModels->edit($dataUpdate, array('id' => $id));
		if ($result['type'] == "successful"){ 
			echo json_encode(array('rs' => 1)); 
		} else { 
			echo json_encode(array('rs' => 0)); 
		}
    }

	function delete(){
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id = $_POST['id'];
		$result = $this->OrderModels->deleteWhere(array('id' => $id));
		$this->OrderDetailModels->deleteWhere(array('orderID' => $id));
	}
	function deleteAll(){
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$list_id = $this->request->getPost('list_id');
		$list_id_delete = explode(',', $list_id);
		foreach ($list_id_delete as $key => $val) {
			$this->OrderModels->deleteWhere(array('id' => $val));
            $this->OrderDetailModels->deleteWhere(array('orderID' => $val));
		}
		
	}


}
