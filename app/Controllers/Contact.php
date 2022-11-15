<?php

namespace App\Controllers;

use App\Models\CI_function;
use App\Models\ContactModels;
use App\Models\SystemModels;
use App\Controllers\BaseController;
class Contact extends BaseController
{
	private $template 			  = 'frontend/contact/';

	public function __construct()
	{
		$this->CI_function  = new CI_function();
		$this->security         = \Config\Services::security();
        $this->config_email     = new \Config\Email;
        $this->library_email    = \Config\Services::email();
		$this->ContactModels    = new ContactModels();
		$this->SystemModels = new SystemModels();
	}

	public function index()
	{
		$data_index 	= $this->get_index();
		$data = array(
			'data_index'			=> $data_index,
			'template'				=> $this->template . 'index',
			'title'					=> 'Liên hệ - '.$data_index['systems']['system']['title'],
			'keyword'				=> $data_index['systems']['system']['meta_keyword'],
			'description'			=> $data_index['systems']['system']['meta_description'],
			'image'					=> $data_index['imageShare'],
			'viewMoreConstLink'     => $this->viewMoreConstructionLink,
		);

		return view('frontend/default', isset($data) ? $data : NULL);
	}

	// GỬI LIÊN HỆ
	public function send_contact()
    {
        $contact    = $this->SystemModels->where_in(array('type'=>'system'));
		$contact_js = json_decode($contact['contents'],true);
		
        //===================================================
        $data_insert['name']       = $this->security->sanitizeFilename(trim($_POST['name']));
		$data_insert['title']      = $this->security->sanitizeFilename(trim($_POST['title']));
        $data_insert['phone']      = $this->security->sanitizeFilename(trim($_POST['phone']));
        $data_insert['email']      = $this->security->sanitizeFilename(trim($_POST['email']));
        $data_insert['content']    = $this->security->sanitizeFilename(trim($_POST['content']));
        $data_insert['created_at'] = gmdate('Y-m-d H:i:s',time()+7*3600);
        //==================== THÊM VÀO DATABASE==============
        $result         = $this->ContactModels->add($data_insert);
        echo json_encode(["result" => $result  ]);
        //==================== GỬI EMAIL =====================
        $send_to_email  = $contact_js['email_take'];
        $nickname_email = 'Phố xanh';
        $subject        = 'Yêu cầu liên hệ mới từ khách hàng';
        // content mail
        $body           = "";
        $body          .= "<div> <strong><u>Yêu cầu liên hệ mới từ khách hàng</u></strong></div>";
		$body          .= "<div> <strong>Tiêu đề: </strong>".$data_insert['title']."</div>";
        $body          .= "<div> <strong>Họ tên: </strong>".$data_insert['name']."</div>";
        $body          .= "<div> <strong>Số điện thoại: </strong>".$data_insert['phone']."</div>";
        $body          .= "<div> <strong>Email        : </strong>".$data_insert['email']."</div>";
        $body          .= "<div> <strong>Nội dung     : </strong>".$data_insert['content']."</div>";
        $message        = $body;
        $this->send($subject, $message ,$send_to_email, $nickname_email);
    }

    public function send($subject = '', $message = '',$send_to_email, $nickname_email){
        // lấy các thông số đã config
        $config_email   = $this->config_email;
        // lấy SMTPUser từ config
        $SMTPUser       =  $config_email->SMTPUser;
	    //send mail
        $this->library_email->setFrom($SMTPUser, $nickname_email);
		$this->library_email->setTo($send_to_email);
		$this->library_email->setSubject($subject);
		$this->library_email->setMessage($message);
		if ($this->library_email->send()) {
			return true;
		} 
		// return false;
	}
}
