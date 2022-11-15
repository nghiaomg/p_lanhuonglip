<div class="left-side-menu">
	<div class="slimscroll-menu">
		<!--- Sidemenu -->
		<div id="sidebar-menu">

			<ul class="metismenu" id="side-menu">
				<li class="menu-title">MENU QUẢN LÝ</li>
				<?php if ($data_index['get_module'] && $data_index['get_module'] != NULL) { ?>
					<?php foreach ($data_index['get_module'] as $key => $val) { ?>
						<li>
							<a href="<?= $val['link'] ? CPANEL . $val['link'] : 'javascript:void(0)' ?>">
								<i class="<?= $val['icon'] ? $val['icon'] : '' ?>"></i>
								<span><?= $val['name'] ?></span>
								<?= $val['child'] ? '<span class="menu-arrow"></span>' : '' ?>
							</a>
							<?php if ($val['child'] && $val['child'] != NULL) { ?>
								<ul class="nav-second-level" aria-expanded="false">
									<?php foreach ($val['child'] as $key_child => $val_child) { ?>
										<li><a href="<?= CPANEL . $val_child['link'] ?>"><i class="<?= $val_child['icon'] ? $val_child['icon'] : '' ?>"></i>&nbsp;<?= $val_child['name'] ?></a></li>
									<?php } ?>
								</ul>
							<?php } ?>
						</li>
					<?php } ?>
				<?php } ?>
			</ul>
		</div>
		<!-- End Sidebar -->
	</div>
	<!-- Sidebar -left -->
</div>