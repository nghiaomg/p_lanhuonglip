var check_phone;
var check_mail;
$(document).ready(function(){

    function checkPhone()
    {
        let flag =  true;
        let mess = "";
        let phone = $("#phone").val();
        let lengthPhone = phone.length;
        let phoneno =new RegExp(/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/);
        let rgxPhone = phoneno.test(phone);
        debugger
        if(phone == "")
        {
            flag =  false;
            mess = "Vui lòng nhập đầy đủ";
            debugger
        }else
        {
            if(rgxPhone == false  )
            {
                flag = false;
                mess = "Định dạng số điện thoại không hợp lệ";
                debugger
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
            debugger
        }else
        {
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email) == false || email == "" )
            {
                flag =  false;
                mess = "Định dạng email không hợp lệ";
                debugger
            }
        }
        debugger
        return {
            flag: flag,
            mess: mess
        }; 
    }
    $("#update_info").submit(async function(e){
        e.preventDefault();
        let phone = checkPhone();
        let phoneValue =  $("#phone").val();
        $("#phone").closest('.form-group').find('#message').html(phone.mess);
        debugger
        $("#phone").closest('.form-group').find('#message').css("color","red");
        let email = checkEmail();
        let emailValue =  $("#email").val();
        $("#email").closest('.form-group').find('#message').html(email.mess);
        $("#email").closest('.form-group').find('#message').css("color","red");
        let flag = true;
        let submit = "true";
        let data   = {phoneValue:phoneValue,emailValue:emailValue};
        if (phone.mess !="") {
            flag = false;
        }
        if (email.mess !="") {
            flag = false;
        }
        if (flag == true) {
            submit = await  ajaxCheck(data);
        }
        if (submit[0] == "true" && submit[1] == "true") {
            $("#update_info").unbind('submit');
            $("#update_info").submit();
        }
    })
});

 function ajaxCheck(data)
{
     return new Promise((resolve, reject) => {
        let submit = [];
        $.ajax({
            url:"kiem-tra-data.html",
            method:"post",
            data:data,
            dataType:'json',
            success:function(response){
                response.forEach((value,key) => {
                   if (value.result == "error") {
                    $("#"+value.type).closest('.form-group').find('#message').html(value.message);
                    $("#"+value.type).closest('.form-group').find('#message').css("color",value.color);
                        submit.push("false");
                    }
                   else{
                        submit.push("true");
                    }
                 resolve(submit);

                });
            }

        });
       
    });
}
function check_form(){
    if (check_phone == false || check_mail == false ) {
        return false;
    }
    return true;
}