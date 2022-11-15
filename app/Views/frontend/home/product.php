<?php if(isset($product) && $product != NULL){?>
<div class="product_section">
	<h2>Thực đơn
		<?php /*<div class="icon_logo"><img src="<?= isset($data_index) ? $data_index['getlogo']['path_dir'] . $data_index['getlogo']['thumb'] : "" ?>" loading="lazy" alt="logo" width="51" height="51"></div> */?>
	</h2>
	<div class="container">
		<div class="row">
			<?php foreach($product as $key => $val){?>
				<div class="col-lg-4 col-md-4 col-6">
					<div class="item">
						<a href="<?= base_url('dat-hang') ?>">
							<div class="img">
								<div class="box_img" style="background-image: url('uploads/images/product/<?= $val['thumb'] ?>');"></div>
							</div>
						</a>
						<div class="box_info">
							<div class="left">
								<a href="<?= base_url('dat-hang') ?>"><h3><?= $val['name'] ?></h3></a>
								<div class="price"><?= number_format($val['price']) ?> <sup>đ</sup></div>
							</div>
							<div class="right">
								<a href="<?= base_url('dat-hang') ?>"><i class="fas fa-shopping-cart"></i></a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>