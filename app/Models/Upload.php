<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\CI_function;

class Upload extends Model
{
	function __construct()
	{
		$this->CI_function = new CI_function();
	}

	function upload_image($path_dir = NULL, $filename  = NULL, $filename_new = NULL, $fieldname = NULL, $thumb_with = 500, $thumb_height = 100, $max_size = 1024, $image_webp  = NULL)
	{
		$output = "";
		$output_thumb = "";
		$fileNameImage = $filename->getClientName();
		// make folder
		if (!is_dir($path_dir)) {
			mkdir($path_dir);
		}
		// make folder year and month
		$path_dir_y = $path_dir . date('Y');
		if (!is_dir($path_dir_y)) {
			mkdir($path_dir_y);
		}
		$path_dir_m = $path_dir_y . '/' . date('m') . '/';
		if (!is_dir($path_dir_m)) {
			mkdir($path_dir_m);
		}
		// make folder thumb
		$path_dir_thumb = $path_dir_m . 'thumb/';
		if (!is_dir($path_dir_thumb)) {
			mkdir($path_dir_thumb);
		}

		//============= make folder webp========================
		$path_dir_webp = explode('/', $path_dir);

		$path_dir_webps = $path_dir_webp[0] . '/' . 'webps' . '/' . $path_dir_webp[2] . '/';

		if ($path_dir_webp[3]) {
			$path_dir_webps = $path_dir_webp[0] . '/' . 'webps' . '/' . $path_dir_webp[2] . '/' . $path_dir_webp[3] . '/';
		}
		if ($image_webp == "webp") {
			if (!is_dir($path_dir_webps)) {
				mkdir($path_dir_webps);
			}
			// make folder year and month
			$path_dir_webp_y = $path_dir_webps . date('Y');
			if (!is_dir($path_dir_webp_y)) {
				mkdir($path_dir_webp_y);
			}
			$path_dir_webp_m = $path_dir_webp_y . '/' . date('m') . '/';
			if (!is_dir($path_dir_webp_m)) {
				mkdir($path_dir_webp_m);
			}
			// make folder thumb
			$path_dir_webp_thumb = $path_dir_webp_m . 'thumb/';
			if (!is_dir($path_dir_webp_thumb)) {
				mkdir($path_dir_webp_thumb);
			}
		}

		// .jpg , .png, .jpeg
		$thumbImage = "";
		$ext = pathinfo($fileNameImage, PATHINFO_EXTENSION);
		if ($filename_new == '') {
			$str = $this->get_name_image($fileNameImage);
			$str = $this->CI_function->create_alias($str);
			$fileNameImage = $str . '.' . $ext;
		} else {
			$fileNameImage = $filename_new . '.' . $ext;
			$thumbImage   = $filename_new . '.' . $ext;
		}

		$webp = explode('.', $fileNameImage);
		$webpthumb = explode('.', $fileNameImage);
		$output = "";
		$output_thumb = "";
		//set type images allow upload
		if ($filename->getClientMimeType() == "image/png" || $filename->getClientMimeType() == "image/jpeg" || $filename->getClientMimeType() == "image/jpg" || $filename->getClientMimeType() == "image/gif") {
			if ($filename->getSizeByUnit('mb') <= 2) {

				// upload image to folder
				$rs = $filename->move($path_dir_m, $fileNameImage);
				$image = \Config\Services::image()
					->withFile($path_dir_m . $fileNameImage)
					// ->withResource()
					->reorient()
					->resize($thumb_with, $thumb_height, true, 'width')
					->save($path_dir_thumb . $fileNameImage);
				// image thumb
				if ($image_webp == "webp") {
					// image file
					$file = $path_dir_m . $fileNameImage;
					//Create webp image from png file
					if ($webp[1] === 'png' && $webpthumb[1] === "png") {
						# Create webp image 
						$pngimg = imagecreatefrompng($file); 	// get png in path

						// get dimens of image
						$w = imagesx($pngimg);
						$h = imagesy($pngimg);;

						// create a canvas
						$im = imagecreatetruecolor($w, $h);
						imageAlphaBlending($im, false);
						imageSaveAlpha($im, true);

						// By default, the canvas is black, so make it transparent
						$trans = imagecolorallocatealpha($im, 0, 0, 0, 127);
						imagefilledrectangle($im, 0, 0, $w - 1, $h - 1, $trans);

						imagecopy($im, $pngimg, 0, 0, 0, 0, $w, $h); // copy png to canvas
						$output = $path_dir_webp_m . $webp[0] . '.webp';	//webps name
						// imagewebp($im, str_replace('png', 'webp', $file));  // lastly, save canvas as a web

						imagewebp($im, $output);
						imagedestroy($im);
						/* -------- Done webp image------- */


						# Create webp thumb image
						$file_thumb = $path_dir_thumb . $fileNameImage;
						$pngThumbImg = imagecreatefrompng($file); 	// get png in path

						// get dimens of image
						$wThumb = imagesx($pngThumbImg);
						$hThumb = imagesy($pngThumbImg);;

						// create a canvas
						$imThumb = imagecreatetruecolor($wThumb, $hThumb);
						imageAlphaBlending($imThumb, false);
						imageSaveAlpha($imThumb, true);

						// By default, the canvas is black, so make it transparent
						$transThumb = imagecolorallocatealpha($imThumb, 0, 0, 0, 127);
						imagefilledrectangle($imThumb, 0, 0, $wThumb - 1, $hThumb - 1, $transThumb);

						imagecopy($imThumb, $pngThumbImg, 0, 0, 0, 0, $wThumb, $hThumb); // copy png to canvas
						$output_thumb = $path_dir_webp_thumb . $webpthumb[0] . '.webp';		//webps thumb name
						// imagewebp($imThumb, str_replace('png', 'webp', $file_thumb));  // lastly, save canvas as a web

						imagewebp($imThumb, $output_thumb);
						imagedestroy($imThumb); // done
						/* -------- Done webp thumb image------- */

						echo "#png";
					} else {
						echo "#jpg/jpeg";

						$image = imagecreatefromstring(file_get_contents($file));
						ob_start();
						imagejpeg($image, null, 100);
						$const = ob_get_contents();
						ob_end_clean();
						imagedestroy($image);
						$content = imagecreatefromstring($const);
						$output = $path_dir_webp_m . $webp[0] . '.webp';	//webps name
						imagewebp($content, $output);
						imagedestroy($content);

						// image thumb
						$file_thumb = $path_dir_thumb . $fileNameImage;
						$image_thumb = imagecreatefromstring(file_get_contents($file_thumb));
						ob_start();
						imagejpeg($image_thumb, null, 100);
						$const_thumb = ob_get_contents();
						ob_end_clean();
						imagedestroy($image_thumb);
						$content_thumb = imagecreatefromstring($const_thumb);
						$output_thumb = $path_dir_webp_thumb . $webpthumb[0] . '.webp';		//webps thumb name
						imagewebp($content_thumb, $output_thumb);
						imagedestroy($content_thumb);
					}
					// exit("webp here");
				}
			} else {
				return array(
					'type'	  => 'error',
					'message' => 'Dung lượng hình ảnh lớn hơn 2MB'
				);
				exit();
			}
			//pdf upload
		}else {
			return array(
				'type' => 'error',
				'message' => ' Chỉ hỗ trợ file jpg, jpeg, png, gif'
			);
			exit();
		}

		$result = array(
			'type' 			=> 'success',
			'image'			=> $fileNameImage,
			'image_thumb'	=> $thumbImage,
			'webps'			=> $output,
			'webps_thumb'	=> $output_thumb,
		);
		return $result;
	}

