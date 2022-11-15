<link href="assets/css/contact.css" rel="stylesheet" type="text/css" />
<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
<script src="assets/cpanel/libs/sweetalert2/sweetalert2.min.js"></script>
<div id="loading" class="box_overplay">
	<span class="overplay_footer"></span>		
	<img src="assets/images/loading.gif" id="loading_footer" alt="">							
</div>
<div class="contact_section">
	<div class="body_content">
		<h1 class="title">
            Liên hệ với chúng tôi
        </h1>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6 col-lg-4">
					<div class="info_contact">
						<div class="item">
							<div class="title"><?= $data_index['systems']['contact']['company'] ?></div>
							<ul>
								<li class="marker"><strong>Địa chỉ:</strong> <?= $data_index['systems']['contact']['address'] ?></li>
								<li class="phone"><strong>Hotline:</strong> <span><?= $data_index['systems']['contact']['phone'] ?></span></li>
								<li class="mail"><strong>Email:</strong> <?= $data_index['systems']['contact']['email'] ?></li>
								<li class="timer"><strong>Website:</strong> <?= $data_index['systems']['contact']['website'] ?></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-8">
					<div class="map">
						<?=$data_index['systems']['contact']['google_map'] ?>
					</div>
				</div>
			</div>
		</div>
		<div class="form_contact">
			<div class="container">
				<div class="box">
					<div class="title">Để lại lời nhắn với chúng tôi</div>
					<div class="form">
						<!-- <form action="" method=""> -->
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="item">
										<label>Tên khách hàng</label>
										<input type="text" class="same"  id="name" placeholder="Tên khách hàng"  name="" value="">
										<div class="mess_alert mess_name"></div>
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<div class="item">
										<label>Số điện thoại</label>
										<input type="text" class="same"  id="phone" name="" value="" placeholder="Số điện thoại">
										<div class="mess_alert mess_phone"></div>
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<div class="item">
										<label>Địa chỉ email</label>
										<input type="text" class="same"  id="email" name="" placeholder="Địa chỉ email">
										<div class="mess_alert mess_email"></div>
									</div>
								</div>
								<div class="col-12 col-lg-6">
									<div class="item">
										<label>Tiêu đề</label>
										<input type="text" class="same"  id="title" name="" value="" placeholder="Tiêu đề">
										<div class="mess_alert mess_title"></div>
									</div>
								</div>
								<div class="col-12 col-lg-12">
									<div class="item">
										<label>Nội dung liên hệ</label>
										<textarea name=""  class="same" id="content" placeholder="Nội dung liên hệ" rows="5"></textarea>
									</div>
								</div>
								<div class="col-lg-12">
									<button type="button" id="sendContact">Gửi yêu cầu</button>
								</div>
							</div>
						<!-- </form> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.mess_alert 
	{
		color: red;
		font-weight: bold;
		margin-top: 4px;
	}
	#sendContact
	{
		outline: none !important;
	}
	.contact_section .title{
	  position: relative;
	  text-align: center;
	  margin-bottom: 2rem;
	  text-transform: uppercase;
	  font-weight: 500;
	  font-size: 2rem;
	}
	.contact_section .icon_logo{
	  width: 100%;
	  text-align: center;
	  position: absolute;
	  bottom: -22px;
	  left: 0px;
	  z-index: 9;
	}
	.contact_section .icon_logo img{
	  border-radius: 100%;
	}
	.contact_section .body_content{
		margin-top: 2rem;
	}
	.contact_section .body_content .info_contact{
		background: #fff;
	    border-radius: 10px;
	    padding: 20px 0 30px;
	    -webkit-box-shadow: 2px 8px 28px -12px rgb(0 0 0 / 65%);
	    -moz-box-shadow: 2px 8px 28px -12px rgba(0,0,0,0.65);
	    box-shadow: 2px 8px 28px -12px rgb(0 0 0 / 65%);
	    padding: 20px 20px;
	}
	.contact_section .body_content .info_contact .item{
		margin: 1rem 0;
	}
	.contact_section .body_content .info_contact .item .title{
		color: #B5251E;
	    font-size: 1.4rem;
	    font-weight: bold;
	    text-transform: uppercase;
	    line-height: 35px;
	    border-bottom: 1px solid #ddd;
	    margin-bottom: 0.5rem;
	    padding-bottom: 10px;
	}
	.contact_section .body_content .info_contact .item ul{
		list-style: none;
		margin: 0;
		padding: 0;
	}
	.contact_section .body_content .info_contact .item ul li{
		padding: 6px 0px;
		background-size: 22px;
		background-position: 0px 5px;
		background-repeat: no-repeat;
		padding-left: 30px;
	}
	.contact_section .body_content .info_contact .item ul li.marker{
		background-image: url(assets/images/contact/ic-marker.png);
	}
	.contact_section .body_content .info_contact .item ul li.phone{
		background-image: url(assets/images/contact/ic-phone.png);
	}
	.contact_section .body_content .info_contact .item ul li.phone span{
		color: #F00;
		font-size: 1.4rem;
		font-weight: 700;
	}
	.contact_section .body_content .info_contact .item ul li.mail{
		background-image: url(assets/images/contact/ic-mail.png);
	}
	.contact_section .body_content .info_contact .item ul li.timer{
		background-image: url(assets/images/contact/ic-timer.png);
	}
	.contact_section .body_content .map{
		border-radius: 10px;
		overflow: hidden;
		height: 482px;
	}
	.form_contact{
		background-image: url(assets/images/bg2.png);
		margin-top: 3rem;
		padding: 3rem 0;
	}
	.form_contact .box{
		width: 70%;
		margin: auto;
	}
	.form_contact .box .title{
		font-weight: 700;
		text-align: center;
		font-size: 1.5rem;
		margin-bottom: 1.5rem;
	} 
	.form_contact .box .form .item{
		width: 100%;
		margin-bottom: 1.5rem;
	}
	.form_contact .box .form .item label{
		font-weight: 600;
		margin: 0px;
	}
	.form_contact .box .form .item input{
		width: 100%;
		height: 45px;
		width: 100%;
		border: 1px solid #ddd;
		background-color: #FFF;
		border-radius: 25px;
		padding-left: 15px;
		outline: none;
	}
	.form_contact .box .form .item textarea{
		width: 100%;
		width: 100%;
		border: 1px solid #ddd;
		background-color: #FFF;
		border-radius: 25px;
		padding: 10px 0px 0px 15px;
		outline: none;
	}
	.form_contact .box .form button {
	    width: 200px;
	    height: 50px;
	    background-image: linear-gradient(90deg, #E49D21, #c58514);
	    margin: 25px auto 0;
	    border-radius: 30px;
	    border: none;
	    color: #fff;
	    display: block;
	    font-weight: 700;
	}
	.form_contact .box .form button:hover {
	    background-image: linear-gradient(90deg, #c58514, #E49D21);
	}
</style>
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
            mess = "Vui lòng nhập đầy đủ";
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
    function checkEmail()
    {
        let flag =  true;
        let mess = "";
        let email = $("#email").val();
        if(email == "")
        {
            flag =  false;
            mess = "Vui lòng nhập đầy đủ";
        }else
        {
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email) == false || email == "" )
            {
                
                flag =  false;
                mess = "Định dạng email không hợp lệ";
            }
        }
         
        return {
            flag: flag,
            mess: mess
        }; 
    }

    // send
    $(document).on("click","#sendContact",function(){
        let phone   = checkPhone();
        let email   = checkEmail();
        let title   = $("#title").val();
        let name    = $("#name").val();
        let flag    = true;
         //====================
        if(phone.mess != "")
        {
            $(".mess_phone").text(phone.mess);
            flag = false;
        }else
        {
            $(".mess_phone").text(phone.mess);
        }
        //====================
        if(email.mess != "")
        {
            $(".mess_email").text(email.mess);
            flag = false;
        }else
        {
            $(".mess_email").text(email.mess);
        }
        //====================
        if(title == "")
        {
            $(".mess_title").text("Vui lòng nhập đầy đủ");
            flag = false;
        }else
        {
            $(".mess_title").text("")
        }
        //====================
        if(name == "")
        {
            $(".mess_name").text("Vui lòng nhập đầy đủ");
            flag = false;
        }else
        {
            $(".mess_name").text("");
        }
		
        //  bắt đầu gửi liên hệ 
        if(flag == true)
        {
            let phoneValue    = $("#phone").val();
            let emailValue    = $("#email").val();
            let contentValue  = $("#content").val();
            // bật loading 
            $("#loading").show();
            // end 
            $.ajax({
                type: "POST",
                url: "page-gui-lien-he",
                data: {
						title  : title,
                        name   : name,
                        phone  : phoneValue,
                        email  : emailValue,
                        content: contentValue
                    },
                dataType: "JSON",
                success: function (res) {
                    if(res.result.type ==  "successful")
                    {
                        // tắt loading 
                        $("#loading").hide();
                        // end 
                        Swal.fire({
                            title: "Bạn đã gửi liên hệ thành công.",
                            type: "success",
                            showCancelButton: false,
                            showCancelButton: false,
                        });
                        $(".same").val("");
                    }
                }
            });
        }
        
    });
</script>