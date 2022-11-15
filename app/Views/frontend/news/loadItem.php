<div class="cate_news">
    <div class="row">
        <?php if ($news != NULL) {  ?>
            <?php foreach ($news as $key => $val) {  ?>
                <!-- item -->
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="item">
                        <div class="box_img">
                            <a href="<?= $val['alias'] ?>">
                                <div class="img" style="background-image: url('<?= $val['webps_thumb'] ?>');"></div>
                            </a>
                        </div>
                        <div class="box_info">
                            <a href="<?= $val['alias'] ?>">
                                <h3><?=$CI_function->rip_tags($val['name'], 45)?></h3>
                            </a>
                            <a href="<?= $val['alias'] ?>" class="view__detail">Xem chi tiết <i class="fa-solid fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<!-- phân trang -->
<div class="pagination">
    <?= $button_pagination ?>
</div>
<!-- phân trang END -->
