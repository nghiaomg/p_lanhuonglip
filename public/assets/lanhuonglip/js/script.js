$(document).ready(function () {
	// menu mobile
	const toggleNavMobile = $(".toggle-nav");
  const navMobile = $(".nav-mobile");
  const closeNavMobile = $(".nav-mobile .close-nav");
  toggleNavMobile.on("click", function () {
    navMobile.toggleClass("active");
  });
  closeNavMobile.on("click", function () {
    navMobile.removeClass("active");
  });
  // load sub menu mobile
  const catDropdownMobile = $(".nav-mobile .cat-dropdown");
  const catDropdownMobile2 = $(".nav-mobile .cat-dropdown2");
  const iconPlus = $(".nav-mobile .icon-plus");
  const iconPlus2 = $(".nav-mobile .icon-plus2");
  const iconPlusChild = $(".nav-mobile .icon-plus-child");
  const subListChild = $(".nav-mobile .sublist-child.cat-dropdown");
  iconPlus.on("click", function (e) {
    catDropdownMobile.slideUp();
    $(this).toggleClass("fa-plus");
    $(this).toggleClass("fa-minus");
    $(this).next().stop().slideToggle(400);
  });
  iconPlus2.on("click", function (e) {
    catDropdownMobile2.slideUp();
    $(this).toggleClass("fa-plus");
    $(this).toggleClass("fa-minus");
    $(this).next().stop().slideToggle(400);
  });
  iconPlusChild.on("click", function (e) {
    subListChild.slideUp();
    $(this).toggleClass("fa-plus");
    $(this).toggleClass("fa-minus");
    $(this).next().stop().slideToggle(400);
  });

  var mySwiper = new Swiper ('.swiper-slider', {
    loop: true,
    slidesPerGroup: 1,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination3",
      clickable: true,
    },
  });

  var mySwiper = new Swiper ('.product-slider-2', {
    loop: true,
    slidesPerGroup: 1,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination4",
      clickable: true,
    },
  });

  // product home
  var swiper = new Swiper(".product_home_slider", {
      slidesPerGroup: 1,
      loop: true,
      loopFillGroupWithBlank: true,
      lazy: true,
      // effect: "fade",
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination4",
        clickable: true,
      },
      breakpoints: {
          1024: {
            slidesPerView: 5,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
      },
  });
	
	// news
	var swiper = new Swiper(".news_slider", {
	    spaceBetween: 20,
      slidesPerGroup: 1,
	    loop: true,
	    loopFillGroupWithBlank: true,
	    lazy: true,
	    // effect: "fade",
	    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
	    },
      pagination: {
        el: ".swiper-pagination2",
        clickable: true,
      },
	    breakpoints: {
        	1024: {
          	slidesPerView: 3,
          	spaceBetween: 20,
        	},
        	768: {
          	slidesPerView: 2,
          	spaceBetween: 20,
        	},
        	640: {
            slidesPerView: 1,
            spaceBetween: 10,
        },
      },
	});

  // news slide page
	var swiper = new Swiper(".news_slider_0", {
    spaceBetween: 20,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    lazy: true,
    // effect: "fade",
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },
    pagination: {
      el: ".swiper-pagination-0",
      clickable: true,
    },
    breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
      },
    },
  });
  var swiper = new Swiper(".news_slider_1", {
    spaceBetween: 20,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    lazy: true,
    // effect: "fade",
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },
    pagination: {
      el: ".swiper-pagination-1",
      clickable: true,
    },
    breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
      },
    },
  });
  var swiper = new Swiper(".news_slider_2", {
    spaceBetween: 20,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    lazy: true,
    // effect: "fade",
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },
    pagination: {
      el: ".swiper-pagination-2",
      clickable: true,
    },
    breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
      },
    },
  });
  var swiper = new Swiper(".news_slider_3", {
    spaceBetween: 20,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    lazy: true,
    // effect: "fade",
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },
    pagination: {
      el: ".swiper-pagination-3",
      clickable: true,
    },
    breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
      },
    },
  });
  var swiper = new Swiper(".news_slider_4", {
    spaceBetween: 20,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    lazy: true,
    // effect: "fade",
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },
    pagination: {
      el: ".swiper-pagination-4",
      clickable: true,
    },
    breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
      },
    },
  });
  var swiper = new Swiper(".news_slider_5", {
    spaceBetween: 20,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    lazy: true,
    // effect: "fade",
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },
    pagination: {
      el: ".swiper-pagination-5",
      clickable: true,
    },
    breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
      },
    },
  });
  var swiper = new Swiper(".news_slider_6", {
    spaceBetween: 20,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    lazy: true,
    // effect: "fade",
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },
    pagination: {
      el: ".swiper-pagination-6",
      clickable: true,
    },
    breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
      },
    },
  });
  // news relate
  var swiper = new Swiper(".news_slider_relate", {
    spaceBetween: 20,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    lazy: true,
    // effect: "fade",
    // autoplay: {
    //   delay: 5000,
    //   disableOnInteraction: false,
    // },
    pagination: {
      el: ".swiper-pagination-relate",
      clickable: true,
    },
    breakpoints: {
        1024: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
      },
    },
  });

  // instagram
  var swiper = new Swiper(".instagram_slider", {
      spaceBetween: 0,
      slidesPerGroup: 1,
      loop: true,
      loopFillGroupWithBlank: true,
      lazy: true,
      // effect: "fade",
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      breakpoints: {
          1024: {
            slidesPerView: 8,
            spaceBetween: 0,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 0,
          },
          640: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
          375: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
      },
  });
	

	$(function () {
	  	$('[data-toggle="tooltip"]').tooltip()
	});

	
	
});


