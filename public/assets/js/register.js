var checked = false;
var check_mail = false;
var check_pass = false;
var check_fullname = false;
var check_phone = false;
var check_uni_phone = false;
	$(document).ready(function(){
		$("#email").blur(function(event){
			let email = this.value;
			var regex = new RegExp( /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/);
			if (email != "") {
				if (regex.test(email) == false) {
				event.target.parentElement.querySelector("#message").innerText = "Email không đúng định dạng";
				event.target.parentElement.querySelector("#message").style.color = "red";
				check_mail = false;
				}
				else if(regex.test(email) == true){
					$.ajax({
					url:"check_unique_email.html",
					method:"post",
					data:{email:email},
					success:function(data){
					let kq = JSON.parse(data);
					if (kq.result =="error") {
						event.target.parentElement.querySelector("#message").innerText = kq.message;
						event.target.parentElement.querySelector("#message").style.color = "red";
						check_mail = false;
					}
					else{
						event.target.parentElement.querySelector("#message").innerText = "";						
						check_mail = true;
					}
				}
				});
					event.target.parentElement.querySelector("#message").innerText = "";
					checked = true;
				}
			}
			else{
				event.target.parentElement.querySelector("#message").innerText = "Trường này là bắt buộc";
				event.target.parentElement.querySelector("#message").style.color = "red";
				check_mail = false;
			}
			
		});
		$("#username").blur(function(event){
			let username = this.value;
			if (username !='') {
					$.ajax({
					url:"check_unique_username.html",
					method:"post",
					data:{username:username},
					success:function(data){
						let kq = JSON.parse(data);
						if (kq.result =="error") {
							event.target.parentElement.querySelector("#message").innerText = kq.message;
							event.target.parentElement.querySelector("#message").style.color = "red";
							checked = false;
						}
						else{
							event.target.parentElement.querySelector("#message").innerText = "";
							checked = true;
						}
					}
				});
			}
			else{
				event.target.parentElement.querySelector("#message").innerText = "Trường này là bắt buộc";
				event.target.parentElement.querySelector("#message").style.color = "red";
				checked = false;
			}
			
		});
		$("#password").blur(function(event){
			let value = this.value;
			console.log(value)
			if (value !='') {
				if (value.length >= 8) {
					event.target.parentElement.querySelector("#message").innerText = "";
					check_pass = true;
				}
				else{
					event.target.parentElement.querySelector("#message").innerText = "Mật khẩu ít nhất 8 kí tự";
					event.target.parentElement.querySelector("#message").style.color = "red";
					check_pass = false;
				}
			}
			else{
				event.target.parentElement.querySelector("#message").innerText = "Trường này là bắt buộc";
				event.target.parentElement.querySelector("#message").style.color = "red";
				check_pass = false;
			}
		});
		$("#fullname").blur(function(event){
			let value = this.value;
			if (value !='') {
				event.target.parentElement.querySelector("#message").innerText = "";
				check_fullname = true;
			}
			else{
				event.target.parentElement.querySelector("#message").innerText = "Trường này là bắt buộc";
				event.target.parentElement.querySelector("#message").style.color = "red";
				check_fullname = false;
			}
		});
		$("#phone").blur(function(event){
			let phone = this.value;
			var regex = new RegExp(/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/);
			if (phone != "") {
				if (regex.test(phone) == false) {
					event.target.parentElement.querySelector("#message").innerText = "Số điện thoại không đúng định dạng";
					event.target.parentElement.querySelector("#message").style.color = "red";
					check_phone = false;
				}
				else{
                    $.ajax({
                        url:"check_unique_phone.html",
                        method:"post",
                        data:{phone:phone},
                        success:function(data){
                            let kq = JSON.parse(data);
                            if (kq.result =="error") {
                                event.target.parentElement.querySelector("#message").innerText = kq.message;
                                event.target.parentElement.querySelector("#message").style.color = "red";
                                check_uni_phone = false;
                            }
                            else{
                                event.target.parentElement.querySelector("#message").innerText = "";
                                check_uni_phone = true;
                            }
                        }
                    });
					event.target.parentElement.querySelector("#message").innerText = "";
					event.target.parentElement.querySelector("#message").style.color = "red";
					check_phone = true;
				}
			}
			else{
				event.target.parentElement.querySelector("#message").innerText = "Trường này là bắt buộc";
				event.target.parentElement.querySelector("#message").style.color = "red";
				check_phone = false;
			}
		});
		$("#form_sign").submit(function(e){
			if (checked == true && check_mail == true && check_pass == true && check_fullname == true && check_phone == true) {
				$("#form_sign").unbind('submit');
                $("#form_sign").submit();
			}
            var id = document.querySelectorAll('#message');
			
		});
		
	});
	function check_unique(){
		if (checked == false || check_mail == false || check_pass == false || check_fullname == false || check_phone == false || check_uni_phone == false) {
			return false;
		}
		return true;
	}