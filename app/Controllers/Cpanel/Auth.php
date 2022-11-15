<?php

namespace App\Controllers\Cpanel;

use App\Controllers\BaseController;
use App\Models\AdminModels;
use App\Models\CI_auth;

class Auth extends BaseController
{
	public function login()
	{
		$AdminModels = new AdminModels();
		$CI_auth = new CI_auth();
		if (session('logged_in') == true) {
			return redirect()->to(base_url('cpanel/dashboard'));
		}
		if ($this->request->getPost()) {
			$username = $this->request->getPost('username');
			$password_input = $this->request->getPost('password');
			$user = $AdminModels->get_num_rows(array('username' => $username), NULL);
			if ($user > 0) {
				$active =  $AdminModels->get_num_rows(array('username' => $username, 'active' => 1));
				if ($active > 0) {
					$login_array = array($username, $password_input);
					if ($CI_auth->process_login($login_array)) {
						$user = $CI_auth->logged_info();
						return redirect()->to(base_url('cpanel/dashboard'));
					} else {
						return redirect()->to(base_url('cpanel/login.html'))->with('error', 'Mật khẩu không chính xác');
					}
				} else {
					return redirect()->to(base_url('cpanel/login.html'))->with('error', 'Tài khoản chưa được kích hoạt');
				}
			} else {
				return redirect()->to(base_url('cpanel/login.html'))->with('error', 'Tài khoản không tồn tại');
			}
		}
		return view('backend/auth/login');
	}

	function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('cpanel/login.html'));
	}
}
