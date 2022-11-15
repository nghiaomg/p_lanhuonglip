<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\MyModels;
use App\Models\CI_function;
use App\Models\DvtModels;

class Dvt extends BaseController
{
    private $title                  = 'đơn vị tính';
    private $template               = 'backend/dvt/';
    public $control                 = 'dvt';
    public $path_url                = 'cpanel/dvt/';
    function __construct()
    {
        $this->MyModels             = new MyModels();
        $this->CI_function          = new CI_function();
        $this->DvtModels         = new DvtModels();
    }

    public function index()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();
        $data_index = $this->get_indexBE();
        $datas      = $this->DvtModels->select_array("*", NULL, "sort asc, id desc");
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
        $sort_max   = $this->DvtModels->select_max('sort');

        if ($this->request->getPost()) {
            $data_post                       = $this->request->getPost('data_post');
            // Get and upload avatar image
            $data_post['sort']               = $sort_max['sort'] + 1;
            isset($data_post['publish']) ? $publish = 1 : $publish = 0;
            $data_post['publish']            = $publish;
            $data_post['created_at']         = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            $result = $this->DvtModels->add($data_post);
            if ($result['type'] == "successful") return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', ADD_SUCCESS);
        }

        $data = [
            'data_index'            => $data_index,
            'control'               => $this->control,
            'path_url'              => $this->path_url,
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
        $datas           = $this->DvtModels->find_one($id);
        $sort_max        = $this->DvtModels->select_max('sort');
        if ($this->request->getPost()) {
            $data_post   = $this->request->getPost('data_post');
            $data_post['sort']              = $datas['sort'];
            isset($data_post['publish']) ? $publish = 1 : $publish = 0;
            $data_post['publish']           = $publish;
            $data_post['updated_at']        = gmdate('Y-m-d H:i:s', time() + 7 * 3600);

            $result                         = $this->DvtModels->edit($data_post, array('id' => $id));
            if ($result['type'] == "successful") return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', EDIT_SUCCESS);
        }

        $data = [
            'datas'              => $datas,
            'data_index'         => $data_index,
            'control'            => $this->control,
            'path_url'           => $this->path_url,
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
        $id     = $_POST['id'];
        $result = $this->DvtModels->deleteWhere(array('id' => $id));
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
            $result = $this->DvtModels->deleteWhere(array('id' => $val));
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
        $result                  = $this->DvtModels->edit($dataUpdate, array('id' => $id));

        if ($result) echo json_encode($result);
    }

    public function sort()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $id                  = $_POST['id'];
        $sort                = $_POST['sort'];
        $data_update['sort'] = $sort;
        $result              = $this->DvtModels->edit($data_update, array('id' => $id));
        if ($result > 0) echo json_encode(array('rs' => 1));
    }
}
