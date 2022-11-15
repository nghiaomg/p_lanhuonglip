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
	<div class="col-lg-6">
		<div class="card-box">
			<form action="" class="parsley-examples" method="post" novalidate>
				<div class="form-group">
					<label for="parentid">Thư mục gốc<span class="text-danger">*</span></label>
					<select name="data_post[parentid]" class="form-control" id="parentid">
						<option value="0">Chọn thư mục gốc</option>
						<?php if (isset($parentid) && $parentid != NULL) { ?>
							<?php foreach ($parentid as $key => $val) { ?>
								<option value="<?= $val['id'] ?>" <?= $datas['parentid'] == $val['id'] ? 'selected' : '' ?>><?= $val['name'] ?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label for="name">Tên<span class="text-danger">*</span></label>
					<input type="text" name="data_post[name]" parsley-trigger="change" value="<?= $datas ? $datas['name'] : '' ?>" required placeholder="Tên" class="form-control" id="name">
				</div>
				<div class="form-group">
					<label for="Link">Link<span class="text-danger">*</span></label>
					<input type="text" name="data_post[Link]" value="<?= $datas ? $datas['link'] : '' ?>" placeholder="Link" class="form-control" id="Link">
				</div>
				<div class="form-group">
					<label for="ctr">Controller<span class="text-danger">*</span></label>
					<input type="text" name="data_post[ctr]" value="<?= $datas ? $datas['ctr'] : '' ?>" placeholder="ctr" class="form-control" id="ctr">
				</div>
				<div class="form-group">
					<label for="icon">Icon<span class="text-danger">*</span></label>
					<input type="text" name="data_post[icon]" placeholder="Icon" value="<?= $datas ? $datas['icon'] : '' ?>" class="form-control" id="icon">
				</div>
				<div class="form-group">
					<div class="checkbox checkbox-info">
						<input id="checkbox6a" type="checkbox" <?= $datas['publish'] == 1 ? 'checked' : '' ?> value="1" name="data_post[publish]">
						<label for="checkbox6a">Hiển thị</label>
					</div>
				</div>
				<!-- ACTION -->
				<div class="form-group row">
					<label for="checkbox6" class=" col-form-label ml-3"> Thêm action </label>
					<button type="button" onclick="ActionFn('add',this,null)" class="btn btn-dark waves-effect waves-light ml-2" type="checkbox"><i class="fas fa-folder-plus"></i></button>
				</div>
				<div class="add_actione">
					<div class="action_item">
						<?php if ($moduleDetail != NULL && count($moduleDetail) > 0) { ?>
							<?php foreach ($moduleDetail as $key => $val) { ?>
								<div class="form-group item__group d-flex">
									<div class="item__col col-md-4">
										<input type="text" class="form-control  w-full" id="action" name="data_module_detail[<?= $key ?>][name_action]" value="<?= $val['name']; ?>" placeHolder="Tên action" value="Danh sách" required="">
									</div>
									<div class="item__col col-md-4">
										<input type="text" class="form-control  w-full" id="action" name="data_module_detail[<?= $key ?>][action]" value="<?= $val['action']; ?>" placeHolder="Action" value="index" required="">
									</div>
									<div class="item__col col-md-3 d-flex">
										<button type="button" onclick="ActionFn('delete',this,<?= $val['id']; ?>)" class="del_btn btn btn-dark waves-effect waves-light "> <i class="fas fa-trash-alt "></i></button>
										<input type="text" placeholder="sắp xếp" class="form-control ml-2 col-4" name="data_module_detail[<?= $key ?>][sort]" value="<?= $val['sort']; ?>">
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				<!-- ACTION -->
				<div class="form-group text-right mb-0">
					<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
						<i class="icon-cloud-upload font-15"></i> Lưu
					</button>
					<button type="reset" class="btn btn-secondary waves-effect waves-light mr-1">
						Làm lại
					</button>
					<a href="<?= CPANEL . $control ?>" class="btn btn-info">Trở về</a>
				</div>
			</form>
		</div> <!-- end card-box -->
	</div>
	<!-- end col -->
</div>
<script src="assets/cpanel/libs/parsleyjs/parsley.min.js"></script>
<script src="assets/cpanel/js/pages/form-validation.init.js"></script>