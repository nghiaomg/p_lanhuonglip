<!-- start page title -->
<link rel="stylesheet" href="assets/cpanel/customs/addcandidate.css">
<link rel="stylesheet" href="">
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
		<?php if (session()->getFlashdata('error')) { ?>
			<p class="alert alert-danger"><?= session()->getFlashdata('error') ?></p>
		<?php } ?>
		<div class="card-box">
			<form action="" class="parsley-examples" onsubmit="return checkform()" method="post" novalidate enctype="multipart/form-data">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="fullname">Họ và tên<span class="text-danger">*</span></label>
							<input type="text" name="data_post[fullname]" parsley-trigger="change" placeholder="Họ và tên" value="<?= $datas['fullname'] ?>" class="form-control" id="fullname">
						</div>
						<div class="form-group">
							<label for="yearofbirth">Năm sinh</label>
							<input type="number" min="1950" max="<?= date('Y') ?>" name="data_post[yearofbirth]" onkeyup="checkuser(this,'<?= $control ?>')" value="<?= $datas['yearofbirth'] ?>" parsley-trigger="change" required placeholder="Năm Sinh" class="form-control" id="yearofbirth">
							<small class="text text-center" id="mess_us"></small>
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại<span class="text-danger">*</span></label>
							<input type="text" name="data_post[phone]" parsley-trigger="change" placeholder="Số điện thoại" value="<?= $datas['phone'] ?>" class="form-control" id="phone">
						</div>
						<div class="form-group">
							<label for="email">Email<span class="text-danger">*</span></label>
							<input type="text" name="data_post[email]" parsley-trigger="change" placeholder="Email" value="<?= $datas['email'] ?>" class="form-control" id="email">
						</div>
						<div class="form-group">
							<label for="address">Địa chỉ</label>
							<input type="text" name="data_post[address]" onkeyup="checkuser(this,'<?= $control ?>')"  value="<?= $datas['address'] ?>" parsley-trigger="change" required placeholder="Địa chỉ" class="form-control" id="address">
							<small class="text text-center" id="mess_us"></small>
						</div>
						<div class="form-group">
							<label for="input">Upload CV</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="pdf-file"
                                    aria-describedby="inputGroupFileAddon01" accept="application/pdf">
                                    <label class="custom-file-label" for="inputGroupFile01"><?= $datas['cv_name'] ?></label>
                                </div>
                                <a href="<?= $datas['cv_path'] ?>" class="btn btn-info waves-effect waves-light mr-1" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>
                                </a>
                            </div>
						</div>
                        
					</div>
					<div class="col-sm-6">
						<div id="preview-container">
							<div>
								<div id="pdf-loader">Loading Preview ..</div>
								
								<div id="preview-cover">
									<canvas id="pdf-preview" width="150">
                                    </canvas>
								</div>

									<span id="pdf-name"></span>
								<div id="button-group">
									<button id="upload-button">Upload</button>
									<button id="cancel-pdf">Cancel</button>
								</div>
							<p class="text-center text-danger" id="msg"></p>
						</div>
					</div>
				</div>
				<div class="form-group text-center mb-0">
                    <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
						Lưu
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
<!-- Plugin js-->
<script src="assets/cpanel/libs/parsleyjs/parsley.min.js"></script>
<script src="assets/cpanel/js/pages/form-validation.init.js"></script>
<script src="assets/js/pdf/pdf.js"></script>
<script src="assets/js/pdf/pdf.worker.js"></script>
<script>

var _PDF_DOC,
	_CANVAS = document.querySelector('#pdf-preview'),
	_OBJECT_URL;

function showPDF(pdf_url) {
	PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
		_PDF_DOC = pdf_doc;

		showPage(1);

    	URL.revokeObjectURL(_OBJECT_URL);
	}).catch(function(error) {
		document.querySelector("#cancel-pdf").click();
		
		alert(error.message);
	});;
}

function showPage(page_no) {
	_PDF_DOC.getPage(page_no).then(function(page) {
		var scale_required = _CANVAS.width / page.getViewport(1).width;

		var viewport = page.getViewport(scale_required);

		_CANVAS.height = viewport.height;

		var renderContext = {
			canvasContext: _CANVAS.getContext('2d'),
			viewport: viewport
		};
		
		page.render(renderContext).then(function() {
			document.querySelector("#pdf-preview").style.display = 'flex';
			document.querySelector("#pdf-loader").style.display = 'none';
		});
	});
}

	document.querySelector(".custom-file").addEventListener('click', function() {
		document.querySelector("#pdf-file").click();
	});

document.querySelector("#pdf-file").addEventListener('change', function() {
    var file = this.files[0];

    var mime_types = [ 'application/pdf' ];
    
    if(mime_types.indexOf(file.type) == -1) {
		Swal.fire(
			'Tệp tin không hợp lệ!!',
			'Xin lỗi! Hệ thống chỉ cho phép tải lên file PDF',
			'warning'
		)

        return;
    }

    if(file.size > 2*1024*1024) {
		Swal.fire(
			'Tệp tin không hợp lệ!!',
			'Xin lỗi! Tệp tin dung lượng tải lên tối đa là 2MB',
			'warning'
		)
        return;
    }


    document.querySelector("#pdf-name").innerText = file.name;
    document.querySelector("#pdf-name").style.display = 'flex';

    document.querySelector("#cancel-pdf").style.display = 'flex';

    document.querySelector("#pdf-loader").style.display = 'flex';

    _OBJECT_URL = URL.createObjectURL(file)

	showPDF(_OBJECT_URL);
});

/* Reset file input */
document.querySelector("#cancel-pdf").addEventListener('click', function() {

    document.querySelector("#pdf-file").value = '';

    document.querySelector("#pdf-name").style.display = 'none';
    document.querySelector("#pdf-loader").style.display = 'none';
    document.querySelector("#cancel-pdf").style.display = 'none';
});

</script>