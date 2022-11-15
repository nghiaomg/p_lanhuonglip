<link href="assets/lanhuonglip/css/product.css" rel="stylesheet" type="text/css" />
<div class="product_page">
    <div class="banner" style="background-image: url('assets/lanhuonglip/images/bg5.png');"></div>
    <div class="breadcrumb_box">
        <div class="container">
            <a href="/" title="Back to the frontpage">Trang chủ</a>
            <span aria-hidden="true">›</span>
            <?php if(isset($breadcrumbs) && $breadcrumbs != NULL){ ?>
                <?php foreach ($breadcrumbs as $key_breadcrumb => $val_breadcrumb) { ?>
                    <a href="<?=$val_breadcrumb['alias']?>" title=""><?=$val_breadcrumb['name']?></a>
                    <span aria-hidden="true">›</span>
                <?php } ?>
            <?php } ?>
            <span class="medium-down--hide"><?=$name?></span>
        </div>
    </div>
    <div class="clear"></div>
    <?php if(isset($datas) && $datas != NULL){ ?>
    <div class="product_list">
        <div class="container">
            <h1><?=$name?></h1>
            <div class="row">
                <?php foreach ($datas as $key => $val) {
                    $percent = 0;
                    if($val['price_sale'] != 0){ 
                        $percent = 100 - round(($val['price_sale']*100)/$val['price'], 0);
                    }
                ?>
                <div class="col-lg-3 col-md-3 col-6">
                    <div class="item">
                        <a href="<?=$val['alias']?>" <?=$val['title']?>>
                            <div class="box_img" style="background-image: url('uploads/images/product/<?=$val['thumb']?>');"></div>
                            <h3><?=$val['name']?></h3>
                        </a>
                        <div class="box_price">
                            <?php if($val['price_sale'] > 0){ ?><div class="price"><?=number_format($val['price_sale'])?></div><?php } ?>
                            <div class="price <?php if($val['price_sale'] > 0){ ?> price_sale <?php } ?>"><?=number_format($val['price'])?></div>
                        </div>
                        <?php if($percent != 0){ ?>
                            <div class="sale"><?=$percent?>%</div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>

            <!-- paging -->
            <div class="pagination">
                <?php if($numPage > 1){ ?>
                    <?php if($_GET['page'] && $_GET['page'] > 1){ ?>
                        <div class="page"><a href="javascript:void(0)" onclick="prevPage()">←</a></div>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $numPage; $i++) { ?>
                        <div class="page"><a href="javascript:void(0)" <?php if($i == $_GET['page'] || (!$_GET['page']) && $i == 1){ ?> class="current" <?php }else{ ?> onclick="pagingFunc(<?=$i?>)" <?php } ?>><?=$i?></a></div>
                    <?php } ?>
                    <?php if($_GET['page'] < $numPage){ ?>
                        <div class="page"><a href="javascript:void(0)" onclick="nextPage()">→</a></div>
                    <?php } ?>
                <?php } ?>
			</div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="inputHiden">
	<input type="hidden" id="page" value="<?=$_GET['page']?$_GET['page']:1?>">
	<input type="hidden" id="alias" value="<?=$alias?>">
</div>
<script language="JavaScript">
	function pagingFunc(page){
		$('#page').val(page);
		refreshPage();
	}
    function nextPage(){
        var pageCurrent = $('#page').val();
        var pageNext = parseInt(pageCurrent) + 1;
        $('#page').val(pageNext);
        refreshPage();
    }
    function prevPage(){
        var pageCurrent = $('#page').val();
        var pageNext = parseInt(pageCurrent) - 1;
        $('#page').val(pageNext);
        refreshPage();
    }
	function refreshPage(){
		var url = '';

		var page = $('#page').val();
		var alias = $('#alias').val();
		if(page != ''){
			url += '?page=' + page;
		}
		// console.log(url);
		if(url != ''){
			var url = alias + url;
			window.location.href = url;
		}
	}
</script>