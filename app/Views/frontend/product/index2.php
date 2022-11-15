<link rel="stylesheet" href="assets/css/mevabe/product-category.css">
<div class="page-name bg-white">
    <div class="container py-40 ">
        <h1 class="title text-capitalize text-center font-medium "><?=$menuInfo['name']?></h1>
        <nav aria-label="breadcrumb" class="">
            <ol class="page-name-breadcrumb breadcrumb bg-white align-items-center justify-content-center">
                <li class="breadcrumb-item hover-pink"><a class=" --text-black" href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$menuInfo['name']?></li>
            </ol>
        </nav>
    </div>
</div>
<!-- start main bottom -->
<div class="container">
    <div class="main-row-bottom d-flex flex-column flex-lg-row">
        <?=$this->include('frontend/product/sidebar')?>
        <div class="main-col-right order-1 order-lg-2 ">
            <div class="category-toolbar px-3 d-flex flex-column flex-md-row align-items-center justify-content-between">
                <nav class="list-view d-flex align-items-center mb-md-0 mb-3">
                    <p class="result-show --text-light">Hiển thị tất cả <strong><?=$product?count($product):0?></strong> kết quả</p>
                </nav>
                <form action="" class="form-sorting">
                    <select class="select-sorting --text-light custom-select --border-gray pl-3 rounded-5 --bg-gray outline-none"
                    id="productsort">
                        <option value="">Thứ tự mặc định</option>
                        <option value="az">Thứ tự từ a-z</option>
                        <option value="za">Thứ tự từ z-a</option>
                        <option value="asc">Giá tăng dần</option>
                        <option value="desc">Giá giảm dần</option>
                    </select>
                </form>
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
    let CURRENT_URL  =  "<?=$tmp_domain ?><?=$alias?>";
    let thuong_hieu  = "thuong_hieu=";
    let arrBrand     = [];
    let gia          = "gia=";
    let arrGia       = [];
    let tinhtrang    = "tinhtrang=";
    let tinhtrangID  = "<?=$_GET['tinhtrang']?>";
    let changeURL    = "";         
    let UriPrice     = "<?=$_GET['gia'] ?>";     
    let UriBrand     = "<?=$_GET['thuong_hieu'] ?>";           
    // click phân trang
    const url_paging = "pagination-cate-product/1";
    let data = {
        "loadAjax": "loadAjax",
        "alias": "<?= $alias ?>",
        "sort": "",
        "page": 1,
        "status": "<?=$_GET['tinhtrang']?>",
        "brands": "<?=$brandIDArray_str ?>",
        "price": "<?=$arrprices_str ?>",
	}
      // Thương hiệu
    function checkBrand(_this,id)
    {   
        let getAllBrand  = document.querySelectorAll(".input_brand");
        $(getAllBrand).each((key,obj)=>{
            let get_brandid = $(obj).attr("data-brandid");
            let checkk = obj.checked;
            if(obj.checked == true && !arrBrand.includes(get_brandid))
            {
                arrBrand.push(get_brandid);
            }
        });
        //=========================
        if(_this.checked == false)
        {
            let indexof = arrBrand.indexOf(id);
            if (indexof > -1) {
                arrBrand.splice(indexof, 1);
            }
        }
        //==========================
        data.page = 1;
        if(arrBrand.length > 0)
        {
            data.brands = arrBrand.toString();
        }else
        {
            data.brands = "";
        }
        //===========================
        CallAjax(data, url_paging);
            UriBrand         = arrBrand.toString();
        let assignThuonghieu = arrBrand.length > 0 ? thuong_hieu+ UriBrand + "&" : '';

        let Tmp_Status     = tinhtrangID != "" ? tinhtrang +tinhtrangID : '' ;
        let Tmp_UriPrice   = UriPrice != "" ?  gia + UriPrice +"&": '' ;

        let Tmp_UriBrand   = assignThuonghieu + Tmp_UriPrice + Tmp_Status ;
            changeURL      = CURRENT_URL+"?"+Tmp_UriBrand;
            changeURL      = changeURL.replace(/&$|\?$/, '');
        history.replaceState(null,null,changeURL);
    } 
    // giá 
    function checkPrice(_this,priceFrom,priceTo) 
    {  
        let getAllPrice  = document.querySelectorAll(".input_price");
        $(getAllPrice).each((key,obj)=>{
            let get_price_from = $(obj).attr("data-pricefrom");
            let get_price_to = $(obj).attr("data-priceto");
            let strPrice = get_price_from+"-"+get_price_to;
            if(obj.checked == true && !arrGia.includes(strPrice))
            {
                arrGia.push(strPrice);
            }
        });
        let tmp_strPrice = priceFrom+"-"+priceTo;
        //=========================
        if(_this.checked == false)
        {
            console.log(tmp_strPrice);
            let indexof = arrGia.indexOf(tmp_strPrice);
            if (indexof > -1) {
                arrGia.splice(indexof, 1);
            }
        }
        //==========================
        data.page = 1;
        if(arrGia.length > 0)
        {
            data.price = arrGia.toString();
        }else
        {
            data.price = "";
        }
        CallAjax(data, url_paging);
            UriPrice       = arrGia.toString();
        let assignGia      = arrGia.length > 0 ? gia+ UriPrice + "&" : '';
        let Tmp_UriBrand   = UriBrand != "" ?  thuong_hieu + UriBrand +"&": '' ;
        let Tmp_Status     = tinhtrangID != "" ? tinhtrang +tinhtrangID : '';
        debugger;
        let Tmp_UriPrice   = Tmp_UriBrand + assignGia + Tmp_Status ;
            changeURL      = CURRENT_URL+"?" + Tmp_UriPrice;
            changeURL      = changeURL.replace(/&$|\?$/, '');
            history.replaceState(null,null,changeURL);
    }
    // tình trạng sản phẩm
    function statusProduct(_this)
    {
        let status  = $(_this).val();
        data.page   = 1;
        data.status = status;
        tinhtrangID = status;
        let Tmp_UriBrand   = UriBrand != "" ?  thuong_hieu + UriBrand +"&": '' ;
        let Tmp_UriPrice   = UriPrice != "" ?  gia + UriPrice +"&": '' ;
        let Tmp_Status     = tinhtrangID != "" ? tinhtrang + tinhtrangID : "";
            changeURL      = CURRENT_URL+"?"+ Tmp_UriBrand + Tmp_UriPrice + Tmp_Status;
            changeURL      = changeURL.replace(/&$|\?$/, '');
        history.replaceState(null,null,changeURL);
        CallAjax(data, url_paging);
    }
    // sắp xếp 
    $("#productsort").on("change",function () { 
        let getsort = $(this).val();
        data.page = 1;
        data.sort = getsort;
        CallAjax(data, url_paging);
    });

    // phân trang 
	$(document).on('click', '.pagination .forClick a', function(event) {
		event.preventDefault();
		let page = $(this).attr('data-ci-pagination-page');
        let getsort = $("#productsort").val();
        data.page = page;
        data.sort = getsort;
        //===============================
        let Tmp_UriBrand   = UriBrand != "" ?  thuong_hieu + UriBrand +"&": '' ;
        let Tmp_UriPrice   = UriPrice != "" ?  gia + UriPrice +"&": '' ;
        let Tmp_Status     = tinhtrangID != "" ? tinhtrang +tinhtrangID + "&" : '';
            changeURL      = CURRENT_URL+ "?" + Tmp_UriBrand + Tmp_UriPrice + Tmp_Status + "page="+page;
            changeURL      = changeURL.replace(/&$|\?$/, '');
        history.replaceState(null,null,changeURL);
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

    
</script>