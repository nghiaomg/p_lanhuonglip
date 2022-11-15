<table class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead class="thead-light">
        <tr>
            <th>Tên sản phẩm</th>
            <th class="text-center nosort">Đơn giá</th>
            <th class="text-center nosort">Số lượng</th>
            <th class="text-center nosort">Thành tiền</th>
            <th class="text-center nosort">Yêu cầu</th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($datas) && $datas != NULL){?>
            <?php foreach($datas as $key => $val) {?>
                <tr>
                    <td><?= $val['name_product'] ?></td>
                    <td><?= number_format($val['price']) ?> đ</td>
                    <td class="text-center"><?= $val['qty'] ?></td>
                    <td><?= number_format($val['qty'] * $val['price']) ?> đ</td>
                    <td><?php if ($val['status'] == 0) {?>
                       Chặt sẵn
                    <?php }else {?>
                        Để nguyên con
                    <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>