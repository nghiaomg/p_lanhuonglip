<!-- start page title -->
<link rel="stylesheet" href="assets/cpanel/customs/adduser.css">
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
            <form action="" class="parsley-examples" method="post" onsubmit="return checkform()" novalidate enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="fullname">Nhóm quyền<span class="text-danger">*</span></label>
                            <select name="data_post[id_role]" id="" class="form-control">
                                <option value="0">Chọn nhóm quyền</option>
                                <?php if (isset($role) && $role != NULL) { ?>
                                    <?php foreach ($role as $key => $val) { ?>
                                        <option value="<?= $val['id'] ?>" <?= $datas['id_role'] == $val['id'] ? 'selected' : '' ?>><?= $val['name'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="userName">Họ và tên<span class="text-danger">*</span></label>
                            <input type="text" name="data_post[fullname]" parsley-trigger="change" value="<?= $datas ? $datas['fullname'] : '' ?>" required placeholder="Họ và tên" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                            <label for="userName">Số điện thoại</label>
                            <input type="text" name="data_post[phone]" parsley-trigger="change" value="<?= $datas ? $datas['phone'] : '' ?>" placeholder="Số điện thoại" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                            <label for="userName">Email</label>
                            <input type="text" name="data_post[email]" parsley-trigger="change" value="<?= $datas ? $datas['email'] : '' ?>" placeholder="Email" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                            <label for="userName">Tài khoản<span class="text-danger">*</span></label>
                            <input type="text" name="data_post[username]" parsley-trigger="change" required placeholder="Tài khoản" class="form-control" id="userName" value="<?= $datas ? $datas['username'] : '' ?>">
                        </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-info">
                                <input id="active" type="checkbox" value="1" <?= $datas['active'] == 1 ? 'checked' : '' ?> name="data_post[active]">
                                <label for="active">Kích hoạt</label>
                            </div>
                        </div>
                        <div class="clear height20"></div>
                        <div class="clear height20"></div>
                    </div>
                    <div class="col-6">
                        <div class="image_avatar">
                            <div class="image_box">
                                <a href="javascript:void(0)" class="btn btn-danger" onclick="del_image(<?= $datas['id'] ?>,'<?= $control ?>')">Xóa ảnh</a>
                                <img id="preview" src="<?= file_exists($path_dir_thumb . $datas['thumb']) && $datas['thumb'] != '' ? $path_dir_thumb . $datas['thumb'] : 'assets/images/no_img.png' ?>" alt="Ảnh đại diện" title='Ảnh đại diện' />
                                <div>
                                    <label for="image">Chọn ảnh đại diện</label>
                                    <input type="file" onchange="checkfiles(this)" data-control="<?= $control ?>" name="image" id="image" />
                                </div>
                            </div>
                            <p class="text-danger text-center" id="msg"></p>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        Lưu
                    </button>
                    <a href="<?= CPANEL . $control ?>" class="btn btn-info">Trở về</a>
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
            console.log(event.target.files[0].name)
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
<script>
    var check;

    function checkfiles(_this) {
        var control = $("#image").attr('data-control');
        if (_this.files && _this.files[0]) {
            var formdata = new FormData();
            formdata.append('image', _this.files[0]);
            $.ajax({
                url: "cpanel/" + control + "/check_files",
                type: "post",
                data: formdata,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data) {
                        check = false;
                        $("#msg").html("chỉ hổ trợ PNG/JPEG/JPG");
                    } else {
                        $("#msg").html("");
                        check = true;
                    }
                }
            });
            $("#msg").html("");
        } else {
            check = false;
            $("#msg").html("Chưa có file");
        }
    }

    function checkform() {
        if (check == false) {
            return false;
        }
        return true;
    }
</script>