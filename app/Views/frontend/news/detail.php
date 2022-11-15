<link rel="stylesheet" type="text/css" href="assets/lanhuonglip/css/news.css">
<div class="news_page news_detail_page">
	<div class="container">
		<h1><?=$dataRow['name']?></h1>
		<div class="des_main"><?=$dataRow['des']?></div>
		<div class="cate_timepost">
			<?php if(isset($cates) && $cates != NULL){ ?>
            <div class="cate_name_list">
				<?php foreach ($cates as $key_cate => $val_cate) { ?>
                	<a href="<?=$val_cate['alias']?>"><?=$val_cate['name']?></a>
                	<span>/</span>
				<?php } ?>
            </div>
			<?php } ?>
            <div class="time_post">Ngày đăng: <?=date('d/m/Y', strtotime($dataRow['created_at']))?></div>
        </div>
		<div class="row">
			<div class="col-lg-9 b-r">
				<div class="left">
					<div class="top_detail">
						<img src="<?=$path_dir?><?=$dataRow['image']?>" alt="<?=$dataRow['name']?>">
					</div>
                    <div class="contents">
                        <?= $dataRow['content'] ?>
                    </div>
                    <div class="next_prev_btn">
						<?php if(isset($prevPost) && $prevPost != NULL){ ?>
                        	<a href="<?=$prevPost['alias']?>">< Older Post</a>
						<?php } ?>
                        <span>|</span>
						<?php if(isset($nextPost) && $nextPost != NULL){ ?>
                       		<a href="<?=$nextPost['alias']?>">Newer Post ></a>
						<?php } ?>
                    </div>
                    <?= $this->include('frontend/news/relates') ?>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="socials"> 
					<div class="title">FOLLOW ME</div>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?=base_url()?>/<?= $dataRow['alias'] ?>" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?=base_url()?>/<?= $dataRow['alias'] ?>', 'newwindow', 'width=700, height=450'); return false"><i class="fa-brands fa-facebook"></i></a>
					<a href="javascript:void(0)" onclick="window.open('https://twitter.com/intent/tweet?url=<?=base_url()?>/<?= $dataRow['alias'] ?>&text=<?= $dataRow['name'] ?>', 'TwitterWindow',width=600,height=300)"><i class="fa-brands fa-twitter"></i></a>
					<a href="http://pinterest.com/pin/create/button/?url=<?=base_url()?>/<?= $dataRow['alias'] ?>" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
					<a href="mailto:mailto:<?= $data_index['systems']['contact']['email'] ?>"><i class="fa-regular fa-envelope"></i></a
				</div>
			</div>
		</div>
	</div>
</div>

