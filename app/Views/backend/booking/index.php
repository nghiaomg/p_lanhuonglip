<!-- third party css -->
<link href="assets/cpanel/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
<!-- sweetalert css -->
<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- Jquery Toast css -->
<link href="assets/cpanel/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<!-- start page title -->
<link rel="stylesheet" href="assets/cpanel/css/pagination.css">
<link rel="stylesheet" href="assets/cpanel/css/loading.css">
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
                        <a href="javascript:void(0)" class="btn btn-info" onclick="exportExcell()"><i class="icon-arrow-down-circle"></i> Export Excel</a>
                        <a href="javascript:void(0)" onclick="deleteAll('<?= $control ?>')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Xóa tất cả</a>
                        <a href="<?= CPANEL . $control . "/index" ?>" class="btn btn-info"><i class="icon-refresh"></i></a>
                    </div>
                    <div class="col-4 d-flex">
                        <input type="text" id="key_words" class="form-control mr-2" placeholder="Nhập số điện thoại hoặc họ tên" value="">
                        <button id="search" class="btn btn-info btn-sm" ><i class="fas fa-search"></i></button>
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
            <div class="loadTable">
                <?= $this->include('backend/booking/loadTable') ?>
            </div>
            <!------/ loadTable ------>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5>Thông tin khách hàng</h5>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- loading animation -->
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
<script language="JavaScript">
    const toggle = (source) {
        checkboxes = document.getElementsByName('foo');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
</script>
<script>
    $(document).ready(function () {
        let url = $('#tableBase_data').attr('url');
		let debound;
		let keyword = '';
		let page = 1;
		let data = {
			page:page,
			keyword:keyword
		};
		$('#search').click(function(e){
			keyword = $('#key_words').val();
			data = {
				keyword:keyword,
                page:page,
			}
			clearTimeout(debound)
			debound = setTimeout(() => {
				callback(data,url);
			}, 300);
		});
		$('.pagination .paginate_button  a').click(function(){
			page = $(this).attr('num-page');
			data = {
				keyword:keyword,
                page:page,
			}
			clearTimeout(debound);
			debound = setTimeout(() => {
				callback(data,url);
			}, 300);
		});
		function callback(data , url)
		{
			$.ajax({
				url:url,
				method:"post",
				data:data,
				success:function(response){
					$('.loadTable').html(response);
					$('.pagination .paginate_button  a').click(function(){
						page = $(this).attr('num-page');
						data = {
							keyword:keyword,
							page:page,
						}
						clearTimeout(debound);
						debound = setTimeout(() => {
							callback(data,url);
						}, 300);
					});
				}
			});
		}
    });
</script>
<script>
    function view_detail(id){
        $.ajax({
            url:"cpanel/booking/view_detail",
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
    function exportExcell(){
        let xhr = new XMLHttpRequest();
        document.querySelector('.loading').style.display = "unset";
        document.querySelector('.overlay_export').style.display = "unset";
        xhr.open('POST','cpanel/booking/exportExcel');
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