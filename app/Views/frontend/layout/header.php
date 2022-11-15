<!--\ GIỎ HÀNG -->
<?=$this->include('frontend/cart/cart')?>
<header id="banner">
  <div class="container container_1">
    <div class="banner_container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="logo text-center">
                    <a href="javascript:void(0)" id="open_menu" class="toggle-nav d-xl-none d-lg-none d-md-block d-block"><span></span></a>
                    <a href="<?= isset($data_index) ? $data_index['getlogo']['link'] : "" ?>" title="<?=$data_index['getlogo']['name']?>">
                      <img loading="lazy" src="<?= isset($data_index) ? $data_index['getlogo']['path_dir'] . $data_index['getlogo']['thumb'] : "" ?>" alt="<?=$data_index['getlogo']['name']?>">
                    </a>
                </div>
            </div>
            <div class="col-lg-12 d-xl-block d-lg-block d-md-none d-none">
              <?= $this->include('frontend/layout/menuMain') ?>
            </div>
        </div>
        <div class="box_ic_cart">
          <a href="javascript:void(0)" class="" onclick="openCart()">
            <img src="assets/lanhuonglip/images/icons/bag-tick.png" alt="Giỏ hàng" width="32" height="32">
            <span class="number" id="totalCart"><?=$data_index['totalItemCart']?></span>
          </a>
        </div>
    </div>
  </div>
</header>