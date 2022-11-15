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
			<form action="" class="parsley-examples" onsubmit="return checkform()" method="post" novalidate enctype="multipart/form-data">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="fullname">Nhóm quyền<span class="text-danger">*</span></label>
							<select name="data_post[id_role]" id="" class="form-control">
								<option value="0">Chọn nhóm quyền</option>
								<?php if (isset($role) && $role != NULL) { ?>
									<?php foreach ($role as $key => $val) { ?>
										<option value="<?= $val['id'] ?>"><?= $val['name'] ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="fullname">Họ và tên<span class="text-danger">*</span></label>
							<input type="text" name="data_post[fullname]" parsley-trigger="change" required placeholder="Họ và tên" class="form-control" id="fullname">
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại</label>
							<input type="text" name="data_post[phone]" parsley-trigger="change" placeholder="Số điện thoại" class="form-control" id="phone">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="data_post[email]" parsley-trigger="change" placeholder="Email" class="form-control" id="email">
						</div>
						<div class="form-group">
							<label for="userName">Tài khoản<span class="text-danger">*</span></label>
							<input type="text" name="data_post[username]" onkeyup="checkuser(this,'<?= $control ?>')" parsley-trigger="change" required placeholder="Tài khoản" class="form-control" id="userName">
							<small class="text text-center" id="mess_us"></small>
						</div>
						<div class="form-group">
							<label for="pass1">Mật khẩu<span class="text-danger">*</span></label>
							<input id="pass1" type="password" name="data_post[password]" placeholder="Mật khẩu" required class="form-control">
							<div class="show-hide-pass">
								<i class="far fa-eye-slash" onclick="showHidePass()"></i>
							</div>
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
					<div class="col-6">
						<div class="image_avatar">
							<div class="image_box">
								<img id="preview" src="assets/images/no_img.png" alt="Ảnh đại diện" title='Ảnh đại diện' />
								<div>
									<label for="image">Chọn ảnh đại diện</label>
									<input type="file" onchange="checkfiles(this)" name="image" id="image" data-control="<?= $control ?>" />
								</div>
							</div>
							<p class="text-center text-danger" id="msg"></p>
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
<script>
	$(document).ready(function() {
		$("#image").change(function(event) {
			readURL(this);

		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#image").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					$('#preview').attr('src', e.target.result);
					$('#preview').hide();
					$('#preview').fadeIn(500);
					// $('.custom-file-label').text(filename);             
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
	});
</script>
<script>
	var check;

	function checkfiles(_this) {
		var control = $("#image").attr('data-control');
		if (_this.files && _this.files[0]) {
			var formdata = new FormData();
			formdata.append('image', _this.files[0]);
			$.ajax({
				url: "cpanel/" + control + "/check_files",
				type: "post",
				data: formdata,
				processData: false,
				contentType: false,
				success: function(data) {
					if (data) {
						check = false;
						$("#msg").html("chỉ hổ trợ PNG/JPEG/JPG");
					} else {
						$("#msg").html("");
						check = true;
					}
				}
			});
			$("#msg").html("");
		} else {
			check = false;
			$("#msg").html("Chưa có file");
		}
	}
	var check_us;

	function checkuser(_this, control) {
		var username = $(_this).val();
		if (username != '') {
			$.ajax({
				url: "cpanel/" + control + "/checkUS",
				method: "POST",
				data: {
					username: username
				},
				success: function(data) {
					if (data == "1") {
						check_us = false;
						$("#mess_us").html("Tài khoản đã tồn tại, vui lòng nhập tài khoản khác");
						$("#mess_us").css('color', 'red');
					} else {
						check_us = true;
						$("#mess_us").html("Tài khoản hợp lệ");
						$("#mess_us").css('color', 'green');
					}
				}
			});
		} else {
			$("#mess_us").html("");
		}

	}

	function checkform() {
		if (check == false || check_us == false) {
			return false;
		}
		return true;
	}

	function showHidePass() {
		if ($('#pass1').attr("type") == 'password') {
			$("#pass1").attr("type", "text");
			$('.show-hide-pass').html('<i class="far fa-eye" onclick="showHidePass()"></i>');
		} else if ($('#pass1').attr("type") == 'text') {
			$("#pass1").attr("type", "password");
			$('.show-hide-pass').html('<i class="far fa-eye-slash" onclick="showHidePass()"></i>');
		}
	}
</script>