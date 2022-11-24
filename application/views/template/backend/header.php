<!DOCTYPE html>
<html lang="en" dir="">

<head>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Meta Website -->
	<meta name="description" content="<?= $web_desc; ?>">
	<meta property="og:title" content="<?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)) . ' ' . ($this->uri->segment(2) ? str_replace('-', ' ', $this->uri->segment(2)) : "") . $web_title) : $web_title); ?>">
	<meta property="og:description" content="<?= $web_desc; ?>">
	<meta property="og:image" content="<?= base_url(); ?>assets/images/<?= $web_icon?>">
	<meta property="og:url" content="<?= base_url(uri_string()) ?>">
    
    <title><?= ($this->uri->segment(1) ? ucwords(str_replace('-', ' ', $this->uri->segment(1)) . ' ' . ($this->uri->segment(2) ? str_replace('-', ' ', $this->uri->segment(2)) : "") . " - ".$web_title) : $web_title); ?></title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/<?= $web_icon;?>">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img/apple-icon.png">


	<!-- Nucleo Icons -->
	<link href="<?= base_url(); ?>assets/css/nucleo-icons.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="<?= base_url(); ?>assets/css/nucleo-svg.css" rel="stylesheet" />
	<!-- CSS Files -->
	<link id="pagestyle" href="<?= base_url(); ?>assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
	<!-- IntroJs -->
	<link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugin/intro-js-modern.css">
	<!-- select2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
	<!-- datatables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.1/css/fixedColumns.dataTables.min.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/custom.css?<?= time();?>">

    <!-- javascript -->
    <script type="text/javascript" src="<?= base_url();?>assets/js/jquery-3.6.0.min.js"></script>
    <!-- data tables -->
	<script type="text/javascript" src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
	<!-- sweetalert2 -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<!-- ckeditor -->
	<script type="text/javascript" type="text/javascript" src="<?= base_url(); ?>assets/plugin/ckeditor/ckeditor.js"></script>
    <!-- introjs -->
	<script type="text/javascript" src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
    <!-- momentjs -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- apexchart -->
    <script src="<?= base_url();?>assets/js/apexchart.js"></script>
	<!-- select2 -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/choices.min.js"></script>
</head>
<body class="g-sidenav-show   bg-gray-100">