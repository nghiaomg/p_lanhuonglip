<!-- third party css -->
<link href="assets/cpanel/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- sweetalert css -->
<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- Jquery Toast css -->
<link href="assets/cpanel/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
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
<!-- end page title -->
<div class="row">
	<div class="col-lg-12">
		<div class="card-box clearfix">
			<!-- li tab -->
			<ul class="nav nav-tabs" id="myTab">
				<li class="nav-item">
					<a href="#list" data-toggle="tab" aria-expanded="false" class="nav-link active">
						<span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
						<span class="d-none d-sm-block">Danh sách thành phần</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#config" data-toggle="tab" aria-expanded="true" class="nav-link">
						<span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
						<span class="d-none d-sm-block">Cấu hình nội dung</span>
					</a>
				</li>
			</ul>
			<!--end li tab -->
			<div class="tab-content">
				<!--tab home -->
				<div class="tab-pane active" id="list">
					<div class="form-group">
						<a href="<?= CPANEL . $control . '/add' ?>/<?=$productID?>" class="btn btn-info"><i class="icon-plus"></i>Thêm mới</a>
						<a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa tất cả</a>
						<a href="<?= CPANEL . $control . "/index" ?>" class="btn btn-info"><i class="icon-refresh"></i></a>
					</div>
					
					<table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead class="thead-light">
							<tr>
								<th class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
								<th>Tiêu đề</th>
								<th>Hình ảnh</th>
								<th class="text-center">Sắp xếp</th>
								<th class="text-center nosort">Hiển thị</th>
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
										<td><img src="<?= file_exists($path_dir_thumb . $val['thumb']) ? $path_dir_thumb . $val['thumb'] : 'assets/images/no_img.png' ?>" width="100" alt=""></td>
										<td class="text-center">
											<input type="text" onkeyup="changeSort(this,<?= $val['id'] ?>)" value="<?= $val['sort'] ?>" class="text-center form-control publish" id="sort<?= $val['id'] ?>" class="" data-control="<?= $control ?>">
										</td>
										<td class="text-center">
											<input type="checkbox" onclick="changeglobal(<?= $val['id'] ?>,'publish')" <?= $val['publish'] == 1 ? 'checked' : '' ?> id="publish<?= $val['id'] ?>" class="" data-control="<?= $control ?>">
										</td>
										<td class="text-center"><?= date('d/m/Y', strtotime($val['created_at'])) ?></td>
										<td class="text-center">
											<a href="javascript:void(0)" onclick="del(<?= $val['id'] ?>)" class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control="<?= $control ?>"><i class="icon-trash"></i></a>
											<a href="<?= base_url(CPANEL . $control . '/edit') . '/' . $val['id'] ?>" class="btn btn-info btn-sm"><i class="icon-note"></i></a>
										</td>
									</tr>
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="tab-pane show" id="config">
				<form action="" method="post">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="">Tiêu đề</label>
									<input type="text" value="<?= $ingredientContent ? $ingredientContent['title'] : '' ?>" class="form-control" placeholder="Tên công ty" name="data_post[title]">
								</div>
								<div class="form-group">
									<label for="">Tiêu đề (2)</label>
									<input type="text" value="<?= isset($ingredientContent['title2'])? $ingredientContent['title2'] : '' ?>" class="form-control" placeholder="Địa chỉ" name="data_post[title2]">
								</div> 
							</div>
							<div class="col-6"></div>
							<div class="col-12">
								<div class="form-group">
									<label for="">Nội dung</label>
									<textarea name="data_post[content]" id="" class="form-control ckeditor" cols="30" rows="5"><?= $ingredientContent ? $ingredientContent['content'] : '' ?></textarea>
								</div>
							</div>
							<div class="col-12 text-center">
								<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
									<i class="icon-cloud-upload font-15"></i> Cập nhật
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


	
<script language="JavaScript">
	$(document).ready(function() {
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