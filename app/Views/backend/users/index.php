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
				<a href="<?= CPANEL . $control . '/add' ?>" class="btn btn-info"><i class="icon-plus"></i> Thêm mới</a>
				<a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger"><i class="icon-trash"></i> Xóa tất cả</a>
				<a href="<?= CPANEL . $control . '/export' ?>" class="btn btn-success"><i class="icon-cloud-download"></i> Export Excell</a>
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
						<th>Email</th>
						<th>Số điện thoại</th>
						<th class="nosort text-center">Active</th>
						<th class="text-center">Ngày đăng ký</th>
						<th class="nosort text-center">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($datas) && $datas != null) { ?>
						<?php foreach ($datas as $key => $val) { ?>
							<tr class="tr<?= $val['id'] ?>">
								<td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
								<td>
									<?= $val['fullname'] ?><br />
									<strong>ID:</strong> #<?= $val['code'] ?>
								</td>
								<td class="nosort"><?= $val['email'] ?><p><strong class="text-dark">Mật khẩu: </strong><?= $val['text_password'] ?></p>
								</td>
								<td class="nosort"><?= $val['phone'] ?></td>
								<td class="text-center"><input type="checkbox" onclick="changeglobal(<?= $val['id'] ?>,'active')" <?= $val['active'] == 1 ? 'checked' : '' ?> id="active<?= $val['id'] ?>" data-control="<?= $control ?>"></td>
								<td class="text-center"><?= date('d/m/Y', strtotime($val['created_at'])) ?></td>
								<td class="text-center">
									<a href="javascript:void(0)" onclick="del(<?= $val['id'] ?>)" class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control="<?= $control ?>"><i class="icon-trash"></i></a>
									<!-- <a href="<?php // base_url(CPANEL.$control.'/edit').'/'.$val['id'] 
													?>" class="btn btn-info btn-sm"><i class="icon-note"></i></a> -->
								</td>
							</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
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