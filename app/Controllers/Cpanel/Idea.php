<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\MyModels;
use App\Models\AliasModels;
use App\Models\Upload;
use App\Models\CI_function;
use App\Models\IdeaModel;

class Idea extends BaseController
{
    private $title                  = 'ý kiến khách hàng';
    private $template               = 'backend/idea/';
    public $control                 = 'idea';
    public $path_url                = 'cpanel/idea/';
    public $path_dir                = 'uploads/images/idea/';
    public $path_dir_thumb          = 'uploads/images/idea/thumb';
    public $path_dir_detail         = 'uploads/images/idea/detail';
    public $path_dir_webp           = 'uploads/webps/idea/';
    public $path_dir_webp_detail    = 'uploads/webps/idea/detail';

    function __construct()
    {
        $this->MyModels       = new MyModels();
        $this->AliasModels    = new AliasModels();
        $this->CI_function    = new CI_function();
        $this->Upload         = new Upload();
        $this->db             = \Config\Database::connect('default');
        $this->IdeaModel      = new IdeaModel();
    }

    public function index()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $data_index = $this->get_indexBE();
        $datas      = $this->IdeaModel->select_array();

        $data = array(
            'data_index'     => $data_index,
            'datas'          => $datas,
            'control'        => $this->control,
            'path_url'       => $this->path_url,
            'path_dir_thumb' => $this->path_dir,
            'title'          => 'Quản lý ' . $this->title,
            'template'       => $this->template . 'index'
        );
        return view('backend/default', isset($data) ? $data : NULL);
    }

    function add()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $data_index = $this->get_indexBE();
        $sort_max   = $this->IdeaModel->select_max('sort');

        if ($this->request->getPost()) {
            $data_post             = $this->request->getPost('data_post');

            // Get and upload avatar image
            if ($_FILES['image']['name']) {
                $fileName = $this->request->getFile('image');
                $data_upload              = $this->Upload->upload_image($this->path_dir, $fileName, $_FILES['image']['name'], 'image', 300, 300, null, "webp");
                if ($data_upload['image'] == '') {
                    return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
                } else {
                    $image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
                    $thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image'];
                    $webps                = $data_upload['webps'];
                    $webps_thumb          = $data_upload['webps_thumb'];
                }
            }
            $data_post['image']             = $image ? $image : '';
            $data_post['thumb']             = $thumb ? $thumb : '';
            $data_post['webps']             = $webps ? $webps : '';
            $data_post['webps_thumb']       = $webps_thumb ? $webps_thumb : '';
            $data_post['sort']              = $sort_max['sort'] + 1;
            $data_post['month']             = date("m");
            $data_post['year']              = date("Y");
            $data_post['publish'] ? $publish = 1 : $publish = 0;
            $data_post['publish']           = $publish;
            $data_post['des']               = trim($data_post['des']);
            $data_post['created_at']        = gmdate('Y-m-d H:i:s', time() + 7 * 3600);

            $result = $this->IdeaModel->add($data_post);
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

        $data_index = $this->get_indexBE();
        $datas           = $this->IdeaModel->find_one($id);
        $sort_max   = $this->IdeaModel->select_max('sort');
        $image           = $this->path_dir . $datas['image'];
        $imagethumb      = $this->path_dir . $datas['thumb'];

        if ($this->request->getPost()) {
            $data_post   = $this->request->getPost('data_post');
            if ($_FILES['image']['name']) {
                try {
                    if ($datas['image'] != '') {
                        try {
                            if (file_exists($image)) {
                                unlink($image);
                            }
                        } catch (\Throwable $th) {
                            var_dump($th);
                        }
                    }
                    if ($datas['thumb'] != '') {
                        try {
                            if (file_exists($imagethumb)) {
                                unlink($imagethumb);
                            }
                        } catch (\Throwable $th) {
                            var_dump($th);
                        }
                    }
                } catch (\Throwable $th) {
                    var_dump($th);
                }
                $fileName         = $this->request->getFile('image');
                $data_upload      = $this->Upload->upload_image($this->path_dir, $fileName, $_FILES['image']['name'], 'image', 300, 300, null, "webp");
                if ($data_upload['image'] == '') {
                    return redirect()->to(base_url(CPANEL . $this->control . '/edit'))->with('error', $data_upload['message']);
                } else {
                    $image        = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
                    $thumb        = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
                    $webps        = $data_upload['webps'];
                    $webps_thumb  = $data_upload['webps_thumb'];
                }
            } else {
                $image            = $datas['image'];
                $thumb            = $datas['thumb'];
                $webps            = $datas['webps'];
                $webps_thumb      = $datas['webps_thumb'];
            }

            $data_post['image']             = $image ? $image : '';
            $data_post['thumb']             = $thumb ? $thumb : '';
            $data_post['webps']             = $webps ? $webps : '';
            $data_post['webps_thumb']       = $webps_thumb ? $webps_thumb : '';
            $data_post['sort']              = $sort_max['sort'] + 1;
            $data_post['month']             = date("m");
            $data_post['year']              = date("Y");
            $data_post['publish'] ? $publish = 1 : $publish = 0;
            $data_post['publish']           = $publish;
            $data_post['updated_at']        = gmdate('Y-m-d H:i:s', time() + 7 * 3600);

            $result                         = $this->IdeaModel->edit($data_post, array('id' => $id));
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
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $id            = $_POST['id'];
        $datas         = $this->IdeaModel->where_in(array('id' => $id));

        $filename      = $this->path_dir . $datas['image'];
        $filenamethumb = $this->path_dir . $datas['thumb'];

        $web_image = explode('.', $datas['image']);
        $web_thumb = explode('.', $datas['thumb']);

        // images
        $MonthFolder = glob($this->path_dir . $datas['year'] . '*' . '/' . $datas['month'] . '/*');

        if ($datas != NULL) {
            try {
                if (file_exists($filename)) unlink($filename);
                if (file_exists($filenamethumb)) unlink($filenamethumb);
            } catch (\Throwable $th) {
                var_dump($th);
            }
            $result = $this->IdeaModel->deleteWhere(array('id' => $id));
        }
    }

    function deleteAll()
    {
        //check login
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $list_id = $this->request->getPost('list_id');
        $list_id_delete = explode(',', $list_id);

        foreach ($list_id_delete as $key => $val) {
            $datas         = $this->IdeaModel->where_in(array('id' => $val));
            $filename      = $this->path_dir . $datas['image'];
            $filenamethumb = $this->path_dir . $datas['thumb'];

            $web_image = explode('.', $datas['image']);
            $web_thumb = explode('.', $datas['thumb']);
            // webp
            $fileNamewebp =  $this->path_dir_webp . $web_image[0] . '.webp';
            $fileNamewebp_thumb =  $this->path_dir_webp . $web_thumb[0] . '.webp';

            if ($datas != NULL) {
                try {
                    if (file_exists($filename)) {
                        unlink($filename);
                    }
                    if ($filenamethumb) {
                        unlink($filenamethumb);
                    }
                    if (file_exists($fileNamewebp)) {
                        unlink($fileNamewebp);
                    }
                    if (file_exists($fileNamewebp_thumb)) {
                        unlink($fileNamewebp_thumb);
                    }
                } catch (\Throwable $th) {
                    var_dump($th);
                }
            }
            $result = $this->IdeaModel->deleteWhere(array('id' => $val));
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
        $result                  = $this->IdeaModel->edit($dataUpdate, array('id' => $id));

        if ($result) echo json_encode($result);
    }

    public function sort()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $id                  = $_POST['id'];
        $sort                = $_POST['sort'];
        $data_update['sort'] = $sort;
        $result              = $this->IdeaModel->edit($data_update, array('id' => $id));
        if ($result > 0) echo json_encode(array('rs' => 1));
    }

    function del_image()
    {
        $this->checkPermission();
        $id = $this->request->getPost('id');
        $datas = $this->IdeaModel->where_in(array('id' => $id));

        $fileName = $this->path_dir . $datas['image'];
        $fileNameThumb = $this->path_dir . $datas['thumb'];

        $webImages = explode(".", $datas['image']);
        $webImagesThumb = explode(".", $datas['thumb']);

        if ($datas != NULL) {
            if ($datas['image']) {
                try {
                    if (file_exists($fileName)) {
                        unlink($fileName);
                    }
                } catch (\Throwable $th) {
                    var_dump($th);
                }
            }

            if ($datas['thumb']) {
                try {
                    if (file_exists($fileNameThumb)) {
                        unlink($fileNameThumb);
                    }
                } catch (\Throwable $th) {
                    var_dump($th);
                }
            }
            $data_update = array(
                'image'          => "",
                'thumb'          => "",
            );
            $result = $this->IdeaModel->edit($data_update, array('id' => $id));
            if ($result) {
                echo json_encode(array(
                    'result' => "success",
                    "message"    => "Xóa hình thành công"
                ));
            }
        }
    }
}
