$(document).ready(function () {
  //initialize swiper when document ready
  // var mySwiper = new Swiper('.swiper-container', {
  //     loop: true,
  //     spaceBetween: 50,
  //     speed: 1000,
  //     effect: 'fade',
  //     navigation: {
  //         nextEl: '.swiper-button-next',
  //         prevEl: '.swiper-button-prev',
  //     },
  //     autoplay: {
  //         delay: 5000,
  //         disableOnInteraction: false,
  //     }
  // })

});

$(".openClose").click(function () {
    $("#menuMobile").toggleClass("toggle_menumobile");
});

$(".arrow_menu").click(function () {
  if($(this).hasClass("fa-chevron-right"))
  {
    $(this).removeClass("fa-chevron-right");
    $(this).addClass("fa-chevron-down");
  }else
  {
    $(this).removeClass("fa-chevron-down");
    $(this).addClass("fa-chevron-right");
  }

  $(this).parent("li").find(".submenu").toggleClass("d-block");
});

//back to top
$(window).scroll(function() {
  if ($(this).scrollTop() > 200) {
    $('.go__top').fadeIn(200);
  } else {
    $('.go__top').fadeOut(200);
  }
});
$('.go__top').click(function(event) {
  event.preventDefault();
  $('html, body').animate({scrollTop: 0}, 300);
});
//back to top End