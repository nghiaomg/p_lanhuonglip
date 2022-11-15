<div class="cart_list_page">
    <div class="container">
        <h1>Giỏ hàng</h1>
        <div class="box">
            <?php if(isset($datas) && $datas != NULL){ ?>
                <div class="head">
                    <div class="box_img_th"></div>
                    <div class="box_info_th">
                        <div class="info">Sản phẩm</div>
                        <div class="price">Giá</div>
                        <div class="qty_box">SL</div>
                    </div>
                    <div class="box_total_th">Thành tiền</div>
                    <div class="box_reove_th"></div>
                </div>
                <div class="body" id="listProduct">
                    <?php foreach($datas as $key => $val){ ?>
                    <div class="item">
                        <div class="box_img" style="background-image: url('<?= $val['product_thumb'] ?>')"></div>
                        <div class="info_price_qty align-self-center">
                            <div class="info">
                                <h3><a href="<?= $val['product_alias'] ?>"><?= $val['product_name'] ?></a></h3>
                                <div class="des"><?= $val['color_name'] ?></div>
                            </div>
                            <div class="price align-self-center"><?= $val['product_price'] ?> VNĐ</div>
                            <div class="qty_box align-self-center">
                                <div class="box2">
                                    <a href="javascript:void(0)" onclick="downQtyInCart2(<?= $val['productID'] ?>,<?= $val['colorID'] ?>)">-</a>
                                    <input type="number" id="qty2_<?= $val['productID'] ?>_<?= $val['colorID'] ?>" min="1" value="<?= $val['qty'] ?>">
                                    <a href="javascript:void(0)" onclick="upQtyInCart2(<?= $val['productID'] ?>,<?= $val['colorID'] ?>)">+</a>
                                </div>
                            </div>
                        </div>
                        <div class="total align-self-center">
                            <?= number_format($val['total']) ?> VNĐ <br/>
                            <?php if($val['total_origin']){ ?><s><?= number_format($val['total_origin']) ?> VNĐ</s><?php } ?>
                        </div>
                        <div class="remove align-self-center">
                            <a href="javascript:void(0)" onclick="deleteItemCart2(<?= $val['productID'] ?>,<?= $val['colorID'] ?>)">Xóa</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <hr/>
                <div class="row justify-content-end">
                    <div class="col-lg-3">
                        <div class="cart_total">
                            <div class="item">
                                <div class="label">Tạm tính</div>
                                <div class="number" id="subtotal"><?=number_format($totalMoney)?> VNĐ</div>
                            </div>
                            <div class="item">
                                <div class="label">Tiết kiệm</div>
                                <div class="number" id="savings"><?=number_format($totalSave)?> VNĐ</div>
                            </div>
                            <div class="item item_total">
                                <div class="label">Tổng tiền</div>
                                <div class="number" id="cart_total"><?=number_format($totalMoney)?> VNĐ</div>
                            </div>
                            <a href="thanh-toan" class="payment_btn">Thanh toán</a>
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                <div class="text-center pt-5">
                    <img src="assets/images/cart_empty.png" alt="Giỏ hàng rỗng" width="250">
                    <p class="mt-3">Hiện tại không có sản phẩm nào trong giỏ hàng của Anh/Chị.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="assets/lanhuonglip/js/cart.js"></script>

