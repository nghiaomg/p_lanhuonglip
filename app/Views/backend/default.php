<!DOCTYPE html>
<html lang="en">

<head>
	<base href="<?php echo site_url(); ?>">
	<meta charset="utf-8" />
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/cpanel/images/favicon.ico">

	<!-- App css -->
	<link href="assets/cpanel/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
	<link href="assets/cpanel/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/cpanel/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />
	<!-- alert css -->
	<link href="assets/cpanel/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/cpanel/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

	<link href="assets/cpanel/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/cpanel/libs/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="assets/cpanel/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/cpanel/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="assets/cpanel/libs/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Vendor js -->
	<script src="assets/cpanel/js/vendor.min.js"></script>

</head>

<body>

	<!-- Begin page -->
	<div id="wrapper">


		<!-- Topbar Start -->
		<?= $this->include('backend/layout/topbar') ?>
		<!-- end Topbar -->


		<!-- ========== Left Sidebar Start ========== -->
		<?= $this->include('backend/layout/sidebar') ?>
		<!-- Left Sidebar End -->

		<!-- ============================================================== -->
		<!-- Start Page Content here -->
		<!-- ============================================================== -->

		<div class="content-page">
			<div class="content">
				<!-- Start Content-->
				<div class="container-fluid">
					<?php if (isset($template) && !empty($template)) { ?>
						<?= $this->include($template, isset($data) ? $data : NULL) ?>
					<?php } ?>
				</div> <!-- end container-fluid -->

			</div> <!-- end content -->



			<!-- Footer Start -->
			<?= $this->include('backend/layout/footer') ?>
			<!-- end Footer -->

		</div>

		<!-- ============================================================== -->
		<!-- End Page content -->
		<!-- ============================================================== -->

	</div>
	<!-- END wrapper -->
	<link href="assets/cpanel/customs/style.css" rel="stylesheet" type="text/css" />
	<!-- Required datatable js -->
	<script src="assets/cpanel/libs/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/cpanel/libs/datatables/dataTables.bootstrap4.min.js"></script>
	<!-- Responsive examples -->
	<script src="assets/cpanel/libs/datatables/dataTables.responsive.min.js"></script>
	<script src="assets/cpanel/libs/datatables/responsive.bootstrap4.min.js"></script>
	<!-- alert js -->
	<script src="assets/cpanel/libs/jquery-toast/jquery.toast.min.js"></script>
	<script src="assets/cpanel/libs/sweetalert2/sweetalert2.min.js"></script>

	<script src="assets/cpanel/libs/moment/moment.min.js"></script>
    <script src="assets/cpanel/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="assets/cpanel/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="assets/cpanel/libs/clockpicker/bootstrap-clockpicker.min.js"></script>
    <script src="assets/cpanel/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/cpanel/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- App js -->
	<script src="assets/cpanel/js/app.min.js"></script>
	<!-- myscript -->
	<script src="assets/cpanel/js/myscript.js"></script>

</body>

</html>