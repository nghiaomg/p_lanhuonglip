<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\ContentsModels;
use App\Models\Upload;

class Banner2 extends BaseController
{
    private $title         = 'banner';
    private $template      = 'backend/banner2/';
    public $path_url       = 'cpanel/banner2/';
    public $path_dir       = 'uploads/images/banner2/';
    public $control        = 'banner2';
    const KEY              = "banner2";

    function __construct()
    {
        $this->ContentsModels = new ContentsModels();
        $this->Upload = new Upload();
    }

    public function index()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $datas             = $this->ContentsModels->where_in(array('key' => Banner2::KEY));

        //Decode Json
        if ($datas != NULL) {
            $extraJsonData = json_decode($datas['content'], true);
        }
        //banner3
        $banner3RowJson = $this->ContentsModels->where_in(array('key' => 'banner3'));
        //Decode Json
        if ($banner3RowJson != NULL) {
            $banner3Row = json_decode($banner3RowJson['content'], true);
        }

        $validation        =  \Config\Services::validation();
        $imageUpload       = '';
        $image_footer      = '';

        if ($this->request->getPost()) {
            $data_post   = $this->request->getPost('data_post');
            $files       = $this->path_dir . $extraJsonData['image'];
            $files_thumb =  $this->path_dir . $extraJsonData['thumb'];
            // Handle for image
            if ($_FILES['image']['name']) {
                if (file_exists($files)) {
                    if ($extraJsonData['image'] != '') unlink($files);
                }

                $fileName              = $this->request->getFile('image');

                // xem kích thước của hình ảnh
                $size                  = getimagesize($fileName);

                $data_upload           = $this->Upload->upload_image($this->path_dir, $fileName, Banner2::KEY, 'image', 1600, 1600, null);
                if ($data_upload['type'] == 'error') {
                    return redirect()->to(base_url(CPANEL . '/banner2/index'))->with('error', $data_upload['message']);
                } else {
                    $image             =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
                    $thumb             =  date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
                }
            } else {
                $image = $extraJsonData['image'];
                $thumb = $extraJsonData['thumb'];
            }

            $data_post['image']             = $image;
            $data_post['thumb']             = $thumb;
            $data_post['month']             = date("m");
            $data_post['year']              = date("Y");

            $data_post['publish'] ? $publish = 1 : $publish = 0;
            $data_post['publish']        = $publish;

            $data_update['content']         = json_encode($data_post);
            $result                         = $this->ContentsModels->edit($data_update, array('key' => Banner2::KEY));
            if ($result) return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
        }

        $data_index = $this->get_indexBE();
        $data = [
            'data_index'            => $data_index,
            'datas'                 => $extraJsonData,
            'key'                   => $datas['id'],
            'validation'            => $this->validator,
            'control'               => $this->control,
            'path_url'              => $this->path_url,
            'path_dir_thumb'        => $this->path_dir,
            'title'                 => 'Quản lý ' . $this->title,
            'template'              => $this->template . 'index',
            'banner3Row'            => $banner3Row,
        ];
        return view('backend/default', isset($data) ? $data : NULL);
    }
    public function banner3()
    {
        if ($this->request->getPost()) {
            //banner3
            $banner3RowJson = $this->ContentsModels->where_in(array('key' => 'banner3'));
            //Decode Json
            if ($banner3RowJson != NULL) {
                $banner3Row = json_decode($banner3RowJson['content'], true);
            }
            $data_post   = $this->request->getPost('data_post');
            $files       = $this->path_dir . $banner3Row['image'];
            $files_thumb =  $this->path_dir . $banner3Row['thumb'];
            // Handle for image
            if ($_FILES['image2']['name']) {
                if (file_exists($files)) {
                    if ($banner3Row['image'] != '') unlink($files);
                }

                $fileName              = $this->request->getFile('image2');

                // xem kích thước của hình ảnh
                $size                  = getimagesize($fileName);

                $data_upload           = $this->Upload->upload_image($this->path_dir, $fileName, 'banner3', 'image', 1600, 1600, null);
                if ($data_upload['type'] == 'error') {
                    return redirect()->to(base_url(CPANEL . '/banner2/index'))->with('error', $data_upload['message']);
                } else {
                    $image             =  date("Y") . '/' . date("m") . '/' . $data_upload['image'];
                    $thumb             =  date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
                }
            } else {
                $image = $banner3Row['image'];
                $thumb = $banner3Row['thumb'];
            }

            $data_post['image']             = $image;
            $data_post['thumb']             = $thumb;
            $data_post['month']             = date("m");
            $data_post['year']              = date("Y");

            $data_post['publish'] ? $publish = 1 : $publish = 0;
            $data_post['publish']        = $publish;

            $data_update['content']         = json_encode($data_post);
            $result                         = $this->ContentsModels->edit($data_update, array('key' => 'banner3'));
            if ($result) return redirect()->to(base_url(CPANEL . $this->control . '/index'))->with('success', EDIT_SUCCESS);
        }
    }

    function del_image()
    {
        $this->checkPermission();
        $id                 = $this->request->getPost('id');
        $key                 = $this->request->getPost('key');
        $datas              = $this->ContentsModels->where_in(array('key' => $key));

        //Decode Json
        $extraJsonData = array();
        if ($datas != NULL) {
            $extraJsonData = json_decode($datas['content'], true);
        }

        $fileName           = $this->path_dir . $extraJsonData['image'];
        $fileNameThumb      = $this->path_dir . $extraJsonData['thumb'];

        if ($extraJsonData != NULL) {
            // Remove file in folder
            if ($extraJsonData['image']) {
                if (file_exists($fileName)) unlink($fileName);
            }
            if ($extraJsonData['thumb']) {
                if (file_exists($fileNameThumb)) unlink($fileNameThumb);
            }

            $extraJsonData["image"] = "";
            $extraJsonData["thumb"] = "";
            $result = $this->ContentsModels->edit(array("content" => json_encode($extraJsonData)), array("id" => $id, "key" => $key));
            if ($result) {
                echo json_encode(array(
                    'result'     => "success",
                    "message"    => "Xóa hình thành công"
                ));
            }
        }
    }
}
