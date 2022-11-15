<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\MyModels;
use App\Models\CI_function;
use App\Models\CustomersModels;
use App\Models\CountryModels;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
class Customers extends BaseController
{
    private $title                  = 'Khách hàng';
    private $template               = 'backend/customers/';
    public $control                 = 'customers';
    public $path_url                = 'cpanel/customers/';
    function __construct()
    {
        $this->MyModels             = new MyModels();
        $this->CI_function          = new CI_function();
        $this->CustomersModels      = new CustomersModels();
        $this->CountryModels        = new CountryModels();
    }

    public function index()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();
        $data_index = $this->get_indexBE();
        $datas      = $this->CustomersModels->select_array_two("tbl_customer.*,tbl_country.name country", NULL, "id desc",0,0,'',
        [
            ['tbl_country','tbl_country.id = tbl_customer.countryID','LEFT']
        ]);
        $data = array(
            'data_index'          => $data_index,
            'datas'               => $datas,
            'control'             => $this->control,
            'path_url'            => $this->path_url,
            'title'               => 'Quản lý ' . $this->title,
            'template'            => $this->template . 'index',
        );
        return view('backend/default', isset($data) ? $data : NULL);
    }

    function add()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $data_index = $this->get_indexBE();
        
        if ($this->request->getPost()) {
            $data_post                       = $this->request->getPost('data_post');
            $code                            = 'KH'.$this->CI_function->generateRandomString(6);
            $checkCode = $this->CustomersModels->select_array_two('*',['code' => $code]);
            if (count($checkCode) > 0) {
                $code    = 'KH'.$this->CI_function->generateRandomString(6);
            }
            $data_post['code'] = $code;
            $data_post['birthday'] = $this->CI_function->change_format_date($data_post['birthday']);
            // Get and upload avatar image
            $data_post['created_at']         = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            $result = $this->CustomersModels->add($data_post);
            if ($result['type'] == "successful") return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', ADD_SUCCESS);
        }
        // quốc tịch
		$country = $this->CountryModels->select_array('*',['publish' => 1],'sort asc');
        $data = [
            'data_index'            => $data_index,
            'control'               => $this->control,
            'path_url'              => $this->path_url,
            'title'                 => 'Quản lý ' . $this->title,
            'template'              => $this->template . 'add',
            'country'               => $country
        ];
        return view('backend/default', isset($data) ? $data : NULL);
    }

    function edit($id)
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));

        $this->checkPermission();

        $data_index      = $this->get_indexBE();
        $datas           = $this->CustomersModels->find_one($id);
        if ($this->request->getPost()) {
            $data_post   = $this->request->getPost('data_post');
            $data_post['birthday'] = $this->CI_function->change_format_date($data_post['birthday']);
            $result                         = $this->CustomersModels->edit($data_post, array('id' => $id));
            if ($result['type'] == "successful") return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', EDIT_SUCCESS);
        }
          // quốc tịch
		$country = $this->CountryModels->select_array('*',['publish' => 1],'sort asc');
        $data = [
            'datas'              => $datas,
            'data_index'         => $data_index,
            'control'            => $this->control,
            'path_url'           => $this->path_url,
            'title'              => 'Quản lý ' . $this->title,
            'template'           => $this->template . 'edit',
            'country'            => $country
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
        $id     = $_POST['id'];
        $result = $this->CustomersModels->deleteWhere(array('id' => $id));
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
            $result = $this->CustomersModels->deleteWhere(array('id' => $val));
            if ($result) {
                echo json_encode(array("result" => "successfully"));
            }
        }
    }

    function checkglobals()
    {
        //check login
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $id                      = $this->request->getVar('id');
        $global                  = $this->request->getVar('global');
        $properties              = $this->request->getVar('properties');
        $dataUpdate[$properties] = $global;
        $result                  = $this->CustomersModels->edit($dataUpdate, array('id' => $id));

        if ($result) echo json_encode($result);
    }

   
    function checkData(){
        $data_post  = $this->request->getPost('data_post');
        $phone      = trim($data_post['phone']);
        $email      = trim($data_post['email']);
       
        $errors = [];
        if ($email != '')
        {
            $email_check = $this->CustomersModels->select_array_two('*',['email' => $email]);
            if (count($email_check) > 0)
            {
               array_push($errors,[
                    'status'    => false,
                    'key'       => 'data_post[email]',
                    'messenger' => 'Email đã được sử dụng !'
               ]);
            }
        }

        if ($phone != '')
        {
            $phone_check = $this->CustomersModels->select_array_two('*',['phone' => $phone]);
            if (count($phone_check) > 0)
            {
               array_push($errors,[
                    'status'    => false,
                    'key'       => 'data_post[phone]',
                    'messenger' => 'Số điện thoại đã được sử dụng !'
               ]);
            }
        }
        echo json_encode($errors);
    } 
    function checkDataEdit(){
        $data_post  = $this->request->getPost('data_post');
        $phone      = trim($data_post['phone']);
        $email      = trim($data_post['email']);
        $id         = array($data_post['id']);
        $errors = [];
        if ($email != '')
        {
            $email_check = $this->CustomersModels->select_array_two('*',['email' => $email],'id desc',0,0,'',NULL,
            NULL,NULL,NULL,$id,'id');
            if (count($email_check) > 0)
            {
               array_push($errors,[
                    'status'    => false,
                    'key'       => 'data_post[email]',
                    'messenger' => 'Email đã được sử dụng !'
               ]);
            }
        }

        if ($phone != '')
        {
            $phone_check = $this->CustomersModels->select_array_two('*',['phone' => $phone],'id desc',0,0,'',NULL,
            NULL,NULL,NULL,$id,'id');
            if (count($phone_check) > 0)
            {
               array_push($errors,[
                    'status'    => false,
                    'key'       => 'data_post[phone]',
                    'messenger' => 'Số điện thoại đã được sử dụng !'
               ]);
            }
        }
        echo json_encode($errors);
    }
    function importExcell(){
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $errors = [];
        // echo "<pre>";
		if ($_FILES['file']['error'] <= 0)
        {
            $spreadsheet =\PhpOffice\PhpSpreadsheet\IOFactory::load($_FILES['file']['tmp_name']);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
		
            $genderArray = [
                'nam'   => 1,
                'nữ'   => 2,
            ];
            if (!empty($sheetData))
            {
                // echo "<pre>";
                // print_r($sheetData);die;
                for ($i = 1; $i <count($sheetData); $i++)
				{
                    $countError = 0;
                    $messager = '';
                    $name = trim($sheetData[$i][0]);

                    $phone = trim($sheetData[$i][1]);
                    $email = trim($sheetData[$i][2]);
                    $sex = $sheetData[$i][3];
                    $date = trim($sheetData[$i][4]);
                    $country = trim($sheetData[$i][6]);
                    $address = trim($sheetData[$i][5]);
                    if ($name !='' && $phone != '' && $email !='' && $sex !='' && $country !='' && $address !='')
                    {
                        // kiếm tra số điện thoại
                        $checkphone = $this->CustomersModels->select_array_two('*',['phone' => $phone]);
                        if (count($checkphone) > 0) {
                            $countError +=1;
                            $messager = 'Số điện thoại '.$phone. ' này đã tồn tại'.'<br/>';
                            $array_error = [
                                'count'     => $i + 1,
                                'messenger' => $messager
                            ];
                            array_push($errors,$array_error);
                        }
                        // kiếm tra Email
                        $checkemail = $this->CustomersModels->select_array_two('*',['email' => $email]);
                        if (count($checkemail) > 0) {
                            $countError +=1;
                            $messager = 'Địa chỉ email '.$email. ' này đã tồn tại'.'<br/>';
                            $array_error = [
                                'count'     => $i + 1,
                                'messenger' => $messager
                            ];
                            array_push($errors,$array_error);
                        }
                        // kiếm tra giới tính
                        $gender = $genderArray[trim(strtolower($sex))];
                        if ($gender == NULL)
                        {
                            $countError +=1;
                            $messager = 'Giới tính nhập sai cú pháp : '.$sheetData[$i][3].'<br/>';
                            $array_error = [
                                'count'     => $i + 1,
                                'messenger' => $messager
                            ];
                            array_push($errors,$array_error);
                        }
                        // kiếm tra định dạng ngày sinh
                        $birthday = $this->CI_function->checkFormat($date);
                        if ($birthday['status'] == 2)
                        {
                            $countError +=1;
                            $messager = 'Nhập sai ngày sinh '.$birthday['string'].'<br/>';
                            $array_error = [
                                'count'     => $i + 1,
                                'messenger' => $messager
                            ];
                            array_push($errors,$array_error);
                        }
                    
                        $countryID = 0;
                        $checkCountry = $this->CountryModels->select_row_two('*',['name' => $country]);
                        if ($checkCountry != NULL)
                        {
                        $countryID = $checkCountry['id'];
                        }
                        else
                        {
                            // nếu hk tồn tại thì thêm vào db
                            $resultCountry = $this->CountryModels->add(['name' => $country,'publish' => 1,'created_at' => gmdate('Y-m-d H:i:s',time() + 7 * 3600)]);
                            $countryID = $resultCountry['insertID'];
                        }
                        // ==========
                        if ($countError < 1) {
                            $array = [
                                'name'          => $name,
                                'phone'         => $phone,
                                'email'         => $email,
                                'sex'           => $gender,
                                'countryID'     => $countryID,
                                'birthday'      => $this->CI_function->change_format_date(trim($sheetData[$i][4])),
                                'address'       => trim($sheetData[$i][5]),
                                'code'          => $this->codeCustomers(),
                                'created_at'    => gmdate('Y-m-d H:i:s',time() + 7 * 3600)

                            ];
                            $this->CustomersModels->add($array);
                        }
                    }
                   
                }
            }
            if ($errors != NULL)
            {
                 return redirect()->to(base_url(CPANEL . $this->control . "/errors"))->with('dataErrors', $errors);
            }
            else
            {
                return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', 'Import thành công');
            }
        }
        else
        {
            return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', 'Không có file nào');
        }
       
	}
    function codeCustomers(){
        $code      = 'KH'.$this->CI_function->generateRandomString(6);
        $checkCode = $this->CustomersModels->select_array_two('*',['code' => $code]);
        if (count($checkCode) > 0) {
            $code    = $this->codeCustomers();
        }
        return $code;
    }
    function errors(){
        $data_index = $this->get_indexBE();
        $data = [
            'data_index'         => $data_index,
            'control'            => $this->control,
            'path_url'           => $this->path_url,
            'title'              => 'Lỗi',
            'template'           => $this->template . 'errors',
        ];
        return view('backend/default', isset($data) ? $data : NULL);
    }
    function exportExcel(){
        $file_name = 'khachhang.xlsx';
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
		foreach(range('A','I') as $col){
			$spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(TRUE);
		}
		// VALUE DATA 
		$datas = $this->CustomersModels->select_array_two('tbl_customer.*,tbl_country.name nationaly',NULL,'tbl_customer.id desc',0,0,'',[
			['tbl_country','tbl_country.id = tbl_customer.countryID','LEFT']
		]);
		// SET tiêu đề cho mỗi cột
		$sheet->setCellValue('A1','STT');
		$sheet->setCellValue('B1','Mã khách hàng');
		$sheet->setCellValue('C1','Tên khách hàng');
		$sheet->setCellValue('D1','Giới tính');

		$sheet->setCellValue('E1','Quốc tịch');
		$sheet->setCellValue('F1','Ngày sinh');

		$sheet->setCellValue('G1','Email');
		$sheet->setCellValue('H1','Số điện thoại');
		$sheet->setCellValue('I1','Địa chỉ');

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
			// $spreadsheet->getActiveSheet()->getStyle('I1:I'.$rows)->applyFromArray($styleArray_value);

		

			$sheet->setCellValue('A'.$rows, $counts);
			$sheet->setCellValue('B'.$rows, $val['code']);
			$sheet->setCellValue('C'.$rows, $val['name']);
			$sheet->setCellValue('D'.$rows, $val['sex'] == 1?'Nam':'Nữ');
			$sheet->setCellValue('E'.$rows, $val['nationaly']);
			$sheet->setCellValue('F'.$rows, date('d/m/Y',strtotime($val['birthday'])));
			$sheet->setCellValue('G'.$rows, $val['email']);
			$sheet->setCellValue('H'.$rows, $val['phone']);
			$sheet->setCellValue('I'.$rows, $val['address']);
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
