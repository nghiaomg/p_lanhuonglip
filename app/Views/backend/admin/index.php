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
		<div class="card-box">
			<div class="form-group">
				<a href="<?= CPANEL . $control . '/add' ?>" class="btn btn-info">Thêm mới</a>
				<a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger">Xóa tất cả</a>
				<a href="<?= CPANEL . $control . "/index" ?>" class="btn btn-info"><i class=" fas fa-undo"></i></a>
			</div>
			<hr />
			<?php if (session()->getFlashdata('success')) { ?>
				<p class="alert alert-success"><?= session()->getFlashdata('success') ?></p>
			<?php } ?>
			<?php if (session()->getFlashdata('error')) { ?>
				<p class="alert alert-danger"><?= session()->getFlashdata('error') ?></p>
			<?php } ?>
			<table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				<thead class="thead-light">
					<tr>
						<th class="nosort text-center"><input type="checkbox" onClick="toggle(this)"></th>
						<th>Họ tên</th>
						<th class="text-center">Ảnh đại diện</th>
						<th class="nosort">Tên tài khoản</th>
						<th class="nosort text-center">Active</th>
						<th class="text-center">Ngày tạo</th>
						<th class="nosort text-center">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($datas) && $datas != null) { ?>
						<?php foreach ($datas as $key => $val) { ?>
							<tr class="tr<?= $val['id'] ?>">
								<td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
								<td><?= $val['fullname'] ?></td>
								<td class="nosort">
									<div class="lazy" style="background-image:url(<?= $path_dir_thumb . $val['thumb'] ?>)"></div>
								</td>
								<td><?= $val['username'] ?></td>
								<td class="text-center"><input type="checkbox" onclick="changeglobal(<?= $val['id'] ?>,'active')" <?= $val['active'] == 1 ? 'checked' : '' ?> id="active<?= $val['id'] ?>" data-control="<?= $control ?>"></td>
								<td class="text-center"><?= date('d/m/Y', strtotime($val['created_at'])) ?></td>
								<td class="text-center">
									<a href="javascript:void(0)" onclick="del(<?= $val['id'] ?>)" class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control="<?= $control ?>"><i class="icon-trash"></i></a>
									<a href="javascript:void(0)" class="btn btn-sm btn-info" onclick="change_pass(this,'<?= $val['id'] ?>')" data-toggle="modal" data-target=".change_pass" data-placement="top" title="Đổi mật khẩu"> <i class="fa fa-eye"></i> </a>
									<a href="<?= base_url(CPANEL . $control . '/edit') . '/' . $val['id'] ?>" class="btn btn-info btn-sm"><i class="icon-note"></i></a>
								</td>
							</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade change_pass" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" id="modal">

	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script language="JavaScript">
	function toggle(source) {
		checkboxes = document.getElementsByName('foo');
		for (var i = 0, n = checkboxes.length; i < n; i++) {
			checkboxes[i].checked = source.checked;
		}
	}

	function change_pass(_this, id) {
		$.ajax({
			url: "cpanel/admin/view_change",
			method: "post",
			data: {
				id: id
			},
			success: function(data) {
				if (isJsonString(data)) {
					const extraJson = JSON.parse(data);
					if (extraJson.type === "error") {
						Swal.fire({
							icon: 'error',
							title: "Bạn không có quyền truy cập chức năng này?",
							type: "error",
						});
					}
				} else {
					$("#modal").html(data)
				}
			}
		});
	}
</script>