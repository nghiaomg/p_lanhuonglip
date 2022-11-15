<?php

namespace App\Models;

use App\Models\MyModels;
use App\Models\CI_encrypts;
use App\Models\AdminModels;

class CI_auth extends MyModels
{
	//Login admin
	function __construct()
	{
		$this->MyModels = new MyModels();
		$this->AdminModels = new AdminModels();
		$this->CI_encrypts = new CI_encrypts();
		$this->db  = \Config\Database::connect('default');
	}
	function process_login($login_array_input = NULL)
	{
		$session = session();
		if (!isset($login_array_input) or count($login_array_input) != 2)
			return false;
		$username = $login_array_input[0];
		$password = $login_array_input[1];
		$builder = $this->db->table('tbl_admin');
		$builder->where('username', $username);
		$builder->where('active', 1);
		$query = $builder->get();
		if ($query->getNumRows() > 0) {
			$row = $query->getRow();
			$user_id = $row->id;
			$user_pass = $row->password;
			$user_salt = $row->salt;
			if ($this->CI_encrypts->encryptUserPwd($password, $user_salt) === $user_pass) {
				$ses_data = [
					'id'     	  => $row->id,
					'username'     => $row->username,
					'logged_in'     => TRUE
				];
				$session->set($ses_data);
				return true;
			}
			/* 	if (password_verify($password,$user_pass)) {
				$ses_data = [
								'id'     	  => $row->id,
								'username'     => $row->username,
								'logged_in'     => TRUE
							];
				$session->set($ses_data);
				return true;
			}
 */
			return false;
		}
		return false;
	}

	//Login user
	function signUser($login_array_input = NULL, $arr_gg = NULL)
	{
		if (isset($arr_gg) && $arr_gg != NULL) {
			$email = $arr_gg['email'];
			$result = $this->db->table('tbl_user')->select('*')->where(array('email' => $email))->get()->getRowArray();
			if ($result != NULL) {
				$session_user = session();
				if ($result['active'] == 1) {
					$userdata = [
						'id_user'     	  => $result['id'],
						'logged_user'     => TRUE
					];
					$session_user->set($userdata);
					return 1;
				} else {
					return 2;
				}
			}
		}
		if (!isset($login_array_input) or count($login_array_input) != 2)
			return false;
		$email = $login_array_input[0];
		$password = $login_array_input[1];
		$result = $this->db->table('tbl_user')->select('*')->where(array('email' => $email))->get()->getRowArray();
		if ($result != NULL) {
			$session_user = session();
			$user_id = $result['id'];
			$user_pass = $result['password'];
			$user_salt = $result['salt'];
			if ($this->CI_encrypts->encryptUserPwd($password, $user_salt) === $user_pass) {
				if ($result['active'] == 1) {
					$userdata = [
						'id_user'     	  => $result['id'],
						'logged_user'     => TRUE
					];
					$session_user->set($userdata);
					return 1;
				}
				return 2;
			}
			return 4;
		} else {
			return 3;
		}
		if ($arr_gg != NULL) {
		}
	}

	function userID()
	{
	}
	function checkSignin()
	{
		$session_user = session();
		// echo $session_user->get('id_user');
		return $session_user->get('id_user') ? TRUE : FALSE;
	}
	function logged_info()
	{
		$session = session();
		$AdminModels = new AdminModels();
		$AdminModels->where('id', $session->get('id'));
		$AdminModels->where('username', $session->get('username'));
		$query = $AdminModels->get();
		return $query;
	}
	function infoAdmin()
	{
		$session = session()->get();
		if (count($session) > 0) {
			$idLogged = $session['id'];
			$admin = $this->AdminModels->find_one($idLogged);
			if (count($admin) > 0) {
				return $admin;
			}
		}
	}
}
