<div class="sidebar">
    <?php if($cateNews != NULL){  ?>
        <div class="cate_list">
            <div class="title">Danh mục</div>
            <div class="box">
                <ul>
                    <?php foreach($cateNews as $key => $val){  ?>
                        <li><a href="<?=$val['alias']?>"><?=$val['name']?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
    <?php if($hotNews != NULL){  ?>
    <div class="news_list">
        <div class="title">Bài viết nổi bật</div>
        <div class="box">
            <?php foreach($hotNews as $key => $val){  ?>
                <div class="item">
                    <div class="box_img">
                        <a href="<?=$val['alias']?>">
                            <div class="img" style="background-image: url('<?= $val['webps_thumb'] ?>');"></div>
                        </a>
                    </div>
                    <div class="box_info">
                        <a href="<?=$val['alias'] ?>"><h3><?=$val['name'] ?></h3></a>
                        <div class="date_post"><i class="far fa-calendar-alt"></i> <?=$val['created_at'] ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>