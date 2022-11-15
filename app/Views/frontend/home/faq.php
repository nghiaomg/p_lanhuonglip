<section class="faq">
    <div class="container">
        <h2 class="title">
            FAQS
        </h2>
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <img src="assets/images/mailam/faq.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="item ">
                        <div class="title d-flex">
                            <div class="text">
                                1.Lorem Ipsum is simply dummy text of the
                            </div>
                            <div class="icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="content">
                            Ngay sau khi tiếp nhận thông báo và nhận được lịch gặp mặt của khách hàng về kiểu dáng nội thất 
                            thông minh và thông nhất về chất liệu, kết cấu sản phẩm. 
                            Phố Xanh tới tận nơi để tư vấn cho bạn.
                        </div>
                    </div>
                    <div class="item ">
                        <div class="title d-flex">
                            <div class="text">
                                2.Lorem Ipsum is simply dummy text of the
                            </div>
                            <div class="icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="content">
                            Ngay sau khi tiếp nhận thông báo và nhận được lịch gặp mặt của khách hàng về kiểu dáng nội thất 
                            thông minh và thông nhất về chất liệu, kết cấu sản phẩm. 
                            Phố Xanh tới tận nơi để tư vấn cho bạn.
                        </div>
                    </div>
                    <div class="item ">
                        <div class="title d-flex">
                            <div class="text">
                                3.Lorem Ipsum is simply dummy text of the
                            </div>
                            <div class="icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="content">
                            Ngay sau khi tiếp nhận thông báo và nhận được lịch gặp mặt của khách hàng về kiểu dáng nội thất 
                            thông minh và thông nhất về chất liệu, kết cấu sản phẩm. 
                            Phố Xanh tới tận nơi để tư vấn cho bạn.
                        </div>
                    </div>
                    <div class="item ">
                        <div class="title d-flex">
                            <div class="text">
                                4.Lorem Ipsum is simply dummy text of the
                            </div>
                            <div class="icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="content">
                            Ngay sau khi tiếp nhận thông báo và nhận được lịch gặp mặt của khách hàng về kiểu dáng nội thất 
                            thông minh và thông nhất về chất liệu, kết cấu sản phẩm. 
                            Phố Xanh tới tận nơi để tư vấn cho bạn.
                        </div>
                    </div>
                    <div class="item ">
                        <div class="title d-flex">
                            <div class="text">
                                5.Lorem Ipsum is simply dummy text of the
                            </div>
                            <div class="icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="content">
                            Ngay sau khi tiếp nhận thông báo và nhận được lịch gặp mặt của khách hàng về kiểu dáng nội thất 
                            thông minh và thông nhất về chất liệu, kết cấu sản phẩm. 
                            Phố Xanh tới tận nơi để tư vấn cho bạn.
                        </div>
                    </div>
                    <div class="item ">
                        <div class="title d-flex">
                            <div class="text">
                                6.Lorem Ipsum is simply dummy text of the
                            </div>
                            <div class="icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="content">
                            Ngay sau khi tiếp nhận thông báo và nhận được lịch gặp mặt của khách hàng về kiểu dáng nội thất 
                            thông minh và thông nhất về chất liệu, kết cấu sản phẩm. 
                            Phố Xanh tới tận nơi để tư vấn cho bạn.
                        </div>
                    </div>
                    <div class="item ">
                        <div class="title d-flex">
                            <div class="text">
                                7.Lorem Ipsum is simply dummy text of the
                            </div>
                            <div class="icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="content">
                            Ngay sau khi tiếp nhận thông báo và nhận được lịch gặp mặt của khách hàng về kiểu dáng nội thất 
                            thông minh và thông nhất về chất liệu, kết cấu sản phẩm. 
                            Phố Xanh tới tận nơi để tư vấn cho bạn.
                        </div>
                    </div>
                    <div class="item ">
                        <div class="title d-flex">
                            <div class="text">
                                8.Lorem Ipsum is simply dummy text of the
                            </div>
                            <div class="icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <div class="content">
                            Ngay sau khi tiếp nhận thông báo và nhận được lịch gặp mặt của khách hàng về kiểu dáng nội thất 
                            thông minh và thông nhất về chất liệu, kết cấu sản phẩm. 
                            Phố Xanh tới tận nơi để tư vấn cho bạn.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
      $(".faq .item").click(function () { 
            $(".faq .item").not(this).removeClass("linetop");
            $(".faq .item").not(this).find(".content").slideUp();
            $(this).toggleClass("linetop");
            let checkHasClass = $(this).hasClass("linetop");
            if(checkHasClass == true)
            {
                $(this).find("i").removeClass("fa-plus");
                $(this).find("i").addClass("fa-minus");
                $(this).closest(".item").find(".content").slideDown();
            }
            if(checkHasClass == false)
            {
                $(this).find("i").removeClass("fa-minus");
                $(this).find("i").addClass("fa-plus");
                $(this).closest(".item").find(".content").slideUp();
            }
        });
</script>