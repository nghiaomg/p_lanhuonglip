<?php if($data_index['checkScreen'] != 'destop'){ ?>
    <?php if(isset($data_index['cateMain']) && $data_index['cateMain'] != NULL){ ?>
    <div class="nav-mobile transition-all bg-white shadow-main">
        <div class="close-nav ml-auto pointer d-flex align-items-center justify-content-center"><i
            class="fa-solid fa-xmark"></i></div>
            <div class="nav-mobile-container">
                <ul class="nav-mobile-list">
                    <?php foreach ($data_index['cateMain'] as $key => $val) { ?>
                        <li class="nav-mobile-item cat-item text-capitalize font-medium">
                            <a href="<?= $val['url'] ?>">
                                <?= $val['name'.session('lang').''] ?>
                            </a>
                            <?php if (isset($val['child']) && $val['child'] != NULL) { ?>
                                <i class="fa-solid fa-plus  icon-plus"></i>
                                <ul class="sublist cat-dropdown">
                                    <?php foreach ($val['child'] as $key_child => $val_child) { ?>
                                        <li class="sublist-item ">
                                            <a class="text-capitalize font-medium --text-light" href="<?=$val_child['url']?>"><?=$val_child['name'.session('lang').'']?></a>
                                            <?php if (isset($val_child['child']) && $val_child['child'] != NULL) { ?>
                                                <i class="fa-solid fa-plus  icon-plus2"></i>
                                                <ul class="sublist2 cat-dropdown2">
                                                    <?php foreach ($val_child['child'] as $key_child2 => $val_child2) { ?>
                                                        <li class="sublist-item2">
                                                            <a class="text-capitalize font-medium --text-light" href="<?=$val_child2['url']?>"><?=$val_child2['name'.session('lang').'']?></a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>    
    </div>
    <?php } ?>
<?php } ?>