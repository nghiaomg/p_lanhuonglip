<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\CI_function;
use App\Models\BookingModels;
//export excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Booking extends BaseController
{
	var $title              = 'Lịch đặt';
	var $template           = 'backend/booking/';
	var $control            = 'booking';
	const per_page           = 10;
	public function __construct()
	{
		$this->BookingModels 			=  new BookingModels();
		$this->CI_function   			= new CI_function();
	}

	public function index()
	{
		$this->checkPermission();
		$data_index         = $this->get_indexBE();

		$keyword = '';
		$rows = $this->BookingModels->select_array_two('tbl_booking.*,tbl_country.name nationaly',NULL,'tbl_booking.id desc',0,0,$keyword,[
			['tbl_country','tbl_country.id = tbl_booking.countryID','LEFT']
		],['tbl_booking.phone','tbl_booking.email','tbl_booking.name']);

		$limit = self::per_page;
		$total_rows = ceil(count($rows) / $limit);
		$page = isset($_POST['page'])?$_POST['page']:1;
		$start = ($page - 1) * $limit;
		$datas = [];
		if ($total_rows > 0) {
			$datas = $this->BookingModels->select_array_two('tbl_booking.*,tbl_country.name nationaly',NULL,'tbl_booking.id desc',$start,$limit,$keyword,[
				['tbl_country','tbl_country.id = tbl_booking.countryID','LEFT']
			],['tbl_booking.phone','tbl_booking.email','tbl_booking.name']);
		}
		
		$button_pagination = $this->CI_function->pagination($page,$total_rows);
		$data = [
			'data_index'			=> $data_index,
			'control'				=> $this->control,
			'title'					=> $this->title,
			'template'				=> $this->template . 'index',
			'button_pagination'		=> $button_pagination,
			'datas'					=> $datas
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}

	// phân trang + tìm kiếm 
	public function search_pagination()
	{
		$keyword = $_POST['keyword']?trim($_POST['keyword']):'';
		$rows = $this->BookingModels->select_array_two('tbl_booking.*,tbl_country.name nationaly',NULL,'tbl_booking.id desc',0,0,$keyword,[
			['tbl_country','tbl_country.id = tbl_booking.countryID','LEFT']
		],['tbl_booking.phone','tbl_booking.email','tbl_booking.name']);

		$limit = self::per_page;
		$total_rows = ceil(count($rows) / $limit);
		$page = isset($_POST['page'])?$_POST['page']:1;
		$start = ($page - 1) * $limit;
		$datas = [];
		if ($total_rows > 0) {
			$datas = $this->BookingModels->select_array_two('tbl_booking.*,tbl_country.name nationaly',NULL,'tbl_booking.id desc',$start,$limit,$keyword,[
				['tbl_country','tbl_country.id = tbl_booking.countryID','LEFT']
			],['tbl_booking.phone','tbl_booking.email','tbl_booking.name']);
		}
		$button_pagination = $this->CI_function->pagination($page,$total_rows);
		$data = [
			'control'				=> $this->control,
			'button_pagination'		=> $button_pagination,
			'datas'					=> $datas
		];
		return view('backend/booking/loadTable', isset($data) ? $data : NULL);
	}

	function delete()
	{
		//check login
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$this->checkPermission();
		$id     = $_POST['id'];
		$result = $this->BookingModels->deleteWhere(array('id' => $id));
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
			$result     = $this->BookingModels->deleteWhere(array('id' => $val));
			if ($result) {
				echo json_encode(array("result" => "successfully"));
			}
		}
	}
	function view_detail(){
		$id = $_POST['id'];
		$datas = $this->BookingModels->select_row_two('tbl_booking.*,tbl_country.name nationaly',['tbl_booking.id' => $id],'',[
			['tbl_country','tbl_country.id = tbl_booking.countryID','LEFT']
		]);
		$data = [
			'datas'	=> $datas
		];
		return view('backend/booking/view', isset($data) ? $data : NULL);
	}
	function exportExcel()
	{

		$file_name = 'booking.xlsx';
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$style_array = [
			'font' => [
				'bold'  => true,
				'color' => [
					'rgb'    => '000000'
				],
				'size'  => 13
			],
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
			'borders' => [
				'top' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
		$styleArray_value = [
			'alignment' => [
				'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
			],
		];
		$spreadsheet->getActiveSheet()->getStyle('A1:N1')->applyFromArray($style_array);
		// SET chiều rộng mỗi cột auto theo nội dung
		foreach(range('A','N') as $col){
			$spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(TRUE);
		}
		// VALUE DATA 
		$datas = $this->BookingModels->select_array_two('tbl_booking.*,tbl_country.name nationaly',NULL,'tbl_booking.id desc',0,0,$keyword,[
			['tbl_country','tbl_country.id = tbl_booking.countryID','LEFT']
		],['tbl_booking.phone','tbl_booking.email','tbl_booking.name']);
		// SET tiêu đề cho mỗi cột
		$sheet->setCellValue('A1','STT');
		$sheet->setCellValue('B1','Tên khách hàng');
		$sheet->setCellValue('C1','Giới tính');
		$sheet->setCellValue('D1','Quốc tịch');
		$sheet->setCellValue('E1','Ngày sinh');

		$sheet->setCellValue('F1','Email');
		$sheet->setCellValue('G1','Số điện thoại');
		$sheet->setCellValue('H1','Địa chỉ');
		$sheet->setCellValue('I1','Ngày bay');

		$sheet->setCellValue('J1','Đi với một mình/ nhóm');
		$sheet->setCellValue('K1','Số người đi');
		$sheet->setCellValue('L1','Câu lạc bộ');
		$sheet->setCellValue('M1','Ngày đặt');

		$rows = 2;
		$counts = 1;

		foreach($datas as $key => $val)
		{
			
			$spreadsheet->getActiveSheet()->getStyle('A1:A'.$rows)->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('B1:B'.$rows)->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('C1:C'.$rows)->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('D1:D'.$rows)->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('E1:E'.$rows)->applyFromArray($styleArray_value);

			$spreadsheet->getActiveSheet()->getStyle('F1:F'.$rows)->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('G1:G'.$rows)->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('H1:H'.$rows)->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('I1:I'.$rows)->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('J1:J'.$rows)->applyFromArray($styleArray_value);

			$spreadsheet->getActiveSheet()->getStyle('K1:K'.$rows)->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('L1:L'.$rows)->applyFromArray($styleArray_value);
			$spreadsheet->getActiveSheet()->getStyle('M1:M'.$rows)->applyFromArray($styleArray_value);

			$sheet->setCellValue('A'.$rows, $counts);
			$sheet->setCellValue('B'.$rows, $val['name']);
			$sheet->setCellValue('C'.$rows, $val['gender'] == 1?'Nam':'Nữ');
			$sheet->setCellValue('D'.$rows, $val['nationaly']);
			$sheet->setCellValue('E'.$rows, date('d/m/Y',strtotime($val['birthDay'])));
			$sheet->setCellValue('F'.$rows, $val['email']);
			$sheet->setCellValue('G'.$rows, $val['phone']);
			$sheet->setCellValue('H'.$rows, $val['address']);
			$sheet->setCellValue('I'.$rows, $val['dateGo']);
			$sheet->setCellValue('J'.$rows, $val['goWith'] == 1?'Một mình':'Nhóm');
			$sheet->setCellValue('K'.$rows, $val['numPerson'] == 0?1:$val['numPerson']);
			$sheet->setCellValue('L'.$rows, $val['club'] != ''?$val['club']:'Không có');
			$sheet->setCellValue('M'.$rows, date('d/m/Y',strtotime($val['created_at'])));
			$rows++;
			$counts++;
		}
		$writer = new Xlsx($spreadsheet);
		$writer->save(WRITEPATH . 'uploads/' . $file_name);
		$file = WRITEPATH . 'uploads/' . $file_name;
		header('Content-Type:application/vnd.ms-excel');
		header('Content-Diposition:attachment;filename='.basename($file).'');
		header('Expires:0');
		header('Cache-Control:must-revalidate');
		header('Pragma:public');
		header('Content-Length:'.filesize($file).'');
		flush();
		readfile($file);
		exit;
	}
}
