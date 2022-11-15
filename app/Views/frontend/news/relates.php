<?php if(isset($relates) && $relates != NULL){ ?>
<div class="news_relate_item">
    <h2>RELATED POSTS</h2>
    <div class="slide_box">
        <div class="swiper news_slider_relate">
            <div class="swiper-wrapper">
                <?php foreach ($relates as $key_relate => $val_relate) { ?>
                <div class="swiper-slide">
                    <div class="item">
                        <a href="<?=$val_relate['alias']?>">
                            <div class="box_img" style="background-image: url('uploads/images/news/<?=$val_relate['thumb']?>');"></div>
                            <h3><?=$val_relate['name']?></h3>
                        </a>
                        <a href="<?=$val_relate['alias']?>" class="view_detail">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination-relate"></div>
        </div>
    </div>
</div>
<?php } ?>