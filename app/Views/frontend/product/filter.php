<div class="filter_product">
    <div class="box">
        <div class="title_filter">Lọc sản phẩm</div>
        <?php if($brandsProductData != NULL){  ?>
            <div class="cates cate_brand">
                <div class="title_cate">Thương hiệu</div>
                <div class="items_cate">
                    <?php foreach($brandsProductData as $key => $val){  ?>
                        <div class="item">
                            <input type="checkbox" class="input_brand" <?=$brandIDArray != NULL && in_array($val['id'] ,$brandIDArray) ? 'checked' : ''?> onchange="checkBrand(this,'<?=$val['id'] ?>')" data-brandid="<?=$val['id'] ?>" value="<?=$val['id'] ?>">
                            <label for=""><?=$val['name'] ?></label>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        <?php if($price != NULL){  ?>
            <div class="cates cate_price">
                <div class="title_cate">Giá sản phẩm</div>
                <div class="items_cate">
                    <?php foreach($price as $key_price => $val_price){  ?>
                        <div class="item">
                            <input type="checkbox" <?=$arrprices != NULL && in_array($val_price['price_from'].'-'.$val_price['price_to'] ,$arrprices) ? 'checked' : ''?> onchange="checkPrice(this,'<?=$val_price['price_from'] ?>','<?=$val_price['price_to'] ?>')" class="input_price" data-pricefrom="<?=$val_price['price_from'] ?>" data-priceto="<?=$val_price['price_to'] ?>">
                            <label for=""><?=$val_price['name'] ?></label>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>

        <?php if($statusProducts != NULL){  ?>
        <div class="cates  cate_status">
            <div class="title_cate">Tình trạng sản phẩm</div>
            <select class="form-control" onchange="statusProduct(this)">
                <option value="">--- Chọn tình trạng ---</option>
                <?php foreach($statusProducts as $key_status => $val_status){  ?>
                    <?php if($val_status['id'] != 4){ ?>
                        <option <?=$tinhtrangID == $val_status['id'] ? "selected" : "" ?> value="<?=$val_status['id'] ?>"><?=$val_status['name'] ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
        </div>
        <?php } ?>

    </div>
</div>
