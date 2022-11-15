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
			<table id="datatable" class="table table-bordered  dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				<thead class="thead-light">
					<tr>
						<th class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
						<th width="280px">Tiêu đề</th>
						<th class="text-center nosort">Danh mục</th>
						<th class="text-center">Hình ảnh</th>
						<th class="text-center">Giá</th>
						<th class="text-center">Ngày tạo</th>
						<th class="text-center nosort">Nổi bật</th>
						<th class="text-center nosort">Hiển thị</th>
						<th class="text-center nosort">Chức năng</th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($datas) && $datas != null) { ?>
						<?php foreach ($datas as $key => $val) { ?>
							<tr class="tr<?= $val['id'] ?>">
								<td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
								<td>
									<?= $val['name'] ?><br/>
									<hr/>
									<a href="<?= base_url(CPANEL . '/productcolor/index') . '/' . $val['id'] ?>" target="_blank" <?=$val['total_color']>0 ? 'class="text-success"':'class="text-danger"'?>>
										Quản lý màu 
										<?=$val['total_color']>0 ? '('.$val['total_color'].')':''?>
									</a>
									<span>|</span>
									<a href="<?= base_url(CPANEL . '/productvideo/index') . '/' . $val['id'] ?>" target="_blank" <?=$val['total_video']>0 ? 'class="text-success"':'class="text-danger"'?>>
										Media 
										<?=$val['total_video']>0 ? '('.$val['total_video'].')':''?>
									</a>
									<span>|</span>
									<a href="<?= base_url(CPANEL . '/productingre/index') . '/' . $val['id'] ?>" target="_blank" <?=$val['total_ingre']>0 ? 'class="text-success"':'class="text-danger"'?>>
										Thành phần 
										<?=$val['total_ingre']>0 ? '('.$val['total_ingre'].')':''?>
									</a>
									<div class="clear mt-2"></div>
									<a href="<?= base_url(CPANEL . '/community/index') . '/' . $val['id'] ?>" target="_blank" <?=$val['total_community']>0 ? 'class="text-success"':'class="text-danger"'?>>
										Community 
										<?=$val['total_community']>0 ? '('.$val['total_community'].')':''?>
									</a>
								</td>
								<td class="text-center"><?= $val['name_cate'] ?></td>
								<td class="text-center"><img src="uploads/images/product/<?=$val['thumb'] ?>" width="60" alt=""></td>
								<td class="text-center">
									<p class="mb-0">Giá bán: <?= number_format($val['price']) ?> VNĐ</p>
									<?php if($val['price_sale'] > 0){ ?>
										<p class="mb-0">Giá KM: <?= number_format($val['price_sale']) ?> VNĐ</p>
									<?php } ?>
								</td>
								<td class="text-center"><?= date('d/m/Y', strtotime($val['created_at'])) ?></td>
								<td class="text-center">
									<input type="checkbox" onclick="changeglobal(<?= $val['id'] ?>,'hot')" <?= $val['hot'] == 1 ? 'checked' : '' ?> id="hot<?= $val['id'] ?>" class="" data-control="<?= $control ?>">
								</td>
								<td class="text-center">
									<input type="checkbox" onclick="changeglobal(<?= $val['id'] ?>,'publish')" <?= $val['publish'] == 1 ? 'checked' : '' ?> id="publish<?= $val['id'] ?>" class="" data-control="<?= $control ?>">
								</td>
								<td class="text-center">
									<a href="javascript:void(0)" 
									<?php if($val['total_color'] == 0){ ?>
										onclick="del(<?= $val['id'] ?>)" 
									<?php }else{ ?>
										data-toggle="modal" data-target="#notifyModal"
									<?php } ?>
									class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control="<?= $control ?>"><i class="icon-trash"></i></a>
									<a href="<?= base_url(CPANEL . $control . '/edit') . '/' . $val['id'] ?>" class="btn btn-info btn-sm" title="Sửa"><i class="icon-note"></i></a>
								</td>
							</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="notifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-danger">
				Anh/Chị không thể xóa sản phẩm này lý do đang tồn tại danh sách màu sắc của sản phẩm. Nếu bạn muốn xóa sản phẩm này thì vui lòng xóa danh sách Màu sắc hiện tại. Vui lòng kiểm tra lại.
			</div>
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