<?php if(isset($productHots) && $productHots != NULL){ ?>
<aside class="sidebar__itembox p-4 --border-gray bg-white rounded-5">
    <h3 class="title  pb-3 heading --h3 --text-black text-capitalize font-medium">Sản phẩm nổi bật</h3>
    <ul class="products-list">
        <?php foreach ($productHots as $key_productHot => $val_productHot) { ?>
            <li class="item my-3">
                <a href="<?=$val_productHot['alias']?>" class="item-link d-flex">
                    <div class="item-image --border-gray rounded-5">
                    <img class="d-block" src="uploads/images/product/<?=$val_productHot['thumb']?>" alt="<?=$val_productHot['name']?>">
                    </div>
                    <div class="item-info">
                    <h4 class="item-name --text-black"><?=$val_productHot['name']?></h4>
                    <div class="item-star --star-check">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="item-price --blue-cl"><?=number_format($val_productHot['price'])?>đ</div>
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>
</aside>
<?php } ?>