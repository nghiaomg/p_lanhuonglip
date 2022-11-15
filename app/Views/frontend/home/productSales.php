<?php if(isset($productKMs) && $productKMs != NULL){ ?>
<section id="best-selling" class="best-selling products-carousel ">
    <div class="products-carousel__wrapper  ">
        <div class="products-carousel__heading d-flex align-items-center justify-content-between">
        <h2 class="title heading --h2 font-medium text-capitalize">Sản phẩm khuyến mãi</h2>
        </div>
        <div class="products-carousel__inner">
            <div class="products-carousel__lists bg-white  rounded-5 --border-gray">
                <?php foreach ($productKMs as $key_productKM => $val_productKM) { 
                    $percentKm = 0;
                    if($val_productKM['price_sale'] != 0){
                        $percentKm = 100 - round(($val_productKM['price_sale'] * 100) / $val_productKM['price']);
                    }
                ?>
                    <div <?php if($val_productKM['price_sale'] != 0){ ?> data-sale="-<?=$percentKm?>%" <?php } ?> class="item <?php if($val_productKM['price_sale'] != 0){ ?> item-label-sale <?php } ?> text-center">
                        <div class="item-image">
                            <a href="<?= $val_productKM['alias'] ?>">
                                <img class="front" src="uploads/images/product/<?=$val_productKM['image']?>" alt="<?=$val_productKM['name']?>">
                            </a>
                        </div>
                        <div class="item-name text-center"><a href="<?= $val_productKM['alias'] ?>"><?=$val_productKM['name']?></a></div>
                        <div class="item-price font-medium">
                            <?php if ($val_productKM['price_sale'] != 0) {  ?>
                                <span class="item-price-main --blue-cl"><?= number_format($val_productKM['price_sale']); ?>đ</span>
                                <span class="item-price-sale --text-light"><del><?= number_format($val_productKM['price'])  ?>đ</del></span>
                            <?php }else{ ?>
                                <span class="item-price-main --blue-cl"><?= number_format($val_productKM['price']); ?>đ</span>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="btn-control  rounded-circle --border-gray hover-pink-bg --prev"><i
                class="fa-solid fa-angle-left"></i></div>
            <div class="btn-control  rounded-circle --border-gray hover-pink-bg --next"><i
                class="fa-solid fa-angle-right"></i></div>
        </div>
    </div>
</section>
<?php } ?>