<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<link rel="stylesheet" href="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
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
        <?php if (session('msg')) : ?>
            <div class="alert alert-success alert-dismissible">
                <?= session('msg') ?>
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            </div>
        <?php endif ?>
        <?php if (session()->getFlashdata('success')) { ?>
            <p class="alert alert-success"><?= session()->getFlashdata('success') ?></p>
        <?php } ?>
        <?php if (session()->getFlashdata('error')) { ?>
            <p class="alert alert-danger"><?= session()->getFlashdata('error') ?></p>
        <?php } ?>
    </div>
    <div class="col-lg-12">
        <div class="card-box">
            <form action="" class="parsley-examples" method="post" novalidate enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Tiêu đề </label>
                            <input type="text" autocomplete="off" id="name" class="form-control"  placeholder="Tiêu đề" name="data_post[name]">
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ </label>
                            <input type="text" autocomplete="off" id="address" class="form-control"  placeholder="Địa chỉ" name="data_post[address]">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại </label>
                            <input type="text" autocomplete="off" id="phone" class="form-control"  placeholder="Số điện thoại" name="data_post[phone]">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" autocomplete="off" id="email" class="form-control"  placeholder="Email" name="data_post[email]">
                        </div>
                        <div class="form-group">
                            <label for="">Thời gian làm việc</label>
                            <input type="text" autocomplete="off" id="timework" class="form-control"  placeholder="Thời gian làm việc"   name="data_post[timework]" >
                        </div>
                        <div class="clear height20"></div>
                        <div class="form-group">
                            <div class="checkbox checkbox-purple">
                                <input id="checkbox6a" type="checkbox" value="1" checked name="data_post[publish]">
                                <label for="checkbox6a">Hiển thị</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear height20"></div>
                <div class="form-group text-left mb-0 col-lg-12 mt-1 d-flex justify-content-center">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        Lưu
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light mr-1">
                        Làm lại
                    </button>
                    <a href="<?= CPANEL . $control ?>" class="btn btn-info">Trở lại</a>
                </div>
            </form>
        </div> <!-- end card-box -->
    </div>
    <!-- end col -->
</div>
<script src="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>