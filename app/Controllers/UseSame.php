<?php 
namespace App\Controllers;

class UseSame extends BaseController
{
	public function __construct()
	{
	
	}
    public function validate_upload()
    {
        $alert               = "";
        $inputFileName       = $_POST['inputFileName'];
        $allowExtensionEXT   = $_POST['ext'];
        $allowExtensionMIME  = $_POST['mime'];
        $alertExtension      = $_POST['alertExtension'];
        $alertMaxsize        = $_POST['alertMaxsize'];
        $maxSize             = $_POST['maxSize'];
		$finfo               = new \finfo(FILEINFO_MIME_TYPE);
        $detectSize          = $_FILES[$inputFileName]['size'] / 1048576; // chuyển đổi byte thành mb 
        //  $allowExtension là array key, value
        $arrAllowExt         = [];
        foreach ($allowExtensionEXT as $key => $value) {
            $arrAllowExt =  array_merge($arrAllowExt,[$value => $allowExtensionMIME[$key]]); 
        }
		if (false === array_search($finfo->file($_FILES[$inputFileName]['tmp_name']),$arrAllowExt, true)) {
			$alert           = $alertExtension;
			echo $alert;
			die;
		}
		if ($detectSize > $maxSize) { //10 MB (size is also in bytes)
			$alert           = $alertMaxsize;
			echo $alert;
			die;
		}
    }
}
