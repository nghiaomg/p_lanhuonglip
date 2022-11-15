<?php if(isset($product) && $product != NULL){ ?>
    <ul class="products-carousel__lists p-4 mt-0    align-items-center --carousel-2 bg-white  rounded-5 --border-gray grid active">
        <?php foreach ($product as $key_product => $val_product) { 
            $percent = 0;
            if($val_product['price_sale'] != 0){
                $percent = 100 - round(($val_product['price_sale'] * 100) / $val_product['price']);
            }
        ?>
            <li <?php if($val_product['price_sale'] != 0){ ?> data-sale="-<?=$percent?>%" <?php } ?> class="item <?php if($val_product['price_sale'] != 0){ ?> item-label-sale <?php } ?> text-center ">
                <div class="item-image">
                    <a href="<?= $val_product['alias'] ?>">
                        <img class="front" src="<?= $data_index['check_Browser'] == "true" ? 'uploads/images/product/' . $val_product['image'] . '' : $val_product['webps_thumb'] ?>" alt="<?=$val_product['name']?>">
                    </a>
                </div>
                <div class="item-content">
                    <div class="item-name text-center"><a href="<?= $val_product['alias'] ?>"><?=character_limiter($val_product['name'],40)  ?></a></div>
                    <div class="item-price font-medium">
                        <?php if ($val_product['price_sale'] != 0) {  ?>
                            <span class="item-price-main --blue-cl"><?= number_format($val_product['price_sale']); ?>đ</span>
                            <span class="item-price-sale --text-light"><del><?= number_format($val_product['price'])  ?>đ</del></span>
                        <?php }else{ ?>
                            <span class="item-price-main --blue-cl"><?= number_format($val_product['price']); ?>đ</span>
                        <?php } ?>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
    <div class="pagination">
        <?= $button_pagination ?>
    </div>
<?php } ?>