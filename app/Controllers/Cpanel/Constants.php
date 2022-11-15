<?php

namespace App\Controllers\Cpanel;
use App\Controllers\BaseController;
use App\Models\ConstantModels;
class Constants extends BaseController
{
    private $title                  = 'Từ khóa';
    private $template               = 'backend/constants/';
    public $control                 = 'constants';
    public $path_url                = 'cpanel/constants/';
    var $path_dir                   = 'uploads/images/constants/';
	var $path_dir_webp              = 'uploads/webps/constants/';
    function __construct()
    {
        $this->ConstantModels     = new ConstantModels();
    }

    public function index()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();
        $data_index = $this->get_indexBE();
        $datas      = $this->ConstantModels->select_array("*",NULL,"id desc");
        
        $data = array(
            'data_index'          => $data_index,
            'datas'               => $datas,
            'control'             => $this->control,
            'path_url'            => $this->path_url,
            'path_dir_thumb'      => $this->path_dir,
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
            // Get and upload avatar image
            $data_post['publish'] ? $publish    = 1 : $publish = 0;
            $data_post['publish']               = $publish;
            $data_post['created_at']            = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            $result = $this->ConstantModels->add($data_post);
            if ($result['type'] == "successful") return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', ADD_SUCCESS);
        }
        // config
        $data = [
            'data_index'            => $data_index,
            'control'               => $this->control,
            'path_url'              => $this->path_url,
            'path_dir'              => $this->path_dir,
            'path_dir_thumb'        => $this->path_dir_thumb,
            'title'                 => 'Quản lý ' . $this->title,
            'template'              => $this->template . 'add'
        ];
        return view('backend/default', isset($data) ? $data : NULL);
    }

    function edit($id)
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));

        $this->checkPermission();
        $data_index      = $this->get_indexBE();
        $datas           = $this->ConstantModels->find_one($id);
        $sort_max        = $this->ConstantModels->select_max('sort');
        
        if ($this->request->getPost()) {
            $data_post   = $this->request->getPost('data_post');
            $data_post['publish'] ? $publish    = 1 : $publish = 0;
            $data_post['publish']               = $publish;
            $result                             = $this->ConstantModels->edit($data_post, array('id' => $id));
            if ($result['type'] == "successful") return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', EDIT_SUCCESS);
        }

        $data = [
            'datas'              => $datas,
            'data_index'         => $data_index,
            'control'            => $this->control,
            'path_url'           => $this->path_url,
            'path_dir_thumb'     => $this->path_dir,
            'title'              => 'Quản lý ' . $this->title,
            'template'           => $this->template . 'edit'
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
		$id 	= $_POST['id'];
		$result = $this->ConstantModels->deleteWhere(array('id' => $id));
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
            // ==========
			$result = $this->ConstantModels->deleteWhere(array('id' => $val));
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
        $result                  = $this->ConstantModels->edit($dataUpdate, array('id' => $id));

        if ($result) echo json_encode($result);
    }


}
