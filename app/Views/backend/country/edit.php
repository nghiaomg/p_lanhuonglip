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
    <div class="col-lg-6">
        <div class="card-box">
            <form action="" class="parsley-examples" method="post" novalidate>
                <div class="form-group">
                    <label for="userName">Quốc tịch<span class="text-danger">*</span></label>
                    <input type="text" name="data_post[name]" parsley-trigger="change" required placeholder="Quốc tịch" class="form-control" id="name" value="<?= $datas?$datas['name']:'' ?>">
                </div>
                <div class="form-group">
                    <div class="checkbox checkbox-info">
                        <input id="publish" type="checkbox" value="1" <?= $datas['publish']==1?'checked':'' ?> name="data_post[publish]">
                        <label for="publish">Hiển thị</label>
                    </div>
                </div>
                <div class="form-group text-right mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                        <i class="icon-cloud-upload font-15"></i> Lưu 
                    </button>
                    <button type="reset" class="btn btn-secondary waves-effect waves-light mr-1">
                        Làm lại
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