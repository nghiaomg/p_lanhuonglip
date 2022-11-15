<div class="news_same">
<?php if (isset($newssame) && $newssame != NULL) { ?>
    <h2 class="title">Bài viết liên quan</h2>
    <div id="preview">
        <div class="row">
            <?php foreach ($newssame as $key => $val) { ?>
                <div class="col-lg-6">
                    <div class="item">
                        <a href="<?= $val['alias'] ?>" title="<?=$val['name'] ?>">
                        <div class="box__img" style="background-image: url('<?= $data_index['check_Browser'] == true ? $path_dir . $val['thumb'] : $val['webps_thumb'] ?>');">
                        </div>
                        </a>
                        <div class="box_info">
                            <h3>
                                <a href="<?= $val['alias'] ?>" title="<?=$val['name'] ?>"><?= $_this->trip_tags($val['name'], 30) ?></a>
                            </h3>
                            <div class="times">Ngày đăng: <?= date('d/m/Y', strtotime($val['created_at'])) ?></div>
                            <div class="des d-md-block d-none"><?=$_this->trip_tags($val['des'],120)  ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
</div>