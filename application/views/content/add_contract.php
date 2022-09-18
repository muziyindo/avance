					<style>
					.m-form .m-form__group label {
					font-weight: 600;
					}
					</style>

					<div class="m-content">

						<div class="row">
							<div class="col-lg-12">

								<!--Modal for status change-->
								<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content" style="border-radius:0 !important">
											<div class="modal-header" style="background:#2a5290; color:#fff">
												NOTIFICATION
											</div>
											<div class="modal-body">
												<b>Contract successfully added and pending action by legal officer</b>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger btn-ok" style="background:#2a5290; border:0" data-dismiss="modal">Close</button>

											</div>
										</div>
									</div>
								</div>

								<p>
								<div id="doc_error" style="color:red; font-weight:bold; text-align:center"><?php echo validation_errors(); ?></div>
								</p>



								<!--begin::Portlet-->
								<div class="m-portlet">

									<div id="contract_form">
										<div class="m-portlet__head bg-light">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<span class="m-portlet__head-icon m--hide">
														<i class="la la-gear"></i>
													</span>
													<h3 class="m-portlet__head-text">
														Requester Information
													</h3>
												</div>
											</div>
										</div>



										<!--begin::Form-->
										<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="form_contract" enctype="multipart/form-data" accept-charset="utf-8" method="post">

											<div class="m-portlet__body">
												<div class="form-group m-form__group row">
													<div class="col-lg-3">
														<label>
															Document Type:
														</label>
														<select name="document_type" id="document_type" class="form-control m-input" required>
															<option value="">-select-</option>
															<option value="Contract">Contract</option>
															<option value="Letter">Letter</option>
															<option value="Memorandum of understanding">Memorandum of understanding</option>
															<option value="Short Term Lease">Short Term Lease</option>

														</select>
														<span class="m-form__help">
															Please select document type
														</span>
													</div>
													<div class="col-lg-3">
														<label>
															Document Number (Optional):
														</label>
														<div class="input-group m-input-group m-input-group--square">
															<span class="input-group-addon">
																<i class="la la-user"></i>
															</span>
															<input style="" type="text" name="doc_number" class="form-control m-input" placeholder="" value="<?php echo $this->session->userdata('doc_number'); ?>">
														</div>
														<span class="m-form__help">
															Document number obtained from D365
														</span>
													</div>
													<div class="col-lg-3">
														<label>
															Activity:
														</label>
														<select name="activity" class="form-control m-input" id="activity" required>
															<option value="">-select-</option>
															<option value="Creation">Creation</option>
															<option value="Review">Review</option>
														</select>
														<span class="m-form__help">
															Specify requested activity
														</span>
													</div>
													<div class="col-lg-3">
														<label>
															Product Type:
														</label>
														<select name="product_type" class="form-control m-input" required>
															<option value="">-select-</option>
															<?php
																foreach($productList as $value)
																{
															?>
																<option value="<?php echo $value->product_type ; ?>"><?php echo $value->product_type ;  ?></option>

															<?php } ?>

														</select>
														<span class="m-form__help">
															Please select product type
														</span>
													</div>


												</div>

												<div class="form-group m-form__group row">
													<div class="col-lg-3">
														<label>
															Full Name:
														</label>
														<div class="input-group m-input-group m-input-group--square">
															<span class="input-group-addon">
																<i class="la la-user"></i>
															</span>
															<input style="background:#f1f1f1" type="text" name="requester_name" class="form-control m-input" placeholder="" value="<?php echo $this->session->userdata('name'); ?>" readonly required>
														</div>
														<span class="m-form__help">
															Please enter your fullname
														</span>
													</div>
													<div class="col-lg-3">
														<label>
															Department:
														</label>
														<select name="requester_dept" class="form-control m-input" required>
															<option value="">-select-</option>
															<option value="Finance">Finance</option>
															<option value="HR">HR</option>
															<option value="BDD">BDD</option>
															<option value="Executives">Executives</option>

															<option value="Systems">Systems</option>
															<option value="Pre-Sales">Pre-Sales</option>
															<option value="DCM">DCM</option>
															<option value="Access Network">Access Network</option>
															<option value="Field Service">Field Service</option>
															<option value="Admin">Admin</option>


														</select>
														<span class="m-form__help">
															Please select your department
														</span>
													</div>

													<div class="col-lg-3">
														<label>
															Email:
														</label>
														<div class="input-group m-input-group m-input-group--square">
															<span class="input-group-addon">
																<i class="la la-user"></i>
															</span>
															<input style="background:#f1f1f1" type="text" name="requester_email" class="form-control m-input" placeholder="" value="<?php echo $this->session->userdata('email'); ?>" readonly required>
														</div>
														<span class="m-form__help">
															Please enter your email
														</span>
													</div>


												</div>


											</div>



											<div class="m-portlet__head bg-light">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<span class="m-portlet__head-icon m--hide">
															<i class="la la-gear"></i>
														</span>
														<h3 class="m-portlet__head-text">
															Other Party (Individual/Company) Information
														</h3>
													</div>
												</div>
											</div>

											<div class="m-portlet__body">
												<div class="form-group m-form__group row">

													<div class="col-lg-4">
														<label class="">
															Name:
														</label>
														<input type="text" class="form-control m-input" placeholder="Enter other party name" name="other_party_name" required>
														<span class="m-form__help">
															Please enter other party name
														</span>
													</div>
													<div class="col-lg-4">
														<label>
															Service Location:
														</label>
														<div class="input-group m-input-group m-input-group--square">
															<span class="input-group-addon">
																<i class="la la-user"></i>
															</span>
															<input type="text" class="form-control m-input" placeholder="enter service location" name="service_location" required>
														</div>
														<span class="m-form__help">
															Please enter service location
														</span>
													</div>
												</div>

											</div>




											<div class="m-portlet__head bg-light">
												<div class="m-portlet__head-caption">
													<div class="m-portlet__head-title">
														<span class="m-portlet__head-icon m--hide">
															<i class="la la-gear"></i>
														</span>
														<h3 class="m-portlet__head-text">
															Authorized Signatory of Other Party
														</h3>
													</div>
												</div>
											</div>

											<div class="m-portlet__body">
												<div class="form-group m-form__group row">

													<div class="col-lg-4">
														<label class="">
															Name:
														</label>
														<input type="text" class="form-control m-input" placeholder="Enter other party name" name="other_party_name_signatory" required>
														<span class="m-form__help">
															Please enter other party name
														</span>
													</div>
													<div class="col-lg-4">
														<label class="">
															Position:
														</label>
														<input type="text" class="form-control m-input" placeholder="Enter other position" name="other_party_position" required>
														<span class="m-form__help">
															Please enter position
														</span>
													</div>

													<div class="col-lg-4">
														<label>
															Phone Number:
														</label>
														<input type="number" class="form-control m-input" placeholder="Enter phone number" name="phone_no" required>
														<span class="m-form__help">
															Please enter phone number
														</span>
													</div>

												</div>
												<div class="form-group m-form__group row">

													<div class="col-lg-4">
														<label class="">
															Email:
														</label>
														<input type="email" class="form-control m-input" placeholder="Enter email" name="email" required>
														<span class="m-form__help">
															Please enter email
														</span>
													</div>

													<div class="col-lg-4">
														<label>
															Physical Address (No PO Box)
														</label>
														<div class="input-group m-input-group m-input-group--square">
															<span class="input-group-addon">
																<i class="la la-user"></i>
															</span>
															<input type="text" class="form-control m-input" placeholder="" name="address" required>
														</div>
														<span class="m-form__help">
															Please enter address
														</span>
													</div>
												</div>
											</div>













											<div id="wrapper-box">
												<!-- start wrapper-box -->
												<div class="m-portlet__head bg-light">
													<div class="m-portlet__head-caption">
														<div class="m-portlet__head-title">
															<span class="m-portlet__head-icon m--hide">
																<i class="la la-gear"></i>
															</span>
															<h3 class="m-portlet__head-text">
																Contract Terms
															</h3>
														</div>
													</div>
												</div>

												<div class="m-portlet__body">
													<div class="form-group m-form__group row">

														<div class="col-lg-4">
															<label class="">
																Proposed Start Date:
															</label>
															<input type="text" class="form-control m-input" placeholder="Enter start date" name="proposed_start_date" id="m_datepicker_1" data-date-format="yyyy/mm/dd" readonly>
															<span class="m-form__help">
																Please enter proposed start date
															</span>
														</div>
														<div class="col-lg-4">
															<label>
																Proposed End Date:
															</label>
															<div class="input-group m-input-group m-input-group--square">
																<span class="input-group-addon">
																	<i class="la la-user"></i>
																</span>
																<input type="text" class="form-control m-input" placeholder="" name="proposed_end_date" id="m_datepicker_2" data-date-format="yyyy/mm/dd" readonly>
															</div>
															<span class="m-form__help">
																Please enter proposed end date
															</span>
														</div>
														<div class="col-lg-4">
															<label>
																Contract Duration:
															</label>
															<input type="text" class="form-control m-input" placeholder="Enter contract duration" name="contract_duration" id="contract_duration" readonly>
															<span class="m-form__help">
																Please enter contract duration
															</span>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<div class="col-lg-4">
															<label class="">
																Terms and Conditions agreed upon:
															</label>
															<input type="file" class="form-control m-input" placeholder="Enter contact number" name="doc_">
															<span class="m-form__help">
																Attach proposal agreed upon or Sales/Service Order
															</span>
														</div>

													</div>

												</div>



												<div class="m-portlet__head bg-light">
													<div class="m-portlet__head-caption">
														<div class="m-portlet__head-title">
															<span class="m-portlet__head-icon m--hide">
																<i class="la la-gear"></i>
															</span>
															<h3 class="m-portlet__head-text">
																Other Information
															</h3>
														</div>
													</div>
												</div>

												<div class="m-portlet__body">
													<div class="form-group m-form__group row">
														<div class="col-lg-4">
															<label>
																Termination Notice:
															</label>
															<input type="text" class="form-control m-input" placeholder="Enter termination notice" name="termination_notice">
															<span class="m-form__help">
																Please enter termination notice
															</span>
														</div>
														<div class="col-lg-4">
															<label class="">
																Payment Term:
															</label>
															<input type="text" class="form-control m-input" placeholder="Enter payment term" name="payment_term">
															<span class="m-form__help">
																Please enter payment term
															</span>
														</div>

														<div class="col-lg-4">
															<label>
																Lease/Sale of equipment:
															</label>
															<select name="sale_of_equipment" class="form-control m-input">
																<option value="">-select-</option>
																<option value="Lease">Lease</option>
																<option value="Sale of equipment">Sale of equipment</option>
															</select>
															<span class="m-form__help">
																Please enter Lease or sale of equipment
															</span>
														</div>
													</div>
												</div>
											</div>
											<!--End wrapper-box-->


											<div id="wrapper-box-2" style="display:none">
												<!--start wrapper-box-2-->
												<div class="m-portlet__head bg-light">
													<div class="m-portlet__head-caption">
														<div class="m-portlet__head-title">
															<span class="m-portlet__head-icon m--hide">
																<i class="la la-gear"></i>
															</span>
															<h3 class="m-portlet__head-text">
																Purpose of Letter
															</h3>
														</div>
													</div>
												</div>
												<div class="m-portlet__body">
													<div class="form-group m-form__group row">

														<div class="col-lg-8">
															<label class="">
																Please enter the details of the request:
															</label>
															<textarea cols="20" rows="10" class="form-control m-input" placeholder="Enter details of request" name="purpose_of_letter"></textarea>
															<!--<span class="m-form__help">
													</span>-->
														</div>
													</div>

												</div>
											</div>
											<!--end wrapper-box-2-->


											<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
												<div class="m-form__actions m-form__actions--solid">
													<div class="row">
														<div class="col-lg-4"></div>
														<div class="col-lg-4">
															<button type="submit" class="btn m-btn--pill m-btn--air         btn-primary m-btn--wide" id="btn_contract">
																Next
															</button>
															<!--<button type="reset" class="btn m-btn--pill m-btn--air         btn-secondary m-btn--wide">
															Cancel
														</button>-->
														</div>
														<div class="col-lg-4">
															<div style="font-weight:bold; font-size:17px; 	display:none" id="loader_doc">
																<img src="<?php echo base_url() . "assets/img/page-loader.gif" ?>" class="img-responsive" style="width:80px; ">
																PLEASE WAIT .....
															</div>
														</div>


													</div>
												</div>
											</div>


										</form>
										<!--end::Form-->
									</div>
									<!--end contract form-->












									<div id="doc_upload" style="display:none">
										<p>
										<div id="doc_error" style="color:red; font-weight:bold; text-align:center"></div>
										</p>
										<div class="m-portlet__head bg-light">
											<div class="m-portlet__head-caption">
												<div class="m-portlet__head-title">
													<span class="m-portlet__head-icon m--hide">
														<i class="la la-gear"></i>
													</span>
													<h3 class="m-portlet__head-text">
														Documents Upload
													</h3>
												</div>
											</div>
										</div>

										<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="form_upload" enctype="multipart/form-data" accept-charset="utf-8" method="post">
											<div class="m-portlet__body">
												<div class="form-group m-form__group row">
													<div class="col-lg-4">
														<label>
															Document Name:
														</label>
														<select id="doc_name" name="doc_name" class="form-control m-input" required>
															<option value="">-select-</option>
															<option value="SERVICE LEVEL AGREEMENT">SERVICE LEVEL AGREEMENT </option>
															<option value="NDA">NDA</option>
															<option value="AGENCY AGREEMENT">AGENCY AGREEMENT</option>
															<option value="VENDOR AGREEMENT">VENDOR AGREEMENT</option>
															<option value="PARTNERSHIP AGREEMENT">PARTNERSHIP AGREEMENT</option>
															<option value="SERVICE PROVIDER AGREEMENT">SERVICE PROVIDER AGREEMENT</option>
															<option value="MASTER SERVICE PROVIDER">MASTER SERVICE PROVIDER</option>
															<option value="MANAGE SERVICE PROVIDER AGREEMENT">MANAGE SERVICE PROVIDER AGREEMENT</option>
															<option value="E-SPACE AGREEMENT">E-SPACE AGREEMENT</option>
															<option value="COLOCATION AGREEMENT">COLOCATION AGREEMENT</option>
															<option value="AMENDMENT/ADDENDUM">AMENDMENT/ADDENDUM</option>
															<option value="SERVICE CONTRACTS">SERVICE CONTRACTS</option>
															<option value="GENERAL TERMS AND CONDITION">GENERAL TERMS AND CONDITION</option>
															<option value="ACCEPTABLE USER POLICY">ACCEPTABLE USER POLICY</option>
															<option value="JOINT VENTURE AGREEMENT">JOINT VENTURE AGREEMENT</option>
															<option value="SHAREHOLDERS AGREEMENT">SHAREHOLDERS AGREEMENT</option>
															<option value="SHARE PURCHASE AGREEMENT">SHARE PURCHASE AGREEMENT</option>
															<option value="INDEMNITY">INDEMNITY</option>
															<option value="MORTGAGE AGREEMENT">MORTGAGE AGREEMENT</option>
															<option value="OTHERS">OTHERS</option>
														</select>
														<span class="m-form__help">
															select document name
														</span>
													</div>

													<input type="hidden" id="insertId3" name="insertId3" value="<?php echo $uniqueId; ?>"></input>
													<div class="col-lg-4">
														<label>
															Upload Document:
														</label>
														<div class="input-group m-input-group m-input-group--square">
															<span class="input-group-addon">
																<i class="la la-file"></i>
															</span>
															<input type="file" name="doc_" class="form-control m-input" placeholder="" required>
														</div>
														<span class="m-form__help">
															Select file
														</span>
													</div>
													<input type="hidden" id="insertId2" name="insertId2" value=""></input>
												</div>
											</div>

											<div class="m-portlet__body" id="doc_data">




											</div>

											<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
												<div class="m-form__actions m-form__actions--solid">
													<div class="row">
														<div class="col-lg-4"></div>
														<div class="col-lg-4">
															<button type="submit" class="btn m-btn--pill m-btn--air         btn-primary m-btn--wide" id="btn_upload">
																Upload
															</button>
															<!--<button type="reset" class="btn m-btn--pill m-btn--air         btn-secondary m-btn--wide">
															Cancel
														</button>-->
														</div>
														<div class="col-lg-4">
															<div style="font-weight:bold; font-size:17px; 	display:none" id="loader_upload">
																<img src="<?php echo base_url() . "assets/img/page-loader.gif" ?>" class="img-responsive" style="width:80px; ">
																PLEASE WAIT .....
															</div>
														</div>


													</div>
												</div>
											</div>

										</form>
									</div>
									<!--end div-->

									<div class="m-portlet__body" id="div_finish" style="display:none">
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-4"></div>
													<div class="col-lg-6">


													</div>
													<div class="col-lg-2">
														<button type="button" class="btn m-btn--pill m-btn--air         btn-success m-btn--wide" id="btn_finish">
															Finish
														</button>
													</div>


												</div>
											</div>
										</div>
									</div>





								</div>
								<!--end::Portlet-->



							</div>
						</div>



						<script type="text/javascript" src="<?php echo base_url('assets/') ?>js/plugins/jquery/jquery.min.js"></script>

						<script>
							$(function() {

								function redirect_view() {
									$('#modal-user').modal('hide');

									var $activity = $('#activity').val();

									if ($activity == "Creation")
										window.location.replace('<?php echo site_url('App/contracts/pv') ?>');
									else
										window.location.replace('<?php echo site_url('App/contracts/pr') ?>');
								}

								$('#form_contract').submit(function(e) {
									e.preventDefault();
									$('#loader_doc').css("display", "block");

									var data = new FormData(this); // <-- 'this' is your form element
									$.ajax({
										url: "<?php echo site_url(); ?>/App/insertContract",
										data: data,
										cache: false,
										contentType: false,
										processData: false,
										type: "POST",
										success: function(response) {
											if (response.trim() > 0) {
												$('#loader_doc').css("display", "none");

												/*
												//Display modal for successful user creation
												$('#modal-user').modal('show');
												setTimeout(function(){redirect_view()},3000);
												$("#form_contract").trigger('reset');
												*/
												$('#contract_form').css("display", "none"); //hide the contract form
												$('#doc_upload').css("display", "block"); //display the upload form
												$('#div_finish').css("display", "block"); //display the upload form

												//alert(response.trim());
												$('#insertId2').val(response.trim()); //set value of hidden field to ID of inserted item


											} else {

												$('#loader_doc').css("display", "none");
												$('#doc_error').show().html(response);
												window.scroll(0, 0);
												setTimeout(function() {
													$('#doc_error').hide();
												}, 20000);

											}
										}
									}); //end ajax


								}); //end ajax form submission



								$('#form_upload').submit(function(e) {
									e.preventDefault();
									$('#loader_upload').css("display", "block");
									$('#doc_error').css("display", "block");

									var data = new FormData(this); // <-- 'this' is your form element
									$.ajax({
										url: "<?php echo site_url(); ?>/app/insertContractDocuments",
										data: data,
										cache: false,
										contentType: false,
										processData: false,
										type: "POST",
										success: function(response) {
											if (response.trim() == ("Document Name is required").trim() || response.trim() == ("You must upload atleast one document").trim() || response.trim() == ("File is too large max size is 70MB").trim()) {
												$('#loader_upload').css("display", "none");
												$('#doc_error').html(response);
												setTimeout(function() {
													$('#doc_error').hide();
												}, 5000);

											} else {

												$('#loader_upload').css("display", "none");
												$('#doc_data').html(response); //
												alert("Document Uploaded Successfully");
												$('#form_upload')[0].reset();
												$("#doc_name").prop("selectedIndex", 0);
												//$('#doc_error').show().html(response);

											}
										}
									});
								});

								$("#btn_finish").on("click", function() {
									var $activity = $('#activity').val();
									$('#loader_upload').css("display", "block");

									$.ajax({
										url: "<?php echo site_url(); ?>/App/notifyLegal/" + $activity,
										data: {
											activity: $activity
										},
										cache: false,
										contentType: false,
										processData: false,
										type: "POST",
										success: function(response) {
											if (response.trim() > 0) {
												$('#loader_upload').css("display", "none");
												$('#modal-user').modal('show');
												setTimeout(function() {
													redirect_view()
												}, 3000);
											} else {
												alert(response.trim());
											}
										}
									});

								}); //end button 


								//this jquery hide a div section based on "Document Type" dropdown selection

								$('#document_type').on('change', function() {
									if (this.value == 'Letter') {
										//hide contract terms and other information block
										$("#wrapper-box").hide();

										//show purpose of letter section here
										$("#wrapper-box-2").show();

									} else {
										//show contract terms and other information block
										$("#wrapper-box").show();

										//hide purpose of letter section here
										$("#wrapper-box-2").hide();
									}
								});





								/* auto computes duration when contract start and end date is selected*/
								var startDate = 0;
								var endDate = 0;

								$("#m_datepicker_1").on('change', function(event) {
									event.preventDefault();

									$startDate = new Date(this.value); //get the start date
									$endDate = new Date($("#m_datepicker_2").val()); //get the end date


									//compute the month difference
									var $months = ($endDate.getMonth() - $startDate.getMonth()) + 1 + (12 * ($endDate.getFullYear() - $startDate.getFullYear()));
									$months = $months - 1; //subtract 1 month for accuracy

									if ($months >= 1) {
										var $year = Math.floor($months / 12); //get the year part
										var $noMonths = $months % 12;
										$("#contract_duration").val($year + " year(s), " + $noMonths + " month(s)");
									} else if ($months < 1) {
										alert("Minimum contract duration is 1 month");
									}

								});

								$("#m_datepicker_2").on('change', function(event) {
									event.preventDefault();

									$endDate = new Date(this.value); //get the end date
									$startDate = new Date($("#m_datepicker_1").val()); //get the start date

									//compute the month difference
									var $months = ($endDate.getMonth() - $startDate.getMonth()) + 1 + (12 * ($endDate.getFullYear() - $startDate.getFullYear()));
									$months = $months - 1; //subtract 1 month for accuracy

									if ($months >= 1) {
										var $year = Math.floor($months / 12); //get the year part
										var $noMonths = $months % 12;
										$("#contract_duration").val($year + " year(s), " + $noMonths + " month(s)");
									} else if ($months < 1) {
										alert("Minimum contract duration is 1 month");
									}

								});




							});
						</script>





































					</div>