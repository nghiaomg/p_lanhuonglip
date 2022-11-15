<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo site_url(); ?>">
	<title>Đăng nhập hệ thống</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/cpanel/customs/login.css')?>">
	<!-- App favicon -->
    <link rel="shortcut icon" href="assets/cpanel/images/favicon.ico">
</head>
<body>
	<div class="login_container">
		<div class="body">
			<div class="box">
				<form action="cpanel/login.html" method="POST">
					<div class="title">Đăng nhập hệ thống</div>
					<div class="clear"></div>
					<div class="item">
						<label>Tài khoản</label>
						<input type="text" name="username"/>
					</div>
					<div class="item">
						<label>Mật khẩu</label>
						<input type="password" name="password" />
					</div>
					<p class="text-danger"><?php if(session()->getFlashdata('error')){echo session()->getFlashdata('error');} ?></p>
					<div class="item">
						<button type="submit">Đăng nhập</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>