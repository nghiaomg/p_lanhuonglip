<?php if(isset($cateHots) && $cateHots != NULL){ ?>
<section id="main-category" class="main-category">
    <div class="main-category__wrapper">
        <div class="main-category__row row no-gutters">
            <?php foreach ($cateHots as $key_cateHot => $val_cateHot) { ?>
            <div class="col-md-4">
                <div class="main-category__item bg-white d-flex  --border-gray flex-row flex-md-column flex-xl-row">
                    <div class="main-category__image mr-4">
                        <img class="rounded-circle" src="uploads/images/menuProduct/<?=$val_cateHot['thumb']?>"
                        alt="<?=$val_cateHot['name']?>">
                    </div>
                    <div class="main-category__content">
                        <h4 class="main-category__title font-semibold "><a class="--text-black" href="<?=$val_cateHot['alias']?>"><?=$val_cateHot['name']?></a></h4>
                        <?php if(isset($val_cateHot['childs']) && $val_cateHot['childs'] != NULL){ ?>
                            <ul class="main-category__sublist">
                                <?php foreach ($val_cateHot['childs'] as $key_cateHot_child => $val_cateHot_child) { ?>
                                    <li class="item"><a class="hover-pink --text-light text-capitalize" href="<?=$val_cateHot_child['alias']?>"><?=$val_cateHot_child['name']?></a></li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>