<div class="about_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<?php if(isset($video) && $video != NULL){?>
					<div class="left">
						<div class="row">
							<?php foreach($video as $key => $val){?>
								<div class="<?= $key == 0?'col-12':'col-6' ?>">
									<div class="item <?= $key == 0?'one':'' ?>">
										<div class="box_img box_img<?=$val['id']?>" style="background-image: url('<?= 'uploads/images/video/'.$val['thumb'] ?>');" <?php if($val['link'] != '' && $val['link'] != '#'){?> onclick="play_video(<?=$val['id']?>)" <?php } ?>></div>
										<div class="icon_play icon_play<?=$val['id']?>" <?php if($val['link'] != '' && $val['link'] != '#'){?> onclick="play_video(<?=$val['id']?>)" <?php } ?> style="background-image: url('assets/images/icon_play.png');"></div>
										<iframe src="<?= isset($val['link']) && $val['link'] !=''?str_replace('https://www.youtube.com/watch?v=','https://www.youtube.com/embed/',$val['link']):'' ?>?ecver=2/version=3&amp;playerapiid=ytplayer&amp;vq=hd720&amp;autoplay=1" frameborder="0" width="100%" allowfullscreen></iframe>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="col-lg-6">
				<?php if(isset($about_json) && $about_json != NULL){?>
					<div class="right">
						<div class="about">
							<div class="label">Giới thiệu</div>
							<h2><?= $about_json['name'] ?></h2>
							<div class="content">
								<?= $about_json['content'] ?>
							</div>
							<a href="<?= $about_json['link'] ?>" class="view_more"><?= $about_json['text_link'] ?></a>
						</div>
						<div class="clear"></div>
						<?php if(isset($partner) && $partner != NULL){?>
							<div class="partner">
								<?php foreach($partner as $key => $val){?>
									<div class="item">
										<a href="<?= $val['link'] ?>"><img src="<?= $val['thumb'] !='' && $val['thumb'] != null && file_exists('uploads/images/partner/'.$val['thumb'])?'uploads/images/partner/'.$val['thumb']:'assets/images/logo-foody.png' ?>" /></a>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<script>
	function play_video(id){
		$('.box_img' + id).hide(); 
		$('.icon_play' + id).hide();
	}
</script>