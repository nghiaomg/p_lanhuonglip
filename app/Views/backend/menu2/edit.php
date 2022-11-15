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
            <form action="" class="parsley-examples" method="post" enctype='multipart/form-data'>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Chọn thư mục gốc</label>
                        <select name="data_post[parentid]" id="" class="form-control">
                            <option value="0">Chọn thư mục gốc</option>
                            <?= $menu ?>
                        </select>
                        <p class="text-danger"><?= $errors?$errors['parentid']:'' ?></p>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="">Loại danh mục</label>
                                    <select name="data_post[type]" class="form-control" id="type">
                                        <option value="0" <?= $datas['type']==0?'selected':'' ?>>Liên kết</option>
                                        <option value="1" <?= $datas['type']==1?'selected':'' ?>>Bài viết</option>
                                        <option value="2" <?= $datas['type']==2?'selected':'' ?>>Tin bds</option>
                                        <option value="3" <?= $datas['type']==3?'selected':'' ?>>Link tĩnh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="form-group" id="lienket">
                                    <label for="">Link</label>
                                    <input type="text" class="form-control"  value="<?php if(isset($datas['link']) && $datas['link']!=''){ echo $datas['link']; }?>" id="link" name="link">
                                </div>
                                <div class="form-group" id="link_tinh">
                                    <label for="">Link tĩnh</label>
                                    <select name="link_static" class="form-control" id="link_html_show">
                                        <?= $select_link ?>
                                    </select>
                                </div>
                                <div id="selectCategory">
                                    <label for="inputName" class="control-label">Thư mục gốc</label>
                                    <select class="form-control select2" name="data_post[categoryid]" id="categoryid">
                                        <?= $dataSelect ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox checkbox-purple">
                            <input id="publish" type="checkbox" value="1" <?= $datas['publish']==1?'checked':'' ?>  name="data_post[publish]">
                            <label for="publish">Hiển thị</label>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" id="name"  required oninvalid="this.setCustomValidity('Vui lòng nhập tiêu đề')" oninput="this.setCustomValidity('')" value="<?= $datas['name'] ?>" name="data_post[name]">
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề (Tiếng anh)</label>
                        <input type="text" class="form-control" id="name" value="<?= $datas['name_en'] ?>" name="data_post[name_en]">
                    </div>
                </div>
            </div>
                <div class="form-group text-right mb-0 col-lg-6">
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
<script>
    $(document).ready(function(){
        var checkShowCate = $('#type').val();
       
        if(checkShowCate == 0) {
            $("#lienket").show();
            $("#link_tinh").hide();
            $("#selectCategory").hide();
            $("#link_html_show option:selected").removeAttr('selected');

        } 
        if (checkShowCate == 3) {
            var value = $("#link_static").val();
            $('#lienket').hide();
            $('#link_html').show();
            $("#selectCategory").hide();
            $("input[name*='link']").val("");
        }
        else if(checkShowCate == 1 || checkShowCate == 2){
            $('#lienket').hide();
            $("#link_tinh").hide();
            $("#selectCategory").show();
        }
        $("#type").change(function(){
            var type = $("#type").val();
           if (type == 0) {
                $("#link_tinh").hide();
                $("#lienket").show();
                $("#selectCategory").hide();
                $("#link_html_show option:selected").removeAttr('selected');
           }
           else if(type == 3){
                $("#link_tinh").show();
                $("#lienket").hide();
                $("#link").val("");
                $.ajax({
                    url:"cpanel/menu/showLink",
                    method:"post",
                    dataType: 'json',
                    success:function(res) {
                    if(res.success > 0){
                        $("#lienket").hide();
                        $("#link_tinh").show();
                        $("#selectCategory").hide();
                        $('#link_html_show').html(res.resDataSelect);
                    }
                },
                });
           }
           else{
            // $("#link_tinh").hide();
            // $("#lienket").hide();
            // $("#selectCategory").show();
            $.ajax({
                url:"cpanel/menu/showType",
                method:"post",
                dataType: 'json',
                data: {
                        type: type
                },
                success:function(res) {
                if(res.success > 0){
                    $("#lienket").hide();
                    $("#link_tinh").hide();
                    $("#selectCategory").show();
                    $('#categoryid').html(res.resDataSelect);
                }
            }
            });
           }
        });
        // $("#type").trigger("change");
        $("#link_html_show").change(function(e){
            var e = document.getElementById('link_html_show');
            var SelectT = e.options[e.selectedIndex].text;
            if ($("#link_html_show").val() !='') {
               $("#name").val(SelectT);
            }
            else{
                $("#name").val("");
            }
        });
        $("#categoryid").change(function(e){
            var e = document.getElementById('categoryid');
            var SelectT = e.options[e.selectedIndex].text;
             var name = SelectT.replace(/[-+]/g,"");
            if ($("#categoryid").val() !='') {
               $("#name").val(name);
            }
            else{
                $("#name").val("");
            }
        });
    });
</script>
<script src="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
