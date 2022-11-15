<section class="mainservices">
    <div class="mainservices__wrapper d-flex align-items-center">
        <?php if($slogan['slogan_1'] != ''){ ?>
        <div class="mainservices__item --bg-yellow text-white">
            <i class="mainservices__icon fa-solid fa-truck"></i>
            <div class="mainservices__content">
                <h4 class="mainservices__title text-capitalize text-white font-medium"><?=$slogan['slogan_1']?></h4>
            </div>
        </div>
        <?php } ?>
        <?php if($slogan['slogan_2'] != ''){ ?>
        <div class="mainservices__item --bg-pink text-white">
            <i class="mainservices__icon fa-regular fa-message"></i>
            <div class="mainservices__content">
                <h4 class="mainservices__title text-capitalize text-white font-medium"><?=$slogan['slogan_2']?></h4>
            </div>
        </div>
        <?php } ?>
        <?php if($slogan['slogan_3'] != ''){ ?>
        <div class="mainservices__item --bg-blue text-white">
            <i class="mainservices__icon fa-regular fa-credit-card"></i>
            <div class="mainservices__content">
                <h4 class="mainservices__title text-capitalize text-white font-medium"><?=$slogan['slogan_3']?></h4>
            </div>
        </div>
        <?php } ?>
    </div>
</section>