<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\QuoteModels;
use App\Models\CI_function;
use App\Models\CI_auth;
use App\Models\Upload;
use App\Models\AliasModels;
use App\Models\SystemModels;
use App\Models\PhotoModels;

class Quote extends BaseController
{
    private $title          = 'báo giá';
    private $template       = 'backend/quote/';
    public $control         = 'quote';
    public $path_url        = 'cpanel/quote/';
    public $path_dir        = 'uploads/images/quote/';
    public $path_dir_thumb  = 'uploads/images/quote/thumb';
    public $path_dir_webp   = 'uploads/webps/quote/';
    public $path_dir_webp_thumb = 'uploads/webps/quote/thumb';
    const TYPE              = "quote";

    function __construct()
    {
        $this->QuoteModels  = new QuoteModels();
        $this->CI_function  = new CI_function();
        $this->CI_auth      = new CI_auth();
        $this->Upload       = new Upload();
        $this->AliasModels  = new AliasModels();
        $this->SystemModels = new SystemModels();
        $this->PhotoModels  = new PhotoModels();
        $this->Upload       = new Upload();
    }

    public function index()
    {
        //Check login
        if (!session('logged_in')) return redirect()->to(base_url('cpanel/login.html'));

        // $this->checkPermission();
        $data_index = $this->get_indexBE();
        $datas      = $this->QuoteModels->select_array('id,name,link,image,thumb,created_at,publish,sort', NULL, 'sort asc,id desc');

        // Config
        $config     = $this->SystemModels->where_in(array('type' => Quote::TYPE));
        $configJs   = json_decode($config['contents'], true);

        // Get photo for config tab
        $photo = $this->PhotoModels->where_in(array('type' => Quote::TYPE));

        $data = array(
            'data_index'        => $data_index,
            'datas'             => $datas,
            'control'           => $this->control,
            'path_url'          => $this->path_url,
            'path_dir_thumb'    => $this->path_dir,
            'title'             => 'Quản lý ' . $this->title,
            'template'          => $this->template . 'index',
            'config'            => $configJs,
            'photo'             => $photo,
            'type'              => Quote::TYPE,
        );
        return view('backend/default', isset($data) ? $data : NULL);
    }

