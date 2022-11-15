<div class="box">
    <div class="headline">
        <div class="headitem">
            <div class="cart_head_title">Giỏ hàng</div>
            <div class="cart_head_qty">( <span class="head_qty"><?=$total_item ?></span> sản phẩm)</div>
        </div>
        <div class="headitem">
            <div class=" icon_close">
                <i class="close_cart fas fa-times"></i>
            </div>
        </div>
    </div>
    <div id="productItem">
        <div class="boxProducts">
            <!--\ products -->
                <?php if($products_cart != NULL){  ?>
                    <?php foreach($products_cart as $key => $val){  ?>
                        <div class="itemProduct">
                            <div class="img_product">
                                <img src="<?=$val['image'] ?>" alt="">
                            </div>
                            <div class="content">
                                <div class="h2 title_product"><a href="<?=$val['alias'] ?>"><?=$val['name'] ?></a></div>
                                <div class="box_amount_price">
                                    <div class="wrap_amount_price">
                                        <label for="">Số lượng</label>
                                        <div class="group-btn">
                                            <button onclick="update_cart(this,'decrease','<?=$val['rowid'] ?>')" class="decrease">-</button>
                                            <input type="number" class="qty_cart" maxlength="12" value="<?=$val['qty'] ?>" min="1">
                                            <button onclick="update_cart(this,'increase','<?=$val['rowid'] ?>')"  class="increase">+</button>
                                        </div>
                                    </div>
                                    <div class="group-price-remove">
                                        <div class="price_cart"><span class="main_price"><?=number_format($val['price'])  ?></span><span>đ</span></div>
                                        <div class="btnRemove" onclick="removeItem(this,'<?=$val['rowid'] ?>')" ><i class="fas fa-trash-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <!--/ products -->    
        </div>
    </div>
    <div id="btnstartPayment">
        <div class="d-flex top">
            <div class="item text">
                Thành tiền:
            </div>
            <div class="item price">
                <span class="total_price_cart"><?=number_format($total_price) ?></span><span>đ</span>
            </div>
        </div>
        <div data-totalitem="<?=$total_item?>" data-inex="<?=$data_index['total_item_cart']?>" class="abtn">
            <a href="thanh-toan">Tiến hành thanh toán</a>
        </div>
    </div>
</div>
<?php  
    $data_total_item = isset($data_index['total_item_cart']) &&  $data_index['total_item_cart'] != ""  &&  $data_index['total_item_cart'] != NULL ?  $data_index['total_item_cart'] : 0 ;
    $total_price_cart = isset($data_index['total_price_cart']) &&  $data_index['total_price_cart'] != ""  &&  $data_index['total_price_cart'] != NULL ?  $data_index['total_price_cart'] : 0 ;
?>
<script>
    $(document).ready(function () {
        $(".cartQty").text('<?=$total_item != NULL && $total_item != ""   ? $total_item : $data_total_item ?>');
        $(".total_price_cart2").text('<?=$total_price != NULL && $total_price != ""   ? $total_price : $total_price_cart ?>');
    });
</script>