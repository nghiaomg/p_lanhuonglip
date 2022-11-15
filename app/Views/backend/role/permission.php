<!-- sweetalert css -->
<link href="public/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<!-- Jquery Toast css -->
<link href="public/assets/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<link href="public/assets/customs/permission.css" rel="stylesheet" type="text/css" />
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div>
                <h4 class="page-title"><?= $title; ?></h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <div class="permission_detail_container">
                    <div class="box">
                        <?php if ($module != NULL) { ?>
                            <?php foreach ($module as $key_module => $val_module) { ?>

                                <?php if ($val_module['count'] == 0 && !isset($val_module['moduleDetails'])) {  ?>
                                    <div class="title"><strong><?= $val_module['name'] ?></strong></div>
                                    <hr />
                                <?php }  ?>
                                <?php if ($val_module['count'] != 0 && isset($val_module['moduleDetails'])  &&  $val_module['moduleDetails'] != NULL) {  ?>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-3"><?= $val_module['name'] ?></div>
                                            <div class="col-9">
                                                <?php foreach ($val_module['moduleDetails'] as $key_moduleDetails => $val_moduleDetails) { ?>
                                                    <div class="item_btn">
                                                        <div class="checkbox checkbox-secondary">
                                                            <input id="<?=$val_module['controller'].'_'.$val_moduleDetails['action']?>" type="checkbox" 
                                                            onclick="updatePermission('<?=$val_module['controller']?>','<?=$val_moduleDetails['action']?>','<?= $careerroadsID ?>',this)"
                                                             <?php foreach ($datas as $key => $val) { ?> 
                                                                     <?php if ($val['controller'] == $val_module['controller'] && $val['action'] == $val_moduleDetails['action'] && $val['status'] == 1) { ?> checked <?php } ?> 
                                                             <?php } ?> value="1">
                                                            <label for="<?=$val_module['controller'].'_'.$val_moduleDetails['action']?>">
                                                                <?=$val_moduleDetails['name']?>
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php }  ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                <?php }  ?>
                                <!-- <hr class="hr__0" /> -->
                            <?php }  ?>
                        <?php }  ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row -->
    <!-- end row -->

</div> <!-- end container-fluid -->
<script type="text/javascript">
    let job_position_titleID =  '<?=$job_position_titleID?>';
    function updatePermission(controller, action, careerroadsID,__this) {
        // check status
        var status = 0;
        let checkedd  =  __this.checked;
        if(checkedd == true )
        {
            status = 1;
        }
        if (controller) {
            $.ajax({
                method: "POST",
                url: "<?= CPANEL ?>permission/updatePermission",
                data: {
                    controller: controller,
                    action: action,
                    status: status,
                    careerroadsID: careerroadsID,
                    job_position_titleID: job_position_titleID
                },
                dataType: "json",
                success: function(data) {
                    if (data.result && data.result == 1) {
                        $.toast({
                            heading: 'Thông báo!',
                            text: 'Cập nhật trạng thái thành công!.',
                            position: 'top-right',
                            loaderBg: '#5ba035',
                            icon: 'success',
                            hideAfter: 2000,
                        });
                    } else {
                        $.toast({
                            heading: 'Thông báo!',
                            text: 'Cập nhật trạng thái thất bại!.',
                            position: 'top-right',
                            loaderBg: '#FF0',
                            icon: 'error',
                            hideAfter: 2000,
                        });
                    }
                }
            });
        }
    }
</script>