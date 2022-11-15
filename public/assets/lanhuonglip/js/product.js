$(document).ready(function () {
    var mySwiper = new Swiper ('.swiper-product-photo', {
        loop: true,
        slidesPerGroup: 1,
        spaceBetween: 40,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination-photos",
            clickable: true,
        },
    });
    // product home
    var swiper = new Swiper(".product_relate_slider", {
        slidesPerGroup: 1,
        loop: false,
        loopFillGroupWithBlank: true,
        lazy: true,
        // effect: "fade",
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination-relate",
            clickable: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            375: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
        },
    });

    // list photo
    var swiper = new Swiper(".product_list_photo", {
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        lazy: true,
        // effect: "fade",
        navigation: {
            nextEl: '.swiper-button-prev',
            prevEl: '.swiper-button-next'
        },
        breakpoints: {
            1024: {
                slidesPerView: 5,
                spaceBetween: 0,
            },
            768: {
                slidesPerView: 5,
                spaceBetween: 0,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            375: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
        },
    });
});
$(".faq .item .title").click(function () { 
    $(".faq .item").not(this).removeClass("linetop");
    $(".faq .item").find(".icon").html("<img src='assets/lanhuonglip/images/icons/plus.png' alt='faq' width='20' height='20'>");
    $(".faq .item").not(this).find(".content").slideUp();
    $(this).toggleClass("linetop");
    let checkHasClass = $(this).hasClass("linetop");
    if(checkHasClass == true)
    {
        $(this).find(".icon").html("<img src='assets/lanhuonglip/images/icons/minus.png' alt='faq' width='20' height='20'>");
        $(this).closest(".item").find(".content").slideDown();
    }
    if(checkHasClass == false)
    {
        $(this).find(".icon").html("<img src='assets/lanhuonglip/images/icons/plus.png' alt='faq' width='20' height='20'>");
        $(this).closest(".item").find(".content").slideUp();
    }
});
function loadPhotoToMain(path_img, name, key){
    $('#colorKey').val(key);
    $('#productPhoto').html('<a href="javascript:void(0)" class="zoom" data-src="' + path_img + '" data-fancybox="gallery"><img src="' + path_img + '" alt="' + name + '"/></a>');
}
function loadPhotoToMainByColor(id){
    $('#colorID').val(id);
    let key = $('#colorKey').val();
    if(key == 0){
        key = '';
    }else{
        key = '_' + key; 
    }
    $.ajax({
        method: "POST",
        url: "load-photo-product",
        data: { id: id, key: key },
        dataType: "json",
        success: function (data) {
            if(data && data.rs === 1){
                $('.swatch-element').removeClass('active');
                $('.swatch-element-' + id).addClass('active');
                $('.info_color_choose .name').html(data.name);
                $('.info_color_choose .des_color').html(data.des);
                $('#productPhoto').html('<a href="javascript:void(0)" class="zoom" data-src="' + data.path_img + '" data-fancybox="gallery"><img src="' + data.path_img + '" alt=""/></a>');
            }
        }
    });
    
}
function loadPhotoToMainByColorMobile(id, productID, color_code){
    $('#colorID').val(id);
    $.ajax({
        method: "POST",
        url: "load-photo-product-mobile",
        data: { id: id, productID:productID },
        success: function (data) {
            if(data){
                let newValueAttr = 'background-color:' + color_code;
                $('.swatch-element').removeClass('active');
                $('.swatch-element-' + id).addClass('active');
                $('#photoSlideLoad').html(data);
                $('.current_color_show').attr('style', newValueAttr);
            }
        }
    });
    
}
function showHideBoxChooseColor(){
    if($('.choose_color_box').hasClass('show')){
        $('.choose_color_box').removeClass('show');
        $('.current_arrow_icon').html('<i class="fas fa-chevron-up"></i>');
    }else{
        $('.choose_color_box').addClass('show');
        $('.current_arrow_icon').html('<i class="fas fa-chevron-down"></i>');
    } 
}