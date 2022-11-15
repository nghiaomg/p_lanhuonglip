<?php if(isset($datas) && $datas != NULL){ ?>
    <div class="row">
        <?php foreach ($datas as $key_data => $val_data) { ?>
        <!-- item -->
        <div class="col-lg-4 col-md-6">
            <div class="item">
                <a href="<?=$val_data['alias']?>">
                    <div class="box_img" style="background-image: url('uploads/images/news/<?=$val_data['thumb']?>');"></div>
                    <h3><?=$val_data['name']?></h3>
                </a>
                <a href="<?=$val_data['alias']?>" class="view_detail">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <?php } ?>
    </div>
<?php } ?>