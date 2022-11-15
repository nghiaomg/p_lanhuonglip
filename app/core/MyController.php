<?php

namespace App\core;

use App\Controllers\BaseController;

class MyController extends BaseController
{
	function __contruct()
	{
	}
	protected function get_index()
	{
		$data['get'] = $this->get();

		return $data;
	}
	protected function get()
	{
		$data  = 1;
		return $data;
	}
}
class AdminController extends BaseController
{
	function __contruct()
	{
	}
	protected function get_index()
	{
		$data['get'] = $this->get();

		return $data;
	}
	protected function get()
	{
		$data  = 1;
		return $data;
	}
}
