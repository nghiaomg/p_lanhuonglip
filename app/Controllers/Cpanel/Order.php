<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\CI_function;
use App\Models\OrderModels;
use App\Models\OrderDetailModels;
use App\Models\ProductModels;
//export excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Order extends BaseController
{
	var $title              = 'Đơn hàng';
	var $template           = 'backend/order/';
	var $control            = 'order';
	var $per_page           = 10;
	var $numb_button        = 3;
	public function __construct()
	{
		$this->OrderModels 			=  new OrderModels();
		$this->CI_function   		= new CI_function();
		$this->OrderDetailModels   	= new OrderDetailModels();
		$this->ProductModels   		= new ProductModels();
	}

	public function index()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$data_index = $this->get_indexBE();
		$datas = $this->OrderModels->select_array();
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

	// phân trang + tìm kiếm 
	public function search_pagination()
	{
		$key_word  = NULL;
		$where     = [];
		// số trang vừa chọn
		$page      = 1;
		if (isset($_POST['page']) && $_POST['page'] != "") {
			$page = $_POST['page'];
		}
		if (isset($_POST['keyword']) && $_POST['keyword'] != "") {
			$key_word = $_POST['keyword'];
		}
		//======================================
		$likeValue          = $key_word;
		$param_query_1      = [
								"select" => "*",
								"like"          =>  [               
														["column" => "phone", "value"=> trim($likeValue)],
														["column" => "name", "value"=> trim($likeValue)],
													],
							  ];
		$datas_all 			= $this->OrderModels->full_query($param_query_1);
		
		$total_rows 	    = count($datas_all);
		$per_page           = $this->per_page;
		$total_page         = ceil($total_rows / $per_page);
		$page_click         = $page;    			// active button khi click chuyển trang
		$number_button_page = $this->numb_button;  // số lượng button muốn hiển thị 
		$page 				= ($page > $total_page) ? $total_page : $page;
		$page 				= ($page < 1) ? 1 : $page;
		$page 				= $page - 1;
		//=======================================
		$start              = $page * $per_page;
		$limit 			    = $per_page;
		$datas              = [];
		if ($total_rows > 0) {
			$param_query_2  = [
				"select" => "*, DATE_FORMAT(created_at, '%d/%m/%Y') as created_at",
				"like"   => [               
								["column" => "phone", "value"=> trim($likeValue)],
								["column" => "name", "value"=> trim($likeValue)],
							],
				"limit"	 => ["start" => $start, "limit" => $limit]
			];
			$datas 			= $this->OrderModels->full_query($param_query_2);
			
		}
		// Button phân trang
		$button_pagination 			= $this->CI_function->button_pagination($number_button_page, $total_rows, $per_page, $page_click);
		$data['button_pagination']  = $button_pagination;
		$data['datas']   		    = $datas;
		$data['control']			= $this->control;
		
		return view('backend/order/loadTable', isset($data) ? $data : NULL);
	}

	function delete()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id     = $_POST['id'];
		$this->OrderDetailModels->deleteWhere(array('orderID' => $id));
		$result = $this->OrderModels->deleteWhere(array('id' => $id));
	}
	function deleteAll()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$list_id        = $this->request->getPost('list_id');
		$list_id_delete = explode(',', $list_id);
		foreach ($list_id_delete as $key => $val) {
			$result     = $this->OrderModels->deleteWhere(array('id' => $val));
			$this->OrderDetailModels->deleteWhere(array('orderID' => $val));
			if ($result) {
				echo json_encode(array("result" => "successfully"));
			}
		}
	}
	function view_detail(){
		$id = $_POST['id'];
		$datas = $this->OrderDetailModels->select_array_wherein_like_join_multi_column('tbl_order_details.*,tbl_product.name name_product',['tbl_order_details.orderID' => $id],'tbl_order_details.id desc',NULL,NULL,NULL,
		'tbl_product','tbl_product.id = tbl_order_details.productID','LEFT');
		$data = [
			'datas'	=> $datas
		];	
		return view('backend/order/view', isset($data) ? $data : NULL);
	}
	function exportExcel()
	{
		$options = array();
		if($_GET['times']){
			$timesAr = explode('-', $_GET['times']);
			$timeStart = trim($timesAr[0]);
			$timeEnd = trim($timesAr[1]);
			$timeStart = str_replace('/', '-', $timeStart);
			$timeEnd = str_replace('/', '-', $timeEnd);
			$options = array('date_give >=' => date('Y-m-d', strtotime($timeStart)), 'date_give <=' => date('Y-m-d', strtotime($timeEnd)));
		}
		$orders = $this->OrderModels->select_array('*',$options,'date_give desc, hours asc');
		
		if($orders != NULL){
			foreach ($orders as $key_orders => $val_orders) {
				$content = '';
				$detailOrder = $this->OrderDetailModels->select_array('*',['orderID' => $val_orders['id']]);
				
				if($detailOrder){
					foreach ($detailOrder as $key_detail => $val_detail) {
						$stt = $key_detail + 1;
						$product = $this->ProductModels->select_row('*',['id' => $val_detail['productID']]);
						$content .= $stt.') '.$product['name'] .' - SL: '. $val_detail['qty'];
						if(count($detailOrder) > 1 && $key_detail < (count($detailOrder) > 1)){
							$content .= "\n";
						}
					}
				}
				$orders[$key_orders]['content'] = $content;
			}
		}
		// var_dump($orders);die;
		$file_name = 'danhsachdonhang.xlsx';
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(30);
		$styleArray = [
			'font' => [
				'bold'  => true,
				'color' => array('rgb' => '0B3B0B'),
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'top' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
			'fill' => [],
		];
		$styleArray_price = [
			'font' => [
				'color' => array('rgb' => 'FF0000'),
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
			],
		];
		$styleArray_value = [
			// 'font' => [
			// 	'bold'  => true,
			// ],
			// 'alignment' => [
			// 	'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			// ],
			'borders' => [
				'top' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],

		];
		$sheet->setCellValue('A1', 'Họ tên');
		$sheet->setCellValue('B1', 'Số điện thoại');
		$sheet->setCellValue('C1', 'Địa chỉ');
		$sheet->setCellValue('D1', 'Ngày giao');
		$sheet->setCellValue('E1', 'Giờ giao');
		$sheet->setCellValue('F1', 'Tổng tiền');
		$sheet->setCellValue('G1', 'Chi tiết');

		$spreadsheet->getActiveSheet()->getStyle('A1:B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
		$spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray);
		$count = 2;
		foreach ($orders as $key => $val) {
			$spreadsheet->getActiveSheet()->getStyle('A1:A' . $count . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
			$spreadsheet->getActiveSheet()->getStyle('B1:B' . $count . '')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
			$spreadsheet->getActiveSheet()->getStyle('C1:C' . $count . '')->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('D1:D' . $count . '')->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('E1:E' . $count . '')->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('F1')->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('F2:F' . $count . '')->applyFromArray($styleArray_price);
			$spreadsheet->getActiveSheet()->getStyle('G1:G' . $count . '')->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('G1:G' . $count . '')->getAlignment()->setWrapText(true);
			$sheet->setCellValue('A' . $count, $val['name']);
			$sheet->setCellValue('B' . $count, $val['phone']);
			$sheet->setCellValue('C' . $count, $val['address']);
			$sheet->setCellValue('D' . $count, date('d/m/Y', strtotime($val['date_give'])));
			$sheet->setCellValue('E' . $count, $val['hours']. 'giờ');
			$sheet->setCellValue('F' . $count, number_format($val['total_price']).' VNĐ');
			$sheet->setCellValue('G' . $count, $val['content']);
			$count++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save(WRITEPATH . 'uploads/' . $file_name);
		$file = WRITEPATH . 'uploads/' . $file_name;

		// Open save file
		header("Conent-Type:application/vnd.ms-excel");
		header("Content-Disposition:attachment;filename=" . basename(WRITEPATH . 'uploads/' . $file) . "");
		header("Expires:0");
		header("Cache-Control:must-revalidate");
		header("Pragma:public");
		header("Content-Length:" . filesize($file));
		flush();
		readfile($file);
		exit;
		
	}
}
