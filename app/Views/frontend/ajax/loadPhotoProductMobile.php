<?php if(isset($photoProducts) && $photoProducts != NULL){ ?>
    <?php foreach($photoProducts as $photo){ ?>
        <div class="swiper-slide">
            <div class="item">
                <div class="box_img" style="background-image: url('uploads/images/product/detail/<?=$photo['thumb']?>');"></div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
<?php if(isset($colorRow) && $colorRow != NULL){ ?>
    <?php if(file_exists($path_dir_color . $colorRow['thumb']) && $colorRow['thumb'] != ''){ ?>
    <div class="swiper-slide"><div class="item">
        <div class="box_img" style="background-image: url('<?=$path_dir_color . $colorRow['thumb']?>');"></div>
    </div></div>
    <?php } ?>
    <?php if(file_exists($path_dir_color . $colorRow['thumb_1']) && $colorRow['thumb_1'] != ''){ ?>
    <div class="swiper-slide"><div class="item">
        <div class="box_img" style="background-image: url('<?=$path_dir_color . $colorRow['thumb_1']?>');"></div>
    </div></div>
    <?php } ?>
    <?php if(file_exists($path_dir_color . $colorRow['thumb_2']) && $colorRow['thumb_2'] != ''){ ?>
    <div class="swiper-slide"><div class="item">
        <div class="box_img" style="background-image: url('<?=$path_dir_color . $colorRow['thumb_2']?>');"></div>
    </div></div>
    <?php } ?>
    <?php if(file_exists($path_dir_color . $colorRow['thumb_3']) && $colorRow['thumb_3'] != ''){ ?>
    <div class="swiper-slide"><div class="item">
        <div class="box_img" style="background-image: url('<?=$path_dir_color . $colorRow['thumb_3']?>');"></div>
    </div></div>
    <?php } ?>
<?php } ?>
<!-- swiper-->
<link rel="stylesheet" href="assets/lanhuonglip/js/swiper/swiper-bundle.min.css" />
<script src="assets/lanhuonglip/js/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript" src="assets/lanhuonglip/js/product.js"></script>