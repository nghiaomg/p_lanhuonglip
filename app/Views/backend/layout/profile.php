<?php if($data_index['get_profile'] && $data_index['get_profile'] != NULL){?>
    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="<?= $data_index['thumb_profile']?$data_index['thumb_profile']:'assets/images/1.jpg' ?>" alt="user-image" class="rounded-circle">
            <span class="pro-user-name ml-1">
                <?= $data_index['get_profile']['fullname'] ?>  <i class="mdi mdi-chevron-down"></i> 
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
            </div>
            <!-- item-->
            <a href="<?= CPANEL.'profile' ?>" class="dropdown-item notify-item">
                <i class="fe-user"></i>
                <span>Cập nhật thông tin</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0)"  data-toggle="modal" data-target=".bs-example-modal-center" class="dropdown-item notify-item">
                <i class="icon-key"></i>
                <span>Đổi mật khẩu</span>
            </a>
            <div class="dropdown-divider"></div>

            <!-- item-->
            <a href="<?= base_url('cpanel/logout.html') ?>" class="dropdown-item notify-item">
                <i class="fe-log-out"></i>
                <span>Logout</span>
            </a>

        </div>
    </li>
<?php } ?>
