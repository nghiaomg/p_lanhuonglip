<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\BankModels;
use App\Models\SystemModels;
class Bank extends BaseController
{
    private $title          = 'ngân hàng';
    private $template       = 'backend/bank/';
    public $control         = 'bank';
    public $path_url        = 'cpanel/bank/';

    function __construct()
    {
        $this->BankModels        = new BankModels();
    }

    public function index()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $data_index = $this->get_indexBE();
        $datas      = $this->BankModels->select_array();

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
        $sort_max   = $this->BankModels->select_max('sort');

        if ($this->request->getPost()) {
            $data_post             = $this->request->getPost('data_post');
            // Get and upload avatar image
            $data_post['sort']     = $sort_max['sort'] + 1;
            $data_post['publish'] ? $publish = 1 : $publish = 0;
            $data_post['publish']      = $publish;
            $data_post['created_at']   = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            $result = $this->BankModels->add($data_post);
            if ($result['type'] == "successful") return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', ADD_SUCCESS);
        }

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
        $datas           = $this->BankModels->find_one($id);

        if ($this->request->getPost()) {
            $data_post   = $this->request->getPost('data_post');
            $data_post['sort']              = $datas['sort'];
            $data_post['publish'] ? $publish = 1 : $publish = 0;
            $data_post['publish']           = $publish;
            $data_post['updated_at']        = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            $result                         = $this->BankModels->edit($data_post, array('id' => $id));
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
		$result = $this->BankModels->deleteWhere(array('id' => $id));
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
			$result = $this->BankModels->deleteWhere(array('id' => $val));
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
        $result                  = $this->BankModels->edit($dataUpdate, array('id' => $id));

        if ($result) echo json_encode($result);
    }

    public function sort()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $id                  = $_POST['id'];
        $sort                = $_POST['sort'];
        $data_update['sort'] = $sort;
        $result              = $this->BankModels->edit($data_update, array('id' => $id));
        if ($result > 0) echo json_encode(array('rs' => 1));
    }

    function del_image()
    {
        $this->checkPermission();
        $id = $this->request->getPost('id');
        $datas = $this->ContentsModels->where_in(array('id' => $id,'type'=>$this->control));
        $configJs = json_decode($datas['contents'],true);
        $fileName = $this->path_dir . $configJs['image'];
        $fileNameThumb = $this->path_dir . $configJs['thumb'];

        $webImages = explode(".", $configJs['image']);
        $webImagesThumb = explode(".", $configJs['thumb']);

        if ($datas != NULL) {
            if ($configJs['image']) {
                if (file_exists($fileName)) {
                    unlink($fileName);
                }
            }

            if ($configJs['thumb']) {
                if (file_exists($fileNameThumb)) {
                    unlink($fileNameThumb);
                }
            }
            $arr = array(
                'image'          => "",
                'thumb'          => "",
            );
            $contents = json_encode($arr);
            $data_update = array(
                'contents' => $contents,
            );
            $result = $this->ContentsModels->edit($data_update, array('id' => $id,'type'=> $this->control));
            if ($result) {
                echo json_encode(array(
                    'result' => "success",
                    "message"    => "Xóa hình thành công"
                ));
            }
        }
    }

    public function config()
    {
        # Check login
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();
        $datas = $this->ContentsModels->select_row('*',array('type'=>'faqs'));
        $contents = json_decode($datas['contents'],true);
        $fileName = $this->path_dir.$contents['image'];
        $fileThumb = $this->path_dir.$contents['thumb'];
        if ($this->request->getPost()) {
            if ($this->checkPermission() != "") {
                return $this->checkPermission();
            } else {
                if ($_FILES['image']['name']) {
                    if ($contents['image'] != '') {
                        if (file_exists($fileName)) {
                           unlink($fileName);
                        }
                    }
                    if ($contents['thumb'] != '') {
                        if (file_exists($fileThumb)) {
                           unlink($fileThumb);
                        }
                    }
                    $path_dir = $this->path_dir;
                    $filename = $this->request->getFile('image');
                    $data_upload = $this->Upload->upload_image($path_dir, $filename, 'faqs', 'image', 600, 600, null,'webp');
                        if ($data_upload['type'] == 'error') {
                            return redirect()->to(base_url(CPANEL . '/logo/index'))->with('error', $data_upload['message']);
                        } else {
                            $image =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
                            $thumb =  date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
                            $webps 			   = $data_upload['webps'];
					        $webps_thumb	   = $data_upload['webps_thumb'];
                            // echo $thumb;die;
                        }
                }
                else{
                    $image = $contents['image'];
                    $thumb =  $contents['thumb'];
                    $webps =  $contents['webps'];
                    $webps_thumb =  $contents['webps_thumb'];
                }
                $arr = array(
                    'image' => $image,
                    'thumb' => $thumb,
                    'webps' => $webps,
                    'webps_thumb' => $webps_thumb,
                    'name'  => trim($this->request->getPost('name'))
                );
                $contents = json_encode($arr);
                $data_post["contents"]   = $contents;
                if ($datas == null) {
                   $result = $this->ContentsModels->add($data_post);
                }
                else{
                    $result = $this->ContentsModels->edit($data_post,array('type'=>$this->control));
                }
                if ($result['type'] =="successful") {
                    return redirect()->to(base_url(CPANEL.$this->control))->with('success',EDIT_SUCCESS);
                }
            }
        }
    }
}
