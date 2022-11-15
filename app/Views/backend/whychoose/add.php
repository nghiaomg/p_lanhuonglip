<!-- start page title -->
<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
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
    <div class="col-lg-6">
        <div class="card-box"> 
            <form action="" class="parsley-examples" method="post" novalidate enctype='multipart/form-data'>
                <div class="form-group">
                    <label for="userName">Tiêu đề<span class="text-danger">*</span></label>
                    <input type="text" name="data_post[name]" parsley-trigger="change" required placeholder="Tiêu đề" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="data_post[des]" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh</label>
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
                    <div class="checkbox checkbox-info">
                        <input id="checkbox6a" type="checkbox" checked value="1" name="data_post[publish]">
                        <label for="checkbox6a">Hiển thị</label>
                    </div>
                </div>
                <div class="form-group text-left mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        <i class="icon-cloud-upload font-15"></i> Lưu
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light mr-1">
                        Làm lại
                    </button>
                    <a href="<?= CPANEL.$control ?>" class="btn btn-info">Trở về</a>
                </div>
            </form>
        </div> <!-- end card-box -->
    </div>
    <!-- end col -->
</div>
<!-- Plugin js-->
<script src="assets/cpanel/libs/parsleyjs/parsley.min.js"></script>
<script src="assets/cpanel/js/pages/form-validation.init.js"></script>
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
    });
</script>