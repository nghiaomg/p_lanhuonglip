<?php

namespace App\Controllers;

use App\Models\CI_function;
use App\Models\ProductcolorModels;
use App\Models\PhotoProductModels;
use App\Controllers\BaseController; 

class Ajax extends BaseController
{
	private $template 			  = 'frontend/ajax/';

	public function __construct()
	{
		$this->CI_function  = new CI_function();
		$this->ProductcolorModels  = new ProductcolorModels();
		$this->PhotoProductModels  = new PhotoProductModels();
	}

	public function loadPhotoProduct()
	{
		$id = $_POST['id'];
		$key = $_POST['key'];
		$colorRow = $this->ProductcolorModels->findOne('id, name, des, thumb'.$key.'', ['id' => $id]);
		if($colorRow != NULL) {
			echo json_encode(['rs' => 1, 'path_img' => 'uploads/images/productcolor/'.$colorRow['thumb'.$key.''], 'name' => $colorRow['name'], 'des' => $colorRow['des']]);
		}else{
			echo json_encode(['rs' => 0]);
		}
	}
	public function loadPhotoProductMobile()
	{
		$id = $_POST['id'];
		$productID = $_POST['productID'];
		$colorRow = $this->ProductcolorModels->findOne('*', ['id' => $id]);
		// get photos
        $photoProducts = $this->PhotoProductModels->select_array('id, thumb',['ProductID' => $productID],'id asc');
		//
		$data['colorRow'] = $colorRow;
		$data['photoProducts'] = $photoProducts;
		//
        $data['path_dir_color'] = 'uploads/images/productcolor/';
        $data['path_dir_product'] = 'uploads/images/product/';
		return view('frontend/ajax/loadPhotoProductMobile', isset($data) ? $data : NULL);
	}
}
