<div class="modal-header">
    <h5 class="modal-title">Đơn hàng #<?=$orderRow['code']?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body modal-body-cart">
    <table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead class="thead-light">
            <tr>
                <th>Tên SP</th>
                <th class="text-center">Hình ảnh</th>
                <th class="text-center">Số lượng</th>
                <th class="text-center">Đơn giá</th>
                <th class="text-center">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($datas) && $datas != null) { ?>
                <?php  foreach ($datas as $key => $val) { ?>
                    <tr class="tr<?= $val['id'] ?>">
                        <td><strong><a href="<?= $val['product_alias'] ?>" target="_blank"><?= $val['product_name'] ?></a></strong><br/><?= $val['color_name'] ?></td>
                        <td width="100" class="text-center">
                            <?php if($val['colorID'] == 0){ ?>
                                <img src="uploads/images/product/<?= $val['product_thumb'] ?>" alt="">
                            <?php } else { ?>
                                <img src="uploads/images/productcolor/<?= $val['color_thumb'] ?>" alt="">
                            <?php } ?>
                        </td>
                        <td class="text-center"><?= $val['qty'] ?></td>
                        <td class="text-center">
                            <?= $val['price_sale'] > 0?number_format($val['price_sale']):number_format($val['price']); ?> VNĐ <br/>
                            <?php if($val['price_sale'] > 0){ ?>
                                <s><?= number_format($val['price'])?> VNĐ</s>
                            <?php } ?>
                        </td>
                        <td class="text-center"><?= number_format($val['total'])?> VNĐ</td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <div class="row justify-content-end">
        <div class="col-lg-4 text-right">Tổng tiền: <span class="totals_num"><?=number_format($totals)?></span></div>
    </div>
</div>
<style>
    .modal-body-cart img 
    {
        width: 100%;
    }
    .modal-body-cart
    {
        max-height: 550px;
        overflow-y: auto;
        overflow-x: hidden;
    }
    .totals_num{
        font-size: 1.5rem;
        color: #F00;
        font-weight: bold;
    }
</style>