//banner fix until scroll
window.onscroll = function () {
    scrollFunction();
};
// Define visible sticky menu
var banner = document.querySelector('#banner');
var origOffsetY = banner.offsetTop + 200;
function scrollFunction() {
  	// Visible sticky menu
  	// if (window.scrollY >= origOffsetY) {
  	if (window.scrollY > 0) {
    	banner.classList.add('sticky');
  	} else {
    	banner.classList.remove('sticky');
  	}
}


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



//============= ĐẾM NGÀY HẾT HẠN ===================
countDate();
function countDate()
{

  let getDate = $(".regis_kh .left").attr("data-countdate");
  
  // let countDownDate = new Date(getDate).getTime();
  if(getDate){
    let datetimeArr = getDate.split(" ");
    let dateArr = datetimeArr[0].split("-");
    let timeArr = datetimeArr[1].split(":");
    let yearEnd = dateArr[0];
    let monthEnd = dateArr[1] - 1;
    let dayEnd = dateArr[2];
    let hEnd = timeArr[0];
    let mEnd = timeArr[1];
    let sEnd = timeArr[2];
    let countDownDate = new Date(yearEnd, monthEnd, dayEnd, hEnd, mEnd, sEnd).getTime();
    // let countDownDate = new Date(2021, 10, 31, 23, 55, 10).getTime();
    
    // Update the count down every 1 second
    let x = setInterval(function() {
      // Get today's date and time
      // let now = new Date().getTime();
      let now = Date.now();
      // Find the distance between now and the count down date
      let distance = countDownDate - now;
      // Time calculations for days, hours, minutes and seconds
      let days = Math.floor(distance / (1000 * 60 * 60 * 24));
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((distance % (1000 * 60)) / 1000);
      // console.log(days);
      // Output the result in an element with id="demo"
      $("#ch_day").text(days);    
      $("#ch_hour").text(hours);
      $("#ch_minute").text(minutes);
      $("#ch_second").text(seconds);
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
      }
    }, 1000);
  }
}

$("#register__ft").click(function () { 
  let email = $("#emailf").val();
  let flag = true;
  if(email == "")
  {
    flag = false;
    $('#error_email').html('Dữ liệu không được để trống');
  }else{
    $('#error_email').html('');
  }
  if(flag == true)
  {
    $.ajax({
    type: "POST",
    url: "dang-ky-ngay",
    data: {email: email},
    dataType: "JSON",
    success: function (res) {
      Swal.fire({
        icon: res.type,
        title: res.mess,
        type: res.type,
      });
      $("#emailf").val("");
    }
    });
  }		
});

