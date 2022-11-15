<?php if(isset($communities) && $communities != NULL){ ?>
    <div class="communitys">
        <h2><?=$dataRow['name']?> <br/> <i>by Pure Community</i></h2>
        <div class="row no-gutters">
            <?php foreach ($communities as $key_community => $val_community) { ?>
                <div class="col-lg-3 col-md-6">
                    <div class="item" style="background-image: url('uploads/images/community/<?=$val_community['thumb']?>')">
                        <div class="content">
                            <a href="<?=$val_community['link']?>">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>