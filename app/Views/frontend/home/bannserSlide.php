<?php if ($slide != NULL) {  ?>
    <section class="banner">
        <div class="swiper swiper-container bannerSlide">
            <div class="swiper-wrapper">
                <?php foreach ($slide as $key => $val) {  ?>
                    <div class="swiper-slide">
                        <div class="content" style="background-image: url('<?= $val['webps_thumb'] ?>');"></div>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
<?php } ?>