<!DOCTYPE html>
<html lang="vi">

<head>
    <base href="<?= site_url() ?><?= isset($alias) ? $alias : '' ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="<?= site_url() ?><?= isset($alias) ? $alias : '' ?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow,snippet,archive" />
    <title><?= isset($title) ? $title : ""; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="uploads/images/favicon/<?= isset($data_index) ? $data_index['systems']['system']['thumb'] : ""; ?>">
    <meta name="keywords" content="<?php echo isset($keyword) ? $keyword : ''; ?>" />
    <meta name="description" content="<?php echo isset($description) ? $description : ''; ?>" />
    <meta property="og:title" content="<?= isset($title) ? $title : '' ?>" />
    <meta property="og:url" content="<?= site_url() ?><?= isset($alias) ? $alias : '' ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:image" content="<?= site_url() ?><?= isset($thumb) && $thumb != ''  ? $og_image : /* $image */ ""; ?>" />
    <meta property="og:description" content="<?= isset($description) ? $description : '' ?>" />
    <meta property="fb:app_id" content="1993308630783927" />
    <meta http-equiv="content-language" content="vi" />
    <meta http-equiv="REFRESH" content="1800" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.placename" content="Hồ Ch&iacute; Minh" />
    <meta name="geo.position" content="10.776435;106.601245" />
    <meta name="ICBM" content="10.776435, 106.601245" />
    <meta name="msvalidate.01" content="4A122E1D7BE2BEA01E640C985860E165" />
    <link rel="stylesheet" href="assets/lanhuonglip/js/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/lanhuonglip/css/home.css">
	<link rel="stylesheet" href="assets/lanhuonglip/css/style.css">
	<script src="assets/lanhuonglip/js/jquery.min.js"></script>
</head>

<body>
    <?= $this->include('frontend/layout/menu_mobile') ?>
    <?= $this->include('frontend/layout/header') ?>
    
    <main class="full__main">
        <?php if(isset($template) && !empty($template)){ ?>
            <?=$this->include($template, isset($data)?$data:NULL)?>
        <?php } ?>
    </main>
    <footer class="footer bg-white">
        <?= $this->include('frontend/layout/footer') ?>
    </footer>
    <?=$this->include('frontend/layout/hotlineFix') ?>
    <?php //$this->include('frontend/layout/hotlineFixMobile') ?>
    <!-- back to top button -->
    <a href="#" class="go__top">
        <img src="assets/lanhuonglip/images/icons/ic_arrow_up.png" alt="back to top" width="17" height="23">
    </a>
    <!-- css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <!-- js -->
	<script src="assets/lanhuonglip/js/popper.min.js"></script>
	<script src="assets/lanhuonglip/js/bootstrap/bootstrap.min.js"></script>
	<!-- swiper-->
    <link rel="stylesheet" href="assets/lanhuonglip/js/swiper/swiper-bundle.min.css" />
    <script src="assets/lanhuonglip/js/swiper/swiper-bundle.min.js"></script>
    <!-- fancybox-->
    <link rel="stylesheet" href="assets/lanhuonglip/js/fancybox/fancybox.css" />
    <script src="assets/lanhuonglip/js/fancybox/fancybox.umd.js"></script>
	<!-- myscript -->
    <script type="text/javascript" src="assets/lanhuonglip/js/script.js"></script>
    
    <?php if($data_index['systems']['contact']['chatbox'] != '' && $data_index['systems']['contact']['turn_off_chatbox'] == 0){ ?>
        <?=$data_index['systems']['contact']['chatbox'] ?>
    <?php } ?>
</body>

</html>