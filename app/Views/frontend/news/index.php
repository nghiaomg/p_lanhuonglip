<link rel="stylesheet" type="text/css" href="assets/lanhuonglip/css/news.css">
<div class="news_page">
	<div class="container">
		<h1><?=$cate_name?></h1>
		<?php if($cate_des != ''){ ?>
			<div class="des_main"><?=$cate_des?></div>
		<?php } ?>
		<div class="row">
			<div class="col-lg-9 b-r">
				<div class="left">
					<?php if(isset($newsNews) && $newsNews != NULL){ ?>
					<div class="top">
						<div class="box_img" style="background-image: url('<?=$path_dir?><?=$newsNews[0]['image']?>')"></div>
						<h3><a href="<?=$newsNews[0]['alias']?>"><?=$newsNews[0]['name']?></a></h3>
						<div class="des"><?=$newsNews[0]['des']?></div>
						<a href="<?=$newsNews[0]['alias']?>" class="view_detail">Xem chi tiết</a>
					</div>
					<?php } ?>
					<?php if(isset($cateChilds) && $cateChilds != NULL){ ?>
						<div class="list_cate">
							<!-- item -->
							<?php foreach ($cateChilds as $key_cateChild => $val_cateChild) { ?>
								<div class="list_cate_item">
									<div class="title_box">
										<a href="<?=$val_cateChild['alias']?>"><h2><?=$val_cateChild['name']?></h2></a>
										<a href="<?=$val_cateChild['alias']?>" class="view_all">Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
									</div>
									<?php if(isset($val_cateChild['news']) && $val_cateChild['news'] != NULL){ ?>
									<div class="slide_box">
										<div class="swiper news_slider_<?=$key_cateChild?>">
											<div class="swiper-wrapper">
												<?php foreach ($val_cateChild['news'] as $key_cateChild_news => $val_cateChild_news) { ?>
													<div class="swiper-slide">
														<div class="item">
															<a href="<?=$val_cateChild_news['alias']?>">
																<div class="box_img" style="background-image: url('<?=$path_dir?><?=$val_cateChild_news['thumb']?>');"></div>
																<h3><?=$val_cateChild_news['name']?></h3>
															</a>
															<a href="<?=$val_cateChild_news['alias']?>" class="view_detail">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
														</div>
													</div>
												<?php } ?>
											</div>
											<div class="swiper-pagination-<?=$key_cateChild?>"></div>
										</div>
									</div>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					<?php }else{ ?>
						<div class="list_news_item">
							<h2><?=$cate_name?></h2>
							<?php if(isset($datas) && $datas != NULL){ ?>
								<div class="row">
									<?php foreach ($datas as $key_data => $val_data) { ?>
									<!-- item -->
									<div class="col-lg-4 col-md-6">
										<div class="item">
											<a href="<?=$val_data['alias']?>">
												<div class="box_img" style="background-image: url('<?=$path_dir?><?=$val_data['thumb']?>');"></div>
												<h3><?=$val_data['name']?></h3>
											</a>
											<a href="<?=$val_data['alias']?>" class="view_detail">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
										</div>
									</div>
									<?php } ?>
								</div>
								<div id="loadNews"></div>
								<?php if($totalRow > $limit){ ?>
									<a href="javascript:void(0)" onclick="loadMore()" id="load_news_btn" class="view_more">Xem thêm</a>
								<?php } ?>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="col-lg-3">
				<?php if(isset($cateChilds) && $cateChilds != NULL){ ?>
					<?php if(isset($newsNews) && $newsNews != NULL){ ?>
					<div class="right">
						<h2>RECENT POSTS</h2>
						<div class="clear"></div>
						<div class="list row">
							<?php foreach ($newsNews as $key_newsNew => $val_newsNew) { ?>
								<?php if($key_newsNew > 0){ ?>
									<div class="col-lg-12 col-md-6">
										<div class="item">
											<div class="box_img" style="background-image: url('<?=$path_dir?><?=$val_newsNew['thumb']?>')"></div>
											<div class="info">
												<h3><a href="<?=$val_newsNew['alias']?>"><?=$val_newsNew['name']?></a></h3>
												<a href="<?=$val_newsNew['alias']?>" class="read_more">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
											</div>
										</div>
									</div>
								<?php } ?>
							<?php } ?>
						</div>
						<a href="<?=$alias?>" class="view_more">Xem thêm</a>
					</div>
					<?php } ?>
				<?php } ?>
				<div class="socials"> 
					<div class="title">FOLLOW ME</div>
					<a href="<?= $data_index['systems']['social']['instagram'] ?>"><i class="fa-brands fa-instagram"></i></a>
					<a href="<?= $data_index['systems']['social']['facebook'] ?>"><i class="fa-brands fa-facebook"></i></a>
					<a href="<?= $data_index['systems']['social']['twitter'] ?>"><i class="fa-brands fa-twitter"></i></a>
					<a href="<?= $data_index['systems']['social']['pinterest'] ?>"><i class="fa-brands fa-pinterest"></i></a>
					<a href="<?= $data_index['systems']['social']['youtube'] ?>"><i class="fa-brands fa-youtube"></i></a>
					<a href="<?= $data_index['systems']['social']['tiktok'] ?>"><img src="assets/lanhuonglip/images/icons/tik_tok_logo_19x19.webp" width="19" alt=""></a>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" id="page" value="1" />
<input type="hidden" id="limit" value="<?=$limit?>" />
<input type="hidden" id="cateID" value="<?=$cateID?>" />
<input type="hidden" id="totalPage" value="<?=$numPage?>" />
<script>
	function loadMore(){
		var page = $('#page').val();
		var limit = $('#limit').val();
		var cateID = $('#cateID').val();
		var totalPage = $('#totalPage').val();
		var newPage = parseInt(page) + 1;
		if(totalPage == newPage){
			$('#load_news_btn').fadeOut();
		}
		$.ajax({
			method: "POST",
			url: "load-news",
			data: { page: page, limit: limit, cateID: cateID },
			dataType: "html",
			success: function (data) {
				if(data){
					$('#loadNews').append(data);
					$('#page').val(newPage);
				}
			},
		});
	}
</script>

