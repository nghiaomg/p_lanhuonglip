<!-- start page title -->
<link rel="stylesheet" href="assets/cpanel/customs/adduser.css">
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Quản trị</a></li>
					<li class="breadcrumb-item active"><?= $title ?></li>
				</ol>
			</div>
			<h4 class="page-title"><?= $title ?></h4>
		</div>
	</div>
</div>
<!-- end page title -->
<div class="row">
	<div class="col-lg-12">
		<?php if (session()->getFlashdata('error')) { ?>
			<p class="alert alert-danger"><?= session()->getFlashdata('error') ?></p>
		<?php } ?>
		<div class="card-box">
			<form action="" class="parsley-examples" method="post" novalidate enctype="multipart/form-data">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="fullname">Họ và tên<span class="text-danger">*</span></label>
							<input type="text" name="data_post[fullname]" parsley-trigger="change" required placeholder="Họ và tên" class="form-control" id="fullname">
							<p id="message"></p>
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại<span class="text-danger">*</span></label>
							<input type="text" name="data_post[phone]" parsley-trigger="change" required placeholder="Số điện thoại" class="form-control" id="phone">
							<p id="message"></p>
						</div>
						<div class="form-group">
							<label for="email">Email<span class="text-danger">*</span></label>
							<input type="text" name="data_post[email]" parsley-trigger="change" required placeholder="Email" class="form-control" id="email">
							<p id="message"></p>
						</div>
						<div class="form-group position-relative">
							<label for="exampleInputPassword1">Mật khẩu</label>
							<input type="password" class="form-control" name="data_post[password]" id="password-new" placeholder="Nhập mật khẩu hiện mới" required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu hiện mới!')" oninput="this.setCustomValidity('')">
							<a onclick="showHidePass()" class="position-absolute show-hide-pass text-dark" href="javascript:void(0)"><i class="far fa-eye-slash"></i></a>
						</div>
						<div class="form-group">
							<div class="checkbox checkbox-info">
								<input id="active" type="checkbox" checked value="1" name="data_post[active]">
								<label for="active">
									Kích hoạt
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group text-center mb-0">
					<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
						Lưu
					</button>
					<button type="reset" class="btn btn-secondary waves-effect waves-light mr-1">
						Làm lại
					</button>
					<a href="<?= CPANEL . $control ?>" class="btn btn-info">Trở về</a>
				</div>
			</form>
		</div> <!-- end card-box -->
	</div>
	<!-- end col -->
</div>
<!-- Plugin js-->
<script src="assets/cpanel/libs/parsleyjs/parsley.min.js"></script>
<script src="assets/cpanel/js/pages/form-validation.init.js"></script>
<script type="text/javascript">
	function showHidePass() {
		if ($('#password-new').attr("type") == 'password') {
			$("#password-new").attr("type", "text");
			$('.show-hide-pass').html('<i class="far fa-eye"></i>');
		} else {
			$("#password-new").attr("type", "password");
			$('.show-hide-pass').html('<i class="far fa-eye-slash"></i>');
		}
	}
</script>