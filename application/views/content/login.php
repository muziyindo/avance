<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 5.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>
		<?php echo $title  ?>
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
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico') ?>" />



	<style>
		.btn-focus {
			color: #fff;
			background-color: #000051;
			border-color: #000051;
			/* width:280px; */
		}

		.m-login.m-login--1 .m-login__wrapper .m-login__form .m-form__group .form-control {
			-webkit-border-radius: 0 !important;

			border-bottom: 1px solid darkgray;
			padding: 1rem 0;
			margin-top: 0.7rem;
		}
	</style>
</head>
<!-- end::Head -->
<!-- end::Body -->

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile 		m-login m-login--1 m-login--singin" id="m_login">
			<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside m-login__content" style="background-image: url(<?php echo base_url('assets/app/media/img//bg/bg-3.jpg') ?>); background-size:auto%; background-repeat:no-repeat; opacity: 0.8;">
				<div class="m-stack m-stack--hor m-stack--desktop">
					<div class="m-stack__item m-stack__item--fluid">
						<div class="m-login__wrapper">
							<div class="m-login__logo">
								<a href="#">
									<img src="<?php echo base_url('assets/app/media/img//logos/logo-2.png') ?>">
								</a>
							</div>
							<div class="m-login__signin">
								<div class="m-login__head">
									<h3 class="m-login__title">
										User Sign In
									</h3>
								</div>
								<div>
									<?php
									if (validation_errors())
										echo '<div style="color:red">' . validation_errors() . '</div>';
									?>
								</div>
								<?php
								$message = $this->session->flashdata('message');
								if ($message == "invalid_password") {
								?>
									<div class="alert alert-block alert-warning">
										<button data-dismiss="alert" class="close close-sm" type="button">
											<!--<i class="fa fa-times"></i>-->
										</button>
										Incorrect Login details - password
									</div>
								<?php
								}
								?>

								<?php
								$message = $this->session->flashdata('message');
								if ($message == "invalid_user") {
								?>
									<div class="alert alert-block alert-warning">
										<button data-dismiss="alert" class="close close-sm" type="button">
											<!--<i class="fa fa-times"></i>-->
										</button>
										Incorrect Login details - username
									</div>
								<?php
								}
								?>
								<form class="m-login__form m-form" method="post" action="<?php echo site_url('Account/authenticate') ?>">
									<div class="form-group m-form__group">
										<input class="form-control m-input" type="email" placeholder="Email" name="username" autocomplete="off" autocomplete="new-password">
									</div>
									<div class="form-group m-form__group">
										<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password" autocomplete="new-password">
									</div>
									<div class="row m-login__form-sub">
										<div class="col m--align-left">
											<label class="m-checkbox m-checkbox--focus">
												<input type="checkbox" name="remember">
												Remember me
												<span></span>
											</label>
										</div>
										<div class="col m--align-right">
											<a href="javascript:;" id="m_login_forget_password" class="m-link">
												Forget Password ?
											</a>
										</div>
									</div>



									<div class="m-login__form-action">
										<button type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill btn-info m-btn--custom m-btn--air ">

											Login
										</button>

										

									</div>

								</form>
							</div>

							<div class="m-login__forget-password">
								<div class="m-login__head">
									<h3 class="m-login__title">
										Forgotten Password ?
									</h3>
									<div class="m-login__desc">
										Enter your email to reset your password:
									</div>
								</div>
								<form class="m-login__form m-form" action="">
									<div class="form-group m-form__group">
										<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
									</div>
									<div class="m-login__form-action">
										<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
											Request
										</button>
										<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
											Cancel
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!--<div class="m-stack__item m-stack__item--center">
							<div class="m-login__account">
								<span class="m-login__account-msg">
									Don't have an account yet ?
								</span>
								&nbsp;&nbsp;
								<a href="javascript:;" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
									Sign Up
								</a>
							</div>
						</div>--->
				</div>
			</div>
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content" style="background-image: url(<?php echo base_url('assets/app/media/img//bg/bg-4.jpg') ?>); background-size:auto%; background-repeat:no-repeat">
				<div class="m-grid__item m-grid__item--middle">
					<h3 class="m-login__welcome">
						AVANCE
					</h3>
					<p class="m-login__msg">
						Constantly challenging ourselves to deliver more to our clients
						<br>

					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end:: Page -->
	<!--begin::Base Scripts -->
	<script src="<?php echo base_url('assets/vendors/base/vendors.bundle.js') ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/demo/default/base/scripts.bundle.js') ?>" type="text/javascript"></script>
	<!--end::Base Scripts -->
	<!--begin::Page Snippets -->
	<script src="<?php echo base_url('assets/snippets/pages/user/login.js') ?>" type="text/javascript"></script>
	<!--end::Page Snippets -->
</body>
<!-- end::Body -->

</html>