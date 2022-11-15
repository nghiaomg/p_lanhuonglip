<div class="banner_footer" style="background-image: url('<?= isset($data_index['systems']['bnfooter']['image_thumb_bg_footer']) && file_exists('uploads/images/bgfooter/'.$data_index['systems']['bnfooter']['image_thumb_bg_footer'])?'uploads/images/bgfooter/'.$data_index['systems']['bnfooter']['image_thumb_bg_footer']:'assets/images/top_bg003.jpg' ?>');">
	<div class="container">
		<div class="content text-center">
			<h2><?= isset($data_index['systems']['bnfooter']['title'])?$data_index['systems']['bnfooter']['title']:'' ?></h2>
			<img src="<?= isset($data_index['systems']['bnfooter']['image_thumb_text_footer']) && file_exists('uploads/images/bgtext/'.$data_index['systems']['bnfooter']['image_thumb_text_footer'])?'uploads/images/bgtext/'.$data_index['systems']['bnfooter']['image_thumb_text_footer']:'assets/images/text-img.png' ?>" alt="Vịt nướng Thảo Mộc">
			<p class="link">
				<a href="<?= isset($data_index['systems']['bnfooter']['link'])?$data_index['systems']['bnfooter']['link']:'' ?>"><i class="fas fa-map-marker-alt"></i><span><?= isset($data_index['systems']['bnfooter']['text_btn'])?$data_index['systems']['bnfooter']['text_btn']:'' ?></span></a>
			</p>
		</div>
	</div>
</div>