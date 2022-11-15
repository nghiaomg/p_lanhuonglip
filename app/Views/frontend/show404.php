<!DOCTYPE html>
<html lang="vi">
<head>
	<base href="<?= site_url() ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="<?= site_url() ?><?= isset($alias) ? $alias : '' ?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index,follow,snippet,archive" />
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="uploads/images/favicon/<?php echo $data_index['systems']['system']['thumb'];?>">
    <meta http-equiv="content-language" content="vi" />
    <link rel="stylesheet" type="text/css" href="assets/css/404.css">
</head>
<body>
    <div class="page-404">
        <img src="assets/images/404_blue.svg" alt="page 404" />
        <h1>Xin lỗi, chúng tôi không tìm thấy trang bạn muốn tìm kiếm!</h1>
        <a href="/">Quay về trang chủ</a>
    </div>
</body>
</html>