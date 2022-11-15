<!-- third party css -->
<link href="assets/cpanel/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- sweetalert css -->
<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- Jquery Toast css -->
<link href="assets/cpanel/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
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
	<div class="col-lg-12">
		<div class="card-box clearfix">
			<div class="form-group">
				<a href="<?= CPANEL . $control . '/add' ?>" class="btn btn-info"><i class="icon-plus"></i>Thêm mới</a>
				<a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa tất cả</a>
				<a href="<?= CPANEL . $control . "/index" ?>" class="btn btn-info"><i class="icon-refresh"></i></a>
			</div>
			<!-- box thông báo -->
			<div class="notify-alert">
				<?php if (session()->getFlashdata('success')) { ?>
					<p class="alert alert-success"><i class="icon-check"></i> <?= session()->getFlashdata('success') ?></p>
				<?php } ?>
				<?php if (session()->getFlashdata('error')) { ?>
					<p class="alert alert-danger"><i class="icon-close"></i> <?= session()->getFlashdata('error') ?></p>
				<?php } ?>
			</div>
			<!-- box thông báo END -->
			<table id="datatable" class="table table-bordered menu dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				<thead class="thead-light">
					<tr>
						<th class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
						<th>Tên danh mục</th>
						<th class="text-center">Ngày tạo</th>
						<th class="text-center nosort">Sắp xếp</th>
						<th class="text-center nosort">Hiển thị</th>
						<th class="text-center nosort">Hiển thị</th>
						<th class="text-center nosort">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($datas) && $datas != null) { ?>
						<?= $datas; ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="form popup-form">
	<div class="request">
		<form action="" method="post">
			<div class="button">
				<div>
					<input type="radio" checked value="1" name="parentid" id="parent"> <label for="parent">Chỉ xóa danh mục cha</label>
				</div>
				<div>
					<input type="radio" value="2" name="parentid" id="del_al"> <label for="del_al">Xóa tất cả</label>
				</div>
			</div>
			<div class="submit">
				<button type="submit" class="btn btn-danger" id="<?= $control ?>">Xóa</button>
				<button class="btn btn-dark" id="close">Cancel</button>
			</div>
		</form>
	</div>
</div>
<style>
	.popup-form {
		position: fixed;
		top: 0%;
		left: 0%;
		z-index: 999;
		background: rgba(0, 0, 0, 0.2);
		width: 100%;
		height: 100%;
		display: none;
		align-items: center;
		justify-content: center;

	}

	.popup-form .request {
		width: 32rem;
		background: #fff;
		padding: 40px 0 15px;
		border-radius: 5px;
	}

	.popup-form .request .button {
		display: flex;
		justify-content: space-around;
	}

	.popup-form .request .submit {
		text-align: center;
		padding: 30px 0;
	}

	.popup-form .request .submit button {
		padding: 10px 15px;
		border-radius: 5px;
		margin: 0 20px;
		width: 120px;
	}
</style>
<script language="JavaScript">
	function toggle(source) {
		checkboxes = document.getElementsByName('foo');
		for (var i = 0, n = checkboxes.length; i < n; i++) {
			checkboxes[i].checked = source.checked;
		}
	}
	// $("button#close").click(function(e){
	//        e.preventDefault();
	// });
</script>