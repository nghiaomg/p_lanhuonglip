<div class="infostore_section" style="background-image: url('<?= isset($data_index['systems']['info']['image_thumb_bg']) && file_exists('uploads/images/bg/'.$data_index['systems']['info']['image_thumb_bg'])?'uploads/images/bg/'.$data_index['systems']['info']['image_thumb_bg']:'assets/images/top_bg001.jpg' ?>');">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="item">
					<div class="box_icon align-self-center">
						<img src="<?= isset($data_index['systems']['info']['image_thumb_left']) && file_exists('uploads/images/logoleft/'.$data_index['systems']['info']['image_thumb_left'])?'uploads/images/logoleft/'.$data_index['systems']['info']['image_thumb_left']:'assets/images/create-online-store.png' ?>" alt="HỆ THỐNG CỬA HÀNG" width="85">
					</div>
					<div class="box_info">
						<h3><?= $data_index['systems']['info']['title'] ?></h3>
						<p><?= $data_index['systems']['info']['des'] ?></p>
						<p class="more"><a href="<?= $data_index['systems']['info']['link'] ?>"><?= $data_index['systems']['info']['text_btn'] ?><i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="center_box">
					<div class="content">
						<h2><?= $data_index['systems']['info']['title_between'] ?></h2>
						<p><?= $data_index['systems']['info']['des_between'] ?></p>
						<p class="more"><a href="dat-hang">ĐẶT MÓN<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="item right">
					<div class="box_icon align-self-center">
						<img src="<?= isset($data_index['systems']['info']['image_thumb_right'])&& file_exists('uploads/images/logoright/'.$data_index['systems']['info']['image_thumb_right'])?'uploads/images/logoright/'.$data_index['systems']['info']['image_thumb_right']:'assets/images/funny-pizza-delivery-boy.png' ?>" alt="HỆ THỐNG CỬA HÀNG" width="84">
					</div>
					<div class="box_info">
						<h3><img src="assets/images/icon-phone.png" alt="<?= $data_index['systems']['info']['title_right'] ?>"><?= $data_index['systems']['info']['title_right'] ?></h3>
						<p class="tel"><?= $data_index['systems']['info']['phone'] ?></p>
						<p class="web"><a href="https://<?= $data_index['systems']['info']['website'] ?>"><?= $data_index['systems']['info']['website'] ?></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 