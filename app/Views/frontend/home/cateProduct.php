<?php if(isset($cateHomes) && $cateHomes != NULL){ ?>
    <?php foreach ($cateHomes as $key_cateHome => $val_cateHome) { 
        $count = $key_cateHome + 1;
    ?>
        <section id="trending" class="trending products-carousel ">
            <div class="products-carousel__wrapper  ">
                <div class="products-carousel__heading d-flex align-items-center justify-content-between">
                    <h2 class="title heading --h2 font-medium text-capitalize"><?=$val_cateHome['name']?></h2>
                    <div class="toggle-tabs">
                        <div class="toggle-tabs-btn pointer d-md-none">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                    </div>
                </div>
                <?php if(isset($val_cateHome['products']) && $val_cateHome['products'] != NULL){ ?>
                <div class="tabs-content">
                    <div class="products-carousel__inner active">
                        <div class="products-carousel__lists --carousel-<?=$count?>  bg-white  rounded-5 --border-gray">
                            <?php foreach ($val_cateHome['products'] as $key_cateHome_pro => $val_cateHome_pro) { 
                                $percentProHome = 0;
                                if($val_cateHome_pro['price_sale'] != 0){
                                    $percentProHome = 100 - round(($val_cateHome_pro['price_sale'] * 100) / $val_cateHome_pro['price']);
                                }
                            ?>
                                <div <?php if($val_cateHome_pro['price_sale'] != 0){ ?> data-sale="-<?=$percentProHome?>%" <?php } ?> class="item <?php if($val_cateHome_pro['price_sale'] != 0){ ?> item-label-sale <?php } ?> text-center">
                                    <div class="item-image">
                                        <a href="<?= $val_cateHome_pro['alias'] ?>">
                                            <img class="front" src="uploads/images/product/<?=$val_cateHome_pro['thumb']?>" alt="<?=$val_cateHome_pro['name']?>">
                                        </a>
                                    </div>
                                    <div class="item-name text-center"><a href="<?= $val_cateHome_pro['alias'] ?>"><?=$val_cateHome_pro['name']?></a></div>
                                    <div class="item-price font-medium">
                                        <?php if ($val_cateHome_pro['price_sale'] != 0) {  ?>
                                            <span class="item-price-main --blue-cl"><?= number_format($val_cateHome_pro['price_sale']); ?>đ</span>
                                            <span class="item-price-sale --text-light"><del><?= number_format($val_cateHome_pro['price'])  ?>đ</del></span>
                                        <?php }else{ ?>
                                            <span class="item-price-main --blue-cl"><?= number_format($val_cateHome_pro['price']); ?>đ</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="btn-control  rounded-circle --border-gray hover-pink-bg --prev --prev-<?=$count?>">
                        <i class="fa-solid fa-angle-left"></i>
                    </div>
                    <div class="btn-control  rounded-circle --border-gray hover-pink-bg --next --next-<?=$count?>">
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
    <?php } ?>
<?php } ?>