<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<link rel="stylesheet" href="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
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
            <?php /*<ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                    <a href="#vn" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        <span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
                        <span class="d-none d-sm-block">Tiếng việt</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#en" data-toggle="tab" aria-expanded="true" class="nav-link">
                        <span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
                        <span class="d-none d-sm-block">Tiếng Anh</span>
                    </a>
                </li>
            </ul>*/?>
            <form action="" class="parsley-examples" method="post" enctype='multipart/form-data'>
                <div class="tab-content">
                    <!--tab home -->
                    <div class="tab-pane active" id="vn">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                        <label for="">Tiêu đề</label>
                                        <input type="text" autocomplete="off" id="name" class="form-control" value="<?= $datas?$datas['name']:'' ?>" data-control="<?= $control ?>" placeholder="Tiêu đề" name="data_post[name]">
                                </div>
                                <?php /*<div class="form-group">
                                    <label for="">Tiêu đề 2</label>
                                    <input type="text"  autocomplete="off" required="" id="name2" class="form-control" value="<?= $datas?$datas['name2']:'' ?>" data-control="<?= $control ?>" placeholder="Tiêu đề" name="data_post[name2]">
                                </div>
                                <div class="form-group">
                                        <label for="">Mô tả</label>
                                        <textarea type="text"  autocomplete="off" required="" id="text_des" rows="5" class="form-control" placeholder="Mô tả" name="data_post[text_des]"><?=$datas['text_des']?></textarea>
                                </div>*/?>
                                <div class="form-group">
                                    <label for="">Banner (kích thước 1690 x 680px)</label>
                                    <div class="logo_image">
                                        <div class="image_box">
                                            <a href="javascript:void(0)" class="btn btn-danger" onclick="del_image(<?=$datas['id'] ?>,'<?= $control ?>')"><i class="icon-trash"></i></a>
                                            <img id="preview" src="<?= file_exists($path_dir_thumb.$datas['thumb']) && $datas['thumb'] !=''?$path_dir_thumb.$datas['thumb']:'assets/images/no_img.png' ?>" alt="Ảnh đại diện" title=''/>
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
                                    <input type="checkbox" value="1"  name="data_post[publish]"   <?= $datas['publish']==1?'checked':'' ?> id="publish<?= $datas['id'] ?>" class="" >
                                    <label class="ml-2" for="checkbox6a">Hiển thị</label>
                                </div>
                                
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea type="text"  autocomplete="off" id="text_des" rows="5" class="form-control" placeholder="Mô tả" name="data_post[text_des]"><?=$datas['text_des']?></textarea>
                                </div>
                                <div class="form-group"> 
                                    <label>Tên link</label>
                                    <input type="text" id="text_link" class="form-control" name="data_post[text_link]"  value="<?= $datas?$datas['text_link']:'' ?>"  placeholder="Tên link">
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" id="Link" class="form-control" value="<?= $datas?$datas['link']:'' ?>" name="data_post[link]"  placeholder="Link">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="en">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Tiêu đề</label>
                                    <input type="text"  autocomplete="off"  value="<?= $datas?$datas['name_en']:'' ?>" id="name" class="form-control" data-control="<?= $control ?>" placeholder="Tiêu đề" name="data_post[name_en]">
                                </div>
                                <div class="form-group">
                                    <label for="">Mô tả</label>
                                    <textarea type="text"  autocomplete="off"  rows="5" id="text_des" class="form-control" placeholder="Mô tả" name="data_post[text_des_en]"><?= $datas?$datas['name_en']:'' ?></textarea>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            <div class="clear height20"></div>
            <div class="form-group text-left mb-0 col-lg-6">
                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                    Lưu
                </button>
                <button type="reset" class="btn btn-secondary waves-effect waves-light mr-1">
                    Làm lại
                </button>
                <a href="<?= CPANEL.$control ?>" class="btn btn-info">Trở lại</a>
            </div>
            </form>
        </div> <!-- end card-box -->
    </div>
    <!-- end col -->
</div>
<script>
    $(document).ready(function() {
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
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
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
