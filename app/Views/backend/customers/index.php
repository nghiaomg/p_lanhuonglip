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
<link rel="stylesheet" href="assets/cpanel/css/loading.css">
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
            <!-- End - List tab -->
            <div class="tab-pane active" id="home">
                <div class="col-lg-12">
                    <div class="card-box2 clearfix">
                        <div class="form-group">
                            <a href="<?= CPANEL . $control . '/add' ?>" class="btn btn-info"><i class="icon-plus"></i>Thêm mới</a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#import" class="btn btn-primary" title="import">Import từ excel <i class="fas fa-upload"></i></a>
                            <a href="javascript:void(0)" onclick="exportExcell()" class="btn btn-secondary" title="export">Xuất file excel <i class="fas fa-file-export"></i></a>
                            <a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa tất cả</a>
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

                <table id="datatable" class="table table-bordered  " style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center nosort"><input type="checkbox" onClick="toggle(this)"></th>
                            <th>Mã Khách hàng</th>
                            <th>Họ tên</th>
                            <th style="width:200px">Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Quốc tịch</th>
                            <th class="text-center">Ngày tạo</th>
                            <th class="text-center nosort">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($datas) && $datas != null) { ?>
                            <?php foreach ($datas as $key => $val) { ?>
                                <tr class="tr<?= $val['id'] ?>">
                                    <td class="text-center"><input type="checkbox" name="foo" class="checkbox" value="<?= $val['id'] ?>"></td>
                                    <td><?= $val['code'] ?></td>
                                    <td><?= $val['name'] ?></td>
                                    <td><?= $val['address'] ?></td>
                                    <td><?= $val['phone'] ?></td>
                                    <td><?= $val['email'] ?></td>
                                    <td><?= $val['country'] ?></td>
                                    <td class="text-center"><?= date('d/m/Y', strtotime($val['created_at'])) ?></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" onclick="del(<?= $val['id'] ?>)" class="btn btn-danger btn-sm" id="delete<?= $val['id'] ?>" data-control="<?= $control ?>"><i class="icon-trash"></i></a>
                                        <a href="<?= base_url(CPANEL . $control . '/edit') . '/' . $val['id'] ?>" class="btn btn-info btn-sm"><i class="icon-note"></i></a>
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
<div class="overlay_export"></div>
<div class="loading">
    <span style="--i:1"></span>
    <span style="--i:2"></span>
    <span style="--i:3"></span>
    <span style="--i:4"></span>
    <span style="--i:5"></span>
    <span style="--i:6"></span>
    <span style="--i:7"></span>
    <span style="--i:8"></span>
    <span style="--i:9"></span>
    <span style="--i:10"></span>
    <span style="--i:11"></span>
    <span style="--i:12"></span>
    <span style="--i:13"></span>
    <span style="--i:14"></span>
    <span style="--i:15"></span>
</div>
<?= $this->include('backend/customers/import') ?>
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
   function exportExcell(){
        let xhr = new XMLHttpRequest();
        document.querySelector('.loading').style.display = "unset";
        document.querySelector('.overlay_export').style.display = "unset";
        xhr.open('POST','cpanel/customers/exportExcel');
        xhr.responseType = "blob";
        xhr.onload = function(event){
            if (event.target.status == 200)
            {
                document.querySelector('.loading').style.display = "none";
                document.querySelector('.overlay_export').style.display = "none";
                var blob = event.currentTarget.response;
                var contentDispo = event.currentTarget.getResponseHeader('Content-Diposition');
                var filename = contentDispo.match(/filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/)[1];
                saveBlob(filename,blob);
            }
        }
        xhr.send();
    }
    function saveBlob(filename,blob){
        var a = document.createElement('a');
        a.href = window.URL.createObjectURL(blob);
        a.download = filename;
        a.dispatchEvent(new MouseEvent('click'));
    }
</script>