<link rel="stylesheet" href="assets/cpanel/customs/logo.css">
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>

<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Quản trị</a></li>
					<li class="breadcrumb-item active"><?= $title ?></li>
				</ol>
			</div>
			<h4 class="page-title"><?= $title ?></h4>
		</div>
	</div>
</div>
<!-- end page title -->
<div class="row">
	<?php if (session('msg')) : ?>
		<div class="notify-alert alert alert-success alert-dismissible">
			<?= session('msg') ?>
			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
		</div>
	<?php endif ?>
	<?php if (session()->getFlashdata('success')) { ?>
		<p class="notify-alert alert alert-success"><i class="icon-check"></i> <?= session()->getFlashdata('success') ?></p>
	<?php } ?>
	<?php if (session()->getFlashdata('error')) { ?>
		<p class="notify-alert alert alert-danger"><?= session()->getFlashdata('error') ?></p>
	<?php } ?>
	<div class="col-lg-12">
		<div class="card-box">
			<form action="" class="parsley-examples" method="post" novalidate enctype='multipart/form-data'>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="userName">Tiêu đề 1<span class="text-danger">*</span></label>
							<input type="text" name="data_post[title1]" parsley-trigger="change" value="<?= $datas ? $datas['title1'] : '' ?>"  class="form-control" id="title1">
						</div>
						<div class="form-group">
							<label for="userName">Tiêu đề 2<span class="text-danger">*</span></label>
							<input type="text" name="data_post[title2]" parsley-trigger="change" value="<?= $datas ? $datas['title2'] : '' ?>"  class="form-control" id="title2">
						</div>
					</div>
					<div class="col-lg-6"> 
						<label for="image_box">Kích thước (700 x 645 px)</label>
						<div class="logo_image">
							<div class="image_box">
								<a href="javascript:void(0)" class="btn btn-danger" onclick="del_image(<?= $datas_js['id'] ?>,'<?= $control ?>')">Xóa ảnh</a>
								<img id="preview" src="<?= $datas['thumb'] ? base_url() . '/' . $path_dir_thumb . $datas['thumb'] : 'assets/images/no_img.png' ?>" alt="Ảnh đại diện" title='' />
							</div>
							<div>
								<label for="image">Chọn banner</label>
								<input type="file" name="image" id="image" />
							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
                            <a href="javascript:void(0)" onclick="create()"; class="btn btn-primary"><i class="fa fa-plus"></i></a>
                            <div id="multi_properties">
								<?php $distance = array(); if(isset($datas['array_properties']) && $datas['array_properties'] != NULL){?>
									<?php foreach($datas['array_properties'] as $key => $val){

											$distance[$key]  = $val['sort']; 
									}
									// sắp xếp lại thứ tự xuất hiện theo giá trị number -->
									array_multisort($distance, SORT_ASC, $datas['array_properties']); ?> 
									<?php foreach($datas['array_properties'] as $key => $val){ ?>
										<div class="row items_properties">
											<div class="col-8">
												<label for="">Nội dung</label>
												<input type="text" class="form-control" value="<?= $val['content'] ?>" name="data_properties[<?= $key ?>][content]">
											</div>
											<div class="col-2">
												<label for="">STT</label>
												<input type="number" class="form-control" value="<?= $val['sort'] ?>" name="data_properties[<?= $key ?>][sort]" value="0">
											</div>
											<div class="col-2">
												<label for="">&nbsp;</label>
												<a href="javascript:void(0)" onclick="delete_(this)" class="btn btn-danger d-block"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									<?php } ?>
								<?php } ?>
                            </div>
						</div>
					</div>
				</div>
				<div class="clear height20"></div>
				<div class="form-group text-right mb-0 col-lg-6">
					<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
						Cập nhật
					</button>
					<a href="<?= CPANEL . $control ?>" class="btn btn-info">Hủy</a>
				</div>
			</form>
		</div> <!-- end card-box -->
	</div>
	<!-- end col -->
</div>
<script>
	$(document).ready(function() {
		// Basic
		$("#image").change(function(event) {
			readURL(this);
		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#image").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					$('#preview').attr('src', e.target.result);
					$('#preview').hide();
					$('#preview').fadeIn(500);
					// $('.custom-file-label').text(filename);             
				}
				reader.readAsDataURL(input.files[0]);
			} else {
				$('#preview').attr('src', "assets/images/no_img.png");
			}

		}
	});

	function create(){
        let count_items = document.querySelectorAll('.items_properties').length - 1;
        count_items++;
        $('#multi_properties').append(`
            <div class="row items_properties">
                <div class="col-8">
                    <label for="">Nội dung</label>
                    <input type="text" class="form-control" name="data_properties[${count_items}][content]">
                </div>
                <div class="col-2">
                    <label for="">STT</label>
                    <input type="text" class="form-control" name="data_properties[${count_items}][sort]" value="${count_items + 1}">
                </div>
                <div class="col-2">
                    <label for="">&nbsp;</label>
                    <a href="javascript:void(0)" onclick="delete_(this)" class="btn btn-danger d-block"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        `);

    }
    function delete_(__this){
        let count_items = document.querySelectorAll('.items_properties').length - 1;
        count_items--;
        $(__this).closest('.items_properties').remove();
    }
</script>