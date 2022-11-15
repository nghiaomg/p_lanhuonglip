function addCart(){
    var qty = $('#qty_input').val();
    var productID = $('#productID').val();
    var colorID = $('#colorID').val();
    if(qty && productID){
        $.ajax({
            method: "POST",
            url: "add-cart",
            data: { productID: productID, colorID: colorID, qty: qty },
            dataType: "json",
            success: function (data) {
                if(data){
                    var listCartHtml = '';
                    $("#totalCart").html(data.total);
                    var listCart = data.listCart;
                    
                    for (var key in listCart) {
                        if (listCart.hasOwnProperty(key) && listCart[key]['productID'] != null) {
                            // console.log(key + " -> " + listCart[key]['product_thumb']);
                            listCartHtml += '<div class="item">';
                                listCartHtml += '<div class="box_img" style="background-image: url(' +listCart[key]['product_thumb']+ ')"></div>';
                                listCartHtml += '<div class="info">';
                                    listCartHtml += '<div class="name_close">';
                                        listCartHtml += '<a href="' +listCart[key]['product_alias']+ '">' +listCart[key]['product_name']+ ' <br/>' +listCart[key]['color_name']+ '</a>';
                                        listCartHtml += '<div class="del_pro">';
                                            listCartHtml += '<a href="javascript:void(0)" onclick="deleteItemCart(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')"><i class="fa-solid fa-xmark"></i></a>';
                                        listCartHtml += '</div>';
                                    listCartHtml += '</div>';
                                    listCartHtml += '<div class="qty_price">';
                                        listCartHtml += '<div class="qty_box">';
                                            listCartHtml += '<a href="javascript:void(0)" onclick="downQtyInCart(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">-</a>';
                                            listCartHtml += '<input type="number" id="qty_' +listCart[key]['productID'] + '_' +listCart[key]['colorID'] + '" min="1" value="'+ listCart[key]['qty'] +'">';
                                            listCartHtml += '<a href="javascript:void(0)" onclick="upQtyInCart(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">+</a>';
                                        listCartHtml += '</div>';
                                        listCartHtml += '<div class="price">' +listCart[key]['product_price']+ ' đ</div>';
                                    listCartHtml += '</div>';
                                listCartHtml += '</div>';
                            listCartHtml += '</div>';
                        }
                    }
                    $('#product_list_cart').html(listCartHtml);
                    $('#totalMoney').html(data.totalMoney);
                    $('#cartDrawer').addClass('cartDrawerShow');
                }
            },
        });
    }
}
function downQty(){
    var qty = $('#qty_input').val();
    if(qty > 1){
        qty = parseInt(qty) - 1;
    }
    $('#qty_input').val(qty);
}
function upQty(){
    var qty = $('#qty_input').val();
    qty = parseInt(qty) + 1;
    $('#qty_input').val(qty);
}
function downQtyInCart2(productID, colorID){
    var qtCurrent = $('#qty2_' + productID + '_' + colorID).val();
    if(qtCurrent > 1){
        qtCurrent = parseInt(qtCurrent) - 1;
    }
    $('#qty2_' + productID + '_' + colorID).val(qtCurrent);
    updateCartByQty2(productID, qtCurrent, colorID);
}
function upQtyInCart2(productID, colorID){
    var qtCurrent = $('#qty2_' + productID + '_' + colorID).val();
    qtCurrent = parseInt(qtCurrent) + 1;
    $('#qty2_' + productID + '_' + colorID).val(qtCurrent);
    updateCartByQty2(productID, qtCurrent, colorID);
}
function updateCartByQty2(productID, qty, colorID) {
    if(qty && productID){
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: { productID: productID,colorID: colorID, qty: qty },
            dataType: "json",
            success: function (data) {
                if(data){
                    var listCartHtml = '';
                    var listCart = data.listCart;
                  
                    for (var key in listCart) {
                        if (listCart.hasOwnProperty(key) && listCart[key]['productID'] != null) {
                            // console.log(key + " -> " + listCart[key]['product_thumb']);
                            listCartHtml += '<div class="item">';
                            listCartHtml += '<div class="box_img" style="background-image: url(' +listCart[key]['product_thumb']+ ')"></div>';
                            listCartHtml += '<div class="info_price_qty align-self-center">';
                            listCartHtml += '<div class="info">';
                            listCartHtml += '<h3><a href="' +listCart[key]['product_alias']+ '">' +listCart[key]['product_name']+ '</a></h3>';
                            listCartHtml += '<div class="des">' +listCart[key]['color_name']+ '</div>';
                            listCartHtml += '</div>';
                            listCartHtml += '<div class="price align-self-center">' +listCart[key]['product_price']+ ' VNĐ</div>';
                            listCartHtml += '<div class="qty_box align-self-center">';
                            listCartHtml += '<div class="box2">';
                            listCartHtml += '<a href="javascript:void(0)" onclick="downQtyInCart2(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">-</a>';
                            listCartHtml += '<input type="number" id="qty2_' +listCart[key]['productID']+ '_' +listCart[key]['colorID']+ '" min="1" value="'+ listCart[key]['qty'] +'">';
                            listCartHtml += '<a href="javascript:void(0)" onclick="upQtyInCart2(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">+</a>';
                            listCartHtml += '</div>';
                            listCartHtml += '</div>';
                            listCartHtml += '</div>';
                            listCartHtml += '<div class="total align-self-center">';
                            listCartHtml += listCart[key]['total']+ ' VNĐ <br/>';
                            if(listCart[key]['total_origin']){
                                listCartHtml += '<s>' +listCart[key]['total_origin']+ ' VNĐ</s>';
                            }
                            listCartHtml += '</div>';
                            listCartHtml += '<div class="remove align-self-center">';
                            listCartHtml += '<a href="javascript:void(0)" onclick="deleteItemCart2(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">Xóa</a>';
                            listCartHtml += '</div>';
                            listCartHtml += '</div>';
                        }
                    }
                    $('#listProduct').html(listCartHtml);
                    $("#totalCart").html(data.total);
                    $('#subtotal, #cart_total').html(data.totalMoney + ' VNĐ');
                    $('#savings').html(data.totalSave + ' VNĐ');
                }
            },
        });
    }
}
function deleteItemCart2(productID, colorID) {
    if(productID){
        $.ajax({
            method: "POST",
            url: "delete-cart",
            data: { productID: productID, colorID: colorID },
            dataType: "json",
            success: function (data) {
                if(data){
                    var listCartHtml = '';
                    $("#totalCart").html(data.total);
                    var listCart = data.listCart;
                    for (var key in listCart) {
                        if (listCart.hasOwnProperty(key) && listCart[key]['productID'] != null) {
                            // console.log(key + " -> " + listCart[key]['product_thumb']);
                            listCartHtml += '<div class="item">';
                            listCartHtml += '<div class="box_img" style="background-image: url(' +listCart[key]['product_thumb']+ ')"></div>';
                            listCartHtml += '<div class="info_price_qty align-self-center">';
                            listCartHtml += '<div class="info">';
                            listCartHtml += '<h3><a href="' +listCart[key]['product_alias']+ '">' +listCart[key]['product_name']+ '</a></h3>';
                            listCartHtml += '<div class="des">' +listCart[key]['color_name']+ '</div>';
                            listCartHtml += '</div>';
                            listCartHtml += '<div class="price align-self-center">' +listCart[key]['product_price']+ ' VNĐ</div>';
                            listCartHtml += '<div class="qty_box align-self-center">';
                            listCartHtml += '<div class="box2">';
                            listCartHtml += '<a href="javascript:void(0)" onclick="downQtyInCart2(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">-</a>';
                            listCartHtml += '<input type="number" id="qty2_' +listCart[key]['productID']+ '_' +listCart[key]['colorID']+ '" min="1" value="'+ listCart[key]['qty'] +'">';
                            listCartHtml += '<a href="javascript:void(0)" onclick="upQtyInCart2(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">+</a>';
                            listCartHtml += '</div>';
                            listCartHtml += '</div>';
                            listCartHtml += '</div>';
                            listCartHtml += '<div class="total align-self-center">';
                            listCartHtml += listCart[key]['total']+ ' VNĐ <br/>';
                            if(listCart[key]['total_origin']){
                                listCartHtml += '<s>' +listCart[key]['total_origin']+ ' VNĐ</s>';
                            }
                            listCartHtml += '</div>';
                            listCartHtml += '<div class="remove align-self-center">';
                            listCartHtml += '<a href="javascript:void(0)" onclick="deleteItemCart2(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">Xóa</a>';
                            listCartHtml += '</div>';
                            listCartHtml += '</div>';
                        }
                    }
                    $('#listProduct').html(listCartHtml);
                    $('#totalMoney').html(data.totalMoney);
                    $('#subtotal, #cart_total').html(data.totalMoney + ' VNĐ');
                    $('#savings').html(data.totalSave + ' VNĐ');
                }
            },
        });
    }
}
function submitForm(){
    var fullname = $('#fullname').val();
    var phone = $('#phone').val();
    var email = $('#email').val();
    var address = $('#address').val();
    //
    if(fullname == ''){
        $('#fullname').parent().find('.error-box').html('Dữ liệu không được để trống!');
        return false;
    }else{
        $('#fullname').parent().find('.error-box').html('');
    }
    //
    if(phone == ''){
        $('#phone').parent().find('.error-box').html('Dữ liệu không được để trống!');
        return false;
    }else{
        $('#phone').parent().find('.error-box').html('');
    }
    //
    if(email == ''){
        $('#email').parent().find('.error-box').html('Dữ liệu không được để trống!');
        return false;
    }else{
        var checkIsEmail = isEmail(email);
        if(checkIsEmail === false){
            $('#email').parent().find('.error-box').html('Email không đúng định dạng!');
            return false;
        }else{
            $('#email').parent().find('.error-box').html('');
        }
        
    }
    //
    if(address == ''){
        $('#address').parent().find('.error-box').html('Dữ liệu không được để trống!');
        return false;
    }else{
        $('#address').parent().find('.error-box').html('');
    }
    $('#loadingDiv').show();
    return true;
}
// check email format
function isEmail(email) {
    var EmailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return EmailRegex.test(email);
}