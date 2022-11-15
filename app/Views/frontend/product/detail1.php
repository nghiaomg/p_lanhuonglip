<link rel="stylesheet" href="assets/css/mevabe/product-detail.css">
<!-- start main bottom -->
<div class="product__detail">
    <div class="container">
        <div class=" d-flex flex-column flex-lg-row">
            <?=$this->include('frontend/product/sidebar')?>
            <div class="main-col-right order-1 order-lg-2  pb-5">
                <div id="main-site" class="main-site">
                <section class="product-detail d-flex flex-column flex-lg-row">
                    <div class="product-gallery">
                    <div class="product-gallery__wrapper position-relative">
                        <div id="thumbnails-gallery" class="gallery-inner position-relative --carousel rounded-5 --border-gray">
                            <?php 
                                $percent = 0;
                                if($productDetail['price_sale'] != 0){
                                    $percent = 100 - round(($productDetail['price_sale'] * 100) / $productDetail['price']);
                                }
                            ?>
                            <a <?php if($productDetail['price_sale'] != 0){ ?> data-sale="-<?=$percent?>%" <?php } ?> href="uploads/images/product/<?=$productDetail['image']?>" class="item <?php if($productDetail['price_sale'] != 0){ ?> item-label-sale <?php } ?> image-zoom rounded-5  image-1"><img class="h-100 d-block rounded-inherit"
                                src="uploads/images/product/<?=$productDetail['image']?>" alt="<?= $productDetail['name'] ?>"></a>
                            <?php if ($photoDetail != NULL) {  ?>
                                <?php foreach ($photoDetail as $key => $val_photo) {  ?>
                                    <a <?php if($productDetail['price_sale'] != 0){ ?> data-sale="-<?=$percent?>%" <?php } ?> href="uploads/images/product/detail/<?=$val_photo['image']?>" class="item <?php if($productDetail['price_sale'] != 0){ ?> item-label-sale <?php } ?> image-zoom rounded-5  image-2">
                                        <img class="h-100 d-block rounded-inherit" src="uploads/images/product/detail/<?=$val_photo['image']?>" alt="<?= $productDetail['name'] ?>">
                                    </a>
                                <?php } ?>
                            <?php } ?>
                            </div>
                            <div id="zoom-btn" class="btn-zoom z-20 icon-zoom --bg-gray --text-black flex-center ">
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                            </div>
                    </div>
                    <div class="product-gallery__control position-relative px-5">
                        <ol class="product-gallery__thumb --carousel-nav">
                            <figure class="thumbnail p-2 p-sm-3 image-1">
                                <img class="--border-gray rounded-5" src="uploads/images/product/<?=$productDetail['image']?>" alt="<?= $productDetail['name'] ?>">
                            </figure>
                            <?php if ($photoDetail != NULL) {  ?>
                                <?php foreach ($photoDetail as $key => $val_photo) {  ?>
                                    <figure class="thumbnail p-2 p-sm-3 image-2">
                                        <img class="--border-gray rounded-5" src="uploads/images/product/detail/<?=$val_photo['image']?>" alt="<?= $productDetail['name'] ?>">
                                    </figure>
                                <?php } ?>
                            <?php } ?>
                        </ol>
                        <div class="btn-ctr flex-center --border-gray rounded-circle --bg-white hover-pink-bg --prev">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                        <div class="btn-ctr flex-center --border-gray rounded-circle --bg-white hover-pink-bg --next">
                            <i class="fa-solid fa-angle-right"></i>
                        </div>
                    </div>
                    </div>
                    <div class="product-info">
                    <h2 class="title heading --h2 d-flex align-items-center justify-content-between mb-3"><?= $productDetail['name'] ?>
                        <?php if(isset($productNext) && $productNext != NULL){ ?>
                            <a href="<?=$productNext['alias']?>" class="--border-gray"><i class="fa-solid fa-angle-right"></i></a>
                        <?php } ?>
                    </h2>
                    <?php //$this->include('frontend/product/flashSale')?>
                    <div class="product-info__price font-medium">
                        <?php if ($productDetail['price_sale'] > 0) {  ?>
                            <ins class="--blue-cl decoration-none"><?= number_format($productDetail['price_sale']) ?>đ</ins>
                            <del class="--text-light"><?= number_format($productDetail['price']) ?>đ</del>
                        <?php }else{ ?>
                            <ins class="--blue-cl decoration-none"><?= number_format($productDetail['price']) ?>đ</ins>
                        <?php } ?>
                    </div>
                    <?php if($productDetail['des'] != ''){ ?>
                        <div class="product-info__desc py-20 --border-t-gray --border-b-gray --text-light">
                            <?=$productDetail['des'] ?>
                        </div>
                    <?php } ?>
                    <form action="" class="product-info__cart py-20 d-flex align-items-center">
                        <div class="quantity-wrapper d-flex align-items-center rounded-5 --border-gray">
                        <input onclick="changeQuanlity('decrease')" type="button" value="-" class="quantity-input pointer --bg-gray  --minus">
                        <input type="text" step="1" value="1" class="quantity-input bg-white --qty" id="qty">
                        <input onclick="changeQuanlity('increase')" type="button" value="+" class="quantity-input pointer  --bg-gray --plus">
                        </div>
                        <button onclick="buyNow(this,'<?= $productDetail['id'] ?>')" type="button" class="btn-submit btn-primary --bg-pink border-0 outline-none pointer font-medium  text-white hover-blue-bg text-capitalize">Mua ngay</button>
                    </form>
                    <ul class="product-info__meta py-20 --border-t-gray">
                        <?php if($productDetail['code'] != ''){ ?>
                        <li class="item mb-2 --sku">
                            <span class="label text-capitalize">SKU:</span> <span class="--text-light"><strong><?= $productDetail['code']  ?></strong></span>
                        </li>
                        <?php } ?>
                        <li class="item mb-2 --cat">
                            <span class="label text-capitalize">Danh mục:</span> 
                            <a href="<?=$cateInfo['alias']?>" class="tag --text-light hover-pink text-capitalize"><?=$cateInfo['name']?></a>
                        </li>
                    </ul>
                    </div>
                </section>
                <?php if($productDetail['content'] != ''){ ?>
                <section id="product-tabs" class="product-tabs">
                    <ul class="nav nav-tabs" id="tab-list" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link hover-pink-bg active" id="desc-tab" data-toggle="tab" href="#description"
                            role="tab" aria-controls="description" aria-selected="true">Thông tin chi tiết</a>
                        </li>
                    </ul>
                    <div class="tab-content bg-white rounded-5 --border-gray" id="tab-content">
                        <div class="tab-pane tab-desc rounded-inherit bg-white fade show active" id="description"
                            role="tabpanel" aria-labelledby="desc-tab">
                            <?= $productDetail['content']  ?>
                        </div>
                    </div>
                </section>
                <?php } ?>
                </div>
                <section id="related-products" class="related-products products-carousel px-3 ">
                    <?=$this->include('frontend/product/related')?>
                </section>
            </div>
        </div>
    </div>
</div>
<!-- start main bottom -->
<script src="assets/js/mevabe/product.js"></script>
<script src="assets/js/mevabe/product-detail.js"></script>