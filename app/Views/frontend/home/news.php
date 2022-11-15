<?php if(isset($newsHome) && $newsHome != NULL){ ?>
    <section id="blog" class="blog products-carousel ">
        <div class="products-carousel__wrapper  ">
            <div class="products-carousel__heading d-flex align-items-center justify-content-between">
                <h2 class="title heading --h2 font-medium text-capitalize">Bài viết mới nhất</h2>
            </div>
            <div class="wrapper-inner position-relative">
                <div class="products-carousel__lists bg-white  rounded-5">
                    <?php foreach ($newsHome as $key_newsHome => $val_newsHome) { ?>
                    <div class="card border-0">
                        <div class="card-image trasition-all">
                            <div class="card-tools transition-all">
                                <a href="<?=$val_newsHome['alias']?>">
                                    <div class="card-icon"><i class="card-icon fa-solid fa-link"></i></div>
                                </a>
                            </div>
                            <img class="card-img-top" src="uploads/images/news/<?=$val_newsHome['thumb']?>" alt="<?=$val_newsHome['name']?>">
                        </div>
                        <div class="card-body px-0 border-0">
                            <h5 class="card-date --blue-cl font-medium">Ngày đăng: <?=date('d/m/Y', strtotime($val_newsHome['created_at']))?></h5>
                            <h5 class="card-title font-medium "><a href="<?=$val_newsHome['alias']?>" class="hover-pink --text-black"><?=$val_newsHome['name']?></a></h5>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="btn-control  rounded-circle --border-gray hover-pink-bg --prev"><i
                    class="fa-solid fa-angle-left"></i></div>
                <div class="btn-control  rounded-circle --border-gray hover-pink-bg --next"><i
                    class="fa-solid fa-angle-right"></i></div>
            </div>
        </div>
    </section>
<?php } ?>