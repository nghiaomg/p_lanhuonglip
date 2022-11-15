<?php if($data_index['checkScreen'] == 'mobile'){ ?>
	<div class="hotline_mobile_fix">
		<div class="container">
			<div class="row">
				<div class="col-4">
					<div class="item">
						<a href="<?= $data_index['systems']['social']['facebook'] ?>" target="_blank">
							<img src="assets/images/facebook_m.png" alt="Facebook" width="28" height="28">
							<p>Chat FB</p>
						</a>
					</div>
				</div>
				<div class="col-4">
					<div class="item">
						<a href="tel:<?=str_replace(' ', '', $data_index['systems']['contact']['phone']) ?>">
							<img src="assets/images/phone_m.png" alt="Tell" width="28" height="28">
							<p>Gọi</p>
						</a>
					</div>
				</div>
				<div class="col-4">
					<div class="item">
						<a href="https://zalo.me/<?=str_replace('.', '', $data_index['systems']['contact']['zalo']) ?>">
							<img src="assets/images/mobile_m.webp" alt="Messenger" width="25" height="25">
							<p>Chat Zalo</p>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<style type="text/css">
	.hotline_mobile_fix{
		position: fixed;
		bottom: 0px;
		left: 0px;
		width: 100%;
		background-color: #FFF;
		z-index: 9999;
		padding: 10px 0px;
		border-top: 1px solid #ddd;
	}
	.hotline_mobile_fix .item{
		text-align: center;
	}
	.hotline_mobile_fix .item a{
		color: #333;
		font-size: 12px;
		font-weight: 500;
	}
	.hotline_mobile_fix .item p{
		margin: 0px;
	}
</style>