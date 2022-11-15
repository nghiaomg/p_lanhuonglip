<?php if(isset($slides) && $slides != NULL){ ?>
    <section class="banner">
        <div class="banner-list carousel">
            <?php foreach ($slides as $key_slide => $val_slide) { ?>
                <div class="banner-item" style="background-image: url('uploads/images/slide/<?=$val_slide['thumb']?>')">
                    <a href="<?=$val_slide['link']?>"></a>
                    <?php /*<div class="banner-text">
                        <h3 class="banner-subtitle font-great text-capitalize"><?=$val_slide['text_des']?></h3>
                        <h2 class="banner-title heading --h1 text-capitalize font-weight-bold"><?=$val_slide['name']?></h2>
                        <a href="<?=$val_slide['link']?>" class="btn-primary btn-shop text-capitalize --bg-pink hover-pink-bg"><?=$val_slide['text_link']?></a>
                    </div> */?>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>