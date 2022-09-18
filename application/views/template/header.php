<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>
		<?php echo $title ?>
	</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<script src="<?php echo base_url('assets/app/js/webfont.js') ?>"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->
	<link href="<?php echo base_url('assets/vendors/base/vendors.bundle.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/demo/default/base/style.bundle.css') ?>" rel="stylesheet" type="text/css" />

	<!--custom css from mueez-->
	<link href="<?php echo base_url('assets/demo/default/base/custom.css') ?>" rel="stylesheet" type="text/css" />
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico') ?>" />

	<?php if ($title == "View_Documents" || $title == "View_Contracts") { ?>
		<!--<link href="<?php echo base_url('assets/vendors/base/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />-->
		<!-- <link href="<?php echo base_url('assets/vendors/base/dataTables.bootstrap.min.css') ?>" rel="stylesheet" type="text/css" /> -->

		<!-- Datatables -->
		<!-- <link href="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"> -->

		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css" rel="stylesheet">

		<style>
			.btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle) {
				color: #333;
			}

			.btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
				color: #000;
			}

			.btn-group>.btn-group:last-child:not(:first-child)>.btn:first-child {
				color: #000;
			}
		</style>

	<?php } ?>

	<style>
		html {
			font-size: 0.8em;
		}

		p {
			font-size: 12px;
		}

		p span {
			font: 12px "Fira Sans", sans-serif;
		}

		.m-widget24 .m-widget24__item .m-widget24__title {
			color: #000 !important;
			font-weight: bold !important;
			font-size: 16px;
		}

		.m-widget24 .m-widget24__item .m-widget24__desc {
			color: dimgray;
			font-weight: 600;
		}

		.m-widget26 .m-widget26__number>small {
			color: #000;
			font-weight: 700;
		}

		.m-widget25 .m-widget25__desc {
			color: #000;
			font-weight: 700;
		}

		.m-widget25 .m-widget25--progress .m-widget25__progress .m-widget25__progress-sub {
			color: dimgray;
			font-weight: 600;
		}

		.m-portlet .m-portlet__body {
			color: #000;
		}

		
		<?php if ( $title == "Contract Details" ){  ?> 

		/** Hide the pending Review/Creation Section once request is in signed off stage */
		<?php if ($contract_details[status] == "Pending_Signoff" || $contract_details[status] == "Fail_Signoff" || $contract_details[status] == "Signed_Off") { ?>.to_hide {
			visibility: hidden;
		}

		<?php } ?>

		<?php } ?>


	</style>
</head>
<!-- end::Head -->
<!-- end::Body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<!-- BEGIN: Header -->
		<header class="m-grid__item    m-header " data-minimize-offset="200" data-minimize-mobile-offset="200">
			<div class="m-container m-container--fluid m-container--full-height">
				<div class="m-stack m-stack--ver m-stack--desktop">
					<!-- BEGIN: Brand -->
					<div class="m-stack__item m-brand  m-brand--skin-light ">
						<div class="m-stack m-stack--ver m-stack--general">
							<div class="m-stack__item m-stack__item--middle m-brand__logo">
								<a href="<?php echo site_url('App') ?>" class="m-brand__logo-wrapper">
									<img alt="" src="<?php echo base_url('assets/demo/default/media/img/logo/logo_default_dark.png') ?>" />
								</a>
							</div>
							<div class="m-stack__item m-stack__item--middle m-brand__tools">
								<!-- BEGIN: Left Aside Minimize Toggle -->
								<a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block 
					 ">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Responsive Aside Left Menu Toggler -->
								<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Responsive Header Menu Toggler -->
								<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
									<span></span>
								</a>
								<!-- END -->
								<!-- BEGIN: Topbar Toggler -->
								<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
									<i class="flaticon-more"></i>
								</a>
								<!-- BEGIN: Topbar Toggler -->
							</div>
						</div>
					</div>
					<!-- END: Brand -->