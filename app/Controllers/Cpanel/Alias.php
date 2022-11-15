<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\CategoryModels;
use App\Models\AliasModels;
use App\Models\CI_function;
use App\Models\NewsModels;

class Alias extends BaseController
{
	private $title = 'Slug';
	private $template = 'backend/alias/';
	var	$path_url = 'cpanel/alias/';
	var $control = 'alias';
	function __construct()
	{
		$this->AliasModels		   = new AliasModels();
		$this->CategoryModels	   = new CategoryModels();
		$this->CI_function 		   = new CI_function();
		$this->NewsModels 		   = new NewsModels();
	}
	public function index()
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$data_index = $this->get_indexBE();
		$datas = $this->AliasModels->select_array();
		$data = [
			'datas'					=> $datas,
			'data_index'			=> $data_index,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'index'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}
	function edit($id)
	{
		if (!session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/login.html'));
		}
		$data_index = $this->get_indexBE();
		$datas = $this->AliasModels->where_in(array('id' => $id));
		$type = $datas['type'];
		if ($this->request->getPost()) {
			$data_post = $this->request->getPost('data_post');
			$result = $this->AliasModels->edit($data_post, array('id' => $id));
			if ($result['type'] == 'successful') {
				switch ($type) {
					case $type == 1 || $type == 2:
						$this->CategoryModels->edit($data_post, array('alias' => $datas['alias']));
						break;
					case $type == 3:
						break;
					case $type == 4:
						$this->NewsModels->edit($data_post, array('alias' => $datas['alias']));
						break;
					default:
						break;
				}
				return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
			}
		}
		$data = [
			'datas'					=> $datas,
			'data_index'			=> $data_index,
			'control'				=> $this->control,
			'path_url'				=> $this->path_url,
			'title'					=> 'Quản lý ' . $this->title,
			'template'				=> $this->template . 'edit'
		];
		return view('backend/default', isset($data) ? $data : NULL);
	}
}
