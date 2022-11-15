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
                            <input type="text" onkeyup="createSlug(this);" name="data_post[name]" data-control="<?= $control ?>" id="name" parsley-trigger="change" required placeholder="Tiêu đề" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" id="alias" value="<?= $datas['alias']!=''?$datas['alias']:'' ?>"  class="form-control" name="data_post[alias]"  placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="userName">Diện tích từ<span class="text-danger">*</span></label>
                            <input type="text"  name="data_post[acreage_form]" parsley-trigger="change" required placeholder="Diện tích từ" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="userName">Diện tích đến<span class="text-danger">*</span></label>
                            <input type="text"  name="data_post[acreage_come]" parsley-trigger="change" required placeholder="Diện tích đến" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-info">
                                <input id="checkbox6a" type="checkbox" checked value="1" name="data_post[publish]">
                                <label for="checkbox6a">Hiển thị</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Title</label>
                            <span class="text-primary">(Tiêu đề trang hiệu quả nhất dài khoảng 10-70 ký tự, bao gồm cả khoảng trắng.)</span>
                            <strong><span id="numTitle">0</span></strong> ký tự
                            <input type="text" onkeyup="countNumberTitle()" id="title" class="form-control" name="data_post[title]"  placeholder="Tiêu đề">
                        </div>
                        <div class="form-group">
                            <label>Meta keywords</label><textarea class="form-control" name="data_post[meta_keywords]" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta Descriptions</label>
                            <div class="clear"></div>
                            <span class="text-info">(Descriptions trang hiệu quả nhất dài khoảng 160-300 ký tự, bao gồm cả khoảng trắng.)</span>
                                <strong><span id="numDescriptions">0</span></strong> ký tự
                            <textarea class="form-control"onkeyup="countNumberDescriptions()" id="meta_description" name="data_post[meta_descriptions]" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center mb-0">
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
<!-- Plugin js-->
<script src="assets/cpanel/libs/parsleyjs/parsley.min.js"></script>
<script src="assets/cpanel/js/pages/form-validation.init.js"></script>
<script type="text/javascript">
    function countNumberTitle() {
        Str = $('#title').val();
        var count = Str.length;
        if (count >= 10 && count <= 70) {
            $('#numTitle').addClass('text-success');
            $('#numTitle').removeClass('text-danger');
            $('#numTitle').html(count);
        } else {
            $('#numTitle').removeClass('text-success');
            $('#numTitle').addClass('text-danger');
            $('#numTitle').html(count);
        }
    }

    function countNumberDescriptions(Str) {
        Str = $('#meta_description').val();
        var count = Str.length;
        if (count >= 160 && count <= 300) {
            $('#numDescriptions').addClass('text-success');
            $('#numDescriptions').removeClass('text-danger');
            $('#numDescriptions').html(count);
        } else {
            $('#numDescriptions').removeClass('text-success');
            $('#numDescriptions').addClass('text-danger');
            $('#numDescriptions').html(count);
        }
    }
</script>