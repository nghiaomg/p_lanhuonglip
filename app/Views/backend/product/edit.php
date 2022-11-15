<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<link rel="stylesheet" href="assets/cpanel/customs/progress.css">
<link rel="stylesheet" href="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
<script src="assets/js/plupload.full.min.js"></script>
<link rel="stylesheet" href="assets/Upload-image/Uploads.css">
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
            <form action="" class="parsley-examples" method="post" novalidate enctype='multipart/form-data'>
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Thuộc danh mục</label>
                                <select name="data_post[cateid]" class="form-control" id="">
                                    <option value="0">Chọn danh mục</option>
                                    <?= $menu; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Mã sản phẩm</label>
                                <input type="text" onkeyup="checkcode(<?= $datas['id'] ?>,this);" required="" oninvalid="this.setCustomValidity('Vui lòng nhập tiêu đề')" value="<?= $datas?$datas['code']:'' ?>" oninput="this.setCustomValidity('')" autocomplete="off" id="code" class="form-control" data-control="<?= $control ?>" placeholder="Tiêu đề" name="data_post[code]">
                                <small id="message"></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Tiêu đề</label>
                        <input type="text" onkeyup="createSlug(this);" value="<?= $datas?$datas['name']:'' ?>" autocomplete="off" id="name" class="form-control" data-control="<?= $control ?>" placeholder="Tiêu đề" name="data_post[name]">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" id="alias" class="form-control" value="<?= $datas?$datas['alias']:'' ?>" name="data_post[alias]"  placeholder="Slug">
                    </div>
                    <div class="form-group">
                        <label for="userName">Ảnh đại diện (Kích thước chuẩn: 800 x 800px)<span class="text-danger">*</span></label>
                        <div class="logo_image">
                            <div class="image_box">
                                 <a href="javascript:void(0)" class="btn btn-danger delele_image" onclick="del_image(<?= $datas['id'] ?>,'<?= $control ?>')">Xóa ảnh</a>
                                <?php  $pathImg = base_url().'/assets/images/no_img.png';
                                    if($datas['webps_thumb']){ 
                                        $pathImg = 'uploads/images/product/'.$datas['thumb'];
                                    }
                                ?>
                                <img id="preview" src="<?= $pathImg ?>" alt="Ảnh đại diện" title=''/>
                            </div>
                            <div>
                                <label for="image">Chọn file</label>
                                <input type="file" name="images" id="image"/>
                            </div>
                        </div>  
                    </div>
                    <div class="clear height20 m-2"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <div class="checkbox checkbox-purple">
                                    <input id="checkbox6a" type="checkbox" value="1" <?= $datas['publish']==1?'checked':'' ?> name="data_post[publish]">
                                    <label for="checkbox6a">Hiển thị</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php /*<div class="col-lg-12">
                        <div class="form-group row mt-3">
                            <button type="button" onclick="ActionAdd('add',this)" class="btn btn-dark waves-effect waves-light ml-2" type="checkbox"><i class="fas fa-folder-plus"></i></button>
                        </div>
                        <div class="form-group">
                            <div id="multi_content">
                                <?php if(isset($properties) && $properties !=NULL){?>
                                    <?php foreach($properties as $key => $val){?>
                                        <div class="row mb-3 form__items">
                                            <div class="col-4">
                                                <label for="">Tiêu đề</label>
                                                <input type="text" class="form-control" value="<?= $val['name'] ?>" placeholder ="Nội dung" name="data_content[<?= $key ?>][name]">
                                            </div>
                                            <div class="col-4">
                                                <label for="">Dữ liệu</label>
                                                <input type="text" class="form-control" value="<?= $val['data'] ?>"  placeholder ="Nội dung" name="data_content[0][data]">
                                            </div>
                                            <div class="col-2">
                                                <label for="">Số thứ tự</label>
                                                <input type="text" class="form-control text-center" value="<?= $val['number'] ?>" name="data_content[<?= $key ?>][number]">
                                            </div>
                                            <div class="col-2 d-flex align-items-end">
                                                <button type="button" onclick="ActionAdd('delete',this)" class="del_btn btn btn-dark waves-effect waves-light"> <i class="fas fa-trash-alt "></i></button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div> */?>
                    <div class="form-group">
                        <label for="">Mô tả</label>
                        <textarea name="data_post[des]" id="" class="form-control" cols="30" rows="5"><?= $datas?$datas['des']:'' ?></textarea>
                        <script>
                            CKEDITOR.replace('data_post[des]', {
                                toolbar: [                                  
                                    { name: 'styles', items : [ 'Styles','Format','Font','FontSize'] },
                                    { name: 'colors', items : [ 'TextColor','BGColor' ] },
                                    { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
                                    '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
                                    ['Bold','Italic','Strike'],['SelectAll','RemoveFormat'],
                                ]
                            });
                        </script>
                    </div>
                    <hr/>
                    <h4 class="mb-3">Thông tin khác</h4>
                    <?php if(isset($productinfos) && $productinfos != NULL){ ?>
                        <div class="row">
                            <?php foreach ($productinfos as $key_productinfo => $val_productinfo) { ?>
                                <div class="col-6">
                                    <div class="form-group mb-0">
                                        <div class="checkbox checkbox-purple">
                                            <input
                                                <?php if(isset($infoorthers) && $infoorthers != NULL){ ?>
                                                    <?php foreach ($infoorthers as $key_infoorther => $val_infoorther) { ?>
                                                        <?php if($val_infoorther == $val_productinfo['id']){ ?>
                                                            checked
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            id="productinfo<?=$val_productinfo['id']?>" onclick="chooseproductinfo(<?=$val_productinfo['id']?>)" type="checkbox" value="<?=$val_productinfo['id']?>" name="data_post_productinfo[]">
                                            <label for="productinfo<?=$val_productinfo['id']?>"><?=$val_productinfo['name']?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <hr/>
                </div>
                <div class="col-6">
                    <h4 class="header-title">Cấu hình giá</h4>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Giá bán</label>
                                <div class="input-group">
                                    <input type="text" value="<?= $datas?$datas['price']:'' ?>" id="price" class="form-control" name="data_post[price]" data-toggle="input-mask" data-mask-format="000.000.000.000.000" data-reverse="true">
                                    <div class="input-group-append">
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Giá khuyến mãi</label>
                                <div class="input-group">
                                    <input type="text" value="<?= $datas?$datas['price_sale']:'' ?>" id="price_sale" class="form-control" name="data_post[price_sale]" data-toggle="input-mask" data-mask-format="000.000.000.000.000" data-reverse="true">
                                    <div class="input-group-append">
                                        <span class="input-group-text">VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <h4 class="header-title">Khu vựcTối ưu SEO</h4>
                    <hr/>
                    <div class="form-group">
                        <label>Title</label>
                        <span class="text-primary">(Tiêu đề trang hiệu quả nhất dài khoảng 10-70 ký tự, bao gồm cả khoảng trắng.)</span>
                        <strong><span id="numTitle">0</span></strong> ký tự
                        <input type="text" onkeyup="countNumberTitle()" id="title"value="<?= $datas?$datas['title']:'' ?>" class="form-control" name="data_post[title]"  placeholder="Tiêu đề">
                    </div>
                    <div class="form-group">
                        <label>Meta keywords</label><textarea class="form-control" name="data_post[meta_keywords]" rows="5"><?= $datas?$datas['meta_keywords']:'' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Meta Descriptions</label>
                        <div class="clear"></div>
                        <span class="text-primary">(Descriptions trang hiệu quả nhất dài khoảng 160-300 ký tự, bao gồm cả khoảng trắng.)</span>
                            <strong><span id="numDescriptions">0</span></strong> ký tự
                        <textarea class="form-control"onkeyup="countNumberDescriptions()" id="meta_description" name="data_post[meta_descriptions]" rows="5"><?= $datas?$datas['meta_descriptions']:'' ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh chi tiêt (Kích thước chuẩn: 800 x 800px)</label>
                        <div class="form-group">
                            <div class="image_detail">
                            </div>
                        </div>
                        <div class="row">
                            <?php if (isset($photolist) && $photolist != NULL) { ?>
                                <?php foreach ($photolist as $key_photolist => $val_photolist) { ?>
                                    <div class="col-md-3 form-group item_<?php echo $val_photolist['id']; ?>">
                                        <div class="item_drop box-list-img">
                                            <img src="<?=$val_photolist['webps_thumb']; ?>" width="100%">
                                            <!-- <img src="<?php echo $path_dir_thumb . 'detail/';
                                                        echo $val_photolist['thumb']; ?>" width="100%"> -->
                                            <a class="btn btn-danger btn-sm text-white btn-block" onclick="delDropzon(<?php echo $val_photolist['id']; ?>);"><i class="icon-trash"></i> Xóa</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>Ưu điểm sản phẩm</label>
                        <input type="text" id="subject" class="form-control" name="data_post[subject]" value="<?= $datas?$datas['subject']:'' ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="text" id="subject2" class="form-control" name="data_post[subject2]" value="<?= $datas?$datas['subject2']:'' ?>">
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="text" id="subject3" class="form-control" name="data_post[subject3]" value="<?= $datas?$datas['subject3']:'' ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>Thông tin khác</label>
                        <input type="text" id="orther" class="form-control" name="data_post[orther]" value="<?= $datas?$datas['orther']:'' ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <input type="text" id="orther2" class="form-control" name="data_post[orther2]" value="<?= $datas?$datas['orther2']:'' ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <div class="logo_image">
                            <label for="userName">Ảnh (Kích thước chuẩn: 800 x auto)<span class="text-danger">*</span></label>
                            <div class="image_box">
                                 <a href="javascript:void(0)" class="btn btn-danger delele_image" onclick="del_image2(<?= $datas['id'] ?>,'<?= $control ?>', 'orther_img', 'orther_thumb', 'preview_orther')">Xóa ảnh</a>
                                <?php  $pathImg = base_url().'/assets/images/no_img.png';
                                    if($datas['orther_thumb']){ 
                                        $pathImg = 'uploads/images/product/'.$datas['orther_thumb'];
                                    }
                                ?>
                                <img id="preview_orther" src="<?= $pathImg ?>" alt="Ảnh đại diện" title=''/>
                            </div>
                            <div>
                                <label for="orther_img">Chọn file</label>
                                <input type="file" name="orther_img" id="orther_img"/>
                            </div>
                        </div>  
                    </div>
                    <div class="clear height20 m-2"></div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <div class="logo_image">
                            <label for="userName">Ảnh (Kích thước chuẩn: 800 x auto)<span class="text-danger">*</span></label>
                            <div class="image_box">
                                 <a href="javascript:void(0)" class="btn btn-danger delele_image" onclick="del_image2(<?= $datas['id'] ?>,'<?= $control ?>', 'orther2_img', 'orther2_thumb', 'preview_orther2')">Xóa ảnh</a>
                                <?php  $pathImg = base_url().'/assets/images/no_img.png';
                                    if($datas['orther2_thumb']){ 
                                        $pathImg = 'uploads/images/product/'.$datas['orther2_thumb'];
                                    }
                                ?>
                                <img id="preview_orther2" src="<?= $pathImg ?>" alt="Ảnh đại diện" title=''/>
                            </div>
                            <div>
                                <label for="orther2_img">Chọn file</label>
                                <input type="file" name="orther2_img" id="orther2_img"/>
                            </div>
                        </div>  
                    </div>
                    <div class="clear height20 m-2"></div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Nội dung</label>
                        <textarea name="data_post[content]" id="" class="form-control ckeditor" cols="30" rows="5"><?= $datas?$datas['content']:'' ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Nội dung (2)</label>
                        <textarea name="data_post[content2]" id="" class="form-control ckeditor" cols="30" rows="5"><?= $datas?$datas['content2']:'' ?></textarea>
                    </div>
                </div>
            </div>
            <div class="clear height20"></div>
            <div class="form-group text-right mb-0 col-lg-6">
                <button class="btn btn-primary waves-effect waves-light mr-1" id="saveAdd" type="submit">
                    Cập nhật
                </button>
                <a href="<?= CPANEL.$control.'/edit'.'/'.$id ?>" class="btn btn-secondary mr-1">Hủy</a>
                <a href="<?= CPANEL.$control ?>" class="btn btn-info">Trở lại</a>
            </div>
            </form>
        </div> <!-- end card-box -->
    </div>
    <!-- end col -->
</div>
<!-- Plugins js -->
<script src="assets/cpanel/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
<script src="assets/cpanel/libs/autonumeric/autoNumeric-min.js"></script>

<!-- Init js-->
<script src="assets/cpanel/js/pages/form-masks.init.js"></script>
<script src="assets/Upload-image/Uploads.js"></script>
<script>
     $(document).ready(function() {
        $('.image_detail').Upload_Multiple({
            maxImage: 8,
            classInputFile: "multileImage",
            inputName: "image",                 // input name phải khác
            urlValidate: "validate-upload",
            inputCountFiles: "input1_count",    // input name cho bộ đếm phải khác
            defaultValidate: true,
            textUpload: "(click để tải ảnh hoặc kéo thả vào đây)",
            allowExtension: [{ ext: "jpg",  mime: "image/jpeg" }, { ext: "png", mime: "image/png" }],
            alertExtension: "Vui lòng chọn file hình png,jpg",
            alertMaxsize: "File không vượt quá 2MB",
            maxSize: 2
        });
    });
</script>
<script>
    window.addEventListener("load", function () {
        var uploader = new plupload.Uploader({
            runtimes: 'html5,html4',
            browse_button: 'uploads',
            url: '../../../../cpanel/course/move',
            chunk_size: '10mb',
            // OPTIONAL
            filters: {
            max_file_size: '50mb',
            mime_types: [{title: "Image files", extensions: "mp4"}]
            },
            init: {
            PostInit: function () {
                document.getElementById('progress_bar').innerHTML = '';
            },
            UploadFile: function(up,file) {
                up.setOption("params",{file_id:file.id});
            },
            FilesAdded: function (up, files,response) {
                plupload.each(files, function (file) {
                    document.getElementById('progress_bar').innerHTML += `<div class="progress_com" id="${file.id}"> <strong></strong></div>`;
                    document.getElementById('progress_bar').innerHTML += `<div class="progress_complete""> </div>`;
                });
                uploader.start();
            },
            UploadProgress: function (up, file) {
                document.querySelector('.progress_complete').style.width  =`${file.percent +'%'} `;
                document.querySelector('#progress_bar').style.display  ="flex";
                document.querySelector(`#${file.id} strong`).innerHTML = `<span>Đang tải ${file.percent}%</span>`;
                // document.querySelector(`#${file.id} strong`).style.width = `${file.percent}`;
                

            },
            FileUploaded:function(up, file, response){
                let data = JSON.parse(response.response);
                document.querySelector('input[name="fileVideo"]').value = data.info;
                document.querySelector('#previewvideo').setAttribute('src','uploads/video/course/'+data.info);
            },
            Error: function (up, err) {
                document.querySelector('#progress_bar').innerHTML = "Kích thước phải nhỏ hơn 50mb"
            },
            }
        });
        uploader.init();
    });
</script>
<script>
    $(document).ready(function() {
        // Basic
        $("#orther2_img").change(function(event) {
            readURLOrther2(this);
        });
        function readURLOrther2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#orther2_img").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    $('#preview_orther2').attr('src', e.target.result);
                    $('#preview_orther2').hide();
                    $('#preview_orther2').fadeIn(500);
                    // $('.custom-file-label').text(filename);             
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        //
        $("#orther_img").change(function(event) {
            readURLOrther(this);
        });
        function readURLOrther(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var filename = $("#orther_img").val();
                filename = filename.substring(filename.lastIndexOf('\\') + 1);
                reader.onload = function(e) {
                    $('#preview_orther').attr('src', e.target.result);
                    $('#preview_orther').hide();
                    $('#preview_orther').fadeIn(500);
                    // $('.custom-file-label').text(filename);             
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        //
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
    function delDropzon(id) {
        if (id != '') {
            $('.item_' + id).fadeOut();
            $.ajax({
                url: "cpanel/product/deldropzonebyID",
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
    function checkcode(id,value){
        var debounce;
        clearTimeout(debounce);
        debounce = setTimeout(() => {
            $.ajax({
                url:"cpanel/product/checkcodeEdit",
                method:"post",
                data:{id:id,code:value.value},
                dataType:'json',
                success:function(response){
                    if (response !== undefined) {
                        if (response[0].result ==="false") {
                            $('#'+response[0].type).closest('.form-group').find('#message').html(response[0].message);
                            $('#'+response[0].type).closest('.form-group').find('#message').css('color','red');
                            $('button#saveAdd').attr('disabled',true);
                        }
                        else if(response[0].result ==="true"){
                            $('#'+response[0].type).closest('.form-group').find('#message').html(response[0].message);
                            $('#'+response[0].type).closest('.form-group').find('#message').css('color','red');
                            $('button#saveAdd').attr('disabled',false);
                        }
                        
                    }
                }
            });
        }, 300);
       
    }
    function ActionAdd(type,__this){
		let elements = document.querySelectorAll('.form__items').length - 1;
		let count = 0;
		if (type==="add") {
			elements++;
			$('#multi_content').append(`
				<div class="row mb-3 form__items">
					<div class="col-4">
						<label for="">Tiêu đề</label>
						<input type="text" class="form-control" placeholder ="Nội dung" name="data_content[${elements}][name]">
					</div>
                    <div class="col-4">
                        <label for="">Dữ liệu</label>
                        <input type="text" class="form-control"  placeholder ="Nội dung" name="data_content[${elements}][data]">
                    </div>
					<div class="col-2">
						<label for="">Số thứ tự</label>
						<input type="text" class="form-control text-center" value ="${elements+1}" name="data_content[${elements}][number]">
					</div>
					<div class="col-2 d-flex align-items-end">
						<button type="button" onclick="ActionAdd('delete',this)" class="del_btn btn btn-dark waves-effect waves-light"> <i class="fas fa-trash-alt "></i></button>
					</div>
				</div>
			`);
		}
		else if(type==="delete"){
			elements--;
			$(__this).closest('.form__items').remove();
		}
	}
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
    function del_video(){
       let value = $('input[name="fileVideo"]').val();
       let input = document.querySelector('input[name="video"]').value = "";
        $.ajax({
            url:"cpanel/course/removeImage",
            method:"post",
            data:{video:value},
            success:function(response){
                if (response ==="success") {
                    $('#previewvideo').attr('src', "");
                    $('#progress_bar').hide();
                    $('#progress_bar').css('width','0'+'px');
                    $('input[name="fileVideo"]').val("");
                }
            }
        })
    }
</script>
<script>
    
</script>
<script src="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

