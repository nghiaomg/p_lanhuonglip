<?php if(isset($dataRelates) && $dataRelates != NULL){ ?>
    <div class="product_list product_relate_list">
        <h2>Sản phẩm liên quan</h2>
        <div class="swiper swiper-container product_relate_slider">
            <div class="swiper-wrapper">
                <?php foreach ($dataRelates as $key_dataRelate => $val_relate) { 
                    if($val_relate['price_sale'] > 0){
                        $percent = 100 - round(($val_relate['price_sale']*100)/$val_relate['price'], 0);
                    }
                ?>
                <div class="swiper-slide">
                    <div class="item">
                        <a href="<?=$val_relate['alias']?>" <?=$val_relate['title']?>>
                            <div class="box_img" style="background-image: url('uploads/images/product/<?=$val_relate['thumb']?>');"></div>
                            <h3><?=$val_relate['name']?></h3>
                        </a>
                        <div class="box_price">
                            <?php if($val_relate['price_sale'] > 0){ ?><div class="price"><?=number_format($val_relate['price_sale'])?></div><?php } ?>
                            <div class="price <?php if($val_relate['price_sale'] > 0){ ?> price_sale <?php } ?>"><?=number_format($val_relate['price'])?></div>
                        </div>
                        <?php if($val_relate['price_sale'] > 0){ ?>
                            <div class="sale"><?=$percent?>%</div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination-relate"></div>
        </div>

        <!-- paging -->
        <?php /*<div class="pagination">
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
        </div> */?>
    </div>
<?php } ?>
<?php /*<div class="inputHiden">
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
</script> */?>