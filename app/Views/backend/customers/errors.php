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
            <!-- End - List tab -->
            <div class="tab-pane active" id="home">
                <div class="col-lg-12">
                    <div class="card-box2 clearfix">
                        <!-- box thông báo -->
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <?php if (session()->getFlashdata('dataErrors')) {?>
                                        <?php foreach(session()->getFlashdata('dataErrors') as $key => $val){?>
                                            <p class="text-danger"><strong>Dòng <?= $val['count'] ?></strong>: <?= ''.$val['messenger'] ?></li>
                                        <?php } ?>
                                <?php } ?>
                                <div class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-blue waves-effect waves-light" data-toggle="modal" data-target="#import">
                                        <i class="icon-cloud-upload mr-1"></i> Thử Import lại.
                                    </a>
                                    <a href="<?= CPANEL . $control . '/index' ?>" class="btn btn-blue waves-effect waves-light">
                                        <i class="icon-arrow-left-circle"></i> Quay về danh sách.
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- box thông báo END -->
                        
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
</div>
<?= $this->include('backend/customers/import') ?>