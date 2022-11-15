<link rel="stylesheet" href="assets/css/product.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="breadrum_section ">
    <div class="container">
        <div class="left">
            <ul>
                <li><a href="<?= base_url() ?>"><i class="fas fa-home"></i></a></li>
                <li><span>/</span> <?= $productDetail['name'] ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="product_detail">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-5">
                <div class="sliderProduct">
                    <div class="swiper productSwiper">
                        <div class="swiper-wrapper">
                            <?php if ($productDetail != NULL) {  ?>
                                <div class="swiper-slide">
                                    <div class="boxOverplaybg">
                                        <img class="bg_product_overplay" src="<?= $data_index['check_Browser'] == "true" ? 'uploads/images/product/' . $productDetail['image'] . '' : $productDetail['webps_thumb'] ?>">
                                        <span></span>
                                    </div>
                                    <a href="<?= $data_index['check_Browser'] == "true" ? 'uploads/images/product/' . $productDetail['image'] . '' : $productDetail['webps'] ?>" data-fancybox="gallery">
                                        <img class="bg_product" src="<?= $data_index['check_Browser'] == "true" ? 'uploads/images/product/' . $productDetail['image'] . '' : $productDetail['webps_thumb'] ?>">
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if ($photoDetail != NULL) {  ?>
                                <?php foreach ($photoDetail as $key => $val_photo) {  ?>
                                    <div class="swiper-slide">
                                        <div class="boxOverplaybg">
                                            <img class="bg_product_overplay" src="<?= $data_index['check_Browser'] == "true" ? 'uploads/images/product/detail/' . $val_photo['image'] . '' : $val_photo['webps_thumb'] ?>">
                                            <span></span>
                                        </div>
                                        <a href="<?= $data_index['check_Browser'] == "true" ? 'uploads/images/product/detail/' . $val_photo['image'] . '' : $val_photo['webps'] ?>" data-fancybox="gallery">
                                            <img class="bg_product" src="<?= $data_index['check_Browser'] == "true" ? 'uploads/images/product/detail/' . $val_photo['image'] . '' : $val_photo['webps_thumb'] ?>">
                                        </a>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="textDetail">
                    <h1 class="title-head"><?= $productDetail['name'] ?></h1>
                    <?php /*<div class="stock-brand">
                        <ul>
                            <?php if($brand['name'] != ""){ ?>
                                <li>
                                    <span class="stock-brand-title">Thương hiệu:</span>
                                    <span class="a-brand"><?= $brand['name'] ?></span>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>*/?>
                    <div class="price-box">
                        <?php if ($productDetail['price_sale'] > 0) {  ?>
                            <span class="special-price">
                                Khuyến mãi:
                                <span class="price product-price"><?= number_format($productDetail['price_sale']) ?> ₫</span>
                            </span>
                        <?php } ?>
                        <div class="old-price">Giá bán: <span class="price <?= $productDetail['price_sale'] > 0 ? 'product-price-old'  : '' ?> "><?= number_format($productDetail['price']) ?> ₫</span></div>
                    </div>
                    <?php /*<div class="boxbuynow">
                        <div class="custom custom-btn-number "> <input type="hidden" name="sp_id" value="9134">
                            <input type="input" class="input-text qty number-sidebar" title="Số lượng" value="1" id="qty" name="so_luong" max="1">
                            <div class="gp-btn">
                                <button onclick="changeQuanlity('increase')" class="btn-plus btn-cts" type="button">+</button>
                                <button onclick="changeQuanlity('decrease')" class="btn-minus btn-cts" type="button">–</button>
                            </div>
                        </div>
                        <button type="button" onclick="buyNow(this,'<?= $productDetail['id'] ?>')" class="btn btn-lg btn-gray btn-cart add_to_cart btn_buy add_to_cart" title="Mua ngay">
                            <span>Mua ngay</span>
                        </button>
                    </div> */?>
                    <div class="desc">
                        <?=$productDetail['des'] ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- tab content -->
        <div class="boxTab">
            <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                    <a href="#desc" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        <span class=""><i class="mdi mdi-home-variant"></i></span>
                        <span class="">Thông tin sản phẩm</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="desc">
                    <div class="content">
                        <?= $productDetail['content']  ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- sản phẩm liên quan -->
        <?php if ($product != NULL) { ?>
            <div class="sameproduct product listcate">
                <div class="feature_category_title text-center">
                    <h2 class="title-head text-center">Sản phẩm cùng loại</h2>
                    <div id="itemProduct">
                        <?= $this->include('frontend/product/samedata') ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>