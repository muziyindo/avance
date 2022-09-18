</div>







</div>
<!-- end:: Body -->

<!-- begin::Footer -->
<footer class="m-grid__item		m-footer ">
	<div class="m-container m-container--fluid m-container--full-height m-page__container">
		<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
			<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
				<span class="m-footer__copyright">
					2021 &copy; All rights reserved
					<a href="#" class="m-link">
						Netcom Africa Limited
					</a>
				</span>
			</div>
			<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
				<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
					<li class="m-nav__item">
						<a href="#" class="m-nav__link">
							<span class="m-nav__link-text">
								About
							</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="#" class="m-nav__link">
							<span class="m-nav__link-text">
								Privacy
							</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="#" class="m-nav__link">
							<span class="m-nav__link-text">
								T&C
							</span>
						</a>
					</li>
					<li class="m-nav__item">
						<a href="#" class="m-nav__link">
							<span class="m-nav__link-text">
								Purchase
							</span>
						</a>
					</li>
					<li class="m-nav__item m-nav__item">
						<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
							<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- end::Footer -->
</div>
<!-- end:: Page -->


<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
	<i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
<!-- begin::Quick Nav -->
<ul class="m-nav-sticky" style="margin-top: 30px;">


	<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
		<a href="#" target="_blank">
			<i class="la la-code-fork"></i>
		</a>
	</li>
	<li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
		<a href="#" target="_blank">
			<i class="la la-life-ring"></i>
		</a>
	</li>
</ul>
<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="<?php echo base_url('assets/vendors/base/vendors.bundle.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/demo/default/base/scripts.bundle.js') ?>" type="text/javascript"></script>
<!--end::Base Scripts -->

<?php if ($page_title == "New Document" || $title == "Contract Details" || $title == "View_Contracts") { ?>
	<script src="<?php echo base_url('assets/demo/default/custom/components/forms/widgets/bootstrap-datepicker.js') ?>" type="text/javascript"></script>

<?php }	?>

<?php if ($page_title == "View Users") { ?>
	<script src="<?php echo base_url('assets/demo/default/custom/components/base/toastr.js') ?>" type="text/javascript"></script>
	<script>
		toastr.options = {
			"closeButton": false,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};

		<?php
		$status=$this->session->flashdata('message');
		if($status == "enabled"){
		?>
			toastr.success("User successfully enabled");

		<?php } else if($status == "disabled"){ ?>

			toastr.success("User successfully disabled");

		<?php } ?>
	</script>

<?php }	?>




<!--begin::Page Snippets -->
<script src="<?php echo base_url('assets/app/js/dashboard.js') ?>" type="text/javascript"></script>


<?php if ($title == "View_Documents" || $title == "View_Contracts") { ?>

	<!--<script src="<?php echo base_url('assets/vendors/base/jquery-3.5.1.js') ?>" type="text/javascript"></script>-->

	<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
	<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>

	<script>
		$(document).ready(function() {
			var table = $('#example').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'colvis']
			});

			table.buttons().container()
				.appendTo('#example_wrapper .col-md-6:eq(0)');
		});
	</script>


<?php } ?>



<!--end::Page Snippets -->
</body>
<!-- end::Body -->

</html>