    public function add()
    {
        if (!session('logged_in') == true) {
            return redirect()->to(base_url('cpanel/login.html'));
        }
        $this->checkPermission();

        $data_index = $this->get_indexBE();
        $sort_max   = $this->QuoteModels->select_max('sort');

        if ($this->request->getPost()) {
            $data_post  = $this->request->getPost('data_post');
            $alias      = $this->CI_function->create_alias($data_post['name']);

            if ($_FILES['image']['name']) {
                $fileName       = $this->request->getFile('image');
                $path_dir       = $this->path_dir;
                $data_upload    = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 288, 575, null, 'webp');

                if ($data_upload['image'] == "") {
                    return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
                } else {
                    $image             = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
                    $thumb             = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
                    $webps             = $data_upload['webps'];
                    $webps_thumb       = $data_upload['webps_thumb'];
                }
            }
            $data_post['month']             = date("m");
            $data_post['year']              = date("Y");
            $data_post['publish'] ? $publish = 1 : $publish = 0;
            $data_post['publish']           = $publish;
            $data_post['image']             = $image;
            $data_post['thumb']             = $thumb;
            $data_post['webps']             = $webps;
            $data_post['webps_thumb']       = $webps_thumb;
            $data_post['sort']              = $sort_max['sort'] + 1;
            $data_post['created_at']        = gmdate('Y-m-d H:i:s', time() + 7 * 3600);

            $result = $this->QuoteModels->add($data_post);

            if ($result['type'] == "successful") {
                return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', ADD_SUCCESS);
            }
        }
        $data = [
            'data_index'              => $data_index,
            'control'                 => $this->control,
            'path_url'                => $this->path_url,
            'path_dir'                => $this->path_dir,
            'path_dir_thumb'          => $this->path_dir_thumb,
            'title'                   => 'Quản lý ' . $this->title,
            'template'                => $this->template . 'add'
        ];
        return view('backend/default', isset($data) ? $data : NULL);
    }

    function checkglobals()
    {
        //check login
        if (!session('logged_in') == true) {
            return redirect()->to(base_url('cpanel/login.html'));
        }
        // $this->checkPermission();
        $id                         = $this->request->getVar('id');
        $global                     = $this->request->getVar('global');
        $properties                 = $this->request->getVar('properties');
        $dataUpdate[$properties]     = $global;
        $result                     = $this->QuoteModels->edit($dataUpdate, array('id' => $id));
        if ($result) {
            echo json_encode($result);
        }
    }

    function edit($id)
    {
        if (!session('logged_in') == true) {
            return redirect()->to(base_url('cpanel/login.html'));
        }
        $this->checkPermission();
        $data_index    = $this->get_indexBE();
        $datas         = $this->QuoteModels->find_one($id);
        $image         = $this->path_dir . $datas['image'];
        $imagethumb    = $this->path_dir . $datas['thumb'];
        // webp
        $image_webp = explode(".", $datas['image']);
        $thumb_webp = explode(".", $datas['thumb']);
        // 
        $webps_image = $this->path_dir_webp . $image_webp[0] . '.webp';
        $webps_thumb =  $this->path_dir_webp . $thumb_webp[0] . '.webp';

        if ($this->request->getPost()) {
            $data_post = $this->request->getPost('data_post');
            $alias = $this->CI_function->create_alias($data_post['name']);

            if ($_FILES['image']['name']) {
                try {
                    if (file_exists($image)) {
                        if ($datas['image'] != '') {
                            unlink($image);
                        }
                    }
                    if (file_exists($imagethumb)) {
                        if ($datas['thumb'] != '') {
                            unlink($imagethumb);
                        }
                    }
                    if (file_exists($webps_image)) {
                        unlink($webps_image);
                    }
                    if (file_exists($webps_thumb)) {
                        unlink($webps_thumb);
                    }
                } catch (\Throwable $th) {
                    var_dump($th);
                }
                $fileName    = $this->request->getFile('image');
                $path_dir    = $this->path_dir;
                $data_upload = $this->Upload->upload_image($path_dir, $fileName, $alias, 'image', 288, 575, null, 'webp');
                if ($data_upload['image'] == '') {
                    return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('error', $data_upload['message']);
                } else {
                    $image             = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
                    $thumb             = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
                    $webps             = $data_upload['webps'];
                    $webps_thumb       = $data_upload['webps_thumb'];
                }
            } else {
                $image            = $datas['image'];
                $thumb            = $datas['thumb'];
                $webps            = $datas['webps'];
                $webps_thumb      = $datas['webps_thumb'];
            }

            $data_post['month']             = date("m");
            $data_post['year']              = date("Y");
            $data_post['publish'] ? $publish = 1 : $publish = 0;
            $data_post['publish']           = $publish;
            $data_post['image']             = $image;
            $data_post['thumb']             = $thumb;
            $data_post['webps']             = $webps;
            $data_post['webps_thumb']       = $webps_thumb;
            $data_post['updated_at']        = gmdate('Y-m-d H:i:s', time() + 7 * 3600);
            $result = $this->QuoteModels->edit($data_post, array('id' => $id));

            if ($result['type'] == "successful") {
                return redirect()->to(base_url(CPANEL . $this->control . "/index"))->with('success', EDIT_SUCCESS);
            }
        }
        $data = [
            'datas'          => $datas,
            'data_index'     => $data_index,
            'control'        => $this->control,
            'path_url'       => $this->path_url,
            'path_dir_thumb' => $this->path_dir,
            'title'          => 'Quản lý ' . $this->title,
            'template'       => $this->template . 'edit'
        ];
        return view('backend/default', isset($data) ? $data : NULL);
    }

    function delete()
    {
        //Check login
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        // $this->checkPermission();

        $id       = $_POST['id'];
        $datas    = $this->QuoteModels->where_in(array('id' => $id));

        // Image
        $filename      = $this->path_dir . $datas['image'];
        $filenamethumb = $this->path_dir . $datas['thumb'];

        // Month and year folder nested "images" folder
        $YearFolder  = glob($this->path_dir . $datas['year'] . '*');
        $MonthFolder = glob($this->path_dir . $datas['year'] . '*' . '/' . $datas['month'] . '/*');

        // Webp image
        $web_image = explode('.', $datas['image']);
        $web_thumb = explode('.', $datas['thumb']);

        // Path of images in "webps" folder
        $fileNamewebp       =  $this->path_dir_webp . $web_image[0] . '.webp';
        $fileNamewebp_thumb =  $this->path_dir_webp . $web_thumb[0] . '.webp';

        // Month and year folder nested "webps" folder
        $YearFolder_wp  = glob($this->path_dir_webp . $datas['year'] . '*');
        $MonthFolder_wp = glob($this->path_dir_webp . $datas['year'] . '*' . '/' . $datas['month'] . '/*');

        if ($datas != NULL && $datas['image'] != "" && $datas['thumb'] != "") {
            try {
                if (file_exists($filename) && file_exists($filenamethumb)) {
                    unlink($filename);
                    unlink($fileNamewebp);
                    unlink($filenamethumb);
                    unlink($fileNamewebp_thumb);

                    //  folder thumb
                    $thumbFolder = glob($this->path_dir . $datas['year'] . '*' . '/' . $datas['month'] . '/thumb/*');
                    $thumbFolder_delete = $this->path_dir . $datas['year'] . '/' . $datas['month'] . '/thumb';
                    // == folder thumb
                    $thumbFolder_wp = glob($this->path_dir_webp . $datas['year'] . '*' . '/' . $datas['month'] . '/thumb/*');
                    $thumbFolder_webp_delete = $this->path_dir_webp . $datas['year'] . '/' . $datas['month'] . '/thumb';
                    // echo 0;
                    if ($thumbFolder == NULL && $thumbFolder_wp == NULL) {
                        rmdir($thumbFolder_delete);
                        rmdir($thumbFolder_webp_delete);
                    }
                }
            } catch (\Throwable $th) {
                var_dump($th);
            }
            $alias = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
            $result = $this->QuoteModels->deleteWhere(array('id' => $id));
        } else {
            $alias  = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
            $result = $this->QuoteModels->deleteWhere(array('id' => $id));
        }
    }

    function deleteAll()
    {
        //check login
        if (!session('logged_in') == true) {
            return redirect()->to(base_url('cpanel/login.html'));
        }
        $this->checkPermission();
        $list_id            = $this->request->getPost('list_id');
        $list_id_delete     = explode(',', $list_id);

        foreach ($list_id_delete as $key => $val) {
            $datas              = $this->QuoteModels->where_in(array('id' => $val));
            $filename           = $this->path_dir . $datas['image'];
            $filenamethumb      = $this->path_dir . $datas['thumb'];

            $web_image          = explode('.', $datas['image']);
            $web_thumb          = explode('.', $datas['thumb']);

            // webp
            $fileNamewebp       =  $this->path_dir_webp . $web_image[0] . '.webp';
            $fileNamewebp_thumb =  $this->path_dir_webp . $web_thumb[0] . '.webp';

            if ($datas != NULL) {
                try {
                    if (file_exists($filename) && file_exists($filenamethumb)) {
                        unlink($filename);
                        unlink($fileNamewebp);
                        unlink($filenamethumb);
                        unlink($fileNamewebp_thumb);
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }
                $result = $this->QuoteModels->deleteWhere(array('id' => $val));
                $alias  = $this->AliasModels->deleteWhere(array('alias' => $datas['alias']));
                if ($result) {
                    echo json_encode(array("result" => "successfully"));
                }
            }
        }
    }

    public function sort()
    {
        if (!session('logged_in') == true) {
            return redirect()->to(base_url('cpanel/login.html'));
        }
        // $this->checkPermission();

        $id                  = $_POST['id'];
        $sort                  = $_POST['sort'];
        $data_update['sort'] = $sort;
        $result              = $this->QuoteModels->edit($data_update, array('id' => $id));
        if ($result > 0) {
            echo json_encode(array('rs' => 1));
        }
    }

    function del_image()
    {
        // $this->checkPermission();
        $id = $this->request->getPost('id');
        if ($id == Quote::TYPE) {
            $config = $this->SystemModels->where_in(array('type' => Quote::TYPE));
            $datas = json_decode($config['contents'], true);
        } else {
            $datas = $this->QuoteModels->where_in(array('id' => $id));
        }

        $fileName = $this->path_dir . $datas['image'];
        $fileNameThumb = $this->path_dir . $datas['thumb'];
        // explode image
        $webImages = explode(".", $datas['image']);
        $image_webp = $this->path_dir_webp . $webImages[0] . '.webp';
        // echo $image_webp;
        $webImagesThumb = explode(".", $datas['thumb']);
        $image_webp_thumb = $this->path_dir_webp . $webImagesThumb[0] . '.webp';
        if ($datas != NULL) {
            try {
                if ($datas['image']) {
                    if (file_exists($fileName)) {
                        unlink($fileName);
                        unlink($image_webp);
                    }
                }
                if ($datas['thumb']) {
                    if (file_exists($fileNameThumb)) {
                        unlink($fileNameThumb);
                        unlink($image_webp_thumb);
                    }
                }
            } catch (\Throwable $th) {
                throw $th;
            }
            $data_update = array(
                'image'    => "",
                'thumb'    => "",
            );
            $result = array();
            if ($id == Quote::TYPE) {
                $data_update["title"]         = trim($datas['title']);
                $data_update["description"]   = trim($datas['description']);
                $data_update['webps']       = "";
                $data_update['webps_thumb'] = "";
                $data_update['month']       = $datas['month'];
                $data_update['year']        = $datas['year'];
                $config                     = json_encode($data_update);
                $data_edit["contents"]    = $config;
                $result = $this->SystemModels->edit($data_edit, array('type' => Quote::TYPE));
            } else {
                $result = $this->QuoteModels->edit($data_update, array('id' => $id));
            }

            if ($result) {
                echo json_encode(array(
                    'result' => "success",
                    "message" => "Xóa hình thành công"
                ));
            }
        }
    }

    public function config()
    {
        # Check login
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        if ($this->request->getPost()) {
            if ($this->checkPermission() != "") {
                return $this->checkPermission();
            } else {
                $data_post = $this->request->getPost('data_post');

                // Get detail Config
                $config     = $this->SystemModels->where_in(array('type' => Quote::TYPE));
                $configJs   = json_decode($config['contents'], true);

                $image = "";
                $thumb = "";
                $webps = "";
                $webps_thumb = "";
                if ($_FILES['image']['name']) {
                    $fileName = $this->request->getFile('image');
                    $files = $this->path_dir . $configJs['image'];
                    $files_thumb = $this->path_dir_thumb . $configJs['thumb'];

                    try {
                        if (file_exists($files)) {
                            if ($configJs['image'] != '') {
                                unlink($files);
                            }
                        }
                        if (file_exists($files_thumb)) {
                            if ($configJs['thumb'] != '') {
                                unlink($files_thumb);
                            }
                        }
                    } catch (\Throwable $th) {
                        throw $th;
                    }

                    $data_upload = $this->Upload->upload_image($this->path_dir, $fileName, $_FILES['image']['name'], 'image', 226, 80, null, 'webp');
                    if ($data_upload['image'] == NULL) {
                        return redirect()->to(base_url(CPANEL . '/quote/index'))->with('error', $data_upload['message']);
                    } else {
                        $image =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
                        $thumb =  date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
                        $webps = $data_upload['webps'];
                        $webps_thumb = $data_upload['webps_thumb'];
                    }
                } else {
                    $image = $configJs['image'];
                    $thumb = $configJs['thumb'];
                    $webps = $configJs['webps'];
                    $webps_thumb = $configJs['webps_thumb'];
                }

                $data_post['image']         = $image;
                $data_post['thumb']         = $thumb;
                $data_post['webps']         = $webps;
                $data_post['webps_thumb']   = $webps_thumb;
                $data_post['month']         = date("m");
                $data_post['year']          = date("Y");
                $data_post["description"]   = trim($data_post['description']);
                $config                     = json_encode($data_post);
                $data_update["contents"]    = $config;
                $result                     = $this->SystemModels->edit($data_update, array('type' => Quote::TYPE));
                if ($result['type'] == "successful") {
                    return redirect()->to(base_url(CPANEL . '/quote/index'))->with('success', EDIT_SUCCESS);
                }
            }
        }
    }
}
