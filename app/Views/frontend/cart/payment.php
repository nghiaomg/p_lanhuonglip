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
    <link rel="stylesheet" href="assets/lanhuonglip/css/style.css">
    <link rel="stylesheet" href="assets/lanhuonglip/css/payment.css">
	<script src="assets/lanhuonglip/js/jquery.min.js"></script>
</head>

<body>
    <div id="loadingDiv"><img src="assets/images/loading.gif" alt="loading" width="100"></div>
    <?php if(isset($datas) && $datas != NULL){ ?>
    <main class="payment_page">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-5 col-md-6 order-lg-12 order-md-12">
                    <div class="right">
                        <div class="box_logo">
                            <a href="<?= isset($data_index) ? $data_index['getlogo']['link'] : "" ?>" title="<?=$data_index['getlogo']['name']?>">
                                <img loading="lazy" src="<?= isset($data_index) ? $data_index['getlogo']['path_dir'] . $data_index['getlogo']['thumb'] : "" ?>" alt="<?=$data_index['getlogo']['name']?>">
                            </a>
                        </div>
                        <div class="list_product">
                            <?php foreach($datas as $key => $val){ ?>
                            <div class="item">
                                <div class="box_img" style="background-image: url('<?= $val['product_thumb'] ?>')">
                                    <div class="qty"><?= $val['qty'] ?></div>
                                </div>
                                <div class="info">
                                    <h3><a href="<?= $val['product_alias'] ?>"><?= $val['product_name'] ?></a></h3>
                                    <div class="des"><?= $val['color_name'] ?></div>
                                </div>
                                <div class="price">
                                    <?= $val['product_price'] ?> đ
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="clear"></div>
                        <div class="discount_code">
                            <div class="item">
                                <input type="text" name="" placeholder="Mã giảm giá/khuyến mãi"/>
                                <button type="buton">Áp dụng</button>
                            </div>
                        </div>
                        <div class="cal_money">
                            <div class="item">
                                <div class="label">Tạm tính</div>
                                <div class="total_subtotal"><?=number_format($totalMoney)?> VNĐ</div>
                            </div>
                            <div class="item">
                                <div class="label">Tiết kiệm</div>
                                <div class="total_subtotal"><?=number_format($totalSave)?> VNĐ</div>
                            </div>
                            <div class="item">
                                <div class="label_total"><strong>Tổng tiền</strong></div>
                                <div class="total"><?=number_format($totalMoney)?> VNĐ</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="left">
                        <div class="box_logo">
                            <a href="<?= isset($data_index) ? $data_index['getlogo']['link'] : "" ?>" title="<?=$data_index['getlogo']['name']?>">
                                <img loading="lazy" src="<?= isset($data_index) ? $data_index['getlogo']['path_dir'] . $data_index['getlogo']['thumb'] : "" ?>" alt="<?=$data_index['getlogo']['name']?>">
                            </a>
                        </div>
                        <form onsubmit="return submitForm()" method="post">
                            <div class="pay_method">
                                <div class="title">Phương thức thanh toán</div>
                                <ul class="list">
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input checked type="radio" name="data_post[pay_method]" class="custom-control-input" value="1" id="salaryRadio1">
                                            <label class="custom-control-label" for="salaryRadio1">Thanh toán khi nhận hàng</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" name="data_post[pay_method]" class="custom-control-input" value="2" id="salaryRadio2">
                                            <label class="custom-control-label" for="salaryRadio2">Thanh toán chuyển khoản</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="form">
                                <div class="title">Thông tin liên hệ</div>
                                <div class="input_item">
                                    <input type="text" id="fullname" name="data_post[fullname]" placeholder="Họ và tên *">
                                    <span class="error-box text-danger"></span>
                                </div>
                                <div class="input_item">
                                    <input type="text" id="phone" name="data_post[phone]" placeholder="Số điện thoại *">
                                    <span class="error-box text-danger"></span>
                                </div>
                                <div class="input_item">
                                    <input type="text" id="email" name="data_post[email]" placeholder="Email *">
                                    <span class="error-box text-danger"></span>
                                </div>
                                <div class="input_item">
                                    <input type="text" id="address" name="data_post[address]" placeholder="Địa chỉ *">
                                    <span class="error-box text-danger"></span>
                                </div>
                                <div class="input_item">
                                    <textarea name="data_post[note]" id="" rows="6" placeholder="Lời nhắn/Ghi chú"></textarea>
                                </div>
                                <button type="submit">Hoàn thành đơn hàng</button>
                            </div>
                        </form>
                        <a href="gio-hang" class="back_to_cart"><i class="fa-solid fa-arrow-left"></i> Quay về giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php } ?>
    <!-- css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- js -->
	<script src="assets/lanhuonglip/js/popper.min.js"></script>
	<script src="assets/lanhuonglip/js/bootstrap/bootstrap.min.js"></script>
	<!-- myscript -->
    <script type="text/javascript" src="assets/lanhuonglip/js/cart.js"></script>
</body>

</html>