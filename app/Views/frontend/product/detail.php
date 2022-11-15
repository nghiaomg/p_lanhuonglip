<link href="assets/lanhuonglip/css/product.css" rel="stylesheet" type="text/css" />
<div class="product_page product_detail_page">
    <?php if($data_index['checkScreen'] == 'destop'){ ?>
    <div class="breadcrumb_box">
        <div class="container">
            <a href="/" title="Back to the frontpage">Trang chủ</a>
            <span aria-hidden="true">›</span>
            <?php if(isset($breadcrumbs) && $breadcrumbs != NULL){ ?>
                <?php foreach ($breadcrumbs as $key_breadcrumb => $val_breadcrumb) { ?>
                    <a href="<?=$val_breadcrumb['alias']?>" title=""><?=$val_breadcrumb['name']?></a>
                    <span aria-hidden="true">›</span>
                <?php } ?>
            <?php } ?>
            <span class="medium-down--hide"><?=$dataRow['name']?></span>
        </div>
    </div>
    <?php } ?>
    <div class="clear"></div>
    <div class="product_detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php if($data_index['checkScreen'] == 'destop'){ ?>
                    <div class="left">
                        <div class="productPhoto" id="productPhoto">
                            <?php if(isset($colorProducts) && $colorProducts != NULL){ ?>
                                <?php if(file_exists($path_dir_color . $colorProducts[0]['thumb']) && $colorProducts[0]['thumb'] != ''){ ?>
                                    <a href="javascript:void(0)" class="zoom" data-src="<?=$path_dir_color . $colorProducts[0]['image']?>" data-fancybox="gallery">
                                        <img src="<?=$path_dir_color . $colorProducts[0]['thumb']?>" alt="<?=$dataRow['name']?>">
                                    </a>
                                <?php } ?>
                            <?php }else{ ?>
                                <a href="javascript:void(0)" class="zoom" data-src="<?=$path_dir_product . $dataRow['thumb']?>" data-fancybox="gallery">
                                    <img src="<?=$path_dir_product . $dataRow['thumb']?>" alt="<?=$dataRow['name']?>">
                                </a>
                            <?php } ?>
                        </div>
                        <!-- list photo -->
                        <div class="listPhoto">
                            <div class="swiper swiper-container product_list_photo">
                                <div class="swiper-wrapper">
                                    <?php if(isset($photoProducts) && $photoProducts != NULL){ ?>
                                        <?php foreach($photoProducts as $photo){ ?>
                                            <div class="swiper-slide">
                                                <div class="itemPhoto">
                                                    <a href="javascript:void(0)" onclick="loadPhotoToMain('uploads/images/product/detail/<?=$photo['thumb']?>', '<?=$dataRow['name']?>', -1)">
                                                        <img src="uploads/images/product/detail/<?=$photo['thumb']?>" alt="<?=$dataRow['name']?>">
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        
                                    <?php } ?>
                                    <?php if(isset($colorProducts) && $colorProducts != NULL){ ?>
                                        <?php if(file_exists($path_dir_color . $colorProducts[0]['thumb']) && $colorProducts[0]['thumb'] != ''){ ?>
                                            <div class="swiper-slide">
                                                <div class="itemPhoto">
                                                    <a href="javascript:void(0)" onclick="loadPhotoToMain('<?=$path_dir_color . $colorProducts[0]['thumb']?>', '<?=$colorProducts[0]['name']?>', 0)">
                                                        <img src="<?=$path_dir_color . $colorProducts[0]['thumb']?>" alt="<?=$colorProducts[0]['name']?>">
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if(file_exists($path_dir_color . $colorProducts[0]['thumb_1']) && $colorProducts[0]['thumb_1'] != ''){ ?>
                                            <div class="swiper-slide">
                                                <div class="itemPhoto">
                                                    <a href="javascript:void(0)" onclick="loadPhotoToMain('<?=$path_dir_color . $colorProducts[0]['thumb_1']?>', '<?=$colorProducts[0]['name']?>', 1)">
                                                        <img src="<?=$path_dir_color . $colorProducts[0]['thumb_1']?>" alt="<?=$colorProducts[0]['name']?>">
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if(file_exists($path_dir_color . $colorProducts[0]['thumb_2']) && $colorProducts[0]['thumb_2'] != ''){ ?>
                                            <div class="swiper-slide">
                                                <div class="itemPhoto">
                                                    <a href="javascript:void(0)" onclick="loadPhotoToMain('<?=$path_dir_color . $colorProducts[0]['thumb_2']?>', '<?=$colorProducts[0]['name']?>', 2)">
                                                        <img src="<?=$path_dir_color . $colorProducts[0]['thumb_2']?>" alt="<?=$colorProducts[0]['name']?>">
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if(file_exists($path_dir_color . $colorProducts[0]['thumb_3']) && $colorProducts[0]['thumb_3'] != ''){ ?>
                                            <div class="swiper-slide">
                                                <div class="itemPhoto">
                                                <a href="javascript:void(0)" onclick="loadPhotoToMain('<?=$path_dir_color . $colorProducts[0]['thumb_3']?>', '<?=$colorProducts[0]['name']?>', 3)">
                                                    <img src="<?=$path_dir_color . $colorProducts[0]['thumb_3']?>" alt="<?=$colorProducts[0]['name']?>">
                                                </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                                <div class="button_play">
                                    <div class="swiper-button-prev swiper-button"></div>
                                    <div class="swiper-button-next swiper-button"></div>
                                </div>
                            </div>
                        </div>
                        <!-- list photo End -->
                    </div>
                    <?php }else{ ?>
                        <div class="product_detail_slide">
                            <div class="swiper-product-photo">
                                <div class="swiper-wrapper" id="photoSlideLoad">
                                    
                                    <?php if(isset($photoProducts) && $photoProducts != NULL){ ?>
                                        <?php foreach($photoProducts as $photo){ ?>
                                            <div class="swiper-slide">
                                                <div class="item">
                                                    <div class="box_img" style="background-image: url('uploads/images/product/detail/<?=$photo['thumb']?>');"></div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if(isset($colorProducts) && $colorProducts != NULL){ ?>
                                        <?php if(file_exists($path_dir_color . $colorProducts[0]['thumb']) && $colorProducts[0]['thumb'] != ''){ ?>
                                        <div class="swiper-slide"><div class="item">
                                            <div class="box_img" style="background-image: url('<?=$path_dir_color . $colorProducts[0]['thumb']?>');"></div>
                                        </div></div>
                                        <?php } ?>
                                        <?php if(file_exists($path_dir_color . $colorProducts[0]['thumb_1']) && $colorProducts[0]['thumb_1'] != ''){ ?>
                                        <div class="swiper-slide"><div class="item">
                                            <div class="box_img" style="background-image: url('<?=$path_dir_color . $colorProducts[0]['thumb_1']?>');"></div>
                                        </div></div>
                                        <?php } ?>
                                        <?php if(file_exists($path_dir_color . $colorProducts[0]['thumb_2']) && $colorProducts[0]['thumb_2'] != ''){ ?>
                                        <div class="swiper-slide"><div class="item">
                                            <div class="box_img" style="background-image: url('<?=$path_dir_color . $colorProducts[0]['thumb_2']?>');"></div>
                                        </div></div>
                                        <?php } ?>
                                        <?php if(file_exists($path_dir_color . $colorProducts[0]['thumb_3']) && $colorProducts[0]['thumb_3'] != ''){ ?>
                                        <div class="swiper-slide"><div class="item">
                                            <div class="box_img" style="background-image: url('<?=$path_dir_color . $colorProducts[0]['thumb_3']?>');"></div>
                                        </div></div>
                                        <?php } ?>
                                    <?php }else{ ?>
                                        <div class="swiper-slide">
                                            <div class="item">
                                                <div class="box_img" style="background-image: url('<?=$path_dir_product . $dataRow['thumb']?>');"></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="swiper-pagination-photos"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-6">
                    <div class="right">
                        <h1><?=$dataRow['name']?></h1>
                        <div class="des">
                            <?=$dataRow['des']?>
                        </div>
                        <?php if(isset($productInfos) && $productInfos != NULL){ ?>
                        <div class="info_orther">
                            <?php foreach ($productInfos as $key_productInfo => $val_productInfo) { ?>
                            <div class="item_info_orther">
                                <img height="15" width="15" src="uploads/images/productinfo/<?=$val_productInfo['thumb']?>" alt="<?=$val_productInfo['name']?>" decoding="async">
                                <span><?=$val_productInfo['name']?></span>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php if(isset($colorProducts) && $colorProducts != NULL){ ?>
                        <div class="choose_color_box clearfix">
                            <?php if($colorProducts[0]['name'] != ''){ ?>
                                <div class="info_color_choose">
                                    <span class="label">Select a color:</span>
                                    <span class="name"><?=$colorProducts[0]['name']?></span>
                                    <?php if($colorProducts[0]['des'] != ''){ ?>
                                        <span class="des_color"><?=$colorProducts[0]['des']?></span>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <?php if($data_index['checkScreen'] != 'mobile'){ ?>
                                <div class="swatch">
                                    <?php foreach ($colorProducts as $key_colorProduct => $val_colorProduct) { ?>
                                        <div class="swatch-element swatch-element-<?=$val_colorProduct['id']?> <?=$key_colorProduct==0?'active':''?>">
                                            <?php /* onmouseover="loadPhotoToMainByColor(<?=$val_colorProduct['id']?>)" */?>
                                            <a href="javascript:void(0)" style="background-color: <?=$val_colorProduct['color_code']?>;" onclick="loadPhotoToMainByColor(<?=$val_colorProduct['id']?>)"></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php }else{ ?>
                                <div class="swatch">
                                    <?php foreach ($colorProducts as $key_colorProduct => $val_colorProduct) { ?>
                                        <div class="swatch-element swatch-element-<?=$val_colorProduct['id']?> <?=$key_colorProduct==0?'active':''?>">
                                            <?php /* onmouseover="loadPhotoToMainByColor(<?=$val_colorProduct['id']?>)" */?>
                                            <a href="javascript:void(0)" style="background-color: <?=$val_colorProduct['color_code']?>;" onclick="loadPhotoToMainByColorMobile(<?=$val_colorProduct['id']?>, <?=$dataRow['id']?>, '<?=$val_colorProduct['color_code']?>')"></a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="clear"></div>
                        <div class="order_detail_box">
                            <div class="box_price">
                                <span>Giá bán: </span>
                                <div class="price_sale"><?=$dataRow['price_sale']>0?number_format($dataRow['price_sale']):number_format($dataRow['price'])?> đ</div>
                                <?php if($dataRow['price_sale'] > 0){ ?>
                                    <div class="price"><?=number_format($dataRow['price'])?> đ</div>
                                <?php } ?>
                            </div>
                            <div class="box_order">
                                <div class="qty_label">Số lượng: </div>
                                <div class="qty">
                                    <a href="javascript:void(0)" onclick="downQty()"> - </a>
                                    <input type="text" id="qty_input" value="1" min="1">
                                    <a href="javascript:void(0)" onclick="upQty()"> + </a>
                                </div>
                            </div>
                            <input type="hidden" id="productID" value="<?=$dataRow['id']?>"/>
                            <input type="hidden" id="colorID" value="<?=$colorProducts?$colorProducts[0]['id']:0?>"/>
                            <?php if($data_index['checkScreen'] == 'destop' || $data_index['checkScreen'] == 'tablet'){ ?>
                                <a href="javascript:void(0)" class="add_cart" onclick="addCart()">Thêm vào giỏ hàng</a>
                            <?php }else{ ?>
                                <div class="cart_mobile_fix">
                                    <div class="cart_price">
                                        <div class="total_all">50.000đ</div>
                                        <?php if(isset($colorProducts) && $colorProducts != NULL){ ?>
                                            <div class="current_color">
                                                <a href="javascript:void(0)" onclick="showHideBoxChooseColor();">
                                                    <span class="current_color_show" style="background-color: <?=$colorProducts[0]['color_code']?>;"></span>
                                                    <span class="current_arrow_icon"><i class="fas fa-chevron-up"></i></span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <a href="javascript:void(0)" class="add_cart add_cart_mobile" onclick="addCart()"><span><span class="label">Thêm vào</span> <br/> Giỏ hàng</span></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(isset($videoTopProducts) && $videoTopProducts != NULL){ ?>
            <div class="video_list">
                <h2>Xem Video của chúng tôi</h2>
                <div class="row justify-content-center">
                    <?php foreach ($videoTopProducts as $key_videoTopProduct => $val_videoTopProduct) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <a href="javascript:void(0)" onclick="openVideo('<?=$val_videoTopProduct['link']?>', '<?=$val_videoTopProduct['name']?>')">
                                <div class="box_img" style="background-image: url('uploads/images/productvideo/<?=$val_videoTopProduct['thumb']?>')">
                                    <div class="play_btn"></div>
                                </div>
                                <h3><?=$val_videoTopProduct['name']?></h3>
                            </a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
            <div class="modal fade" id="myModalOpenVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="videoModalLabel">Modal title</h5>
                            <button type="button" class="close" onclick="closeVideo()" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="loadVideo"></div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function openVideo(key, name){
                    var data = '<iframe width="100%" height="400" src="https://www.youtube.com/embed/'+key+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                    $('#videoModalLabel').html(name);
                    $('#loadVideo').html(data);
                    $('#myModalOpenVideo').modal('toggle');
                    // $('#myModal').modal('show');
                }
                function closeVideo(){
                    $('#loadVideo').html(' ');
                }
                $('#myModalOpenVideo').click(function() {
                    $('#loadVideo').html(' ');
                })
            </script>


            <div class="content_tab">
                <!-- <h2>Thông tin sản phẩm</h2>
                <div class="content_detail">
                    <?php //$dataRow['content']?>
                </div> -->
                <section class="faq">
                    <div class="box">
                        <!-- item -->
                        <div class="item linetop">
                            <div class="title d-flex">
                                <div class="text">
                                    Product Details
                                </div>
                                <div class="icon">
                                    <img src="assets/lanhuonglip/images/icons/minus.png" alt="faq" width="20" height="20">
                                </div>
                            </div>
                            <div class="content" style="display: block;">
                                <div class="product_details">
                                    <div class="max-width-lgx9 margin-auto">
                                        <?php if($dataRow['subject'] != '' || $dataRow['subject2'] != '' || $dataRow['subject3'] != ''){ ?>
                                            <ul class="product-for-whom">
                                                <?php if($dataRow['subject'] != ''){ ?>
                                                <li>
                                                    <em><?=$dataRow['subject']?></em>
                                                </li>
                                                <?php } ?>
                                                <?php if($dataRow['subject2'] != ''){ ?>
                                                <li>
                                                    <em><?=$dataRow['subject2']?></em>
                                                </li>
                                                <?php } ?>
                                                <?php if($dataRow['subject3'] != ''){ ?>
                                                <li>
                                                    <em><?=$dataRow['subject3']?></em>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                        <div class="text-center m-t l-h m-t product__description-tabs" itemprop="description">
                                            <?=$dataRow['content']?>
                                        </div>

                                        <div class="content-top">
                                            <div class="row">
                                                <?php if($dataRow['orther'] != '' && $dataRow['orther_thumb'] != '' && file_exists($path_dir_product . $dataRow['orther_thumb'])){ ?>
                                                    <div class="col-lg-6 col-md-6">
                                                        <?php if($dataRow['orther'] != ''){ ?><h2><?=$dataRow['orther']?></h2><?php } ?>
                                                        <img src="<?=$path_dir_product . $dataRow['orther_thumb']?>" alt="<?=$dataRow['name']?>">
                                                    </div>
                                                <?php } ?>
                                                <?php if($dataRow['orther2'] != '' && $dataRow['orther2_thumb'] != '' && file_exists($path_dir_product . $dataRow['orther2_thumb'])){ ?>
                                                    <div class="col-lg-6 col-md-6">
                                                        <?php if($dataRow['orther2'] != ''){ ?><h2><?=$dataRow['orther2']?></h2><?php } ?>
                                                        <img src="<?=$path_dir_product . $dataRow['orther2_thumb']?>" alt="<?=$dataRow['name']?>">
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php if($data_index['checkScreen'] == 'destop'){ ?>
                                            <?php if(isset($colorProducts) && $colorProducts != NULL){ ?>
                                                <div class="shade_chart">
                                                    <h2>SHADE CHART</h2>
                                                    <div class="row">
                                                        <?php foreach ($colorProducts as $key_colorProduct => $val_colorProduct) { ?>
                                                        <div class="col-lg-3 col-md-4 col-6">
                                                            <div class="item_shade">
                                                                <div class="box_img" style="background-image: url('<?=$path_dir_color . $val_colorProduct['thumb_2']?>')"></div>
                                                                <h4><?=$val_colorProduct['name']?></h4>
                                                                <div class="des"><?=$val_colorProduct['des']?></div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>

                                        <!-- Shade Chart --><!-- Direction -->
                                        <div class="m-v product-direction">
                                            <?=$dataRow['content2']?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- item -->
                        <div class="item">
                            <div class="title d-flex">
                                <div class="text">
                                    Ingredients
                                </div>
                                <div class="icon">
                                    <img src="assets/lanhuonglip/images/icons/plus.png" alt="faq" width="20" height="20">
                                </div>
                            </div>
                            <div class="content">
                                <?php if(isset($ingreProducts) && $ingreProducts != NULL){ ?>
                                <div class="ingredients">
                                    <h2><?=$ingredientContent['title']?></h2>
                                    <div class="uniform_list">
                                        <?php foreach ($ingreProducts as $key_ingreProduct => $val_ingreProduct) { ?>
                                            <div class="uniform_item">
                                                <div class="box_img" style="background-image: url('uploads/images/productingre/<?=$val_ingreProduct['thumb']?>')"></div>
                                                <h4><?=$val_ingreProduct['name']?></h4>
                                                <div class="des"><?=$val_ingreProduct['des']?></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="ingredients_content">
                                        <h2><?=$ingredientContent['title2']?></h2>
                                        <?=$ingredientContent['content']?>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                    <p><i>Chúng tôi đang xây dựng nội dung này!</i></p>
                                <?php } ?>
                            </div>
                        </div>

                        <!-- item -->
                        <div class="item">
                            <div class="title d-flex">
                                <div class="text">
                                    Media
                                </div>
                                <div class="icon">
                                    <img src="assets/lanhuonglip/images/icons/plus.png" alt="faq" width="20" height="20">
                                </div>
                            </div>
                            <div class="content">
                                <?php if(isset($videoBottomProducts) && $videoBottomProducts != NULL){ ?>
                                <div class="video_list intab">
                                    <div class="row justify-content-center">
                                        <?php foreach ($videoBottomProducts as $key_videoBottomProduct => $val_videoBottomProduct) { ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="item item_video">
                                                <a href="javascript:void(0)" onclick="openVideo('<?=$val_videoBottomProduct['link']?>', '<?=$val_videoBottomProduct['name']?>')">
                                                    <div class="box_img" style="background-image: url('uploads/images/productvideo/<?=$val_videoBottomProduct['thumb']?>')">
                                                        <div class="play_btn"></div>
                                                    </div>
                                                    <h3><?=$val_videoBottomProduct['name']?></h3>
                                                </a>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                    <p><i>Chúng tôi đang xây dựng nội dung này!</i></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="share_box text-right">
                <a class="btn_share" data-toggle="modal" data-target="#shareModal">Chia sẻ</a>
            </div>
            <?=$this->include('frontend/product/related')?>
            <?=$this->include('frontend/product/community')?>
        </div>
    </div>
</div>
<input type="hidden" id="colorKey" />
<?= $this->include('frontend/product/share') ?>
<script type="text/javascript" src="assets/lanhuonglip/js/cart.js"></script>
<script type="text/javascript" src="assets/lanhuonglip/js/product.js"></script>