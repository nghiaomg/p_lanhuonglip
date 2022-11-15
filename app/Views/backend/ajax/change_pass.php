<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title mt-0">Đổi mật khẩu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <div class="modal-body">
        <form action="" method="post">
            <input type="hidden" value="<?= $id ?>" id="id_admin">
            <div class="form-group">
                <label for="">Mật khẩu mới</label>
                <div class="group-pass">
                    <input type="password" class="form-control" id="password_input">
                    <i class="fa fa-eye view_pass"></i> 
                </div>
            </div>
            <div class="form-group">
                <label for="">Mật khẩu xác nhận</label>
                <div class="group-pass">
                    <input type="password" class="form-control" id="password_confirm_input">
                    <i class="fa fa-eye view_pass"></i> 
                </div>
            </div>
            <p id="message_error"></p>
            <div class="form-group text-right">
                <button id="save_pass" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
</div><!-- /.modal-content -->
<script>
    $(document).ready(function(){
        console.log($("#password"))
        $("button#save_pass").click(function(e){
            e.preventDefault();
            var id = $("#id_admin").val();
            var password_input = $("#password_input").val();
            var password_confirm_input = $("#password_confirm_input").val();
            if (password_input ==='' || password_confirm_input ==='') {
                $("#message_error").html("Vui lòng nhập đầy đủ");
                $("#message_error").css("color","red");
            }
            else{
                $("#message_error").html("");
                if (password_input != password_confirm_input) {
                    $("#message_error").html("Mật khẩu mới và mật khẩu xác nhận không giống nhau vui lòng nhập lại");
                    $("#message_error").css("color","red");
                }
                else{
                    $.ajax({
                        url:"cpanel/admin/change_pasword",
                        method:"post",
                        data:{id:id,password_input:password_input},
                        success:function(data){
                            let result = JSON.parse(data);
                            if (result.result =="success") {
                                $("#message_error").html(result.message);
                                $("#message_error").css("color","green");
                                $("#password_input").val("");
                                $("#password_confirm_input").val("");
                            }
                            else if(result.result =="error"){
                                $("#message_error").html(result.message);
                                $("#message_error").css("color","green");
                            }
                        }
                    });
                }
            }
        })
    })
</script>
<script>
    var view_ip = document.querySelectorAll('.view_pass');
    Array.from(view_ip).forEach(child => {        
        child.addEventListener("click",(e)=>{   
            e.target.parentElement.querySelector('input').getAttribute('type')=="password"?
            e.target.parentElement.querySelector('input[type="password"]').setAttribute("type","text"): 
            e.target.parentElement.querySelector('input[type="text"]').setAttribute("type","password"); 
        })
    });
</script>