// cart
function openCart(){
  $.ajax({
    method: "POST",
    url: "load-cart",
    dataType: "json",
    success: function (data) {
        if(data && data.success == 1){
          var listCartHtml = '';
          var listCart = data.listCart;
          for (var key in listCart) {
              if (listCart.hasOwnProperty(key) && listCart[key]['productID'] != null) {
                  // console.log(key + " -> " + listCart[key]['product_thumb']);
                  listCartHtml += '<div class="item">';
                      listCartHtml += '<div class="box_img" style="background-image: url(' +listCart[key]['product_thumb']+ ')"></div>';
                      listCartHtml += '<div class="info">';
                          listCartHtml += '<div class="name_close">';
                              listCartHtml += '<a href="' +listCart[key]['product_alias']+ '">' +listCart[key]['product_name']+ '<br/>' +listCart[key]['color_name']+ '</a>';
                              listCartHtml += '<div class="del_pro">';
                                  listCartHtml += '<a href="javascript:void(0)" onclick="deleteItemCart(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')"><i class="fa-solid fa-xmark"></i></a>';
                              listCartHtml += '</div>';
                          listCartHtml += '</div>';
                          listCartHtml += '<div class="qty_price">';
                              listCartHtml += '<div class="qty_box">';
                                  listCartHtml += '<a href="javascript:void(0)" onclick="downQtyInCart(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">-</a>';
                                  listCartHtml += '<input type="number" id="qty_' +listCart[key]['productID']+ '_' +listCart[key]['colorID']+ '" min="1" value="'+ listCart[key]['qty'] +'">';
                                  listCartHtml += '<a href="javascript:void(0)" onclick="upQtyInCart(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">+</a>';
                              listCartHtml += '</div>';
                              listCartHtml += '<div class="price">' +listCart[key]['product_price']+ ' đ</div>';
                          listCartHtml += '</div>';
                      listCartHtml += '</div>';
                  listCartHtml += '</div>';
              }
            }
            $('#totalMoney').html(data.totalMoney);
            
        }else{
          listCartHtml = '<div class="text-center">';
          listCartHtml += '<p class="text-center mt-3">Giỏ hàng rỗng!</p>';
          listCartHtml += '<img src="assets/images/cart_empty.png" alt="Giỏ hàng rỗng" width="150">';
          listCartHtml += '</div>';
        }
        $('#product_list_cart').html(listCartHtml);
        $('#cartDrawer').addClass('cartDrawerShow');
    },
  });
}
function closeCart(){
  $('#cartDrawer').removeClass('cartDrawerShow');
}
function downQtyInCart(productID, colorID){
  var qtCurrent = $('#qty_' + productID + '_' + colorID).val();
  if(qtCurrent > 1){
      qtCurrent = parseInt(qtCurrent) - 1;
  }
  $('#qty_' + productID + '_' + colorID).val(qtCurrent);
  updateCartByQty(productID, qtCurrent, colorID);
}
function upQtyInCart(productID, colorID){
  var qtCurrent = $('#qty_' + productID + '_' + colorID).val();
  qtCurrent = parseInt(qtCurrent) + 1;
  $('#qty_' + productID + '_' + colorID).val(qtCurrent);
  updateCartByQty(productID, qtCurrent, colorID);
}
function updateCartByQty(productID, qty, colorID) {
  if(qty && productID){
      $.ajax({
          method: "POST",
          url: "update-cart",
          data: { productID: productID,colorID: colorID, qty: qty },
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
                                      listCartHtml += '<a href="' +listCart[key]['product_alias']+ '">' +listCart[key]['product_name']+ '<br/>' +listCart[key]['color_name']+ '</a>';
                                      listCartHtml += '<div class="del_pro">';
                                          listCartHtml += '<a href="javascript:void(0)" onclick="deleteItemCart(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')"><i class="fa-solid fa-xmark"></i></a>';
                                      listCartHtml += '</div>';
                                  listCartHtml += '</div>';
                                  listCartHtml += '<div class="qty_price">';
                                      listCartHtml += '<div class="qty_box">';
                                          listCartHtml += '<a href="javascript:void(0)" onclick="downQtyInCart(' +listCart[key]['productID']+ ',' +listCart[key]['colorID']+ ')">-</a>';
                                          listCartHtml += '<input type="number" id="qty_' +listCart[key]['productID']+ '_' +listCart[key]['colorID']+ '" min="1" value="'+ listCart[key]['qty'] +'">';
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
function deleteItemCart(productID, colorID) {
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
                              listCartHtml += '<div class="info">';
                                  listCartHtml += '<div class="name_close">';
                                      listCartHtml += '<a href="' +listCart[key]['product_alias']+ '">' +listCart[key]['product_name']+ '<br/>' +listCart[key]['color_name']+ '</a>';
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