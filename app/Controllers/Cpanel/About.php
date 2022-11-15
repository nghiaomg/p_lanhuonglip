<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\Upload;

class About extends BaseController
{
    private $title         = 'giới thiệu';
    private $template      = 'backend/about/';
    public $path_url       = 'cpanel/about/';
    public $path_dir       = 'uploads/images/about/';
    public $control        = 'about';
    const KEY              = "about";

    function __construct()
    {
        $this->AboutModel = new AboutModel();
        $this->Upload = new Upload();
    }

    public function index()
    {
        if (!session('logged_in') == true) return redirect()->to(base_url('cpanel/login.html'));
        $this->checkPermission();

        $datas             = $this->AboutModel->where_in(array('key' => About::KEY));

        //Decode Json
        if ($datas != NULL) {
            $extraJsonData = json_decode($datas['content'], true);
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

                $data_upload           = $this->Upload->upload_image($this->path_dir, $fileName, About::KEY, 'image', 500, 500, null);
                if ($data_upload['type'] == 'error') {
                    return redirect()->to(base_url(CPANEL . '/about/index'))->with('error', $data_upload['message']);
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

            $data_post['show_video'] ? $show_video = 1 : $show_video = 0;
            $data_post['show_video']        = $show_video;

            $data_update['content']         = json_encode($data_post);
            $result                         = $this->AboutModel->edit($data_update, array('key' => About::KEY));
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
            'template'              => $this->template . 'index'
        ];
        return view('backend/default', isset($data) ? $data : NULL);
    }

    function del_image()
    {
        $this->checkPermission();
        $id                 = $this->request->getPost('id');
        $datas              = $this->AboutModel->where_in(array('id' => $id, 'key' => About::KEY));

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
            $result = $this->AboutModel->edit(array("content" => json_encode($extraJsonData)), array("id" => $id, "key" => About::KEY));
            if ($result) {
                echo json_encode(array(
                    'result'     => "success",
                    "message"    => "Xóa hình thành công"
                ));
            }
        }
    }
}
