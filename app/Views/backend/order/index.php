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
                <div class="row d-flex justify-content-between">
                    <div class="col-auto">
                        <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#exportModal"><i class="icon-arrow-down-circle"></i> Export Excel</a>
                        <a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa tất cả</a>
                        <a href="<?= CPANEL . $control . "/index" ?>" class="btn btn-info"><i class="icon-refresh"></i></a>
                    </div>
                    <div class="col-4 d-flex">
                        <input type="text" id="search" class="form-control mr-2" placeholder="Nhập số điện thoại hoặc họ tên" value="">
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
                <?= $this->include('backend/order/loadTable') ?>
            </div>
            <!------/ loadTable ------>
        </div>
    </div>
</div>
<?= $this->include('backend/order/export') ?>


<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script language="JavaScript">
    function toggle(source) {
        checkboxes = document.getElementsByName('foo');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
<script>
    $(document).ready(function () {
        $('.times').daterangepicker({
            startDate: moment().subtract(0, 'days'),
            endDate: moment(),
            dateLimit: {
                days: 60
            },
            showDropdowns: true,
            showWeekNumbers: false,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            // ranges: {
            //     'Today': [moment(), moment()],
            //     'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            //     'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            //     'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            //     'This Month': [moment().startOf('month'), moment().endOf('month')],
            //     'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            // },
            opens: 'left',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-success',
            cancelClass: 'btn-light',
            separator: ' to ',
            locale: {
                format: 'DD/MM/YYYY',
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        });
    });
    const url_paging_search = "cpanel/order/search_pagination";
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
<script>
    function view_detail(id){
        $.ajax({
            url:"cpanel/order/view_detail",
            method:"post",
            data:{id:id},
            success:function(response){
                if(response){
                    $('#myModal').modal({
                        showClose: true
                    });
                    $('.modal-body').html(response);
                }
            }
        })
    }
</script>