<!-- third party css -->
<link href="assets/cpanel/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- sweetalert css -->
<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- Jquery Toast css -->
<link href="assets/cpanel/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Quản trị</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>
            <h4 class="page-title"><?= $title ?></h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="col-lg-12">
                        <div class="card-box2 clearfix">
                            <div class="form-group">
                                <a href="<?= CPANEL . $control . '/add' ?>" class="btn btn-info"><i class="icon-plus"></i>Thêm mới</a>
                                <!-- <a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa tất cả</a> -->
                                <a href="<?= CPANEL . $control . "/index" ?>" class="btn btn-info"><i class="icon-refresh"></i></a>
                            </div>
                            <!-- box thông báo -->
                            <div class="notify-alert">
                                <?php if (session()->getFlashdata('success')) { ?>
                                    <p class="alert alert-success"><i class="icon-check"></i> <?= session()->getFlashdata('success') ?></p>
                                <?php } ?>
                                <?php if (session()->getFlashdata('error')) { ?>
                                    <p class="alert alert-danger"><i class="icon-close"></i> <?= session()->getFlashdata('error') ?></p>
                                <?php } ?>
                            </div>
                            <!-- box thông báo END -->

                        </div>
                    </div> <!-- end col -->
                    <table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
                                <th>Từ khóa</th>
                                <th>Từ khóa ( Tiếng anh )</th>
                                <th>Key</th>
                                <th class="text-center nosort">Hiển thị</th>
                                <th class="text-center">Ngày tạo</th>
                                <th class="text-center nosort">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($datas) && $datas != null) { ?>
                                <?php foreach ($datas as $key => $val) { ?>
                                    <tr class="tr<?= $val['id'] ?>">
                                        <td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
                                        <td 
                                            style="max-width:300px;white-space:pre-wrap"
                                            ><?= $val['name'] ?>
                                        </td>
                                        <td style="max-width:300px;white-space:pre-wrap"><?= $val['name_en'] ?></td>
                                        <td><?= $val['key_constants'] ?></td>
                                        <td class="text-center">
                                            <input type="checkbox" onclick="changeglobal(<?= $val['id'] ?>,'publish')" <?= $val['publish'] == 1 ? 'checked' : '' ?> id="publish<?= $val['id'] ?>" class="" data-control="<?= $control ?>">
                                        </td>
                                        <td class="text-center"><?= date('d/m/Y', strtotime($val['created_at'])) ?></td>
                                        <td class="text-center">
                                            <!-- <a href="javascript:void(0)" onclick="del(<?= $val['id'] ?>)" class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control="<?= $control ?>"><i class="icon-trash"></i></a> -->
                                            <a href="<?= base_url(CPANEL . $control . '/edit') . '/' . $val['id'] ?>" class="btn btn-info btn-sm"><i class="icon-note"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
             <!-- End - List tab -->
        </div>
    </div>
</div>

<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
<script language="JavaScript">
    function toggle(source) {
        checkboxes = document.getElementsByName('foo');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
    $(document).ready(function(){
        $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('#myTab a[href="' + activeTab + '"]').tab('show');
        }
        // 
        $("#image").change(function(event) {  
        readURL(this);    
        });
        function readURL(input) {    
            if (input.files && input.files[0]) {   
                var reader = new FileReader();
                var filename = $("#image").val();
                filename = filename.substring(filename.lastIndexOf('\\')+1);
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                    $('#preview').hide();
                    $('#preview').fadeIn(500);
                    // $('.custom-file-label').text(filename);             
                }
                reader.readAsDataURL(input.files[0]);    
            }
            else{
                $('#preview').attr('src', "assets/images/no_img.png");
            } 
        }
   });
</script>