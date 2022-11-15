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
        <div class="card-box">
            <form action="" class="parsley-examples" method="post" onsubmit="return checkform()" novalidate enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="userName">Họ và tên<span class="text-danger">*</span></label>
                            <input type="text" name="data_post[fullname]" parsley-trigger="change"  value="<?= $datas?$datas['fullname']:'' ?>" required placeholder="Họ và tên" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                            <label for="userName">Số điện thoại<span class="text-danger">*</span></label>
                            <input type="text" name="data_post[phone]" parsley-trigger="change" value="<?= $datas?$datas['phone']:'' ?>" required
                                    placeholder="Số điện thoại" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                            <label for="userName">Email<span class="text-danger">*</span></label>
                            <input type="text" name="data_post[email]" parsley-trigger="change" value="<?= $datas?$datas['email']:'' ?>" required
                                    placeholder="Email" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                            <label for="userName">Tài khoản<span class="text-danger">*</span></label>
                            <input type="text" name="data_post[username]" parsley-trigger="change" required placeholder="Tài khoản" class="form-control" id="userName" value="<?= $datas?$datas['username']:'' ?>">
                        </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-info">
                                <input id="active" type="checkbox" value="1" <?= $datas['active']==1?'checked':'' ?> name="data_post[active]">
                                <label for="active">Kích hoạt</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-left mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        Lưu
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
<script>
    var check;
    function checkfiles(_this){
        var control = $("#image").attr('data-control');
        if(_this.files && _this.files[0]){
        var formdata = new FormData();
        formdata.append('image',_this.files[0]);
            $.ajax({
                url:"cpanel/"+control+"/check_files",
                type:"post",
                data:formdata,
                processData: false,
                contentType: false,
                success:function(data){
                    if (data) {
                        check = false;
                        $("#msg").html("chỉ hổ trợ PNG/JPEG/JPG");
                    }
                    else{
                        $("#msg").html("");
                        check = true;
                    }
                }
            });
            $("#msg").html("");
        }
        else{
            check = false;
            $("#msg").html("Chưa có file");
        }
    }
    function checkform(){
        if (check==false) {
            return false;
        }
        return true;
    }
</script>