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
							<input type="text" name="data_post[fullname]" parsley-trigger="change" required placeholder="Họ và tên" class="form-control" id="fullname">
						</div>
						<div class="form-group">
							<label for="yearofbirth">Năm sinh</label>
							<input type="number" min="1950" max="<?= date('Y') ?>" name="data_post[yearofbirth]" onkeyup="checkuser(this,'<?= $control ?>')" parsley-trigger="change" required placeholder="Năm Sinh" class="form-control" id="yearofbirth">
							<small class="text text-center" id="mess_us"></small>
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại<span class="text-danger">*</span></label>
							<input type="text" name="data_post[phone]" parsley-trigger="change" placeholder="Số điện thoại" class="form-control" id="phone">
						</div>
						<div class="form-group">
							<label for="email">Email<span class="text-danger">*</span></label>
							<input type="text" name="data_post[email]" parsley-trigger="change" required placeholder="Email" class="form-control" id="email">
						</div>
						<div class="form-group">
							<label for="address">Địa chỉ</label>
							<input type="text" name="data_post[address]" onkeyup="checkuser(this,'<?= $control ?>')" parsley-trigger="change" required placeholder="Địa chỉ" class="form-control" id="address">
							<small class="text text-center" id="mess_us"></small>
						</div>
						<div class="form-group">
							<label for="input">Upload CV</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                <input type="file" name="image" require class="custom-file-input" id="pdf-file"
                                    aria-describedby="inputGroupFileAddon01" accept="application/pdf">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
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

		// Show the first page
		showPage(1);

		// destroy previous object url
    	URL.revokeObjectURL(_OBJECT_URL);
	}).catch(function(error) {
		// trigger Cancel on error
		document.querySelector("#cancel-pdf").click();
		
		// error reason
		alert(error.message);
	});;
}

function showPage(page_no) {
	// fetch the page
	_PDF_DOC.getPage(page_no).then(function(page) {
		// set the scale of viewport
		var scale_required = _CANVAS.width / page.getViewport(1).width;

		// get viewport of the page at required scale
		var viewport = page.getViewport(scale_required);

		// set canvas height
		_CANVAS.height = viewport.height;

		var renderContext = {
			canvasContext: _CANVAS.getContext('2d'),
			viewport: viewport
		};
		
		// render the page contents in the canvas
		page.render(renderContext).then(function() {
			document.querySelector("#pdf-preview").style.display = 'flex';
			document.querySelector("#pdf-loader").style.display = 'none';
		});
	});
}

	document.querySelector(".custom-file").addEventListener('click', function() {
		document.querySelector("#pdf-file").click();
	});

/* Selected File has changed */
document.querySelector("#pdf-file").addEventListener('change', function() {
    // user selected file
    var file = this.files[0];

    // allowed MIME types
    var mime_types = [ 'application/pdf' ];
    
    // Validate whether PDF
    if(mime_types.indexOf(file.type) == -1) {
		Swal.fire(
			'Tệp tin không hợp lệ!!',
			'Xin lỗi! Hệ thống chỉ cho phép tải lên file PDF',
			'warning'
		)

        return;
    }

    // validate file size
    if(file.size > 2*1024*1024) {
		Swal.fire(
			'Tệp tin không hợp lệ!!',
			'Xin lỗi! Tệp tin dung lượng tải lên tối đa là 2MB',
			'warning'
		)
        return;
    }

    // validation is successful

    // set name of the file
    document.querySelector("#pdf-name").innerText = file.name;
    document.querySelector("#pdf-name").style.display = 'flex';

    // show cancel and upload buttons now
    document.querySelector("#cancel-pdf").style.display = 'flex';

    // Show the PDF preview loader
    document.querySelector("#pdf-loader").style.display = 'flex';

    // object url of PDF 
    _OBJECT_URL = URL.createObjectURL(file)

    // send the object url of the pdf to the PDF preview function
	showPDF(_OBJECT_URL);
});

/* Reset file input */
document.querySelector("#cancel-pdf").addEventListener('click', function() {

    // reset to no selection
    document.querySelector("#pdf-file").value = '';

    // hide elements that are not required
    document.querySelector("#pdf-name").style.display = 'none';
    //document.querySelector("#pdf-preview").style.display = 'none';
    document.querySelector("#pdf-loader").style.display = 'none';
    document.querySelector("#cancel-pdf").style.display = 'none';
});



function checkform(){
	if ($('#pdf-file').get(0).files.length === 0) {
		console.log("No files selected.");
		Swal.fire(
			'Tệp tin không hợp lệ!!',
			'Xin lỗi! Dường như bạn chưa tải lên file CV',
			'warning'
		)
		return false;
	}
}

</script>