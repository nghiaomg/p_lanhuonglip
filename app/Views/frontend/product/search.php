<link rel="stylesheet" href="assets/css/mevabe/product-category.css">
<div class="page-name bg-white">
    <div class="container py-40 ">
        <h1 class="title text-capitalize text-center font-medium "><?=$menuInfo['name']?></h1>
        <nav aria-label="breadcrumb" class="">
            <ol class="page-name-breadcrumb breadcrumb bg-white align-items-center justify-content-center">
                <li class="breadcrumb-item hover-pink"><a class=" --text-black" href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
            </ol>
        </nav>
    </div>
</div>
<!-- start main bottom -->
<div class="container">
    <div class="main-row-bottom d-flex flex-column flex-lg-row">
        <?=$this->include('frontend/product/sidebar')?>
        <div class="main-col-right order-1 order-lg-2">
            <div class="container">
                <div class="tileSearch">
                    <p>Tìm kiếm từ khóa <b>"<?=$_GET['keyword'] ?>"</b> có <?=$countProduct ?> sản phẩm</p>
                </div>   
            </div>
            <section class="main-products mt-0 products-carousel">
                <div class="products-carousel__inner" id="itemProduct">
                    <?=$this->include('frontend/product/samedata')?>
                </div>
            </section>
        </div>
    </div>
</div>
<script src="assets/js/mevabe/product.js"></script>
<script>
    $(document).ready(function () { 
        createBorder();
    });
    // click phân trang
    const url_paging = "pagination-search";
    let data = {
        "loadAjax": "loadAjax",
        "keyword" : "<?=$_GET['keyword'] ?>",
        "alias": "<?= $alias ?>",
        "page": 1,
	}
	$(document).on('click', '.pagination .forClick a', function(event) {
		event.preventDefault();
		let page = $(this).attr('data-ci-pagination-page');
        data.page = page;
		CallAjax(data, url_paging);
	});
	// ajax dùng chung
	function CallAjax(data, url) {
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			success:function(res) {
				$("#itemProduct").html(res);
                createBorder();
			}
		});

	}

    function createBorder() { 
        let setBorderTop = document.querySelectorAll(".sameCol");
        let getWidth = setBorderTop[0].offsetWidth;
        let calcBorder = getWidth* (setBorderTop.length);
        $(".bordet__top").css({"width": calcBorder+"px"});
     }
</script>