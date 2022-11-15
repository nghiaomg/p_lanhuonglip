<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="<?=CPANEL?>" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span class="badge badge-pink rounded-circle noti-icon-badge">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                <div class="dropdown-header noti-title">
                    <h5 class="text-overflow m-0"><span class="float-right">
                        <span class="badge badge-danger float-right">5</span>
                        </span>Notification</h5>
                </div>

                <div class="slimscroll noti-scroll">

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                        <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary">
                            <i class="mdi mdi-settings-outline"></i>
                        </div>
                        <p class="notify-details">New settings
                            <small class="text-muted">There are new settings available</small>
                        </p>
                    </a>
        
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-warning">
                            <i class="mdi mdi-bell-outline"></i>
                        </div>
                        <p class="notify-details">Updates
                            <small class="text-muted">There are 2 new updates available</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon">
                            <img src="../assets/cpanel/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                        <p class="notify-details">Karen Robinson</p>
                        <p class="text-muted mb-0 user-msg">
                            <small>Wow ! this admin looks good and awesome design</small>
                        </p>
                    </a>
                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View all
                    <i class="fi-arrow-right"></i>
                </a>

            </div>
        </li>
        <?=$this->include('backend/layout/profile')?>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="<?= CPANEL.'dashboard' ?>" class="logo text-center">
            <span class="logo-lg">
                <!-- <img src="assets/images/logo-white.png" loading="lazy" alt="logo" style="width: auto; height: 60px;"> -->
                <!-- <span class="logo-lg-text-light">UBold</span> -->
                <img src="<?= isset($data_index) ? $data_index['getlogo']['path_dir'] . $data_index['getlogo']['thumb'] : "" ?>" alt="" height="40">
            </span>
            <span class="logo-sm">
                <!-- <span class="logo-sm-text-dark">U</span> -->
                <img src="../assets/cpanel/images/logo-sm.png" alt="" height="28">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Đổi mật khẩu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu xác nhận</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                    </div>
                    <p class="message_change_pass"></p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="save">Lưu</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- box thông báo END -->
<script>
    $(document).ready(function(){
        $("button#save").click(function(e){
            e.preventDefault();
            var password = $("#password").val();
            var password_confirm= $("#password_confirm").val();
            if (password != '' || password_confirm !='') {
               $.ajax({
                    url:"cpanel/profile/changepass",
                    method:"POST",
                    data:{password:password,password_confirm:password_confirm},
                    success:function(data){
                        if (JSON.parse(data).result == "successful") {
                            $("#password").val("");
                            $("#password_confirm").val("");
                            $(".message_change_pass").html("Đổi mật khẩu thành công");
                            $(".message_change_pass").css("color","green");
                        }
                        else{
                            $(".message_change_pass").html("Mật khẩu mới và mật khẩu xác nhận không giống nhau");
                            $(".message_change_pass").css("color","red");
                        }
                    }
               });
           }
           else{
                $(".message_change_pass").html("Vui lòng nhập đầy đủ");
                $(".message_change_pass").css("color","red");
           }
        });
    });
</script>