<?php if(isset($ideas) && $ideas != NULL){ ?>
    <aside id="testimonial" class="sidebar__itembox p-4 --border-gray bg-white rounded-5">
        <h3 class="title text-center  pb-3 heading --h3 --text-black text-capitalize font-medium">
            Ý kiến khách hàng
        </h3>
        <div class="testimonial --carousel">
            <?php foreach ($ideas as $key_idea => $val_idea) { ?>
            <div class="testimonial-item d-flex flex-column align-items-center">
                <div class="testimonial-image rounded-circle mb-3"><img class="rounded-inherit" src="uploads/images/idea/<?=$val_idea['thumb']?>" alt="" width="66" height="66"></div>
                <div class="testimonial-content text-center"><?=$val_idea['des']?></div>
                <i class="testimonial-icon opacity-5 fa-solid fa-quote-left"></i>
                <div class="testimonial-name font-medium --blue-cl"><?=$val_idea['name']?></div>
                <div class="testimonial-designation text-uppercase"><?=$val_idea['job']?></div>
            </div>
            <?php } ?>
        </div>
    </aside>
<?php } ?>