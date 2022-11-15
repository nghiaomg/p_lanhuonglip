<div class="boxProduct">
    <div class="headline">
        Đơn hàng (<span class="total_items_payment"><?=$total_item ?></span> sản phẩm )
    </div>
    <div class="productItems">
    <?php if($products_cart != NULL){  ?>
        <?php foreach($products_cart as $key => $val){  ?>
            <div class="items row">
                <div class="img_product col-md-3">
                <img src="uploads/images/product/<?=$val['image'] ?>" alt="">
                </div>
                <div class="name_qty_product col-md-6">
                    <div class="name_pd">
                        <a href="<?=$val['alias']?>">
                            <?=$val['name']?>
                        </a>
                    </div>
                    <div class="qty_pd">
                        Số lượng: <span class="qty_payment"> <?=$val['qty']?></span>
                    </div>
                </div>
                <div class="price_product col-md-3">
                <?=number_format($val['price'])?>đ
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    </div>
    <div class="group-total">
        <div class="text">
            Tổng cộng
        </div>
        <div class="price text-danger">
            <span><?=number_format($total_price) ?></span> đ
        </div>
    </div>
    <div class="btnback">
        <a href="gio-hang" class="text-danger"><i class="fas fa-chevron-left"></i> Quay về giỏ hàng</a>
    </div>
    <div class="btbDathang">
        <a id="dathang" href="javascript:void(0)">ĐẶT HÀNG</a>
    </div>
</div>