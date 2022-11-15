<div class="container">
    <div class="giohang_title">
        GIỎ HÀNG (<span class="total_item head_qty"><?= $total_item ?> </span> sản phẩm)
    </div>
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="scrollTable">
                <div class="maxContentTable">
                    <div class="tableproduct">
                        <table class="   nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-center"></th>
                                    <th class="text-center "></th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody style="vertical-align: middle;border-color: inherit;">
                                <?php if (isset($products_cart) && $products_cart != null) { ?>
                                    <?php foreach ($products_cart as $key => $val) { ?>
                                        <tr class="itemProduct">
                                            <td class="first_td" width="190">
                                                <div class="img_product">
                                                    <img src="uploads/images/product/<?= $val['image'] ?>" alt="">
                                                </div>
                                            </td>
                                            <td class="width_name">
                                                <div class="td_totalItem">
                                                    <a href="<?= $val['alias'] ?>"><?= $val['name'] ?></a>
                                                </div>
                                            </td>
                                            <td class="td_group_amount">
                                                <div class="group-amount">
                                                    <label for="">Số lượng</label>
                                                    <div class="group-btn">
                                                        <button onclick="update_cart(this,'decrease','<?= $val['rowid'] ?>')" class="decrease">-</button>
                                                        <input type="number" class="qty_cart" maxlength="12" value="<?= $val['qty'] ?>" min="1">
                                                        <button onclick="update_cart(this,'increase','<?= $val['rowid'] ?>')" class="increase">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td_price_remove">
                                                <div class="price_cart"><span class="main_price"><?= number_format($val['price'])  ?></span><span>đ</span></div>
                                                <div class="btnRemove" onclick="removeItem(this,'<?= $val['rowid'] ?>')"><i class="fas fa-trash-alt"></i></div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-sm-6 col-lg-3">
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
    </div>
</div>