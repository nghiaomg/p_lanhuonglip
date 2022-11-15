<?php

namespace App\Controllers\Cpanel;

use App\Models\UserModels;
use App\Controllers\BaseController;
use App\Models\CI_function;

class Dashboard extends BaseController
{
	private $title 		= 'Dashboard';
	private $template 	= 'backend/dashboard/';
	private $control 	= "dashboard";
	public function __construct()
	{
		$this->UserModels         	 = new UserModels();
		$this->CI_function 		  	 = new CI_function();
	}

	public function index()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}

		// $this->checkPermission();

		$month 				      	 = date('m');
		$data_index 			  	 = $this->get_indexBE();
		//=========================
		$data['data_index'] 	  	 = $data_index;
		$data['title'] 			  	 = $this->title;
		$data['control'] 		  	 = $this->control;
		$data['template'] 		  	 = $this->template . 'index';

		//=========================
		return view('backend/default', isset($data) ? $data : NULL);
	}
}