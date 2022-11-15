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
                            <label for="name">Từ khóa </label>
                            <input type="text" autocomplete="off" id="name" class="form-control"placeholder="Từ khóa" name="data_post[name]" value="<?= $datas != NULL ? $datas['name'] : ""; ?>">
                        </div>
                        <div class="form-group">
                            <label for="keys">Keys </label>
                            <input type="text" autocomplete="off" id="keys" class="form-control"placeholder="" name="data_post[key_constants]" value="<?= $datas != NULL ? $datas['key_constants'] : ""; ?>">
                        </div>
                        <div class="clear height20"></div>
                        <div class="form-group">
                            <div class="checkbox checkbox-purple">
                                <input id="checkbox6a" type="checkbox" value="1" <?= $datas['publish']==1?'checked':'' ?>  name="data_post[publish]">
                                <label for="checkbox6a">Hiển thị</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Từ khóa (Tiếng anh)</label>
                            <input type="text" autocomplete="off" id="name_en" class="form-control"  placeholder="Từ khóa (Tiếng anh)" name="data_post[name_en]" value="<?= $datas != NULL ? $datas['name_en'] : ""; ?>">
                        </div>
                    </div>
                </div>
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
<script>
    $(document).ready(function() {
        // Basic
        $("#image").change(function(event) {
            readURL(this);
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#image").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                    $('#preview').hide();
                    $('#preview').fadeIn(500);
                    // $('.custom-file-label').text(filename);             
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>