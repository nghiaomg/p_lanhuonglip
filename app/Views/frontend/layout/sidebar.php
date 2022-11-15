<div class="side-bar">
    <div class="container">
        <div class="row">
            <!-- Categories -->
            <div class="col-12 box-categories">
                <?php if (isset($cate) && $cate != NULL) {
                    if (is_array($cate)) { ?>
                        <div class="title">
                            <p class="txt-side-bar">Danh mục</p>
                            <div class="underline-cons-title"></div>
                        </div>
                        <div class="list-categories">
                            <?php foreach ($cate as $key => $value) { ?>
                                <div class="detail-cate d-flex justify-content-between">
                                    <a href="<?= $value['alias'] ?>" class="link-cate"><i class="fas fa-chevron-right"></i> <?= $value['name'] ?></a>
                                    <p class="amount-of-cate"><?= isset($value['childNum']) && $value['childNum'] != NULL ? $value['childNum'] : 0 ?></p>
                                </div>
                                <hr>
                            <?php } ?>
                        </div>
                <?php }
                } ?>
            </div>
            <!-- End - Categories -->

            <!-- Most view -->
            <div class="col-12 box-most-view">
                <?php
                if (isset($newsMostView) && $newsMostView != NULL) {
                    if (is_array($newsMostView)) { ?>
                        <div class="title">
                            <p class="txt-side-bar">Bài viết xem nhiều nhất</p>
                            <div class="underline-cons-title"></div>
                        </div>
                        <div class="news-list-most-view">
                            <?php foreach ($newsMostView as $key => $value) { ?>
                                <div class="row">
                                    <div class="col-3 wrap-img-view">
                                        <a href="<?= $value['alias'] ?>">
                                            <img src="<?= $value['webps'] ?>" alt="News Image" class="img-most-view">
                                        </a>
                                    </div>
                                    <div class="col-9 content d-flex flex-column justify-content-between wrap-content">
                                        <a href="<?= $value['alias'] ?>"><?= $value['name'] ?></a>
                                        <p><i class="far fa-calendar-alt"></i> <?= date('d/m/Y', strtotime($value['created_at'])) ?></p>
                                    </div>
                                </div>
                                <hr>
                            <?php } ?>
                        </div>
                <?php }
                }
                ?>
            </div>
            <!-- End - Most view -->
        </div>
    </div>
</div>