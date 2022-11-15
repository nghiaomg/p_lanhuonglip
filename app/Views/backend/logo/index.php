<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<!-- start page title -->
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
	<?php if (session('msg')) : ?>
		<div class="notify-alert alert alert-success alert-dismissible">
			<?= session('msg') ?>
			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
		</div>
	<?php endif ?>
	<?php if (session()->getFlashdata('success')) { ?>
		<p class="notify-alert alert alert-success"><i class="icon-check"></i> <?= session()->getFlashdata('success') ?></p>
	<?php } ?>
	<?php if (session()->getFlashdata('error')) { ?>
		<p class="notify-alert alert alert-danger"><?= session()->getFlashdata('error') ?></p>
	<?php } ?>
	<div class="col-lg-12">
		<div class="card-box">
			<form action="" class="parsley-examples" method="post" novalidate enctype='multipart/form-data'>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="userName">Title<span class="text-danger">*</span></label>
							<input type="text" name="data_post[name]" parsley-trigger="change" required placeholder="Tiêu đề" class="form-control" id="name" value="<?= $datas ? $datas['name'] : '' ?>">
						</div>
						<div class="form-group">
							<label for="userName">Link<span class="text-danger">*</span></label>
							<input type="text" name="data_post[link]" parsley-trigger="change" required placeholder="Link" class="form-control" id="name" value="<?= $datas ? $datas['link'] : '' ?>">
						</div>
						<div class="clear height20"></div>
						<div class="form-group">
							<div class="checkbox checkbox-purple">
								<input id="checkbox6a" type="checkbox" value="1" <?= $datas['publish'] == 1 ? 'checked' : '' ?> name="data_post[publish]">
								<label for="checkbox6a">Hiển thị</label>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="logo_image">
							<label for="userName">Logo (Kích thước chuẩn: 500 x 100px)<span class="text-danger">*</span></label>
							<div class="image_box">
								<a href="javascript:void(0)" class="btn btn-danger" onclick="del_image(<?= $datas['id'] ?>,'<?= $control ?>')">Xóa ảnh</a>
								<img id="preview" src="<?= $datas['thumb'] ? base_url() . '/' . $path_dir_thumb . $datas['thumb'] : 'assets/images/no_img.png' ?>" alt="Ảnh đại diện" title='' />
							</div>
							<div>
								<label for="image">Chọn logo</label>
								<input type="file" name="image" id="image" />
							</div>
						</div>
					</div>
				</div>
				<div class="clear height20"></div>
				<div class="form-group text-right mb-0 col-lg-6">
					<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
						Cập nhật
					</button>
					<a href="<?= CPANEL . $control ?>" class="btn btn-info">Hủy</a>
				</div>
			</form>
		</div> <!-- end card-box -->
	</div>
	<!-- end col -->
</div>
<script>
	$(document).ready(function() {
		// Basic
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
			} else {
				$('#preview').attr('src', "assets/images/no_img.png");
			}

		}
	});
</script>