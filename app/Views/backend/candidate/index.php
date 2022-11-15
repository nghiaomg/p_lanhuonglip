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
						<th class="text-center">Số điện thoại</th>
						<th class="nosort">Email</th>
						<th class="nosort text-center">Năm Sinh</th>
						<th class="text-center">Ngày gửi</th>
						<th class="text-center">CV</th>
						<th class="text-center">Chức Năng</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($datas) && $datas != null) { ?>
						<?php foreach ($datas as $key => $val) { ?>
							<tr class="tr<?= $val['id'] ?>">
								<td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
								<td><?= $val['fullname'] ?></td>
								<td><?= $val['phone'] ?></td>
								<td><?= $val['email'] ?></td>
								<td><?= $val['yearofbirth'] ?></td>
								<td class="text-center"><?= date('d/m/Y', strtotime($val['created_at'])) ?></td>
								<td class="text-center">
									<a href="<?= '/'.$val['cv_path'] ?>" class="btn btn-outline-secondary btn-sm"">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
											<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
											<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
										</svg>
									</a>
								</td>
								<td class="text-center">
									<a 

									href="javascript:void(0)" 
									onclick="del(<?= $val['id'] ?>)" 
									class="btn btn-danger btn-sm" 
									id="delete<?= $val['id'] ?>" 
									data-control="<?= $control ?>">

									<i class="icon-trash"></i></a>
									
									<a href="<?= base_url(CPANEL.$control.'/edit').'/'.$val['id'] ?>" class="btn btn-info btn-sm">
										<i class="icon-note"></i>
									</a>
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


$('#GetFile').on('click', function () {
    $.ajax({
        url: (this).attr('file'),
        method: 'POST',
        xhrFields: {
            responseType: 'blob'0
        },
        success: function (data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.href = url;
            a.download = 'myfile.pdf';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);

			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				timerProgressBar: true,
				didOpen: (toast) => {
					toast.addEventListener('mouseenter', Swal.stopTimer)
					toast.addEventListener('mouseleave', Swal.resumeTimer)
				}
			})

			Toast.fire({
				icon: 'success',
				title: 'Tải Thành Công!'
			})

        }
    });
});

</script>