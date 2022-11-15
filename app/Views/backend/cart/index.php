<!-- start page title -->
<link rel="stylesheet" href="assets/cpanel/customs/system.css">
<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
<!-- third party css -->
<link href="assets/cpanel/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- sweetalert css -->
<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- Jquery Toast css -->
<link href="assets/cpanel/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Quản trị</a></li>
                    <li class="breadcrumb-item active"><?=$title?></li>
                </ol>
            </div>
            <h4 class="page-title"><?=$title?></h4>
        </div>
    </div>
</div>     
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <?php if (session('msg')) : ?>
            <div class="alert alert-success alert-dismissible">
                <?= session('msg') ?>
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            </div>
        <?php endif ?>
        <?php if(session()->getFlashdata('success')){?>
            <p class="notify-alert alert alert-success"><i class="icon-check"></i> <?= session()->getFlashdata('success') ?></p>
        <?php } ?>
        <?php if(session()->getFlashdata('error')){?>
            <p class="alert alert-danger"><?= session()->getFlashdata('error') ?></p>
        <?php } ?>
    </div>
    <div class="col-lg-12">
        <div class="card-box">
            <div class="form-group">
                <a href="<?= CPANEL.$control.'/add'.'/'.$id ?>" class="btn btn-info"><i class="icon-plus"></i>Thêm mới</a>
                <a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa tất cả</a>
                <a href="<?= CPANEL.$control.'/index/'.$id ?>" class="btn btn-info"><i class="icon-refresh"></i></a>
            </div>
            <table id="datatable" class="table table-bordered  dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="thead-light">
                    <tr>
                        <th width="60" class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
                        <th width="150">Mã Đ.Hàng</th>
                        <th width="350">Thông tin KH</th>
                        <th>P.Thức TT - Ghi chú</th>
                        <th width="150" class="text-center nosort">Trạng thái</th>
                        <th width="150" class="text-center nosort">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($datas) && $datas!= null){?>
                        <?php foreach($datas as $key => $val){?>
                            <tr class="tr<?= $val['id'] ?>">
                                <td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
                                <td width="100">
                                    #<?= $val['code'] ?> <br/>
                                    
                                </td>
                                <td>
                                    <strong>- Họ & tên:</strong> <?= $val['fullname'] ?><br/>
                                    <strong>- SĐT:</strong> <?= $val['phone'] ?><br/>
                                    <strong>- Email:</strong> <?= $val['email'] ?><br/>
                                    <strong>- Đ/c:</strong> <?= $val['address'] ?><br/>
                                </td>
                                <td>
                                    <strong>- P.Thức Thanh toán:</strong>
                                    <?php if($val['pay_method'] == 1){ ?>
                                        <span class="text-success mb-0">Thanh toán khi nhận hàng</span>
                                    <?php }else{ ?>
                                        <span class="text-info mb-0">Thanh toán chuyển khoản</span>
                                    <?php } ?><br/>
                                    <strong>- Ghi chú</strong><br/>
                                    <?= $val['note'] ?>
                                </td>
                                <td class="text-center">
                                    <select onchange="changeStatus(this, <?= $val['id'] ?>)">
                                        <option value="1" <?=$val['status']==1 ? 'selected' : '' ?>>Đơn hàng mới</option>
                                        <option value="2" <?=$val['status']==2 ? 'selected' : '' ?>>Đã xác nhận</option>
                                        <option value="3" <?=$val['status']==3 ? 'selected' : '' ?>>Đang đóng gói</option>
                                        <option value="4" <?=$val['status']==4 ? 'selected' : '' ?>>Đang giao</option>
                                        <option value="5" <?=$val['status']==5 ? 'selected' : '' ?>>Đã giao</option>
                                        <option value="6" <?=$val['status']==6 ? 'selected' : '' ?>>Đã hủy</option>
                                    </select>
                                </div>
                                <td class="text-center">
                                    <a href="javascript:void(0)" onclick="del(<?= $val['id'] ?>)" class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control = "<?= $control ?>"><i class="icon-trash"></i></a>
                                    <a href="javascript:void(0)" onclick="view(<?= $val['id'] ?>)" class="btn btn-info btn-sm" id="delete<?= $val['id'] ?>" data-control = "<?= $control ?>"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- end col -->
</div>
<!-- modal detail -->
<div class="modal modalcart" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div id="boxLoad">

        </div>                             
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
        </div>
    </div>
</div>


<script language="JavaScript">
    function view(id) {
        $.ajax({
            type: "POST",
            url: "fast-view-cart",
            data: {"id":id},
            success: function (res) {
                $("#boxLoad").html(res);
                $(".modalcart").modal("show");
            }
        });
    }
    function changeStatus(status, id){
        status = status.value;
        if(status){
            $.ajax({
                type: "POST",
                url: "cpanel/cart/changeStatus",
                data: {status: status, id: id},
                dataType: "json",
                success: function (res) {
                    if (res.rs == 1) {
                        $.toast({
                            text: "Cập nhật dữ liệu thành công!",
                            position: "top-right",
                            loaderBg: "#ff6849",
                            icon: "success",
                            hideAfter: 2000,
                            stack: 6,
                        });
                    } else {
                        $.toast({
                            text: "Cập nhật dữ liệu không thành công!",
                            position: "top-right",
                            loaderBg: "#F00",
                            icon: "error",
                            hideAfter: 2000,
                            stack: 6,
                        });
                    }
                }
            });
        }
    }
    function toggle(source) {
        checkboxes = document.getElementsByName('foo');
        for(var i=0, n=checkboxes.length;i<n;i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
