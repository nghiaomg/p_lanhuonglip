<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Quản trị</a></li>
                    <li class="breadcrumb-item active"><?=$title?></li>
                </ol>
            </div>
            <h4 class="page-title"><?=$title?></h4>
        </div>
    </div>
</div>     
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <form action="" class="parsley-examples" method="post" novalidate>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="userName">Tiêu đề<span class="text-danger">*</span></label>
                            <input type="text" name="data_post[name]" value="<?= $datas['name'] ?>" parsley-trigger="change" required placeholder="Tiêu đề" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="userName">Liên kết<span class="text-danger">*</span></label>
                            <input type="text" name="data_post[link]" value="<?= $datas['link'] ?>" parsley-trigger="change" placeholder="Tiêu đề" class="form-control" id="link">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá</label>
                            <input type="text" name="data_post[price]" value="<?= number_format($datas['price'])  ?>" parsley-trigger="change" onkeyup = "FormatNumber(this)" required placeholder="200,000" class="form-control" id="price">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá khuyến mãi</label>
                            <input type="text" name="data_post[price_sale]" value="<?= number_format($datas['price_sale'])  ?>" onkeyup = "FormatNumber(this)" required placeholder="200,000" class="form-control" id="price">
                        </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-info">
                                <input id="checkbox6a" type="checkbox" <?= $datas['publish'] == 1?'checked':'' ?>  value="1" name="data_post[publish]">
                                <label for="checkbox6a">Hiển thị</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <div class="align-items-center">
                                <button type="button" onclick="ActionAvg('add',this)" class="btn btn-dark waves-effect waves-light ml-2" type="checkbox"><i class="fas fa-folder-plus"></i></button>
                            </div>
                            <div class="row mb-3" id="multi_content">
                                <?php  
                                    $contents = $datas['content'] != NULL && $datas['content'] !=''?json_decode($datas['content'],true):[]; 
                                    $distance = [];
                                    if ($contents != NULL) {
                                        foreach($contents as $key => $val){
                                            $distance[$key] = $val['number'];
                                        }
                                        array_multisort($distance,SORT_ASC,$contents);
                                    }
                                ?>
                                <?php if(isset($contents) && $contents !=NULL){?>
                                    <?php foreach($contents as $key => $val){?>
                                        <div class="col-12 mt-2 form__items">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="">Nội dung</label>
                                                    <input type="text" class="form-control" value="<?= $val['name'] ?>" placeholder ="Nội dung" name="data_content[<?= $key ?>][name]">
                                                </div>
                                                <div class="col-2">
                                                    <label for="">Số thứ tự</label>
                                                    <input type="text" class="form-control text-center" value="<?= $val['number'] ?>" name="data_content[<?= $key ?>][number]">
                                                </div>
                                                <div class="col-2 d-flex align-items-end">
                                                    <button type="button" onclick="ActionAvg('delete',this)" class="del_btn btn btn-dark waves-effect waves-light"> <i class="fas fa-trash-alt "></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-left mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        <i class="icon-cloud-upload font-15"></i> Lưu 
                    </button>
                    <a href="<?= CPANEL.$control ?>" class="btn btn-info">Trở về</a>
                </div>

            </form>
        </div> <!-- end card-box -->
    </div>
    <!-- end col -->
</div>
<script src="assets/cpanel/libs/parsleyjs/parsley.min.js"></script>
<script src="assets/cpanel/js/pages/form-validation.init.js"></script>
<script>
     function ActionAvg(type,__this){
        let items = document.querySelectorAll('.form__items').length - 1;
        let items_en = document.querySelectorAll('.form__items__en').length - 1;
        if (type ==="add") {
            items++;
            $('#multi_content').append(`
                <div class="col-12 mt-2 form__items">
                    <div class="row">
                        <div class="col-8">
                            <label for="">Nội dung</label>
                            <input type="text" class="form-control"  placeholder ="Nội dung" name="data_content[${items}][name]">
                        </div>
                        <div class="col-2">
                            <label for="">Số thứ tự</label>
                            <input type="text" class="form-control text-center" placeholder =""value="${items}" name="data_content[${items}][number]">
                        </div>
                        <div class="col-2 d-flex align-items-end">
                            <button type="button" onclick="ActionAvg('delete',this)" class="del_btn btn btn-dark waves-effect waves-light"> <i class="fas fa-trash-alt "></i></button>
                        </div>
                    </div>
                </div>
            `);
        }
        else if(type ==="delete"){
            items--;
            $(__this).closest('.form__items').remove();
        }
    }
</script>