<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<link rel="stylesheet" href="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="assets/cpanel/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
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
                            <label for="">Họ và tên </label>
                            <input type="hidden" id="customersID" name="data_post[id]" value="<?= $datas['id'] ?>">
                            <input type="text" id="name" class="form-control" value="<?= $datas['name'] ?>"  placeholder="Họ và tên" name="data_post[name]">
                            <small></small>
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ </label>
                            <input type="text" id="address" class="form-control" value="<?= $datas['address'] ?>"   placeholder="Địa chỉ" name="data_post[address]">
                            <small></small>
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại </label>
                            <input type="text" id="phone" class="form-control"  value="<?= $datas['phone'] ?>" placeholder="Số điện thoại" name="data_post[phone]">
                            <small></small>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" id="email" class="form-control" value="<?= $datas['email'] ?>"  placeholder="Email" name="data_post[email]">
                            <small></small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Quốc tịch</label>
                            <select name="data_post[countryID]" id="" class="form-control">
                                <option value="">Chọn quốc tịch</option>
                                <?php if(isset($country) && $country != NULL){?>
                                    <?php foreach($country as $key => $val){?>
                                        <option value="<?= $val['id'] ?>" <?= $datas['countryID'] == $val['id']?'selected':'' ?>><?= $val['name'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <small></small>
                        </div>
                        <div class="form-group">
                            <label for="">Giới tính</label>
                            <div>
                                <label for="male">
                                    Nam: <input type="radio" <?= $datas['sex'] == 1?'checked':'' ?>  name="data_post[sex]" id="male" value="1">
                                </label>
                                <label for="female">
                                    Nữ: <input type="radio" <?= $datas['sex'] == 2?'checked':'' ?> name="data_post[sex]" id="female" value="2">
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày sinh</label>
                            <input type="text"  name="data_post[birthday]" value="<?= date('d/m/Y',strtotime($datas['birthday'])) ?>"  placeholder="Ngày sinh" class="text form-control" id="birthday"  data-inputmask="'alias': 'date'"/>
                            <small></small>
                        </div>
                    </div>
                </div>
                <div class="clear height20"></div>
                <div class="form-group text-left mb-0 col-lg-12 mt-1 d-flex justify-content-center">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit" id="submitAdd">
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script>
    $("#birthday").inputmask();
    $('#submitAdd').click(async function(e){
        e.preventDefault();
        let checked = true;
        let formArray = $(this).closest('form').serializeArray();
        let id = $('#customersID').val();
        for (let index = 0; index < formArray.length; index++)
        {
            
            if (formArray[index].value === "")
            {
                checked = false;
                $('input[name="'+formArray[index].name+'"]').closest('.form-group').find('small').text("Vui lòng nhập đầy đủ"); 
                $('input[name="'+formArray[index].name+'"]').closest('.form-group').find('small').css('color','red'); 
                //    
                $('select[name="'+formArray[index].name+'"]').closest('.form-group').find('small').text("Vui lòng nhập đầy đủ"); 
                $('select[name="'+formArray[index].name+'"]').closest('.form-group').find('small').css('color','red'); 
            }
            else
            {
                $('input[name="'+formArray[index].name+'"]').closest('.form-group').find('small').text(''); 
                $('select[name="'+formArray[index].name+'"]').closest('.form-group').find('small').text('');
                // phone
                if (formArray[index].name === 'data_post[phone]')
                {
                    if ((/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/).test(formArray[index].value) === false)
                    {
                        $('input[name="'+formArray[index].name+'"]').closest('.form-group').find('small').text("Không đúng định dạng số điện thoại");
                        $('input[name="'+formArray[index].name+'"]').closest('.form-group').find('small').css('color','red');
                        checked =  false;
                    }	    
                } 
                // email
                if (formArray[index].name ==="data_post[email]")
                {
                    if ((/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(formArray[index].value) === false)
                    {
                        $('input[name="'+formArray[index].name+'"]').closest('.form-group').find('small').text("Không đúng định dạng số Email");
                        $('input[name="'+formArray[index].name+'"]').closest('.form-group').find('small').css('color','red');
                        checked =  false;
                    }	
                }
            }
        }
      
        let checkData = await checkPhoneAndEmailEdit($(this).closest('form').serialize());
        if (checkData.length > 0)
        {
            checkData.map((v,k)=>{
                if (v.status === false)
                {
                    $('input[name="'+v.key+'"]').closest('.form-group').find('small').text(v.messenger);
                    $('input[name="'+v.key+'"]').closest('.form-group').find('small').css('color','red');
                    checked =  false;
                }
            });
        }
        if (checked === true)
        {
            $(this).closest('form').unbind();
            $(this).closest('form').submit();
        }
    });
    function checkPhoneAndEmailEdit(data,id){
        return new Promise((relsove,reject)=>{
            $.ajax({
                url:"cpanel/"+"<?= $control ?>/checkDataEdit",
                method:"post",
                data:data,
                dataType:'json',
                success:function(response){
                    relsove(response)
                }
            })
        });
    }
</script>