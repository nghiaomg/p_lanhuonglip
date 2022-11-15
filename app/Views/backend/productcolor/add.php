<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<link rel="stylesheet" href="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- start page title -->
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
            <p class="alert alert-success"><?= session()->getFlashdata('success') ?></p>
        <?php } ?>
        <?php if(session()->getFlashdata('error')){?>
            <p class="alert alert-danger"><?= session()->getFlashdata('error') ?></p>
        <?php } ?>
    </div>
    <div class="col-lg-12">
        <div class="card-box">
            <form action="" class="parsley-examples" method="post"  enctype='multipart/form-data'>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input type="text" onkeyup="createSlug(this);" required="" oninvalid="this.setCustomValidity('Vui lòng nhập tiêu đề')" oninput="this.setCustomValidity('')" autocomplete="off" id="name" class="form-control" data-control="<?= $control ?>" placeholder="Tiêu đề" name="data_post[name]">
                    </div>
                    <div class="form-group">
                        <label for="">Mã màu</label>
                        <div class="input-group colorpicker-default" data-color-format="rgb" data-color="#000000">
                            <input type="text" class="form-control" required="" id="color_code" class="form-control" name="data_post[color_code]" value="#000000">
                            <div class="input-group-append add-on">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Hình đại diện (Kích thước chuẩn: 800 x 800px)</label>
                        <div class="logo_image">
                            <div class="image_box">
                                <img id="preview" src="assets/images/no_img.png" alt="Ảnh đại diện" title=''/>
                            </div>
                            <div>
                                <label for="image">Chọn file</label>
                                <input type="file" name="image" id="image"/>
                            </div>
                        </div>  
                    </div>
                    <div class="clear height20"></div>
                    <div class="clear height20"></div>
                    <div class="form-group">
                        <div class="checkbox checkbox-purple">
                            <input id="checkbox6a" type="checkbox" value="1" checked name="data_post[publish]">
                            <label for="checkbox6a">Hiển thị</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="data_post[des]" id="" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Hình sản phẩm (01) (Kích thước chuẩn: 800 x 800px)</label>
                        <div class="logo_image">
                            <div class="image_box">
                                <img id="preview_1" src="assets/images/no_img.png" alt="Hình sản phẩm" title=''/>
                            </div>
                            <div>
                                <label for="image_1">Chọn file</label>
                                <input type="file" name="image_1" id="image_1"/>
                            </div>
                        </div>  
                    </div>
                    <div class="clear height20"></div>
                    <div class="clear height20"></div>
                    <div class="form-group">
                        <label for="">Hình sản phẩm (02) (Kích thước chuẩn: 800 x 800px)</label>
                        <div class="logo_image">
                            <div class="image_box">
                                <img id="preview_2" src="assets/images/no_img.png" alt="Hình sản phẩm" title=''/>
                            </div>
                            <div>
                                <label for="image_2">Chọn file</label>
                                <input type="file" name="image_2" id="image_2"/>
                            </div>
                        </div>  
                    </div>
                    <div class="clear height20"></div>
                    <div class="clear height20"></div>
                    <div class="form-group">
                        <label for="">Hình sản phẩm (03) (Kích thước chuẩn: 800 x 800px)</label>
                        <div class="logo_image">
                            <div class="image_box">
                                <img id="preview_3" src="assets/images/no_img.png" alt="Hình sản phẩm" title=''/>
                            </div>
                            <div>
                                <label for="image_3">Chọn file</label>
                                <input type="file" name="image_3" id="image_3"/>
                            </div>
                        </div>  
                    </div>
                    <div class="clear height20"></div>
                </div>
            </div>
            <div class="clear height20"></div>
            <div class="form-group text-right mb-0 col-lg-6">
                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                    Lưu
                </button>
                <button type="reset" class="btn btn-secondary waves-effect waves-light mr-1">
                    Làm lại
                </button>
                <a href="<?= CPANEL.$control ?>/index/<?=$productID?>" class="btn btn-info">Trở lại</a>
            </div>
            </form>
        </div> <!-- end card-box -->
    </div>
    <!-- end col -->
</div>
<!-- select2-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
                filename = filename.substring(filename.lastIndexOf('\\')+1);
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                    $('#preview').hide();
                    $('#preview').fadeIn(500);
                    // $('.custom-file-label').text(filename);             
                }
                reader.readAsDataURL(input.files[0]);    
            } 
        }
        // 
        $("#image_1").change(function(event) {  
            readURL_1(this);    
        });
        function readURL_1(input) {    
            if (input.files && input.files[0]) {   
                var reader = new FileReader();
                var filename = $("#image_1").val();
                filename = filename.substring(filename.lastIndexOf('\\')+1);
                reader.onload = function(e) {
                    $('#preview_1').attr('src', e.target.result);
                    $('#preview_1').hide();
                    $('#preview_1').fadeIn(500);
                    // $('.custom-file-label').text(filename);             
                }
                reader.readAsDataURL(input.files[0]);    
            } 
        }
        // 
        $("#image_2").change(function(event) {  
            readURL_2(this);    
        });
        function readURL_2(input) {    
            if (input.files && input.files[0]) {   
                var reader = new FileReader();
                var filename = $("#image_2").val();
                filename = filename.substring(filename.lastIndexOf('\\')+1);
                reader.onload = function(e) {
                    $('#preview_2').attr('src', e.target.result);
                    $('#preview_2').hide();
                    $('#preview_2').fadeIn(500);
                    // $('.custom-file-label').text(filename);             
                }
                reader.readAsDataURL(input.files[0]);    
            } 
        }
        // 
        $("#image_3").change(function(event) {  
            readURL_3(this);    
        });
        function readURL_3(input) {    
            if (input.files && input.files[0]) {   
                var reader = new FileReader();
                var filename = $("#image_3").val();
                filename = filename.substring(filename.lastIndexOf('\\')+1);
                reader.onload = function(e) {
                    $('#preview_3').attr('src', e.target.result);
                    $('#preview_3').hide();
                    $('#preview_3').fadeIn(500);
                    // $('.custom-file-label').text(filename);             
                }
                reader.readAsDataURL(input.files[0]);    
            } 
        }
        $('.colorpicker-default').colorpicker({
            format: 'hex'
        });
    });
    $(".select2").select2({
        tags: true
    });
</script>
<script src="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

