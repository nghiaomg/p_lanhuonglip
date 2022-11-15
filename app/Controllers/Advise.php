<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdviseModels;
class Advise extends BaseController
{
	function __construct(){
		$this->AdviseModels 			= new AdviseModels();
		$this->security         = \Config\Services::security();
	}
	private $template = 'frontend/advise/';
	public function index()
	{
		if ($this->request->getPost())
		{
			$data_post = $this->request->getPost('data_post');
			$data_post['name'] =  $this->security->sanitizeFilename(trim($data_post['name']));
			$data_post['phone'] =  $this->security->sanitizeFilename(trim($data_post['phone']));
			$data_post['note'] =  $this->security->sanitizeFilename(trim($data_post['note']));
			$data_post['created_at'] = gmdate('Y-m-d H:i:s',time() + 7 * 3600);
			$result = $this->AdviseModels->add($data_post);
			if ($result['type'] == 'successful')
			{
				return redirect()->to(base_url('thong-bao-dang-ky-tu-van.html'));
			}
		}
	}
	public function notify()
	{
		$data_index 	= $this->get_index();
		$data = array(
			'data_index'			=> $data_index,
			'template'				=> $this->template . 'notify',
			'title'					=> 'Gửi tư vấn thành công - '.$data_index['systems']['system']['title'],
			'keyword'				=> $data_index['systems']['system']['meta_keyword'],
			'description'			=> $data_index['systems']['system']['meta_description'],
			'image'					=> $data_index['imageShare'],
		);

		return view('frontend/default', isset($data) ? $data : NULL);
	}
}
