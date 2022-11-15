<?php if(isset($data_index['cateMain']) && $data_index['cateMain'] != NULL){ ?>
    <div class="menu_container">
        <ul>
            <?php foreach ($data_index['cateMain'] as $key_cateMain => $val_cateMain) { ?>
            <li>
                <a href="<?=$val_cateMain['url']?>"><?=$val_cateMain['name']?></a>
                <?php if(isset($val_cateMain['child']) && $val_cateMain['child'] != NULL){ ?>
                    <ul>
                        <?php foreach ($val_cateMain['child'] as $key_child => $val_child) { ?>
                            <li>
                                <a href="<?=$val_child['url']?>"><?=$val_child['name']?></a>
                                <?php if(isset($val_child['child']) && $val_child['child'] != NULL){ ?>
                                    <ul>
                                        <?php foreach ($val_child['child'] as $key_child2 => $val_child2) { ?>
                                            <li>
                                                <a href="<?=$val_child2['url']?>"><?=$val_child2['name']?></a>
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
<?php } ?>