	function get_name_image($nameImage)
	{
		$ar_name_image = explode('.', $nameImage);
		$str = "";
		foreach ($ar_name_image as $key => $value) {
			$character = $key > 0 ? "_" : "";
			if ($key < count($ar_name_image) - 1) {
				$str .= $character . $value;
			} else {
				break;
			}
		}
		return $str;
	}

	function upload()
	{
		// if (!session('logged_in') == true) {return redirect()->to(base_url('cpanel/login.html'));}
		$random = rand(10, 1000000);
		if ($_FILES['file']['name']) {
			$fileName       = $this->request->getFile('file');
			$fileNameImage  = 	$fileName->getName();
			$new_fileName 	= explode('.', $fileNameImage);
			$new_fileName 	= $new_fileName[0] . '-' . $random;
			$path_dir = $this->path_dir . 'detail/';
			$size = getimagesize($fileName);
			$data_upload = $this->Upload->upload_image($path_dir, $fileName, $new_fileName, 'image', 300, 300, null, 'webp');

			if ($data_upload['type'] == 'error') {
				return redirect()->to(base_url(CPANEL . '/logo'))->with('error', $data_upload['message']);
			} else {
				$image = date("Y") . '/' . date("m") . '/' . $data_upload['image'];
				$thumb = date("Y") . '/' . date("m") . '/' . 'thumb/' . $data_upload['image_thumb'];
				$webps 			   = $data_upload['webps'];
				$webps_thumb	   = $data_upload['webps_thumb'];
			}
			$data_add = array(
				'image'				=> $image,
				'thumb'				=> $thumb,
				'webps'				=> $webps,
				'webps_thumb'		=> $webps_thumb,
				'month'				=> date('m'),
				'year'				=> date('Y'),
				'uuid'				=> $_POST['uuid'],
				'created_at'		=>	gmdate('Y-m-d H:i:s', time() + 7 * 3600)
			);
			$result = $this->NewslandphotoModels->add($data_add);
			$arrID = array(
				'id'	=> $result['insertID'],
			);
			echo json_encode($arrID);
		}
	}

	public function createWebsPng($file)
	{
	}

	public function uploadPDF(){

	}
}
