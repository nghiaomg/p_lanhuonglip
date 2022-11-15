<?php if(isset($adss) && $adss != NULL){ ?>
    <div class="toprate">
        <div class="toprate-row d-flex flex-column flex-md-row">
            <?php foreach ($adss as $key_ads => $val_ads) { ?>
                <div class="toprate-item w-100 mb-3 mb-md-0" style="background-image: url(uploads/images/ads/<?=$val_ads['thumb']?>);">
                    <div class="toprate-text">
                        <h4 class="toprate-subtitle font-great text-white"><?=$val_ads['text_des']?></h4>
                        <h3 class="toprate-title text-white font-weight-bold"><?=$val_ads['name']?></h3>
                    </div>
                    <a href="<?=$val_ads['link']?>" class="toprate-btn text-white text-capitalize"><u><?=$val_ads['text_link']?></u></a>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>