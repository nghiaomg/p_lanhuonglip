<!-- start page title -->
<link rel="stylesheet" href="assets/cpanel/customs/system.css">
<script src="assets/cpanel/libs/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="assets/cpanel/libs/datepicker/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="assets/cpanel/customs/datepicker.css">
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
	<div class="col-lg-12">
		<?php if (session('msg')) : ?>
			<div class="alert alert-success alert-dismissible">
				<?= session('msg') ?>
				<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
			</div>
		<?php endif ?>
		<?php if (session()->getFlashdata('success')) { ?>
			<p class="notify-alert alert alert-success"><i class="icon-check"></i> <?= session()->getFlashdata('success') ?></p>
		<?php } ?>
		<?php if (session()->getFlashdata('error')) { ?>
			<p class="alert alert-danger"><?= session()->getFlashdata('error') ?></p>
		<?php } ?>
	</div>
	<div class="col-lg-12">
		<div class="card-box">
			<!-- li tab -->
			<ul class="nav nav-tabs" id="myTab">
				<li class="nav-item">
					<a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
						<span class="d-block d-sm-none"><i class="mdi mdi-home-variant"></i></span>
						<span class="d-none d-sm-block">Home</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#contact" data-toggle="tab" aria-expanded="true" class="nav-link">
						<span class="d-block d-sm-none"><i class="mdi mdi-account"></i></span>
						<span class="d-none d-sm-block">Liên hệ</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
						<span class="d-block d-sm-none"><i class="mdi mdi-settings"></i></span>
						<span class="d-none d-sm-block">Google</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="#socials" data-toggle="tab" aria-expanded="false" class="nav-link">
						<span class="d-block d-sm-none"><i class="mdi mdi-settings"></i></span>
						<span class="d-none d-sm-block">Mạng xã hội</span>
					</a>
				</li>
				<?php /*<li class="nav-item">
					<a href="#slogan" data-toggle="tab" aria-expanded="false" class="nav-link">
						<span class="d-block d-sm-none"><i class="mdi mdi-settings"></i></span>
						<span class="d-none d-sm-block">Slogan</span>
					</a>
				</li> */?>
				<!-- <li class="nav-item">
					<a href="#info" data-toggle="tab" aria-expanded="false" class="nav-link">
						<span class="d-block d-sm-none"><i class="mdi mdi-settings"></i></span>
						<span class="d-none d-sm-block">Thông tin cửa hàng</span>
					</a>
				</li> -->
				<!-- <li class="nav-item">
					<a href="#config_footer" data-toggle="tab" aria-expanded="false" class="nav-link">
						<span class="d-block d-sm-none"><i class="mdi mdi-settings"></i></span>
						<span class="d-none d-sm-block">Cấu hình banner Footer</span>
					</a>
				</li> -->
				<li class="nav-item">
					<a href="#flashsale" data-toggle="tab" aria-expanded="false" class="nav-link">
						<span class="d-block d-sm-none"><i class="mdi mdi-settings"></i></span>
						<span class="d-none d-sm-block">Cấu hình flash sale</span>
					</a>
				</li>
			</ul>
			<!--end li tab -->
			<div class="tab-content">
				<!--tab home -->
				<div class="tab-pane active" id="home">
					<form action="" method="post" class="parsley-examples" enctype="multipart/form-data">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="">Title</label>
									<input type="text" value="<?= $datas ? $datas['title'] : '' ?>" class="form-control" placeholder="Title" name="data_post[title]">
								</div>
								<div class="form-group">
									<label for="">Favicon (Kích thước chuẩn: 300 x 300px)</label>
									<div class="logo_image">
										<div class="image_box">
											<a href="javascript:void(0)" class="btn btn-danger" onclick="del_favicon('<?= $control ?>')"><i class="icon-trash"></i></a>
											<img id="preview" src="<?= $datas['thumb'] ? base_url() . '/' . $path_dir_thumb . $datas['thumb'] : 'assets/images/no_img.png' ?>" alt="Ảnh đại diện" title='' />
										</div>
										<div>
											<label for="image">Chọn file</label>
											<input type="file" name="image" id="image" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Meta keywords</label><textarea class="form-control" name="data_post[meta_keyword]" rows="5"><?= $datas ? $datas['meta_keyword'] : '' ?></textarea>
								</div>
								<div class="form-group">
									<label>Meta Descriptions</label>
									<textarea class="form-control" name="data_post[meta_description]" rows="5"><?= $datas ? $datas['meta_description'] : '' ?></textarea>
								</div>
								<?php /* <div class="form-group">
									<label>Giới thiệu footer</label>
									<textarea class="form-control" name="data_post[about_footer]" rows="6"><?= $datas ? $datas['about_footer'] : '' ?></textarea>
								</div> */?>
								<div class="form-group">
									<label for="">Thông tin chuyển khoản</label>
									<textarea name="data_post[info_ck]" id="" class="form-control" cols="30" rows="5"><?= $datas ? $datas['info_ck'] : '' ?></textarea>
									<script>
										CKEDITOR.replace('data_post[info_ck]', {
											toolbar: [{
													name: 'styles',
													items: ['Styles', 'Format', 'Font', 'FontSize']
												},
												{
													name: 'colors',
													items: ['TextColor', 'BGColor']
												},
												{
													name: 'paragraph',
													items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv',
														'-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl'
													]
												},
												['Bold', 'Italic', 'Strike'],
												['SelectAll', 'RemoveFormat'],
											]
										});
									</script>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Schema.org</label>
									<textarea class="form-control" name="data_post[schema]" rows="3"><?= $datas ? $datas['schema'] : '' ?></textarea>
								</div>
								<div class="form-group">
									<label>Email nhận thông báo</label>
									<input type="text" class="form-control" name="data_post[email_take]" value="<?= $datas ? $datas['email_take'] : '' ?>" placeholder="Email nhận thông báo">
								</div>
								<div class="form-group">
									<label for="">Ảnh social (kích thước chuẩn 700 x 420px)</label>
									<div class="logo_image">
										<div class="image_box">
											<a href="javascript:void(0)" class="btn btn-danger" onclick="del_social('<?= $control ?>')"><i class="icon-trash"></i></a>
											<img id="preview2" src="<?= $datas['thumb_social'] ? base_url() . '/' . $path_dir_social . $datas['thumb_social'] : 'assets/images/no_img.png' ?>" alt="Ảnh đại diện" title='' />
										</div>
										<div>
											<label for="image_social">Chọn file</label>
											<input type="file" name="image_social" id="image_social" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Copyright</label>
									<input type="text" class="form-control" name="data_post[copyright]" value="<?= $datas ? $datas['copyright'] : '' ?>" placeholder="Email nhận thông báo">
								</div>
							</div>
						</div>
						<div class="col-12 text-center">
							<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
								<i class="icon-cloud-upload font-15"></i> Lưu
							</button>
							<a href="<?= CPANEL . $control ?>" class="btn btn-info">Hủy</a>
						</div>
					</form>
				</div>
				<!--tab contact -->
				<div class="tab-pane show" id="contact">
					<form action="<?= CPANEL . $control . 'contact' ?>" method="post">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="">Tên công ty</label>
									<input type="text" value="<?= $contact ? $contact['company'] : '' ?>" class="form-control" placeholder="Tên công ty" name="data_post[company]">
								</div>
								<div class="form-group">
									<label for="">Địa chỉ</label>
									<input type="text" value="<?= isset($contact['address'])? $contact['address'] : '' ?>" class="form-control" placeholder="Địa chỉ" name="data_post[address]">
								</div> 
								<div class="form-group">
									<label for="">Số điện thoại</label>
									<input type="text" class="form-control" value="<?= $contact ? $contact['phone'] : '' ?>" placeholder="Số điện thoại" name="data_post[phone]">
								</div>
								<div class="form-group">
									<label for="">Zalo</label>
									<input type="text" class="form-control" value="<?= $contact['zalo'] ? $contact['zalo'] : '' ?>" placeholder="Zalo" name="data_post[zalo]">
								</div>
								<div class="form-group">
									<label for="">Chat messenger</label>
									<input type="text" class="form-control" value="<?= $contact['messenger'] ? $contact['messenger'] : '' ?>" placeholder="Chat messenger" name="data_post[messenger]">
								</div>
								<?php /*<div class="form-group">
									<label for="">Email</label>
									<input type="text" class="form-control" value="<?= $contact ? $contact['email'] : '' ?>" placeholder="Địa chỉ Email" name="data_post[email]">
								</div>*/?>
								<div class="form-group">
									<label for="">Google map</label>
									<textarea class="form-control " rows="5" placeholder="Nhập nội dung" name="data_post[google_map]"><?= isset($contact['google_map']) ? $contact['google_map']  : '' ?></textarea>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="">Email</label>
									<input type="text" class="form-control" value="<?= isset($contact['email']) ? $contact['email'] : '' ?>" placeholder="Email" name="data_post[email]">
								</div>
								<?php /*<div class="form-group">
									<label for="">Website</label>
									<input type="text" class="form-control" value="<?= isset($contact['website']) ? $contact['website'] : '' ?>" placeholder="Website" name="data_post[website]">
								</div> */?>
								<div class="form-group">
									<label for="">Thời gian làm việc</label>
									<input type="text" class="form-control" value="<?= isset($contact['time_work']) ? $contact['time_work'] : '' ?>" placeholder="Thời gian làm việc" name="data_post[time_work]">
								</div>
								<div class="form-group">
									<label for="">Nhúng chat box</label>
									<textarea name="data_post[chatbox]" id="" cols="30" rows="5" class="form-control"><?= isset($contact['chatbox']) ? $contact['chatbox'] : '' ?></textarea>
								</div>
								<div class="form-group">
									<div class="checkbox checkbox-purple">
										<input id="turn_off_chatbox" type="checkbox" value="1" <?= isset($contact['turn_off_chatbox']) && $contact['turn_off_chatbox'] == 1?'checked': '' ?>  name="data_post[turn_off_chatbox]">
										<label for="turn_off_chatbox">Tắt chatbox</label>
									</div>
								</div>
							</div>
							<div class="col-12 text-center">
								<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
									<i class="icon-cloud-upload font-15"></i> Lưu
								</button>
								<a href="<?= CPANEL . $control ?>" class="btn btn-info">Hủy</a>
							</div>
						</div>
					</form>
				</div>
				<!--tab setting -->
				<div class="tab-pane" id="settings">
					<form action="<?= CPANEL . $control . 'google' ?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="">Google Analytics</label>
									<textarea type="text" rows="3" class="form-control" name="data_post[analytics]"><?= $google ? $google['analytics'] : '' ?></textarea>
								</div>
								<div class="form-group">
									<label for="">Webmasters tools</label>
									<textarea type="text" rows="3" class="form-control" name="data_post[webmasters]"><?= $google ? $google['webmasters'] : '' ?></textarea>
								</div>
								<div class="form-group">
									<label for="">Sitemaps (<?= file_exists($sitemap) ? '<a href="sitemap.xml"
                                        target="_blank">Sitemap.xml</a>' : '<a href="javascript:void(0)">Chưa có sitemap</a>' ?>) <?= file_exists($sitemap) ? '<a href="' . base_url(CPANEL . 'system/delete-sitemap') . '" class="text-danger"><i class="icon-close"></i> Xóa file</a></label>' : '' ?>
									</label>
									<div class="alert alert-warning text-warning alert-dismissible fade show" role="alert">
                                        <span>Vui lòng đặt tên file đúng định dạng <strong>sitemap.xml</strong> trước khi upload lên hệ thống.</span>
                                    </div>
									<input type="file" class="form-control" name="sitemaps"/>
								</div>
							</div>
							<div class="col-12 text-center">
								<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
									<i class="icon-cloud-upload font-15"></i> Lưu
								</button>
								<a href="<?= CPANEL . $control ?>" class="btn btn-info">Hủy</a>
							</div>
						</div>
					</form>
				</div>
				<!-- mạng xã hội -->
				<div class="tab-pane" id="socials">
					<form action="<?= CPANEL . $control . 'social' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" value="<?= isset($social['facebook']) ?  $social['facebook'] : ''  ?>" class="form-control" name="data_post[facebook]">
                                </div>
								<div class="form-group">
                                    <label for="">Youtube</label>
                                    <input type="text" value="<?= isset($social['youtube']) ? $social['youtube'] : ''  ?>" class="form-control" name="data_post[youtube]">
                                </div>
								<div class="form-group">
                                    <label for="">Tiktok </label>
                                    <input type="text" value="<?= isset($social['tiktok']) ? $social['tiktok'] : ''  ?>" class="form-control" name="data_post[tiktok]">
                                </div>
								<div class="form-group">
                                    <label for="">Twitter </label>
                                    <input type="text" value="<?= isset($social['twitter']) ? $social['twitter'] : ''  ?>" class="form-control" name="data_post[twitter]">
                                </div>
								<div class="form-group">
                                    <label for="">Pinterest </label>
                                    <input type="text" value="<?= isset($social['pinterest']) ? $social['pinterest'] : ''  ?>" class="form-control" name="data_post[pinterest]">
                                </div>
								<div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" value="<?= isset($social['instagram']) ? $social['instagram'] : ''  ?>" class="form-control" name="data_post[instagram]">
                                </div>
                            </div>
							<div class="col-6">
								<div class="form-group">
									<label for="">Nhúng iframe Fanpage</label>
									<textarea type="text" rows="5" class="form-control" name="data_post[fanpage]"><?= $social ? $social['fanpage'] : '' ?></textarea>
								</div>
							</div>
                            <div class="col-12 text-center">
                                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                    <i class="icon-cloud-upload font-15"></i> Lưu
                                </button>
                                <a href="<?= CPANEL . $control ?>" class="btn btn-info">Hủy</a>
                            </div>
                        </div>
                    </form>
				</div>
				<!-- mạng xã hội -->
				<div class="tab-pane" id="slogan">
					<form action="<?= CPANEL . $control . 'slogan' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
							<div class="col-6">
                                <div class="form-group">
                                    <label for="">Slogan header 1</label>
                                    <input type="text" value="<?= isset($slogan['slogan_header_1']) ?  $slogan['slogan_header_1'] : ''  ?>" class="form-control" name="data_post[slogan_header_1]">
                                </div>
								<div class="form-group">
                                    <label for="">Link Slogan header 1</label>
                                    <input type="text" value="<?= isset($slogan['link_slogan_header_1']) ?  $slogan['link_slogan_header_1'] : ''  ?>" class="form-control" name="data_post[link_slogan_header_1]">
                                </div>
								<div class="form-group">
                                    <label for="">Slogan header 2</label>
                                    <input type="text" value="<?= isset($slogan['slogan_header_2']) ?  $slogan['slogan_header_2'] : ''  ?>" class="form-control" name="data_post[slogan_header_2]">
                                </div>
								<div class="form-group">
                                    <label for="">Link Slogan header 2</label>
                                    <input type="text" value="<?= isset($slogan['link_slogan_header_2']) ?  $slogan['link_slogan_header_2'] : ''  ?>" class="form-control" name="data_post[link_slogan_header_2]">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Slogan 1</label>
                                    <input type="text" value="<?= isset($slogan['slogan_1']) ?  $slogan['slogan_1'] : ''  ?>" class="form-control" name="data_post[slogan_1]">
                                </div>
								<div class="form-group">
                                    <label for="">Slogan 2</label>
                                    <input type="text" value="<?= isset($slogan['slogan_2']) ?  $slogan['slogan_2'] : ''  ?>" class="form-control" name="data_post[slogan_2]">
                                </div>
								<div class="form-group">
                                    <label for="">Slogan 3</label>
                                    <input type="text" value="<?= isset($slogan['slogan_3']) ?  $slogan['slogan_3'] : ''  ?>" class="form-control" name="data_post[slogan_3]">
                                </div>
                            </div>
							<div class="col-12 text-center">
                                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                    <i class="icon-cloud-upload font-15"></i> Lưu
                                </button>
                                <a href="<?= CPANEL . $control ?>" class="btn btn-info">Hủy</a>
                            </div>
                        </div>
                    </form>
				</div>
				<!-- info -->
				<div class="tab-pane" id="info">
					<form action="<?= CPANEL.'system/info' ?>" class="parsley-examples" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label for="">Tiêu đề</label>
									<input type="text" class="form-control" value="<?= isset($info_js['title'])?$info_js['title']:'' ?>" name="data_post[title]">
								</div>
								<div class="form-group">
									<label for="">Mô tả</label>
									<textarea type="text" class="form-control"  rows="3" name="data_post[des]"><?= isset($info_js['des'])?$info_js['des']:'' ?></textarea>
								</div>
								<div class="form-group">
									<label for="">Text button</label>
									<input type="text" class="form-control" value="<?= isset($info_js['text_btn'])?$info_js['text_btn']:'' ?>" name="data_post[text_btn]">
								</div>
								<div class="form-group">
									<label for="">Link</label>
									<input type="text" class="form-control" value="<?= isset($info_js['link'])?$info_js['link']:'' ?>" name="data_post[link]">
								</div>
								<div class="form-group">
									<label for="">Icon trái</label>
									<div class="logo_image">
										<div class="image_box">
											<a href="javascript:void(0)" class="btn btn-danger" onclick="delete_logo('left')"><i class="icon-trash"></i></a>
											<img id="preview_left" src="<?= isset($info_js['image_thumb_left'])&& file_exists('uploads/images/logoleft/'.$info_js['image_thumb_left'])?'uploads/images/logoleft/'.$info_js['image_thumb_left']:'assets/images/no_img.png' ?>" alt="Icon" title='' />
										</div>
										<div>
											<label for="image_left">Chọn file</label>
											<input type="file" name="image_left" id="image_left" accept="image/png,image/jpeg,image/gif" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="">Tiêu đề</label>
									<input type="text" class="form-control" value="<?= isset($info_js['title_between'])?$info_js['title_between']:'' ?>" name="data_post[title_between]">
								</div>
								<div class="form-group">
									<label for="">Mô tả</label>
									<input type="text" class="form-control" value="<?= isset($info_js['des_between'])?$info_js['des_between']:'' ?>" name="data_post[des_between]">
								</div>
								<div class="form-group">
									<label for="">Hình nền</label>
									<div class="logo_image">
										<div class="image_box">
											<a href="javascript:void(0)" class="btn btn-danger" onclick="delete_logo('bg')"><i class="icon-trash"></i></a>
											<img id="preview_bg" src="<?= isset($info_js['image_thumb_bg'])&& file_exists('uploads/images/bg/'.$info_js['image_thumb_bg'])?'uploads/images/bg/'.$info_js['image_thumb_bg']:'assets/images/no_img.png' ?>" alt="Ảnh nền" title='' />
										</div>
										<div>
											<label for="image_bg">Chọn file</label>
											<input type="file" name="image_bg" id="image_bg" accept="image/png,image/jpeg,image/gif"/>
										</div>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="">Tiêu đề</label>
									<input type="text" class="form-control" value="<?= isset($info_js['title_right'])?$info_js['title_right']:'' ?>" name="data_post[title_right]">
								</div>
								<div class="form-group">
									<label for="">Số điện thoại</label>
									<input type="text" class="form-control" value="<?= isset($info_js['phone'])?$info_js['phone']:'' ?>" name="data_post[phone]">
								</div>
								<div class="form-group">
									<label for="">Website</label>
									<input type="text" class="form-control" value="<?= isset($info_js['website'])?$info_js['website']:'' ?>" name="data_post[website]">
								</div>
								
								<div class="form-group">
									<label for="">Icon phải</label>
									<div class="logo_image">
										<div class="image_box">
											<a href="javascript:void(0)" class="btn btn-danger" onclick="delete_logo('right')"><i class="icon-trash"></i></a>
											<img id="preview_right" src="<?= isset($info_js['image_thumb_right'])&& file_exists('uploads/images/logoright/'.$info_js['image_thumb_right'])?'uploads/images/logoright/'.$info_js['image_thumb_right']:'assets/images/no_img.png' ?>" alt="Icon" title='' />
										</div>
										<div>
											<label for="image_logo_right">Chọn file</label>
											<input type="file" name="image_logo_right" id="image_logo_right" accept="image/png,image/jpeg,image/gif" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-12">
								<button class="btn btn-primary">Cập nhật</button>
							</div>
						</div>
					</form>
				</div>
				<!--  -->
				<div class="tab-pane" id="config_footer">
					<form action="<?= CPANEL.'system/bannerFooter' ?>" method="post" class="parsley-examples" enctype="multipart/form-data">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="">Tiêu đề</label>
									<input type="text" class="form-control" value="<?= $banner_js['title'] ?>" name="data_post[title]">
								</div>
								<div class="form-group">
									<label for="">Text button</label>
									<input type="text" class="form-control" value="<?= $banner_js['text_btn'] ?>" name="data_post[text_btn]">
								</div>
								<div class="form-group">
									<label for="">Link</label>
									<input type="text" class="form-control" value="<?= $banner_js['link'] ?>" name="data_post[link]">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="">Hình ảnh</label>
									<div class="logo_image">
										<div class="image_box">
											<a href="javascript:void(0)" class="btn btn-danger" onclick="delete_bn('text')"><i class="icon-trash"></i></a>
											<img id="preview_text" src="<?= $banner_js['image_thumb_text_footer']!=''&& file_exists('uploads/images/bgtext/'.$banner_js['image_thumb_text_footer'])?'uploads/images/bgtext/'.$banner_js['image_thumb_text_footer']:'assets/images/no_img.png' ?>" alt="Ảnh nền" title='' />
										</div>
										<div>
											<label for="image_text">Chọn file</label>
											<input type="file" name="image_text" id="image_text" accept="image/png,image/jpeg,image/gif"/>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="">Hình nền</label>
									<div class="logo_image">
										<div class="image_box">
											<a href="javascript:void(0)" class="btn btn-danger"  onclick="delete_bn('bg_footer')"><i class="icon-trash"></i></a>
											<img id="preview_bg_footer" src="<?= $banner_js['image_thumb_bg_footer']!=''&& file_exists('uploads/images/bgfooter/'.$banner_js['image_thumb_bg_footer'])?'uploads/images/bgfooter/'.$banner_js['image_thumb_bg_footer']:'assets/images/no_img.png' ?>" alt="Ảnh nền" title='' />
										</div>
										<div>
											<label for="image_bg_footer">Chọn file</label>
											<input type="file" name="image_bg_footer" id="image_bg_footer" accept="image/png,image/jpeg,image/gif"/>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12">
								<button class="btn btn-primary">Cập nhật</button>
							</div>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="flashsale">
					<form action="cpanel/system/flashsale" class="parsley-examples" method="post" novalidate enctype='multipart/form-data'>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="">Tiêu đề</label>
									<input type="text" class="form-control" value="<?= isset($flashsale_js['title'])?$flashsale_js['title']:'' ?>" name="data_post[title]">
								</div>
								<div class="control-group form-group">
									<label class="control-label">Thời gian</label>
									<div class="controls input-append date form_datetime" data-date="<?= isset($flashsale_js['datetime'])?$flashsale_js['datetime']:'' ?>" data-date-format="dd-mm-yyyy hh:ii:ss" data-link-format="dd-mm-yyyy hh:ii:ss" data-link-field="dtp_input1">
										<input size="10" type="text" value="<?= isset($flashsale_js['datetime'])?$flashsale_js['datetime']:'' ?>" class="form-control" readonly>
										<span class="add-on"><i class="icon-remove"><i class="fas fa-times"></i></i></span>
										<span class="add-on"><i class="icon-th"><i class="fas fa-calendar-alt"></i></i></span>
									</div>
									<input type="hidden" id="dtp_input1" name="datetime"  value="<?= isset($flashsale_js['datetime'])?$flashsale_js['datetime']:'' ?>" /><br/>
								</div>
							</div>
							<div class="col-6">
							</div>
							<div class="col-12">
								<button class="btn btn-primary">Cập nhật</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div> <!-- end col -->
</div>
<script src="assets/cpanel/libs/datepicker/bootstrap-datetimepicker.min.js"></script>
<script>
	$(document).ready(function() {
		// logo footer
		$("#image_footer").change(function(event) {
			readURL_footer(this);
		});
		function readURL_footer(input) 
		{
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#image_footer").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					$('#preview_footer').attr('src', e.target.result);
					$('#preview_footer').hide();
					$('#preview_footer').fadeIn(500);
					// $('.custom-file-label').text(filename);   
				}
				reader.readAsDataURL(input.files[0]);
			} else {
				$('#preview_footer').attr('src', "assets/images/no_img.png");
			}
		}
		
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
		// =============================== social //
		$("#image_social").change(function(event) {
			readURL2(this);
		});

		function readURL2(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#image_social").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					$('#preview2').attr('src', e.target.result);
					$('#preview2').hide();
					$('#preview2').fadeIn(500);
					// $('.custom-file-label').text(filename);             
				}
				reader.readAsDataURL(input.files[0]);
			} else {
				$('#preview2').attr('src', "assets/images/no_img.png");
			}
		}
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			localStorage.setItem('activeTab', $(e.target).attr('href'));
		});
		var activeTab = localStorage.getItem('activeTab');
		if (activeTab) {
			$('#myTab a[href="' + activeTab + '"]').tab('show');
		}
	});

	function del_favicon(properties) {
		Swal.fire({
			title: "Bạn có chắc chắn muốn xóa không?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Đồng ý"
		}).then(function(e) {
			if (e.value) {
				$.ajax({
					url: "cpanel/" + properties + "/del_image",
					method: "POST",
					success: function(data) {
						if (data) {
							const extraJson = JSON.parse(data);
							if (extraJson.type === "error") {
								Swal.fire({
									icon: 'error',
									title: "Bạn không có quyền truy cập chức năng này?",
									type: "error",
								});
							} else if (extraJson.result === "success") {
								$.toast({
									heading: 'Thông báo!',
									text: 'Cập nhật trạng thái hiển thị thành công!.',
									position: 'top-right',
									loaderBg: '#5ba035',
									icon: 'success',
									hideAfter: 1000,
								});
								$("#preview").attr('src', "assets/images/no_img.png");
							}
						}
					}
				});
			}
		});
	}

	// ===================== delete images social ================================//
	function del_social(properties) {
		Swal.fire({
			title: "Bạn có chắc chắn muốn xóa không?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Đồng ý"
		}).then(function(e) {
			if (e.value) {
				$.ajax({
					url: "cpanel/" + properties + "/del_social",
					method: "POST",
					success: function(data) {
						if (data) {
							const extraJson = JSON.parse(data);
							if (extraJson.type === "error") {
								Swal.fire({
									icon: 'error',
									title: "Bạn không có quyền truy cập chức năng này?",
									type: "error",
								});
							} else if (extraJson.result === "success") {
								$.toast({
									heading: 'Thông báo!',
									text: 'Cập nhật trạng thái hiển thị thành công!.',
									position: 'top-right',
									loaderBg: '#5ba035',
									icon: 'success',
									hideAfter: 1000,
								});
								$("#preview2").attr('src', "assets/images/no_img.png")
							}
						}
					}
				});
			}
		});
	}

	//======================================================
	function del_image_footer(properties) {
		Swal.fire({
			title: "Bạn có chắc chắn muốn xóa không?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Đồng ý"
		}).then(function(e) {
			if (e.value) {
				$.ajax({
					url: "cpanel/" + properties + "/del_image_footer",
					method: "POST",
					success: function(data) {
						if (data) {
							const extraJson = JSON.parse(data);
							if (extraJson.type === "error") {
								Swal.fire({
									icon: 'error',
									title: "Bạn không có quyền truy cập chức năng này?",
									type: "error",
								});
							} else if (extraJson.result === "success") {
								$.toast({
									heading: 'Thông báo!',
									text: 'Cập nhật trạng thái hiển thị thành công!.',
									position: 'top-right',
									loaderBg: '#5ba035',
									icon: 'success',
									hideAfter: 1000,
								});
								$("#preview_footer").attr('src', "assets/images/no_img.png")
							}
						}
					}
				});
			}
		});
	}


	// Check validate upload file
	$("#capacity_pdf").bind("change", function() 
	{
		console.log("#file");

		const PDF_FORMAT = "application/pdf";
		let fileName = "";
		let fileType = "";
		let fileSize = "";
		if (this.files[0]) {
			fileName = this.files[0].name;
			fileType = this.files[0].type;
			fileSize = this.files[0].size;

			let check = true;
			if (fileType != PDF_FORMAT) {
				$(".error-msg").text("Chỉ cho phép upload file pdf");
				check = false;
			} else if (fileSize > 104857600) {
				$(".error-msg").text("Chỉ cho phép upload dung lượng file pdf < 1000MB");
				check = false;
			}
			(!check) ? $(this).val(""): $(".error-msg").text("")
		}
		console.log(fileName + "--" + fileType + "---" + fileSize);
	});
		// ============ bg
		$("#image_bg").change(function(event) {
			readURL_bg(this);
		});
		function readURL_bg(input) 
		{
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#image_bg").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					$('#preview_bg').attr('src', e.target.result);
					$('#preview_bg').hide();
					$('#preview_bg').fadeIn(500);
					// $('.custom-file-label').text(filename);   
				}
				reader.readAsDataURL(input.files[0]);
			} else {
				$('#preview_bg').attr('src', "assets/images/no_img.png");
			}
		}
		// ============ logo left
		$("#image_left").change(function(event) {
		readURL_icon(this);
		});
		function readURL_icon(input) 
		{
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#image_left").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					$('#preview_left').attr('src', e.target.result);
					$('#preview_left').hide();
					$('#preview_left').fadeIn(500);
					// $('.custom-file-label').text(filename);   
				}
				reader.readAsDataURL(input.files[0]);
			} else {
				$('#preview_left').attr('src', "assets/images/no_img.png");
			}
		}
		// ============ logo right
		$("#image_logo_right").change(function(event) {
		readURL_right(this);
		});
		function readURL_right(input) 
		{
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#image_logo_right").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					$('#preview_right').attr('src', e.target.result);
					$('#preview_right').hide();
					$('#preview_right').fadeIn(500);
					// $('.custom-file-label').text(filename);   
				}
				reader.readAsDataURL(input.files[0]);
			} else {
				$('#preview_right').attr('src', "assets/images/no_img.png");
			}
		}
