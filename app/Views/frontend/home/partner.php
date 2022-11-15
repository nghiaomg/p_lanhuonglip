<?php if(isset($partners) && $partners != NULL){ ?>
<section id="brand" class="brand">
    <div class="brand__wrapper">
        <div class="brand__list">
            <?php foreach ($partners as $key_partner => $val_partner) { ?>
                <div class="brand__item">
                    <img src="uploads/images/partner/<?=$val_partner['thumb']?>" alt="<?=$val_partner['name']?>" width="101" height="92">
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>