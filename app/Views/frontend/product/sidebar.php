<div class="main-col-left flex-shrink-0 order-2 order-lg-1">
    <?php if(isset($cateLefts) && $cateLefts != NULL){ ?>
    <aside class="products-categories bg-white py-3 px-4 py-lg-4 --border-gray rounded-5">
        <h3 class="title category-title heading d-flex align-items-center justify-content-between --h3 --border-b-gray mb-lg-3 pb-lg-3 font-medium  dropdown-select">
            Danh mục sản phẩm
            <i class="fa-solid fa-angle-down d-lg-none --text-light dropdown-icon transition-all"></i>
        </h3>
        <ul class="products-categories-lists dropdown-list mt-4 mt-lg-0 pt-3 pt-lg-0 ">
            <?php foreach ($cateLefts as $key_cateLefts => $val_cateLefts) { ?>
                <li class="item item-cat text-capitalize">
                    <a href="<?=$val_cateLefts['alias']?>" class="item-link hover-pink ">
                        <?=$val_cateLefts['name']?>
                    </a>
                    <?php if($val_cateLefts['childs'] != NULL){ ?><i class="item-icon"></i>
                        <ul class="list-child ml-3">
                            <?php foreach ($val_cateLefts['childs'] as $key_cateLeftsChild => $val_cateLeftsChild) { ?>
                                <li class="item-child item-cat text-capitalize">
                                    <a class="item-child-link hover-pink" href="<?=$val_cateLeftsChild['alias']?>"><?=$val_cateLeftsChild['name']?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    </aside>
    <?php } ?>
    <?php if(isset($banners) && $banners != NULL){ ?>
        <aside class="sidebar__itembox rounded-5">
            <?php foreach ($banners as $key_banner => $val_banner) { ?>
                <a href="<?=$val_banner['link']?>">
                    <img class="d-block banner-left-image mb-2" src="uploads/images/quangcao/<?=$val_banner['thumb']?>" alt="<?=$val_banner['name']?>"/>
                </a>
            <?php } ?>
        </aside>
    <?php } ?>
</div>