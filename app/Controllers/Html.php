<?php

namespace App\Controllers;

use App\Models\CI_function;
use App\Controllers\BaseController;

class Html extends BaseController
{
	private $template 			  = 'frontend/construction/';

	public function __construct()
	{
		$this->CI_function  = new CI_function();
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
}
