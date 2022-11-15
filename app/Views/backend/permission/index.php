<link href="assets/cpanel/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />

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
	<div class="col-12">
		<div class="card-box clearfix">
			<?php if (count($datas) > 0) {
				foreach ($datas as $key => $value) { ?>
					<div class="col-12 col-lg-12 d-flex justify-content-center align-items-center">
						<div class="col-6"><?= $value['name']; ?></div>
						<div class="col-6"><a href="<?= base_url() . "/" . CPANEL . $control . "/" . "setPermission" . "/" . $value["id"]; ?>"> Thực hiện phân quyền </a></div>
					</div>
					<hr>
			<?php }
			} ?>
		</div>
	</div>

</div>