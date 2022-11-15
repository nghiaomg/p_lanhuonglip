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
							<label for="name">Tên ngành nghề<span class="text-danger">*</span></label>
							<input type="text" name="data_post[name]" value="<?= $datas['name'] != "" ? $datas['name'] : ""; ?>" parsley-trigger="change" required placeholder="Nhập tên ngành nghề..." class="form-control" id="name">
							<p id="message"></p>
						</div>
						<div class="form-group">
							<div class="checkbox checkbox-info">
								<input id="publish" type="checkbox" <?= $datas['publish'] != NULL && $datas['publish'] == 1 ? "checked" : ""; ?> value="1" name="data_post[publish]">
								<label for="publish">Hiển thị</label>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group text-center mb-0">
					<button class="btn btn-primary waves-effect waves-light mr-1" type="submit"> Lưu </button>
					<button type="reset" class="btn btn-secondary waves-effect waves-light mr-1"> Làm lại </button>
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