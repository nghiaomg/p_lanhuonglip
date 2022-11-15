<!-- third party css -->
<link href="assets/cpanel/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- sweetalert css -->
<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- Jquery Toast css -->
<link href="assets/cpanel/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<!-- start page title -->
<link href="assets/cpanel/customs/popup.css" rel="stylesheet" type="text/css" />
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
				<a href="javascript:void(0)" onclick="deleteAll2('<?= $control ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa tất cả</a>
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
			<table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				<thead class="thead-light">
					<tr>
						<th class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
						<th>Tên</th>
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
<div class="overlay module"></div>
<div class="popup">
    <div class="body__popup">
        <h3>Tùy chọn</h3>
        <div class="row">
            <div class="col-6 align">
                <label for="parentid_child">Xóa danh mục cha</label>
                <input type="radio" name="parentid" value="1" checked id="parentid_child">
            </div>
            <div class="col-6 align">
                <label for="parentid">Xóa cả danh mục con</label>
                <input type="radio" name="parentid" value="2"  id="parentid">
            </div>
        </div>
        <button class="btn btn-primary" id="destroy">Xóa</button>
        <button class="btn btn-info" id="cancel">Hủy</button>
    </div>
</div>
<script language="JavaScript">
	function toggle(source) {
		checkboxes = document.getElementsByName('foo');
		for (var i = 0, n = checkboxes.length; i < n; i++) {
			checkboxes[i].checked = source.checked;
		}
	}
</script>