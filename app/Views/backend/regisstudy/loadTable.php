<table class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead class="thead-light">
        <tr>
            <th class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
            <th>Họ tên</th>
            <th class="text-center nosort">Số điện thoại</th>
            <th class="text-center nosort">Email</th>
            <th>Nội dung</th>
            <th class="text-center">Ngày tạo</th>
            <th class="text-center nosort">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($datas) && $datas != null) { ?>
            <?php foreach ($datas as $key => $val) { ?>
                <tr class="tr<?= $val['id'] ?>">
                    <td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
                    <td><?= $val['fullname'] ?></td>
                    <td><?= $val['phone'] ?></td>
                    <td><?= $val['email'] ?></td>
                    <td><?= $val['content'] ?></td>
                    <td><?= $val['created_at'] ?></td>
                    <td class="text-center">
                        <a href="javascript:void(0)" onclick="del(<?= $val['id'] ?>)" class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control="<?= $control ?>"><i class="icon-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>
<div class="clear"></div>
<!-- button phân trang -->
<div class="dataTables_paginate paging_simple_numbers d-flex ml-auto justify-content-flex-end" id="datatable_paginate">
    <?php echo $button_pagination; ?>
</div>
<!--end button phân trang -->