</script>
<script>
	function delete_logo(type){
		Swal.fire({
			title: "Bạn có chắc chắn muốn xóa không?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Đồng ý",
		}).then(function (e) {
			if (e.value) {
				$.ajax({
					url:"cpanel/system/delete_images",
					method:"post",
					data:{type:type},
					dataType:'json',
					success:function(response){
						if (response !== undefined) {
							if (response.result === '200') {
								$('#preview_'+response.type).attr('src','assets/images/no_img.png')
							}
						}
					}
				})
			}
		});
	}
</script>
<script>
		// ============ bg
		$("#image_bg_footer").change(function(event) {
			readURL_bg2(this);
		});
		function readURL_bg2(input) 
		{
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#image_bg_footer").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					$('#preview_bg_footer').attr('src', e.target.result);
					$('#preview_bg_footer').hide();
					$('#preview_bg_footer').fadeIn(500);
					// $('.custom-file-label').text(filename);   
				}
				reader.readAsDataURL(input.files[0]);
			} else {
				$('#preview_bg_footer').attr('src', "assets/images/no_img.png");
			}
		}
		// ============ bg text
		$("#image_text").change(function(event) {
			readURL_text(this);
		});
		function readURL_text(input) 
		{
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				var filename = $("#image_text").val();
				filename = filename.substring(filename.lastIndexOf('\\') + 1);
				reader.onload = function(e) {
					$('#preview_text').attr('src', e.target.result);
					$('#preview_text').hide();
					$('#preview_text').fadeIn(500);
					// $('.custom-file-label').text(filename);   
				}
				reader.readAsDataURL(input.files[0]);
			} else {
				$('#preview_text').attr('src', "assets/images/no_img.png");
			}
		}
		function delete_bn(type){
			Swal.fire({
				title: "Bạn có chắc chắn muốn xóa không?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Đồng ý",
			}).then(function (e) {
				if (e.value) {
					$.ajax({
						url:"cpanel/system/delete_images_bn",
						method:"post",
						data:{type:type},
						dataType:'json',
						success:function(response){
							if (response !== undefined) {
								if (response.result === '200') {
									$('#preview_'+response.type).attr('src','assets/images/no_img.png')
								}
							}
						}
					})
				}
			});
		}
</script>
<script>
		$(document).ready(function() {
			$('.form_datetime').datetimepicker({
				setDate: new Date(),
        		autoclose: true,
				format: "dd-mm-yyyy hh:ii:ss",
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				forceParse: 0,
				pickerPosition: "bottom-right"
			});
			$("#image_sale").change(function(event) {
				readURL_sale(this);
			});
			function readURL_sale(input) 
			{
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					var filename = $("#image_sale").val();
					filename = filename.substring(filename.lastIndexOf('\\') + 1);
					reader.onload = function(e) {
						$('#preview_sale').attr('src', e.target.result);
						$('#preview_sale').hide();
						$('#preview_sale').fadeIn(500);
						// $('.custom-file-label').text(filename);   
					}
					reader.readAsDataURL(input.files[0]);
				} else {
					$('#preview_sale').attr('src', "assets/images/no_img.png");
				}
			}
		});
</script>