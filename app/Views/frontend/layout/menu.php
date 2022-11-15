<!-- start main heading -->
<?php if(isset($data_index['getCateLeft']) && $data_index['getCateLeft'] != NULL){ ?>
<div id="menu_main" class="menu_main">
    <div class="container">
        <div class="main-row-heading d-flex flex-column flex-lg-row <?php if($data_index['crt'] != '\App\Controllers\Home'){ ?> mb-3 <?php } ?>">
            <div class="main-col-left">
                <div class="sidebar d-lg-block d-flex align-items-center justify-content-between ">
                    <aside class="sidebar__category <?php if($data_index['crt'] != '\App\Controllers\Home'){ ?> position-relative <?php } ?>">
                        <div class="sidebar__category-heading active pointer mb-3 justify-content-between --bg-blue rounded-5 d-flex align-items-center justify-content-between">
                            <h3 class="title text-white text-capitalize font-semibold">Danh mục sản phẩm </h3>
                            <i class="icon transition-all text-white fa-solid fa-circle-chevron-up"></i>
                        </div>
                        <ul class="sidebar__category-list rounded-5 bg-white" style="display: none;">
                            <?php foreach ($data_index['getCateLeft'] as $key_getCateLeft => $val_getCateLeft) { ?>
                                <li class="item cat-item">
                                    <a href="<?=$val_getCateLeft['url']?>" class="item-link cat-link hover-pink d-flex align-items-center justify-content-between --text-black text-capitalize">
                                        <?=$val_getCateLeft['name']?>
                                        <?php if(isset($val_getCateLeft['child']) && $val_getCateLeft['child'] != NULL){ ?>
                                            <i class="item-icon fa-solid fa-angle-right"></i>
                                        <?php } ?>
                                    </a>
                                    <?php if(isset($val_getCateLeft['child']) && $val_getCateLeft['child'] != NULL){ ?>
                                        <ul class="item-list">
                                            <?php foreach ($val_getCateLeft['child'] as $key_getCateLeft_child => $val_getCateLeft_child) { ?>
                                                <li class="item-child cat-item">
                                                    <a href="<?=$val_getCateLeft_child['url']?>" class="item-child-link cat-link hover-pink --text-black text-capitalize">
                                                        <?=$val_getCateLeft_child['name']?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </aside>
                    <div class="toggle-nav d-lg-none pointer">
                    <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
            
            <div class="main-col-right ">
                <?= $this->include('frontend/layout/menuMain') ?>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="main-row-heading d-flex flex-column flex-lg-row <?php if($data_index['crt'] != '\App\Controllers\Home'){ ?> mb-3 <?php } ?>">
        <div class="main-col-left">
            <div class="sidebar d-lg-block d-flex align-items-center justify-content-between ">
                <aside class="sidebar__category <?php if($data_index['crt'] != '\App\Controllers\Home'){ ?> position-relative <?php } ?>">
                    <div class="sidebar__category-heading active pointer mb-3 justify-content-between --bg-blue rounded-5 d-flex align-items-center justify-content-between">
                        <h3 class="title text-white text-capitalize font-semibold">Danh mục sản phẩm </h3>
                        <i class="icon transition-all text-white fa-solid fa-circle-chevron-up"></i>
                    </div>
                    <ul class="sidebar__category-list rounded-5 bg-white <?php if($data_index['crt'] != '\App\Controllers\Home'){ ?> position-absolute w-100 hidden <?php } ?>">
                        <?php foreach ($data_index['getCateLeft'] as $key_getCateLeft => $val_getCateLeft) { ?>
                            <li class="item cat-item">
                                <a href="<?=$val_getCateLeft['url']?>" class="item-link cat-link hover-pink d-flex align-items-center justify-content-between --text-black text-capitalize">
                                    <?=$val_getCateLeft['name']?>
                                    <?php if(isset($val_getCateLeft['child']) && $val_getCateLeft['child'] != NULL){ ?>
                                        <i class="item-icon fa-solid fa-angle-right"></i>
                                    <?php } ?>
                                </a>
                                <?php if(isset($val_getCateLeft['child']) && $val_getCateLeft['child'] != NULL){ ?>
                                    <ul class="item-list">
                                        <?php foreach ($val_getCateLeft['child'] as $key_getCateLeft_child => $val_getCateLeft_child) { ?>
                                            <li class="item-child cat-item">
                                                <a href="<?=$val_getCateLeft_child['url']?>" class="item-child-link cat-link hover-pink --text-black text-capitalize">
                                                    <?=$val_getCateLeft_child['name']?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </aside>
                <div class="toggle-nav d-lg-none pointer">
                <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
        
        <div class="main-col-right ">
            <?= $this->include('frontend/layout/menuMain') ?>
            <?php if($data_index['crt'] == '\App\Controllers\Home'){ echo $this->include('frontend/layout/slide'); } ?>
        </div>
    </div>
</div>
<?php } ?>
<!-- end main heading -->