<?php if(isset($slides) && $slides != NULL){ ?>
<div class="slider_box">
    <!-- Slider main container -->
    <div class="swiper-slider">
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php foreach ($slides as $key_slide => $val_slide) { ?>
            <div class="swiper-slide" style="background-image: url('uploads/images/slide/<?=$val_slide['thumb']?>');">
                <div class="container">
                    <div class="slider-container">
                        <h2 class="slider-sub-title"><?=$val_slide['name']?></h2>
                        <div class="animated-area">
                            <h3 class="slider-title"><?=$val_slide['text_des']?></h3>
                            <a href="<?=$val_slide['link']?>" class="slider-buttton"><?=$val_slide['text_link']?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="swiper-pagination3"></div>
    </div>
</div>
<?php } ?>

<!-- giới thiệu -->
<?php if(isset($aboutRow) && $aboutRow != NULL){ ?>
<div class="about_box">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-6 col-md-6 order-xl-2 order-lg-2 order-md-2">
                <div class="right">
                    <h2>Welcome to <br/><span><?=$aboutRow['name']?></span></h2>
                    <div class="des">
                        <?=$aboutRow['content']?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="left">
                    <?php if($aboutRow['show_video'] == 1 && $aboutRow['link'] != ''){ ?>
                        <iframe width="100%" height="340" src="https://www.youtube.com/embed/<?=$aboutRow['link']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php }else{ ?>
                        <img src="uploads/images/about/<?=$aboutRow['thumb']?>" alt="<?=$aboutRow['name']?>">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php if(isset($cateHomes[0]['products']) && $cateHomes[0]['products'] != NULL){ ?>
<div class="product_home">
    <div class="container-fluid">
        <h2><?=$cateHomes[0]['name']?></h2>
        <div class="swiper swiper-container product_home_slider">
            <div class="swiper-wrapper">
                <?php foreach ($cateHomes[0]['products'] as $key_productHome_01 => $val_productHome_01) {
                    $percent = 0;
                    if($val_productHome_01['price_sale'] != 0){ 
                        $percent = 100 - round(($val_productHome_01['price_sale']*100)/$val_productHome_01['price'], 0);
                    }
                ?>
                <div class="swiper-slide">
                    <div class="item">
                        <a href="<?=$val_productHome_01['alias']?>">
                            <div class="box_img" style="background-image: url('uploads/images/product/<?=$val_productHome_01['thumb']?>');"></div>
                            <h3><?=$val_productHome_01['name']?></h3>
                        </a>
                        <div class="box_price">
                            <div class="price_sale"><?=$val_productHome_01['price_sale']>0?number_format($val_productHome_01['price_sale']):number_format($val_productHome_01['price'])?></div>
                            <?php if($val_productHome_01['price_sale'] > 0){ ?><div class="price"><?=number_format($val_productHome_01['price'])?></div><?php } ?>
                        </div>
                        <?php if($percent != 0){ ?>
                            <div class="sale"><?=$percent?>%</div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination4"></div>
        </div>
    </div>
</div>
<?php } ?>

<?php if(isset($banner2Row) && $banner2Row != NULL){ ?>
<div class="banner_box banner_box_1" style="background-image: url('uploads/images/banner2/<?=$banner2Row['thumb']?>');">
  <div class="container">
      <div class="row">
          <div class="col-lg-5 col-md-5">
              <div class="box">
                  <h2><?=$banner2Row['name']?></h2>
                  <div class="content"><?=$banner2Row['des']?></div>
                  <a href="<?=$banner2Row['link']?>" class="view_more"><?=$banner2Row['text_link']?></a>
                  <div class="socials">
                      <a href="<?= $data_index['systems']['social']['facebook'] ?>"><img src="assets/lanhuonglip/images/icons/fb2.png" alt="Facebook" width="40" height="40"></a>
                      <a href="<?= $data_index['systems']['social']['youtube'] ?>"><img src="assets/lanhuonglip/images/icons/twitter2.png" alt="twitter" width="40" height="40"></a>
                      <a href="<?= $data_index['systems']['social']['instagram'] ?>"><img src="assets/lanhuonglip/images/icons/intagram2.png" alt="intagram" width="40" height="40"></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php } ?>

<!-- video -->
<?php if(isset($videos) && $videos != NULL){ ?>
<div class="video_box">
    <div class="container">
        <h2>ALBUM VIDEO LÀM SON MÔI CỦA LAN HƯƠNG</h2>
        <div class="des">
            "Nhan sắc là món tài sản vô giá mà thượng đế dành ban cho mỗi người phụ nữ"
        </div>
        <div class="row">
            <?php foreach ($videos as $key_video => $val_video) { ?>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="item">
                    <a href="javascript:void(0)" onclick="openVideo('<?=$val_video['link']?>', '<?=$val_video['name']?>')">
                        <div class="box_img" style="background-image: url('uploads/images/video/<?=$val_video['thumb']?>');">
                            <div class="play_btn"></div>
                        </div>
                        <h3><?=$val_video['name']?></h3>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModalOpenVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      	<div class="modal-header">
        	<h5 class="modal-title" id="videoModalLabel">Modal title</h5>
        	<button type="button" onclick="closeVideo()" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        	</button>
      	</div>
      	<div class="modal-body">
			<div id="loadVideo"></div>
      	</div>
    </div>
  </div>
</div>
<script>
    function openVideo(key, name){
		var data = '<iframe width="100%" height="400" src="https://www.youtube.com/embed/'+key+'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
		$('#videoModalLabel').html(name);
		$('#loadVideo').html(data);
		$('#myModalOpenVideo').modal('toggle');
		// $('#myModal').modal('show');
	}
	function closeVideo(){
		$('#loadVideo').html(' ');
	}
	$('#myModalOpenVideo').click(function() {
		$('#loadVideo').html(' ');
	})
</script>
<?php } ?>

<div class="album_box">
    <?php if(isset($cateHomes[1]['products']) && $cateHomes[1]['products'] != NULL){ ?>
    <div class="product_home_2 product_home">
        <div class="container">
            <h2><?=$cateHomes[1]['name']?></h2>
            <div class="row">
                <div class="col-lg-6 d-xl-block d-lg-block d-md-none d-none">
                    <div class="left">
                        <?php 
                        $cate_thumb = "uploads/images/menuProduct/".$cateHomes[1]['thumb'];
                        if($cateHomes[1]['name'] != '' && file_exists($cate_thumb)){ ?>
                            <img src="<?=$cate_thumb?>" alt="<?=$cateHomes[1]['name']?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right">
                        <div class="swiper swiper-container <?php if($data_index['checkScreen'] == 'destop'){ ?> product-slider-2 <?php } else { ?> product_home_slider <?php } ?>">
                            <div class="swiper-wrapper">
                                <?php if($data_index['checkScreen'] == 'destop'){ ?>
                                    <!-- Slides -->
                                    <?php for ($i=0; $i < (count($cateHomes[1]['products']) / 4); $i++) { ?>
                                    <div class="swiper-slide">
                                        <div class="box">
                                            <div class="row">
                                                
                                                <?php for ($j= ($i * 4); $j < (($i * 4) + 4); $j++) { ?>
                                                    <?php if($cateHomes[1]['products'][$j]){ 
                                                        $percent = 0;
                                                        if($cateHomes[1]['products'][$j]['price_sale'] != 0){ 
                                                            $percent = 100 - round(($cateHomes[1]['products'][$j]['price_sale']*100)/$cateHomes[1]['products'][$j]['price'], 0);
                                                        }
                                                    ?>
                                                        <div class="col-lg-6 col-md-4">
                                                            <div class="item">
                                                                <a href="<?=$cateHomes[1]['products'][$j]['alias']?>">
                                                                    <div class="box_img" style="background-image: url('uploads/images/product/<?=$cateHomes[1]['products'][$j]['thumb']?>');"></div>
                                                                    <h3><?=$cateHomes[1]['products'][$j]['name']?></h3>
                                                                </a>
                                                                <div class="box_price">
                                                                    <div class="price_sale"><?=$cateHomes[1]['products'][$j]['price_sale']>0?number_format($cateHomes[1]['products'][$j]['price_sale']):number_format($cateHomes[1]['products'][$j]['price'])?></div>
                                                                    <?php if($cateHomes[1]['products'][$j]['price_sale'] > 0){ ?><div class="price"><?=number_format($cateHomes[1]['products'][$j]['price'])?></div><?php } ?>
                                                                </div>
                                                                <?php if($percent != 0){ ?>
                                                                    <div class="sale"><?=$percent?>%</div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                <?php }else{ ?>
                                    <?php foreach ($cateHomes[1]['products'] as $key_productHome_02 => $val_productHome_02) {
                                        $percent = 0;
                                        if($val_productHome_02['price_sale'] != 0){ 
                                            $percent = 100 - round(($val_productHome_02['price_sale']*100)/$val_productHome_02['price'], 0);
                                        }
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <a href="<?=$val_productHome_02['alias']?>">
                                                <div class="box_img" style="background-image: url('uploads/images/product/<?=$val_productHome_02['thumb']?>');"></div>
                                                <h3><?=$val_productHome_02['name']?></h3>
                                            </a>
                                            <div class="box_price">
                                                <div class="price_sale"><?=$val_productHome_02['price_sale']>0?number_format($val_productHome_02['price_sale']):number_format($val_productHome_02['price'])?></div>
                                                <?php if($val_productHome_02['price_sale'] > 0){ ?><div class="price"><?=number_format($val_productHome_02['price'])?></div><?php } ?>
                                            </div>
                                            <?php if($percent != 0){ ?>
                                                <div class="sale"><?=$percent?>%</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="swiper-pagination4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="clear"></div>
    <?php if(isset($albums) && $albums != NULL){ ?>
        <?php if($data_index['checkScreen'] != 'mobile'){ ?>
        <div class="container album">
            <h2>Album ảnh NHỮNG CHẤT và MÀU ĐÃ LÀM</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="item item_01">
                        <a href="javascript:void(0)" class="zoom" data-src="uploads/images/album/<?=$albums[0]['image']?>" data-fancybox="gallery">
                            <div class="box_img" style="background-image: url('uploads/images/album/<?=$albums[0]['thumb']?>');"></div>
                            <h3><?=$albums[0]['name']?></h3>
                        </a>
                    </div>
                    <div class="item item_02">
                        <a href="javascript:void(0)" class="zoom" data-src="uploads/images/album/<?=$albums[1]['image']?>" data-fancybox="gallery">
                            <div class="box_img" style="background-image: url('uploads/images/album/<?=$albums[1]['thumb']?>');"></div>
                            <h3><?=$albums[1]['name']?></h3>
                        </a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="item item_03">
                        <a href="javascript:void(0)" class="zoom" data-src="uploads/images/album/<?=$albums[2]['image']?>" data-fancybox="gallery">
                            <div class="box_img" style="background-image: url('uploads/images/album/<?=$albums[2]['thumb']?>');"></div>
                            <h3><?=$albums[2]['name']?></h3>
                        </a>
                    </div>
                    <div class="item item_04">
                        <a href="javascript:void(0)" class="zoom" data-src="uploads/images/album/<?=$albums[3]['image']?>" data-fancybox="gallery">
                            <div class="box_img" style="background-image: url('uploads/images/album/<?=$albums[3]['thumb']?>');"></div>
                            <h3><?=$albums[3]['name']?></h3>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item item_05">
                        <a href="javascript:void(0)" class="zoom" data-src="uploads/images/album/<?=$albums[4]['image']?>" data-fancybox="gallery">
                            <div class="box_img" style="background-image: url('uploads/images/album/<?=$albums[4]['thumb']?>');"></div>
                            <h3><?=$albums[4]['name']?></h3>
                        </a>
                    </div>
                    <div class="item item_06">
                        <a href="javascript:void(0)" class="zoom" data-src="uploads/images/album/<?=$albums[5]['image']?>" data-fancybox="gallery">
                            <div class="box_img" style="background-image: url('uploads/images/album/<?=$albums[5]['thumb']?>');"></div>
                            <h3><?=$albums[5]['name']?></h3>
                        </a>
                    </div>
                </div>
            </div>
            <a href="" class="view_more">Xem tất cả</a>
        </div>
        <?php } ?>
    <?php } ?>
</div>

<?php if($time_stamp > time()){?>
<div class="regis_kh">
    <div class="row no-gutters">
        <div class="col-lg-6 col-md-6 align-self-center">
            <div class="left" data-countdate="<?= date('Y-m-d H:i:s',strtotime($flashsale_js['datetime']))  ?>">
                <h2>Đăng ký <br/> khóa học làm son</h2>
                <div class="flashsale">
                    <div class="item">
                        <div class="value" id="ch_day">00</div>
                        <div class="label">Ngày</div>
                    </div>
                    <div class="item">
                        <div class="value" id="ch_hour">10</div>
                        <div class="label">Giờ</div>
                    </div>
                    <div class="item">
                        <div class="value" id="ch_minute">18</div>
                        <div class="label">Phút</div>
                    </div>
                    <div class="item">
                        <div class="value" id="ch_second">54</div>
                        <div class="label">Giây</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="right" style="background-image: url(assets/lanhuonglip/images/banner.png);">
                <div class="form">
                    <form onSubmit="return regisStudyForm()" id="regisStudyForm" class="box" method="post" action="dang-ky-khoa-hoc">
                        <h3>Đăng ký khóa học</h3>
                        <div class="input_item">
                            <input type="text" id="fullname" name="data_post[fullname]" placeholder="Họ và tên *">
                            <small class="mess_fullname"></small>
                        </div>
                        <div class="input_item">
                            <input type="text" id="phone" name="data_post[phone]" placeholder="Số điện thoại *">
                            <small class="mess_phone"></small>
                        </div>
                        <div class="input_item">
                            <input type="text" id="email" name="data_post[email]" placeholder="Email *">
                            <small class="mess_email"></small>
                        </div>
                        <div class="input_item">
                            <textarea placeholder="Nhập nội dung cần tư vấn" name="data_post[content]"></textarea>
                        </div>
                        <button type="submit">Gửi ngay</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // validation 
    function checkPhone()
    {
        let flag =  true;
        let mess = "";
        let phone = $("#phone").val();
        let lengthPhone = phone.length;
        let phoneno = /[,~!@#$%^&*(){}.<>]/;
        let rgxPhone = phoneno.test(phone);
        if(phone == "")
        {
            flag =  false;
            mess = "Vui lòng nhập đầy đủ thông tin";
        }else
        {
            if(phone.length < 9 || phone.length > 10 || phone == ""  || rgxPhone == true  )
            {
                flag = false;
                mess = "Định dạng số điện thoại không hợp lệ";
            }   
        }
      
        return {
           	flag: flag,
           	mess: mess
       	}; 
    }
    // validation 
    function checkEmail()
    {
        let flag =  true;
        let mess = "";
        let email = $("#email").val();
        let lengthEmail = email.length;
        let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        let rgxEmail = regex.test(email);
        if(email == "")
        {
            flag =  false;
            mess = "Vui lòng nhập đầy đủ thông tin";
        }else
        {
            if(rgxEmail == false  )
            {
                flag = false;
                mess = "Định dạng email không hợp lệ";
            }   
        }
      
        return {
           	flag: flag,
           	mess: mess
       	}; 
    }
	function regisStudyForm(){
        let phone   = checkPhone();
        let email   = checkEmail();
        let fullname    = $("#fullname").val();
        let flag    = true;
        //====================
        if(fullname == "")
        {
            $(".mess_fullname").text("Vui lòng nhập đầy đủ");
            flag = false;
        }else
        {
            $(".mess_fullname").text("");
        }
        if(phone.mess != "")
        {
            $(".mess_phone").text(phone.mess);
            flag = false;
        }else
        {
            $(".mess_phone").text(phone.mess);
        }
        if(email.mess != "")
        {
            $(".mess_email").text(email.mess);
            flag = false;
        }else
        {
            $(".mess_email").text(email.mess);
        }
        //  bắt đầu gửi liên hệ 
        if(flag == true)
        {
            return true;
        }else{
            return false;
        }
    };
</script>
<?php } ?>
<?php if(isset($cateHomes[2]['products']) && $cateHomes[2]['products'] != NULL){ ?>
<div class="product_home">
    <div class="container-fluid">
        <h2><?=$cateHomes[2]['name']?></h2>
        <div class="swiper swiper-container product_home_slider">
            <div class="swiper-wrapper">
                <?php foreach ($cateHomes[2]['products'] as $key_productHome_03 => $val_productHome_03) {
                    $percent = 0;
                    if($val_productHome_03['price_sale'] != 0){ 
                        $percent = 100 - round(($val_productHome_03['price_sale']*100)/$val_productHome_03['price'], 0);
                    }
                ?>
                <div class="swiper-slide">
                    <div class="item">
                        <a href="<?=$val_productHome_03['alias']?>">
                            <div class="box_img" style="background-image: url('uploads/images/product/<?=$val_productHome_03['thumb']?>');"></div>
                            <h3><?=$val_productHome_03['name']?></h3>
                        </a>
                        <div class="box_price">
                            <div class="price_sale"><?=$val_productHome_03['price_sale']>0?number_format($val_productHome_03['price_sale']):number_format($val_productHome_03['price'])?></div>
                            <?php if($val_productHome_03['price_sale'] > 0){ ?><div class="price"><?=number_format($val_productHome_03['price'])?></div><?php } ?>
                        </div>
                        <?php if($percent != 0){ ?>
                            <div class="sale"><?=$percent?>%</div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination4"></div>
        </div>
    </div>
</div>
<?php } ?>

<?php if(isset($banner3Row) && $banner3Row != NULL){ ?>
<div class="banner_box" style="background-image: url('uploads/images/banner2/<?=$banner3Row['thumb']?>');">
  <div class="container">
      <div class="row justify-content-end">
          <div class="col-lg-6 col-md-6">
              <div class="box">
                  <h2><?=$banner3Row['name']?></h2>
                  <div class="des"><?=$banner3Row['name2']?></div>
                  <div class="content"><?=$banner3Row['des']?></div>
                  <div class="socials">
                      <a href="<?= $data_index['systems']['social']['facebook'] ?>"><img src="assets/lanhuonglip/images/icons/fb.png" alt="Facebook" width="40" height="40"></a>
                      <a href="<?= $data_index['systems']['social']['youtube'] ?>"><img src="assets/lanhuonglip/images/icons/twitter.png" alt="twitter" width="40" height="40"></a>
                      <a href="<?= $data_index['systems']['social']['instagram'] ?>"><img src="assets/lanhuonglip/images/icons/intagram.png" alt="intagram" width="40" height="40"></a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php } ?>
<!-- all about japan -->
<div class="news_box">
    <div class="container">
        <?php if(isset($newsHomes) && $newsHomes != NULL){ ?>
        <div class="box">
            <h2>Mẹo làm đẹp</h2>
            <div class="swiper news_slider">
                <div class="swiper-wrapper">
                    <?php foreach ($newsHomes as $key_newsHome => $val_newsHome) { ?>
                    <div class="swiper-slide">
                        <div class="item">
                            <a href="<?=$val_newsHome['alias']?>">
                                <div class="box_img" style="background-image: url('uploads/images/news/<?=$val_newsHome['thumb']?>');"></div>
                                <h3><?=$val_newsHome['name']?></h3>
                            </a>
                            <div class="info">
                                <div class="des"><?=$CI_function->rip_tags($val_newsHome['des'], 100)?></div>
                                <div class="cate_date">
                                    <div class="cate_name">Beauty tips</div>
                                    <div class="line_item">/</div>
                                    <div class="time_post"><?=date('d/m/Y', strtotime($val_newsHome['thumb']))?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="swiper-pagination2"></div>
            </div>
        </div>
        <?php } ?>

        <div class="clear"></div>
        <?php if(isset($slogans) && $slogans != NULL){ ?>
        <div class="slogan_box">
            <div class="row">
                <?php foreach ($slogans as $key_slogan => $val_slogan) { ?>
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <div class="icon" style="background-image: url('uploads/images/slogan/<?=$val_slogan['thumb']?>');"></div>
                        <div class="info">
                            <div class="title"><?=$val_slogan['name']?></div>
                            <div class="des"><?=$val_slogan['des']?></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
  </div>
</div>
<!-- all about japan -->
<?php if(isset($instagrams) && $instagrams != NULL){ ?>
<div class="instagram_box">
    <div class="swiper swiper-container instagram_slider">
        <div class="swiper-wrapper">
            <?php foreach ($instagrams as $key_instagram => $val_instagram) { ?>
            <div class="swiper-slide">
                <div class="item">
                    <a href="<?=$val_instagram['link']?>">
                        <div class="box_img" style="background-image: url('uploads/images/instagram/<?=$val_instagram['thumb']?>');"></div>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>