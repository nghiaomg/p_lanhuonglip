<link href="assets/cpanel/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />

<!-- Start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Phần quyền</a></li>
					<li class="breadcrumb-item active"><?= $title ?></li>
				</ol>
			</div>
			<h4 class="page-title"><?= $title ?></h4>
		</div>
	</div>
</div>
<!-- End page title -->
<!-- Show actions in module -->
<div class="row d-flex flex-column justify-content-center align-items-center">
	<div class="col-12 col-lg-12 col-md-12">
		<div class="card-box clearfix">
			<?php if ($datas != NULL && count($datas) > 0) {
				foreach ($datas as $key => $value) { ?>
					<div class="col-12 col-lg-12 ">
						<!-- Parents module -->
						<div class="row parents-row">
							<div class="col-12">
								<p class="parents-title"><?= $value['name'] . ": "; ?></p>
							</div>
							<?php if ($value['moduleDetail'] != NULL && count($value['moduleDetail']) > 0) { ?>
								<div class="list-actions d-flex flex-row">
									<?php foreach ($value['moduleDetail'] as $key_detail => $val_detail) { ?>
										<label for="<?= $val_detail['action'] . $val_detail['id']; ?>" class="title-action">
											<?php
											$isCheck = "";
											if ($permissionOfRole != NULL && count($permissionOfRole) > 0) {
												foreach ($permissionOfRole as $key_per => $val_per) {
													if ($val_per['roleID'] == $roleID && $val_per["controller"] == $val_detail['ctr'] && $val_per['action'] == $val_detail['action']) {
														$isCheck = "checked";
														break;
													}
												}
											}; ?>
											<input type="checkbox" <?= $isCheck ?> class="check-action" id="<?= $val_detail['action'] . $val_detail['id']; ?>" name="<?= $val_detail['action'] . $val_detail['id']; ?>" onclick="updatePermission('updatePermission', '<?= $val_detail['moduleID']; ?>', '<?= $val_detail['ctr']; ?>', '<?= $val_detail['action']; ?>', '<?= $roleID; ?>', '<?= $val_detail['id'] ?>')"> <?= $val_detail['name']; ?>
										</label>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
						<!-- End - Parents module -->
						<!-- Children module -->
						<?php if ($value['childrenModule'] != NULL && count($value['childrenModule']) > 0) { ?>
							<div class="row child-row d-flex flex-column justify-content-center align-items-start">
								<?php foreach ($value['childrenModule'] as $key_child => $val_child) { ?>
									<div class="col-12">
										<p class="child-title"><?= $val_child['name'] . ": "; ?></p>
									</div>
									<?php
									if ($val_child['moduleDetail'] != NULL && count($val_child['moduleDetail']) > 0) { ?>
										<div class="list-actions d-flex flex-row">
											<?php foreach ($val_child['moduleDetail'] as $key_detail => $val_detail) { ?>
												<label for="<?= $val_detail['action'] . $val_detail['id']; ?>" class="title-action">
													<?php
													$isCheck = "";
													if ($permissionOfRole != NULL && count($permissionOfRole) > 0) {
														foreach ($permissionOfRole as $key_per => $val_per) {
															if ($val_per['roleID'] == $roleID && $val_per["controller"] == $val_detail['ctr'] && $val_per['action'] == $val_detail['action']) {
																$isCheck = "checked";
																break;
															}
														}
													}; ?>
													<input type="checkbox" <?= $isCheck ?> class="check-action" id="<?= $val_detail['action'] . $val_detail['id']; ?>" name="<?= $val_detail['action'] . $val_detail['id']; ?>" onclick="updatePermission('updatePermission', '<?= $val_detail['moduleID']; ?>', '<?= $val_detail['ctr']; ?>', '<?= $val_detail['action']; ?>', '<?= $roleID; ?>', '<?= $val_detail['id'] ?>')"><?= $val_detail['name']; ?>
												</label>
											<?php } ?>
										</div>
									<?php } ?>
								<?php }; ?>
							</div>
							<!-- End - Children module -->
							<hr>
						<?php } else { ?>
							<hr>
						<?php } ?>
					</div>
			<?php
				}
			} ?>
		</div>
	</div>
</div>
<!-- End - Show actions in module -->