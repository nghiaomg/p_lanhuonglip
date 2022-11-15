<!--/ GIỎ HÀNG -->
<div class="footer_section">
    <div class="container">
        <div class="footer_container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo_footer">
                        <a href="<?= isset($data_index) ? $data_index['getlogo']['link'] : "" ?>" title="<?=$data_index['getlogo']['name']?>">
                        <img loading="lazy" src="<?= isset($data_index) ? $data_index['getlogo']['path_dir'] . $data_index['getlogo']['thumb'] : "" ?>" alt="<?=$data_index['getlogo']['name']?>">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="sendmail">
                        <form method="post" action="">
                            <input type="email" id="emailf" placeholder="Email của bạn">
                            <button type="button" id="register__ft">
                                <img src="assets/lanhuonglip/images/icons/send.png" alt="Send mail" width="24" height="24">
                            </button>
                        </form>
                        <div class="clear"></div>
                        <i id="error_email" class="text-danger" style="font-size: 0.8rem;"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="socials">
                        <ul>
                            <li><a href="<?= $data_index['systems']['social']['facebook'] ?>"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="<?= $data_index['systems']['social']['youtube'] ?>"><i class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="<?= $data_index['systems']['social']['instagram'] ?>"><i class="fa-brands fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="menu_footer">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="contact">
                        <div class="title">Thông tin liên hệ</div>
                        <ul>
                            <li>Địa chỉ: <strong><?= $data_index['systems']['contact']['address'] ?></strong></li>
                            <li>Số điện thoại: <strong><?= $data_index['systems']['contact']['phone'] ?></strong></li>
                            <li>Email: <strong><?= $data_index['systems']['contact']['email'] ?></strong></li>
                            <li>Opentime: <strong><?= $data_index['systems']['contact']['time_work'] ?></strong></li>
                        </ul>
                    </div>
                </div>
                <?php if($data_index['menuFooter'] != NULL){  ?>
                <div class="col-lg-7 col-md-7">
                    <div class="row">
                        <?php foreach($data_index['menuFooter'] as $key_menuF => $val_menuF){  ?>
                        <div class="col-lg-6 col-md-6">
                            <div class="item">
                                <div class="title"><?=$val_menuF['name']?></div>
                                <?php if($val_menuF['children'] != NULL){  ?>
                                <ul>
                                    <?php foreach($val_menuF['children'] as $key_children => $val_children){  ?>
                                        <li><a href="<?=$val_children['link'] ?>"><?=$val_children['name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>
<div class="copy__right text-center">
    <div class="container">
    <?= $data_index['systems']['system']['copyright'] ?>
    </div>
</div>
<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="assets/cpanel/libs/sweetalert2/sweetalert2.min.js"></script>