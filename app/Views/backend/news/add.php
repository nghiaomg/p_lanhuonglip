<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<link rel="stylesheet" href="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
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
                        <label for="">Thuộc danh mục</label>
                        <select name="data_post_cateid[cateid][]" data-toggle="select2" class="form-control select2 select2-multiple" multiple="multiple" data-placeholder="Chọn">
                            <?= $menu; ?>
                        </select>
                    </div>
                    <div class="form-group">
                            <label for="">Tiêu đề</label>
                            <input type="text" onkeyup="createSlug(this);" required="" oninvalid="this.setCustomValidity('Vui lòng nhập tiêu đề')" oninput="this.setCustomValidity('')" autocomplete="off" id="name" class="form-control" data-control="<?= $control ?>" placeholder="Tiêu đề" name="data_post[name]">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" id="alias" class="form-control" name="data_post[alias]"  placeholder="Slug">
                    </div>
                    <div class="form-group">
                        <div class="logo_image">
                            <label for="userName">Ảnh đại diện (Kích thước chuẩn: 800 x 465px)<span class="text-danger">*</span></label>
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
                        <?php /*<script>
                            CKEDITOR.replace('data_post[des]', {
                                toolbar: [                                  
                                    { name: 'styles', items : [ 'Styles','Format','Font','FontSize'] },
                                    { name: 'colors', items : [ 'TextColor','BGColor' ] },
                                    { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
                                    '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
                                    ['Bold','Italic','Strike'],['SelectAll','RemoveFormat'],
                                ]
                            });
                        </script> */?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Title</label>
                        <span class="text-primary">(Tiêu đề trang hiệu quả nhất dài khoảng 10-70 ký tự, bao gồm cả khoảng trắng.)</span>
                        <strong><span id="numTitle">0</span></strong> ký tự
                        <input type="text" onkeyup="countNumberTitle()" id="title" class="form-control" name="data_post[title]"  placeholder="Tiêu đề">
                    </div>
                    <div class="form-group">
                        <label>Meta keywords</label><textarea class="form-control" name="data_post[meta_keywords]" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Meta Descriptions</label>
                        <div class="clear"></div>
                        <span class="text-primary">(Descriptions trang hiệu quả nhất dài khoảng 160-300 ký tự, bao gồm cả khoảng trắng.)</span>
                            <strong><span id="numDescriptions">0</span></strong> ký tự
                        <textarea class="form-control"onkeyup="countNumberDescriptions()" id="meta_description" name="data_post[meta_descriptions]" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label  class="control-label">Tags</label>
                        <input type="text" class="form-control" id="tags" name="data_post[tags]" data-role="tagsinput">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">
                                    <label for="checkbox6" class=" col-form-label ml-3"> Thêm menu </label>
                                    <button type="button" onclick="AddMenu('parent',this)" class="btn btn-dark waves-effect waves-light ml-2" type="checkbox"><i class="fas fa-folder-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div id="parentMenu">
                                    <div class="row items_menu" data-arr = "0">
                                        <div class="col-lg-4">
                                            <label for="">Tiêu đề</label>
                                            <input type="text" class="form-control" onkeyup="removeAccents(this,0)" name="data_parent[0][title]" placeholder="Tiêu đề">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="">Từ khóa</label>
                                            <input type="text" class="form-control" id="keywords0" name="data_parent[0][keyword]" placeholder="Từ khóa">
                                        </div>
                                        <div class="col-lg-1">
                                            <label for="">STT</label>
                                            <input type="text" class="form-control text-center" value="1" name="data_parent[0][number]">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="">&nbsp;</label>
                                            <div style="display:flex">
                                                <a class="btn btn-danger mr-2" onclick="DeleteMenu('parent',this)" href="javascript:void(0)">Xóa</a>
                                                <a class="btn btn-info" onclick="AddMenu('submenu',this)" href="javascript:void(0)">Thêm</a>
                                            </div>
                                        </div>
                                        <div id="submenu" class="ml-4 mt-2 col-lg-12">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea name="data_post[content]" id="" class="form-control ckeditor" cols="30" rows="5"></textarea>
                    </div>
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
                <a href="<?= CPANEL.$control ?>" class="btn btn-info">Trở lại</a>
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
    });
    $(".select2").select2({
        tags: true
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
    function AddMenu(type,__this){
        let count = document.querySelectorAll('.items_menu').length - 1;
        if (type ==="parent") {
            count++;
            $('#parentMenu').append(`
                <div class="row items_menu mt-2" data-arr = "${count}">
                    <div class="col-lg-4">
                        <label for="">Tiêu đề</label>
                        <input type="text" class="form-control" onkeyup="removeAccents(this,${count})" name="data_parent[${count}][title]" placeholder="Tiêu đề">
                    </div>
                    <div class="col-lg-4">
                        <label for="">Từ khóa</label>
                        <input type="text" class="form-control" id="keywords${count}" name="data_parent[${count}][keyword]" placeholder="Từ khóa">
                    </div>
                    <div class="col-lg-1">
                        <label for="">STT</label>
                        <input type="text" class="form-control text-center" value="${count + 1}" name="data_parent[${count}][number]">
                    </div>
                    <div class="col-lg-3">
                        <label for="">&nbsp;</label>
                        <div style="display:flex">
                            <a class="btn btn-danger mr-2" onclick="DeleteMenu('parent',this)" href="javascript:void(0)">Xóa</a>
                            <a class="btn btn-info" onclick="AddMenu('submenu',this)" href="javascript:void(0)">Thêm</a>
                        </div>
                    </div>
                    <div id="submenu" class="ml-4 mt-2 col-lg-12">
                    </div>
                </div>
            `);
        }
        else if(type==="submenu"){
            let counts = $(__this).closest('.items_menu').attr('data-arr');
            let parse = parseInt(counts);
            let count_sub = document.querySelectorAll('.items__sub'+parse).length - 1;
            $(__this).closest('.items_menu').find('#submenu').append(`
            <div class="row items__sub${parse} mt-1">
                <div class="col-lg-4">
                    <label for="">Tiêu đề</label>
                    <input type="text" class="form-control" onkeyup="removeAccents2(${parse},this)" name="data_parent[${counts}][sub][${count_sub + 1}][title]" placeholder="Tiêu đề">
                </div>
                <div class="col-lg-4">
                    <label for="">Từ khóa</label>
                    <input type="text" class="form-control" id="subkeyword${parse}"  name="data_parent[${counts}][sub][${count_sub + 1}][keyword]" placeholder="Từ khóa">
                </div>
                <div class="col-lg-1">
                    <label for="">STT</label>
                    <input type="text" class="form-control text-center" value="${count_sub + 1}" name="data_parent[${counts}][sub][${count_sub + 1}][number]">
                </div>
                <div class="col-lg-1">
                    <label for="">&nbsp;</label>
                    <div style="display:flex">
                        <a class="btn btn-danger mr-2" onclick="DeleteMenu('submenu',this)" href="javascript:void(0)">Xóa</a>
                    </div>
                </div>
            </div>
            `);
        }   
    }
    function DeleteMenu(type,__this){
        let counts = $(__this).closest('.items_menu').attr('data-arr');
        let parse = parseInt(counts);
        let count = document.querySelectorAll('.items_menu').length;
        if (type ==="parent") {
            count-- ;
            $(__this).closest('.items_menu').remove();
        }
        else if(type ==="submenu"){
            let count_sub = document.querySelectorAll('.items__sub').length - 1;
            count_sub--;
            $(__this).closest('.items__sub'+parse).remove();
        }
    }
    function removeAccents(str,num) {
        let substr = str.value;
        let count = document.querySelectorAll('.items_menu').length - 1;
        let count_sub = document.querySelectorAll('.items__sub').length;
        var AccentsMap = [
            "aàảãáạăằẳẵắặâầẩẫấậ",
            "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
            "dđ", "DĐ",
            "eèẻẽéẹêềểễếệ",
            "EÈẺẼÉẸÊỀỂỄẾỆ",
            "iìỉĩíị",
            "IÌỈĨÍỊ",
            "oòỏõóọôồổỗốộơờởỡớợ",
            "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
            "uùủũúụưừửữứự",
            "UÙỦŨÚỤƯỪỬỮỨỰ",
            "yỳỷỹýỵ",
            "YỲỶỸÝỴ"    
        ];
        for (var i=0; i<AccentsMap.length; i++) {
            var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
            var char = AccentsMap[i][0];
            substr = substr.replace(re, char);
            substr = substr.replace(/\s/g,'_');
        }
        $(str).closest('.items_menu').find('#keywords'+num).val(substr);
       
    }
    function removeAccents2(num,str) {
        let substr = str.value;
        let count_sub = document.querySelectorAll('.items__sub').length - 1;
        var AccentsMap = [
            "aàảãáạăằẳẵắặâầẩẫấậ",
            "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
            "dđ", "DĐ",
            "eèẻẽéẹêềểễếệ",
            "EÈẺẼÉẸÊỀỂỄẾỆ",
            "iìỉĩíị",
            "IÌỈĨÍỊ",
            "oòỏõóọôồổỗốộơờởỡớợ",
            "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
            "uùủũúụưừửữứự",
            "UÙỦŨÚỤƯỪỬỮỨỰ",
            "yỳỷỹýỵ",
            "YỲỶỸÝỴ"    
        ];
        for (var i=0; i<AccentsMap.length; i++) {
            var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
            var char = AccentsMap[i][0];
            substr = substr.replace(re, char);
            substr = substr.replace(/\s/g,'_');
            substr = substr.replace('.','_');
           
        }
        $(str).closest('.items__sub'+num).find('#subkeyword'+num).val(substr)
    }
</script>

<script src="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

