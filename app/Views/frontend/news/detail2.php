<link rel="stylesheet" type="text/css" href="assets/css/news.css">
<div class="news_cate_page news_section ">
    <div id="ToC"></div> 
    <h1 class="title">
        <?= $news['name']; ?>
    </h1>
    <div class="container container__news">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="times_share">
                        <div class="times"><i class="far fa-calendar-alt"></i> Ngày đăng: <?= date('d.m.Y', strtotime($news['created_at'])) ?></div>
                        <div class="share">
                            <label>Chia sẻ: </label>
                            <iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo base_url();?>/<?= $alias ?>&width=112&layout=button&action=like&size=small&share=true&height=65&appId=792988868746828" width="130" height="30" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    </div>
                    <div class="desc">
                        <?= $news['des']; ?>
                    </div>
                    <div class="contents">
                        <?= $news['content'] ?>
                    </div>
                    <?= $this->include('frontend/news/newsame') ?>
                </div>
                <div class="pagination">
                    <?= $button_pagination; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
      $(document).on("click",".toc_list a",function () { 
            event.preventDefault();
            let getID =  $(this).attr("href");
            let getOffsetTop = $(".contents").find(`a[id='${getID}']`)[0].offsetTop;
            $('html,body').stop().animate({
                    scrollTop:getOffsetTop + 100
                }, 1000);
        });
    $(document).on('click', '.pagination .forClick a', function(e) {
        e.preventDefault();
        $(".active").removeClass('active');
        this.parentElement.classList.add('active');
        var page = $(this).attr('data-ci-pagination-page');
        var alias = '<?= $alias ?>';
        var ajaxload = 'loading';
        $.ajax({
            url: "Route/news/" + alias,
            data: {
                page: page,
                alias: alias,
                ajaxload: ajaxload
            },
            method: "post",
            success: function(e) {
                $("#preview").html(e);
            }
        });
    });
</script>
