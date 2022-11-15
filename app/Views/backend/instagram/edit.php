<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<link rel="stylesheet" href="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
<link rel="stylesheet" href="assets/cpanel/libs/dropzone/dropzone.min.css">
<link rel="stylesheet" href="assets/cpanel/libs/select2/select2.min.css">
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
            <form action="" class="parsley-examples" method="post" enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" required="" oninvalid="this.setCustomValidity('Vui lòng nhập tên')" oninput="this.setCustomValidity('')" autocomplete="off" id="name" class="form-control" data-control="<?= $control ?>" placeholder="Nhập tên công trình..." name="data_post[name]" value="<?= $datas != NULL ? $datas['name'] : ""; ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Liên kết</label>
                            <input type="text" autocomplete="off" id="link" class="form-control" name="data_post[link]" value="<?= $datas != NULL ? $datas['link'] : ""; ?>">
                        </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-purple">
                                <input id="checkbox6a" type="checkbox" value="1" <?= $datas['publish'] == 1 ? 'checked' : '' ?> name="data_post[publish]">
                                <label for="checkbox6a">Hiển thị</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="logo_image">
                                <label for="userName">Ảnh đại diện (Kích thước chuẩn: 800 x 800px)<span class="text-danger">*</span></label>
                                <div class="image_box">
                                    <a href="javascript:void(0)" class="btn btn-danger delele_image" onclick="del_image(<?= $datas['id'] ?>,'<?= $control ?>')">Xóa ảnh</a>
                                    <img id="preview" src="<?= file_exists($path_dir_thumb . $datas['thumb']) && $datas['thumb'] != '' ? $path_dir_thumb . $datas['thumb'] : 'assets/images/no_img.png' ?>" alt="Ảnh đại diện" title='' />
                                </div>
                                <div>
                                    <label for="image">Chọn file</label>
                                    <input type="file" name="image" id="image" />
                                </div>
                            </div>
                            <p class="message"></p>
                        </div>
                    </div>
                  
                </div>
                <div class="clear height20"></div>
                <div class="form-group text-right mb-0 col-lg-6">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        Cập nhật
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

<script src="assets/cpanel/js/select-ajax-google.js"></script>
<script src="assets/cpanel/libs/dropzone/dropzone.min.js"></script>
<script src="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="assets/js/validator.js"></script>
<script src="assets/cpanel/libs/select2/select2.min.js"></script>
<script>
    Dropzone.options.MyDropzone = {
        addRemoveLinks: true,
        init: function() {
            myDropzone = this;
            this.on("drop", function(event) {
                //Put your ajax call here for upload image
            });
            this.on("complete", function(file) {
                console.log(file)
                $('.boxID').append('<input type="hidden" name="photoID[]" value="' + file.upload.uuid + '">');

            });
            /* Called after the file is uploaded and sucessful */
            this.on("sucess", function(file) {});
            /* Called before the file is being sent */
            this.on("sending", function(file, xhr, formData) {
                formData.append('uuid', file.upload.uuid);
            });
            this.on("removedfile", function(file) {
                $.ajax({
                    url: "cpanel/Construction/deldropzone",
                    type: "POST",
                    data: {
                        uuid: file.upload.uuid
                    }
                });
            });
        }
    }

    function delDropzon(id) {
        if (id != '') {
            $('.item_' + id).fadeOut();
            $.ajax({
                url: "cpanel/Construction/deldropzonebyID",
                type: "POST",
                data: {
                    id: id
                },
                success: function(res) {
                    console.log(res);
                }
            });
        }
    }
</script>
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
<script type="text/javascript">
    function countNumberTitle() {
        Str = $('#title').val();
        var count = Str.length;
        if (count >= 10 && count <= 70) {
            $('#numTitle').addClass('text-success');
            $('#numTitle').removeClass('text-danger');
            $('#numTitle').html(count);
        } else {
            $('#numTitle').removeClass('text-success');
            $('#numTitle').addClass('text-danger');
            $('#numTitle').html(count);
        }
    }

    function countNumberDescriptions(Str) {
        Str = $('#meta_description').val();
        var count = Str.length;
        if (count >= 160 && count <= 300) {
            $('#numDescriptions').addClass('text-success');
            $('#numDescriptions').removeClass('text-danger');
            $('#numDescriptions').html(count);
        } else {
            $('#numDescriptions').removeClass('text-success');
            $('#numDescriptions').addClass('text-danger');
            $('#numDescriptions').html(count);
        }
    }
</script>
<script src="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>