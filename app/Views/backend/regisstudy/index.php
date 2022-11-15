<!-- third party css -->
<link href="assets/cpanel/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- sweetalert css -->
<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- Jquery Toast css -->
<link href="assets/cpanel/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
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
        <div class="card-box clearfix">
            <div class="form-group">
                <div class="d-flex justify-content-between">
                    <div class="col-auto">
                        <a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa tất cả</a>
                        <a href="<?= CPANEL . $control . "/index" ?>" class="btn btn-info"><i class="icon-refresh"></i></a>
                    </div>
                    <div class="col-4 d-flex">
                        <input type="text" id="search" class="form-control mr-2" placeholder="Nhập số điện thoại" value="">
                        <button onclick="search(this)" class="btn btn-info btn-sm" ><i class="fas fa-search"></i></button>
                    </div>
                </div>
               
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
            <!------\ loadTable ------>
            <div id="loadTable">
                <?= $this->include('backend/'.$control.'/loadTable') ?>
            </div>
            <!------/ loadTable ------>

        </div>
    </div>
</div>
<script language="JavaScript">
    function toggle(source) {
        checkboxes = document.getElementsByName('foo');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
<script>
    const url_paging_search = "cpanel/regisstudy/search_pagination";
    // tìm kiếm
    function search(_this) {
        let  keyword   = $("#search").val();
         let data = {
            "page": 1,
            "keyword" :keyword
        }
        CallAjax(data, url_paging_search);
    }
    // click phân trang
    $(document).on('click', '.pagination .forClick a', function() {
        let  keyword   = $("#search").val();
        let url = url_paging_search;
        let page = $(this).attr('data-ci-pagination-page');
        let data = {
            "page": page,
            "keyword" :keyword
        }
        CallAjax(data, url_paging_search);
        event.preventDefault();
    });
    // ajax dùng chung
    function CallAjax(data, url) {

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            // dataType: "JSON",
            success: function(res) {
                 $("#loadTable").html(res);
            }
        });
    }
</script>