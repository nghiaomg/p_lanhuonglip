<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
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
			<ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                    <a href="#banner2" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                        <span class="d-none d-sm-block">Banner</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#banner3" data-toggle="tab" aria-expanded="true" class="nav-link">
                        <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                        <span class="d-none d-sm-block">Banner (2)</span>
                    </a>
                </li>
            </ul>
			<div class="tab-content">
				<div class="tab-pane active" id="banner2">
					<form action="" class="parsley-examples" method="post" novalidate enctype='multipart/form-data'>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="name">Tiêu đề<span class="text-danger">*</span></label>
									<input type="text" name="data_post[name]" parsley-trigger="change" required placeholder="Nhập tên..." class="form-control" id="name" value="<?= $datas ? trim($datas['name']) : '' ?>">
								</div>
								<div class="form-group">
									<label for="text_link">Text link</label>
									<input type="text" name="data_post[text_link]" parsley-trigger="change" required placeholder="Text link" class="form-control" id="text_link" value="<?= isset($datas['text_link']) ? trim($datas['text_link']) : '' ?>">
								</div>
								<div class="form-group">
									<label for="text_link">Liên kết</label>
									<input type="text" name="data_post[link]" parsley-trigger="change" required placeholder="Text link" class="form-control" id="link" value="<?= isset($datas['link']) ? trim($datas['link']) : '' ?>">
								</div>
								
								<div class="clear"></div>
								<div class="form-group">
									<div class="checkbox checkbox-purple">
										<input id="checkbox6a" type="checkbox" value="1" <?= $datas['publish'] == 1 ? 'checked' : '' ?> name="data_post[publish]">
										<label for="checkbox6a">Hiển thị</label>
									</div>
								</div>
								<div class="clear"></div>
								<div class="form-group">
									<label for="">Mô tả</label>
									<textarea name="data_post[des]" id="" class="form-control" cols="30" rows="5"><?= isset($datas['des']) ? trim($datas['des']) : '' ?></textarea>
								</div>
							</div>
							<div class="col-lg-6">
								<label for="name">Background (Kích thước chuẩn: 1600 x 600px)<span class="text-danger">*</span></label>	
								<div class="logo_image">
									<div class="image_box">
										<a href="javascript:void(0)" class="btn btn-danger" onclick="del_image_banner(<?= $key ?>,'<?= $control ?>', 'banner2', 'preview')">Xóa ảnh</a>
										<img id="preview" src="<?= isset($datas['thumb']) ? base_url() . '/' . $path_dir_thumb . $datas['thumb'] : 'assets/images/no_img.png' ?>" alt="Ảnh đại diện" title='' />
									</div>
									<div>
										<label for="image">Chọn ảnh</label>
										<input type="file" name="image" id="image" />
									</div>
								</div>
								<div class="clear height20"></div>
							</div>
						</div>
						<div class="clear height20"></div>
						<div class="form-group text-right mb-0 col-lg-6">
							<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">Cập nhật</button>
							<a href="<?= CPANEL . $control ?>" class="btn btn-info">Hủy</a>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="banner3">
					<form action="<?= CPANEL . $control ?>/banner3" class="parsley-examples" method="post" novalidate enctype='multipart/form-data'>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="name">Tiêu đề<span class="text-danger">*</span></label>
									<input type="text" name="data_post[name]" parsley-trigger="change" required class="form-control" id="name" value="<?= $banner3Row ? trim($banner3Row['name']) : '' ?>">
								</div>
								<div class="form-group">
									<label for="name2">Tiêu đề 2<span class="text-danger">*</span></label>
									<input type="text" name="data_post[name2]" parsley-trigger="change" required class="form-control" id="name2" value="<?= $banner3Row ? trim($banner3Row['name2']) : '' ?>">
								</div>
								<div class="clear"></div>
								<div class="form-group">
									<div class="checkbox checkbox-purple">
										<input id="checkbox5a" type="checkbox" value="1" <?= $banner3Row['publish'] == 1 ? 'checked' : '' ?> name="data_post[publish]">
										<label for="checkbox5a">Hiển thị</label>
									</div>
								</div>
								<div class="clear"></div>
								<div class="form-group">
									<label for="">Mô tả</label>
									<textarea name="data_post[des]" id="" class="form-control" cols="30" rows="5"><?= isset($banner3Row['des']) ? trim($banner3Row['des']) : '' ?></textarea>
								</div>
							</div>
							<div class="col-lg-6">
								<label for="name">Background (Kích thước chuẩn: 1600 x 600px)<span class="text-danger">*</span></label>	
								<div class="logo_image">
									<div class="image_box">
										<a href="javascript:void(0)" class="btn btn-danger" onclick="del_image_banner(<?= $key ?>,'<?= $control ?>', 'banner3', 'preview2')">Xóa ảnh</a>
										<img id="preview2" src="<?= isset($banner3Row['thumb']) ? base_url() . '/' . $path_dir_thumb . $banner3Row['thumb'] : 'assets/images/no_img.png' ?>" alt="Ảnh đại diện" title='' />
									</div>
									<div>
										<label for="image2">Chọn ảnh</label>
										<input type="file" name="image2" id="image2" />
									</div>
								</div>
								<div class="clear height20"></div>
							</div>
						</div>
						<div class="clear height20"></div>
						<div class="form-group text-right mb-0 col-lg-6">
							<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">Cập nhật</button>
							<a href="<?= CPANEL . $control ?>" class="btn btn-info">Hủy</a>
						</div>
					</form>
				</div>
			</div>
		</div> <!-- end card-box -->
	</div>
	<!-- end col -->
</div>
<script>
	$(document).ready(function() {
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			localStorage.setItem('activeTab', $(e.target).attr('href'));
		});
		var activeTab = localStorage.getItem('activeTab');
		if (activeTab) {
			$('#myTab a[href="' + activeTab + '"]').tab('show');
		}
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
		// banner3
		$("#image2").change(function(event) {
			readURL2(this);
		});

		function readURL2(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#image2").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					$('#preview2').attr('src', e.target.result);
					$('#preview2').hide();
					$('#preview2').fadeIn(500);
					// $('.custom-file-label').text(filename);             
				}
				reader.readAsDataURL(input.files[0]);
			} else {
				$('#preview2').attr('src', "assets/images/no_img.png");
			}

		}
	});
</script>