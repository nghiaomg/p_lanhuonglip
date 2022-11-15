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
			<!-- <ul class="nav nav-tabs" id="myTab">
				<li class="nav-item">
					<a href="#list" data-toggle="tab" aria-expanded="false" class="nav-link active">
						<span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
						<span class="d-none d-sm-block">Danh sách</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#config" data-toggle="tab" aria-expanded="true" class="nav-link">
						<span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
						<span class="d-none d-sm-block">Cấu hình</span>
					</a>
				</li>
			</ul> -->
			<div class="notify-alert">
				<?php if (session()->getFlashdata('success')) { ?>
					<p class="alert alert-success"><i class="icon-check"></i> <?= session()->getFlashdata('success') ?></p>
				<?php } ?>
				<?php if (session()->getFlashdata('error')) { ?>
					<p class="alert alert-danger"><i class="icon-close"></i> <?= session()->getFlashdata('error') ?></p>
				<?php } ?>
			</div>
			<!-- box thông báo END -->
			<div class="tab-content">
				<div class="tab-pane active" id="list">
					<table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead class="thead-light">
							<tr>
								<th class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
								<th>Tiêu đề</th>
								<th class="text-center nosort">Hiển thị</th>
								<th class="text-center nosort" width="80px">Sắp xếp</th>
								<th class="text-center">Ngày tạo</th>
								<th class="text-center nosort">Chức năng</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($datas) && $datas != null) { ?>
								<?php foreach ($datas as $key => $val) { ?>
									<tr class="tr<?= $val['id'] ?>">
										<td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
										<td><?= $val['name'] ?></td>
										<td class="text-center">
											<input type="checkbox" onclick="changeglobal(<?= $val['id'] ?>,'publish')" <?= $val['publish'] == 1 ? 'checked' : '' ?> id="publish<?= $val['id'] ?>" class="" data-control="<?= $control ?>">
										</td>
										<td class="text-center">
											<input type="text" onkeyup="changeSort(this,<?= $val['id'] ?>)" value="<?= $val['sort'] ?>" class="form-control text-center publish" id="sort<?= $val['id'] ?>" class="" data-control="<?= $control ?>">
										</td>
										<td class="text-center"><?= date('d/m/Y', strtotime($val['created_at'])) ?></td>
										<td class="text-center">
											<a href="<?= base_url(CPANEL . $control . '/edit') . '/' . $val['id'] ?>" class="btn btn-info btn-sm"><i class="icon-note"></i></a>
											<a href="javascript:void(0)" onclick="del(<?= $val['id'] ?>)" class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control="<?= $control ?>"><i class="icon-trash"></i></a>
										</td>
									</tr>
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="tab-pane" id="config">
					<form action="" method="post">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="">Tiêu đề</label>
									<input type="text" class="form-control" name="data_post[name]" value="<?= isset($config)?$config['name']:'' ?>">
								</div>
								<!-- <div class="form-group">
									<label for="">Mô tả</label>
									<textarea name="data_post[des]" id="" cols="30" rows="3" class="form-control"><?= isset($config)?$config['des']:'' ?></textarea>
								</div> -->
							</div>
							<div class="col-12">
								<div class="form-group">
									<button class="btn btn-primary">Cập nhật</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script language="JavaScript">
	$(document).ready(function(){
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			localStorage.setItem('activeTab', $(e.target).attr('href'));
		});
		var activeTab = localStorage.getItem('activeTab');
		if (activeTab) {
			$('#myTab a[href="' + activeTab + '"]').tab('show');
		}
	});
	function toggle(source) {
		checkboxes = document.getElementsByName('foo');
		for (var i = 0, n = checkboxes.length; i < n; i++) {
			checkboxes[i].checked = source.checked;
		}
	}
</script>