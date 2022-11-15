<table class="table table-bordered" id="tableBase_data" url="<?= CPANEL.$control.'/'.'search_pagination'?>" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead class="thead-light">
        <tr>
            <th class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
            <th>Tên khách hàng</th>
            <th class="text-center nosort">Số điện thoại</th>
            <th class="text-center nosort">Email</th>
            <th class="text-center nosort">Quốc tịch</th>
            <th class="text-center nosort">Giới tính</th>
            <th class="text-center nosort">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($datas) && $datas != null) { ?>
            <?php foreach ($datas as $key => $val) { ?>
                <tr class="tr<?= $val['id'] ?>">
                    <td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
                    <td><?= $val['name'] ?></td>
                    <td><?= $val['phone'] ?></td>
                    <td><?= $val['email'] ?></td>
                    <td><?= $val['nationaly']?></td>
                    <td><?= $val['gender'] == 1?'Nam':'Nữ' ?></td>
                    <td class="text-center">
                        <a href="javascript:void(0)" data-toggle="modal" onclick="view_detail(<?= $val['id'] ?>)" class="btn btn-primary">Xem chi tiết</a>
                        <a href="javascript:void(0)" onclick="del(<?= $val['id'] ?>)" class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control="<?= $control ?>"><i class="icon-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>
<div class="clear"></div>
<!-- button phân trang -->
<div class="" id="datatable_paginate">
   <ul class="pagination justify-content-end">
         <?= $button_pagination ?>
   </ul>
</div>
<!--end button phân trang -->