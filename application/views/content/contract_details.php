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
							<b>Contract successfully Updated</b>
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





					<div id="disable-fields">
						<div class="m-portlet__body">
							<div class="form-group m-form__group row">
								<div class="col-lg-3">
									<label>
										Document Type:
									</label>
									<select name="document_type" class="form-control m-input" id="document_type">
										<option value="">-select-</option>
										<option value="Contract" <?php if ($contract_details[document_type] == "Contract") echo "selected" ?>>Contract</option>
										<option value="Letter" <?php if ($contract_details[document_type] == "Letter") echo "selected" ?>>Letter</option>
										<option value="Memorandum of understanding" <?php if ($contract_details[document_type] == "Memorandum of understanding") echo "selected" ?>>Memorandum of understanding</option>
										<option value="Short Term Lease" <?php if ($contract_details[document_type] == "Short Term Lease") echo "selected" ?>>Short Term Lease</option>

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
										<input style="" type="text" name="doc_number" class="form-control m-input" placeholder="" value="<?php echo $contract_details[doc_number] ?>">
									</div>
									<span class="m-form__help">
										Please document number obtained from D365
									</span>
								</div>
								<div class="col-lg-3">
									<label>
										Activity:
									</label>
									<select name="activity" class="form-control m-input" id="activity">
										<option value="">-select-</option>
										<option value="Creation" <?php if ($contract_details[activity] == "Creation") echo "selected" ?>>Creation</option>
										<option value="Review" <?php if ($contract_details[activity] == "Review") echo "selected" ?>>Review</option>


									</select>
									<span class="m-form__help">
										Please specify activity
									</span>
								</div>
								<div class="col-lg-3">
									<label>
										Product Type:
									</label>
									<select name="product_type" class="form-control m-input">
										<option value="">-select-</option>
										<?php
										foreach ($productList as $value) {
										?>
											<option value="<?php echo $value->product_type ?>" <?php if ($contract_details[product_type] == $value->product_type) echo "selected" ?>><?php echo $value->product_type ?></option>

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
										<input type="text" name="requester_name" class="form-control m-input" placeholder="" value="<?php echo $contract_details[requester_name] ?>" readonly>
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
										<option value="Finance" <?php if ($contract_details[requester_dept] == "Finance") echo "selected" ?>>Finance</option>
										<option value="HR" <?php if ($contract_details[requester_dept] == "HR") echo "selected" ?>>HR</option>
										<option value="BDD" <?php if ($contract_details[requester_dept] == "BDD") echo "selected" ?>>BDD</option>
										<option value="Executives" <?php if ($contract_details[requester_dept] == "Executives") echo "selected" ?>>Executives</option>

										<option value="Systems" <?php if ($contract_details[requester_dept] == "Systems") echo "selected" ?>>Systems</option>
										<option value="Pre-Sales" <?php if ($contract_details[requester_dept] == "Pre-Sales") echo "selected" ?>>Pre-Sales</option>
										<option value="DCM" <?php if ($contract_details[requester_dept] == "DCM") echo "selected" ?>>DCM</option>
										<option value="Access Network" <?php if ($contract_details[requester_dept] == "Access Network") echo "selected" ?>>Access Network</option>
										<option value="Field Service" <?php if ($contract_details[requester_dept] == "Field Service") echo "selected" ?>>Field Service</option>
										<option value="Admin" <?php if ($contract_details[requester_dept] == "Admin") echo "selected" ?>>Admin</option>

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
										<input type="text" id="requester_email" name="requester_email" class="form-control m-input" placeholder="" value="<?php echo $contract_details[requester_email] ?>" readonly>
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
									<input type="text" class="form-control m-input" placeholder="Enter other party name" name="other_party_name" value="<?php echo $contract_details[other_party_name] ?>">
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
										<input type="text" class="form-control m-input" placeholder="enter service location" name="service_location" value="<?php echo $contract_details[service_location] ?>">
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
									<input type="text" class="form-control m-input" placeholder="Enter other party name" name="other_party_name_signatory" value="<?php echo $contract_details[other_party_name_signatory] ?>">
									<span class="m-form__help">
										Please enter other party name
									</span>
								</div>
								<div class="col-lg-4">
									<label class="">
										Position:
									</label>
									<input type="text" class="form-control m-input" placeholder="Enter other party name" name="other_party_position" value="<?php echo $contract_details[other_party_position] ?>">
									<span class="m-form__help">
										Please enter position
									</span>
								</div>

								<div class="col-lg-4">
									<label>
										Phone Number:
									</label>
									<input type="number" class="form-control m-input" placeholder="Enter phone number" name="phone_no" value="<?php echo $contract_details[phone_no] ?>">
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
									<input type="email" class="form-control m-input" placeholder="Enter email" name="email" value="<?php echo $contract_details[email] ?>">
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
										<input type="text" class="form-control m-input" placeholder="" name="address" value="<?php echo $contract_details[address] ?>">
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
										<input type="text" class="form-control m-input" placeholder="Enter start date" id="m_datepicker_1" data-date-format="yyyy/mm/dd" readonly name="proposed_start_date" value="<?php echo $contract_details[proposed_start_date] ?>">
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
											<input type="text" class="form-control m-input" placeholder="" id="m_datepicker_2" data-date-format="yyyy/mm/dd" readonly name="proposed_end_date" value="<?php echo $contract_details[proposed_end_date] ?>">
										</div>
										<span class="m-form__help">
											Please enter proposed end date
										</span>
									</div>
									<div class="col-lg-4">
										<label>
											Contract Duration:
										</label>
										<input type="text" class="form-control m-input" placeholder="Enter contract duration" name="contract_duration" id="contract_duration" readonly value="<?php echo $contract_details[contract_duration] ?>">
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

									<div class="col-lg-8">

										<table class="table table-striped">
											<thead>
												<tr>
													<th>
														S/N
													</th>
													<th>
														Document Type
													</th>
													<th>

													</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														1
													</td>
													<td>
														<span style="background:rgb(255,117,117); color:black;"><strong>proposal agreed upon or Sales/Service Order</strong></span>
													</td>
													<td>
														<a href="<?php echo site_url('App/downloadDoc/' . $contract_details[proposal_agreed_upon]) ?>"><i class="la la-download"></i></a>
													</td>
												</tr>
											</tbody>
										</table>

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
										<input type="text" class="form-control m-input" placeholder="Enter termination notice" name="termination_notice" value="<?php echo $contract_details[termination_notice] ?>">
										<span class="m-form__help">
											Please enter termination notice
										</span>
									</div>
									<div class="col-lg-4">
										<label class="">
											Payment Term:
										</label>
										<input type="text" class="form-control m-input" placeholder="Enter payment term" name="payment_term" value="<?php echo $contract_details[payment_term] ?>">
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
											<option value="Lease" <?php if ($contract_details[sale_of_equipment] == "Lease") echo "selected" ?>>Lease</option>
											<option value="Sale of equipment" <?php if ($contract_details[sale_of_equipment] == "Sale of equipment") echo "selected" ?>>Sale of equipment</option>
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
										<textarea cols="20" rows="10" class="form-control m-input" placeholder="Enter details of request" name="purpose_of_letter"><?php echo $contract_details[purpose_of_letter] ?></textarea>
										<!--<span class="m-form__help">
													</span>-->
									</div>
								</div>

							</div>
						</div>
						<!--end wrapper-box-2-->


					</div>




					<!--begin::Portlet-->
					<div class="m-portlet">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										Uploaded Documents
									</h3>
								</div>
							</div>
						</div>
						<div class="m-portlet__body">


							<?php
							$message = $this->session->flashdata('message');
							if ($message == "deleted") {
							?>
								<div class="alert alert-success" role="alert">
									<button data-dismiss="alert" class="close close-sm" type="button"></button>
									<strong>
										Deleted!
									</strong>
									successfully.
								</div>
							<?php
							}
							?>


							<!--begin::Section-->
							<div class="m-section">
								<div class="m-section__content">
									<table class="table table-bordered table-striped" id="example" width="100%">
										<thead>
											<tr>
												<th>
													#
												</th>
												<th>
													Document Name
												</th>
												<th>
													File Name
												</th>
												<th>
													Date Added
												</th>
												<th>
													Uploaded By
												</th>

												<th>
													Download
												</th>
												<!--<th>
														Delete
													</th>-->
											</tr>
										</thead>
										<tbody>
											<?php $i = 1;
											foreach ($docs as $contract) { ?>

												<?php
												$path = $contract->path;
												$filePAthArray = explode("/", $path);
												$filename = $filePAthArray[2];

												$id = urlencode(base64_encode($contract->id)); //encoding ID
												//$numbers = $hashids->decode($id);
												?>



												<tr>
													<th scope="row">
														<?php echo $i; ?>
													</th>
													<td>
														<?php echo $contract->doc_name; ?>
													</td>
													<td>
														<?php echo substr($filename, 10); ?>
													</td>
													<td>
														<?php echo $contract->date_added; ?>
													</td>
													<td>
														<?php echo $contract->modified_by; ?>
													</td>
													<td>
														<a href="<?php echo site_url('App/download_documents_/' . $contract->id)  ?>" class="btn btn-accent m-btn m-btn--icon m-btn--pill m-btn--air">
															<span>
																<i class="la la-download"></i>
																<span>

																</span>
															</span>
														</a>
													</td>
													<!--<td>
														<a href="<?php echo site_url('App/removeDoc/' . $id)  ?>" class="btn btn-danger m-btn m-btn--icon m-btn--pill m-btn--air">
															<span>
																<i class="la la-trash-o"></i>
																<span>
																	
																</span>
															</span>
														</a>
													</td>-->

												</tr>
											<?php $i++;
											} ?>

										</tbody>
									</table>
								</div>
							</div>
							<!--end::Section-->
						</div>
					</div>
					<!--end::Portlet-->




























					<div class="m-portlet__head bg-light">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon m--hide">
									<i class="la la-gear"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Legal Officer processing outcome
								</h3>
							</div>
						</div>
					</div>

					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<table class="table table-striped_ table-bordered">
								<thead>
									<tr>
										<th>
										</th>
										<th>
											Status
										</th>
										<th>
											Comment
										</th>
										<th>
											Download
										</th>

									</tr>
								</thead>
								<tbody>
									<?php if ($contract_details[activity] == "Review") { ?>
										<tr>
											<th scope="row" style="background:#e9ecef;">
												Review
											</th>
											<td>
												<?php if ($contract_details[status] == "Pending_Review") { ?>
													pending<div class="m-loader m-loader--brand" style="width: 30px; display: inline-block;"></div>
												<?php } else if ($contract_details[status] == "Fail_Review") { ?>
													Disapproved <i class="la la-close" style="color:red; font-weight:bold"></i>
												<?php } else { ?>
													Approved <i class="la la-check" style="color:green; font-weight:bold"></i>
												<?php } ?>
											</td>
											<td>
												<?php echo $contract_details[review_comment]; ?>
											</td>
											<td>
												<?php if (!empty($contract_details[review_doc])) { ?>
													<a href="<?php echo site_url('App/downloadDoc/' . $contract_details[review_doc]) ?>"><i class="la la-download"></i></a>
												<?php } ?>
											</td>
										</tr>

									<?php } else if ($contract_details[activity] == "Creation") { ?>

										<tr>
											<th scope="row" style="background:#e9ecef;">
												Creation
											</th>
											<td>
												<?php if ($contract_details[status] == "Pending_Creation") { ?>
													pending<div class="m-loader m-loader--brand" style="width: 30px; display: inline-block;"></div>
												<?php } else if ($contract_details[status] == "Fail_Creation") { ?>
													Disapproved <i class="la la-close" style="color:red; font-weight:bold"></i>
												<?php } else { ?>
													Approved <i class="la la-check" style="color:green; font-weight:bold"></i>
												<?php } ?>
											</td>
											<td>
												<?php echo $contract_details[review_comment]; ?>
											</td>
											<td>
												<?php if (!empty($contract_details[review_doc])) { ?>
													<a href="<?php echo site_url('App/downloadDoc/' . $contract_details[review_doc]) ?>"><i class="la la-download"></i></a>
												<?php } ?>
											</td>
										</tr>
									<?php } ?>

									<tr>
										<th scope="row" style="background:#e9ecef;">
											Sign off
										</th>
										<td>
											<?php if ($contract_details[status] == "Signed_Off") { ?>
												Approved <i class="la la-check" style="color:green; font-weight:bold"></i>
											<?php } else if ($contract_details[status] == "Fail_Signoff") { ?>
												Disapproved <i class="la la-close" style="color:red; font-weight:bold"></i>
											<?php } else { ?>
												pending<div class="m-loader m-loader--brand" style="width: 30px; display: inline-block;"></div>
											<?php } ?>
										</td>
										<td>
											<?php echo $contract_details[signoff_comment]; ?>
										</td>
										<td>
											<?php if (!empty($contract_details[signoff_doc])) { ?>
												<a href="<?php echo site_url('App/downloadDoc/' . $contract_details[signoff_doc]) ?>">
													<i class="la la-download"></i></a>
											<?php } ?>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>


					<?php if ($role == "Legal Officer" && $contract_details[status] != "Signed_Off") { ?>
						<div class="m-portlet__head bg-light">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<span class="m-portlet__head-icon m--hide">
										<i class="la la-gear"></i>
									</span>
									<h3 class="m-portlet__head-text">
										Legal Officer
									</h3>
								</div>
							</div>
						</div>


						<div class="m-portlet__body">

							<div class="form-group m-form__group row">
								<table class="table m-table ">
									<thead>
										<tr>
											<th>
											</th>
											<th>

											</th>
											<th>

											</th>
											<th>

											</th>

										</tr>
									</thead>
									<tbody>




										<?php if ($contract_details[activity] == "Review") { ?>
											<tr class="to_hide">
												<th scope="row" style="background:#e9ecef;">
													Review
												</th>
												<td>
													<label class="m-radio">
														<input type="radio" name="review" value="1" <?php if ($contract_details[status] != "Pending_Review" && $contract_details[status] != "Fail_Review") echo "checked" ?>>
														Approve
														<span></span>
													</label>
												</td>
												<td>
													<label class="m-radio">
														<input type="radio" name="review" value="2" <?php if ($contract_details[status] == "Fail_Review") echo "checked" ?>>
														Disapprove
														<span></span>
													</label>
												</td>
												<td>
													<div class="form-group">
														<label for="exampleTextarea">
															Comment
														</label>
														<textarea class="form-control m-input" id="exampleTextarea" rows="3" name="review_comment"></textarea>
													</div>


												</td>
												<td>
													<div class="form-group">
														<label class="">
															Upload file:
														</label>
														<input type="file" class="form-control m-input" placeholder="Enter contact number" name="review_doc">
													</div>
												</td>

											</tr>

										<?php } else if ($contract_details[activity] == "Creation") { ?>

											<tr class="to_hide">
												<th scope="row" style="background:#e9ecef;">
													Creation
												</th>
												<td>
													<label class="m-radio">
														<input type="radio" name="review" value="1" <?php if ($contract_details[status] != "Pending_Creation" && $contract_details[status] != "Fail_Creation") echo "checked" ?>>
														Approve
														<span></span>
													</label>
												</td>
												<td>
													<label class="m-radio">
														<input type="radio" name="review" value="2" <?php if ($contract_details[status] == "Fail_Creation") echo "checked" ?>>
														Disapprove
														<span></span>
													</label>
												</td>
												<td>
													<div class="form-group">
														<label for="exampleTextarea">
															Comment
														</label>
														<textarea class="form-control m-input" id="exampleTextarea" rows="3" name="review_comment"></textarea>
													</div>


												</td>
												<td>
													<div class="form-group">
														<label class="">
															Upload file:
														</label>
														<input type="file" class="form-control m-input" placeholder="Enter contact number" name="review_doc">
													</div>
												</td>

											</tr>

										<?php } ?>




										<?php if ($contract_details[status] == "Pending_Signoff" || $contract_details[status] == "Fail_Signoff" || $contract_details[status] == "Signed_Off") { ?>
											<tr>
												<th scope="row" style="background:#e9ecef;">
													Sign off
												</th>
												<td>
													<label class="m-radio">
														<input type="radio" name="signoff" value="1" <?php if ($contract_details[status] == "Signed_Off") echo "checked" ?>>
														Approve
														<span></span>
													</label>
												</td>
												<td>
													<label class="m-radio">
														<input type="radio" name="signoff" value="2" <?php if ($contract_details[status] == "Fail_Signoff") echo "checked" ?>>
														Disapprove
														<span></span>
													</label>
												</td>
												<td>
													<div class="form-group">
														<label for="exampleTextarea">
															Comment
														</label>
														<textarea class="form-control m-input" id="exampleTextarea" rows="3" name="signoff_comment"></textarea>></textarea>
													</div>
												</td>
												<td>
													<div class="form-group">
														<label class="">
															Upload file:
														</label>
														<input type="file" class="form-control m-input" placeholder="Enter contact number" name="signoff_doc">
													</div>
												</td>

											</tr>
										<?php  } ?>
									</tbody>
								</table>
							</div>

						</div>
					<?php } ?>



					<input type="hidden" value="<?php echo $contract_details[status]  ?>" name="status"></input>







					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-4">
									<?php if ($role == "Legal Officer" && ($contract_details[status] == "Pending_Review" || $contract_details[status] == "Fail_Review" || $contract_details[status] == "Pending_Creation" || $contract_details[status] == "Fail_Creation" || $contract_details[status] == "Pending_Signoff" || $contract_details[status] == "Fail_Signoff")) { ?>
										<button type="submit" class="btn m-btn--pill m-btn--air         btn-primary m-btn--wide">
											Save Changes
										</button>
									<?php } else if ($role == "Contract Requestor" && ($contract_details[status] == "Fail_Review" || $contract_details[status] == "Fail_Creation" || $contract_details[status] == "Fail_Signoff")) { ?>
										<button type="submit" id="btn-s" class="btn m-btn--pill m-btn--air         btn-primary m-btn--wide" style="display:none">
											Save Changes
										</button>
									<?php } ?>

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



				<?php if (($role == "Legal Officer" ||  $role == "Contract Requestor") && ($contract_details[status] == "Signed_Off")) { ?>


					<?php
					//check the signed document table if document has already been uploaded
					$contract_id = $contract_details[id];
					$query = $this->db->query("select id,path from signed_documents where contract_id='$contract_id'");
					?>
					<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="form_doc" enctype="multipart/form-data" accept-charset="utf-8" method="post">

						<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
							<div class="m-form__actions m-form__actions--solid">
								<div class="row">

									<?php if ($role == "Legal Officer") { ?>
										<div class="col-lg-2">
											<button type="button" class="btn m-btn--pill m-btn--air         btn-success m-btn--wide" id="btn_pdf">
												Print to PDF
											</button>
										</div>


										<?php if ($query->num_rows() < 1) { ?>
											<div class="col-lg-3">

												<label class="custom-file">
													<input type="file" id="file2" class="custom-file-input" name="signed_doc" required>
													<span class="custom-file-control">Upload Signed off form</span>
												</label>

											</div>


											<div class="col-lg-2">

												<input type="hidden" id="insertId3" name="insertId3" value="<?php echo $contract_details[id]; ?>"></input>
												<input type="hidden" id="auth_party" name="auth_party" value="<?php echo $contract_details[other_party_name] ?>"></input>
												<button type="submit" class="btn m-btn--pill m-btn--air         btn-success m-btn--wide" id="btn_upload">
													Save
												</button>
											</div>

											<div class="col-lg-5" id="doc_data">

											</div>

										<?php } ?>

									<?php } ?>


									<div class="col-lg-5">


										<?php
										$i = 1;

										if ($role == "Legal Officer" ||  $role == "Contract Requestor") {

											foreach ($query->result() as $value) { ?>


												<a href="<?php echo site_url('App/download_signed_documents/' . $value->id)  ?>" class="btn btn-accent m-btn m-btn--icon m-btn--pill m-btn--air">
													<span>
														<i class="la la-download"></i>
														<span>
															Download Signed Document
														</span>
													</span>
												</a>

												<a href="<?php echo base_url() . $value->path  ?>" target="_blank" class="btn btn-metal m-btn m-btn--icon m-btn--pill m-btn--air">
													<span>
														<i class="la la-eye"></i>
														<span>
															View Signed Document
														</span>
													</span>
												</a>

										<?php $i++;
											} //endforeach
										} //end if	 

										?>



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
				<?php } ?>






			</div>
			<!--end::Portlet-->



		</div>
	</div>




</div>



<script type="text/javascript" src="<?php echo base_url('assets/') ?>js/plugins/jquery/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<script>
	$('#btn_pdf').click(function() {

		CreatePDFfromHTML();
	});

	function CreatePDFfromHTML() {
		var HTML_Width = $(".html-content").width();
		var HTML_Height = $(".html-content").height();
		var top_left_margin = 15;
		var PDF_Width = HTML_Width + (top_left_margin * 2);
		var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
		var canvas_image_width = HTML_Width;
		var canvas_image_height = HTML_Height;

		var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

		html2canvas($(".html-content")[0]).then(function(canvas) {
			var imgData = canvas.toDataURL("image/jpeg", 1.0);
			var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
			pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
			for (var i = 1; i <= totalPDFPages; i++) {
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
			}
			pdf.save("Signoff_form.pdf");
			//$(".html-content").hide();
		});
	}
</script>

<script>
	$(function() {

		function redirect_view() {
			$('#modal-user').modal('hide');
			window.location.replace('<?php echo site_url('App/contractDetails/' . $contract_details[id]) ?>');
		}

		$('#form_contract').submit(function(e) {
			e.preventDefault();
			$('#loader_doc').css("display", "block");

			$('#activity').removeAttr('disabled'); //remove disabled attribute from dropdown so it can read using php post method
			$('#requester_email').removeAttr('disabled'); //remove disabled attribute from dropdown so it can read using php post method


			var data = new FormData(this); // <-- 'this' is your form element
			$.ajax({
				url: "<?php echo site_url(); ?>/App/updateContract/<?php echo $contract_details[id] ?>",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				type: "POST",
				success: function(response) {
					if (response.trim() > 0) {
						$('#loader_doc').css("display", "none");
						if (response.trim() == 10) //no update done
						{
							$('#doc_error').show().html("No update done");
							window.scroll(0, 0);
							setTimeout(function() {
								$('#doc_error').hide();
							}, 20000);
						} else {
							//Display modal for successful update
							$('#modal-user').modal('show');
							setTimeout(function() {
								redirect_view()
							}, 3000);
							//alert(response.trim());

						}
					} else {

						$('#loader_doc').css("display", "none");
						$('#doc_error').show().html(response);
						window.scroll(0, 0);
						setTimeout(function() {
							$('#doc_error').hide();
						}, 20000);
					}
					//alert(response.trim());
				}


			});


		});



		//this jquery hide a div section based on "Document Type" dropdown selected item when the page loads

		var doc_type = $("#document_type").val();
		if (doc_type == "Letter") {
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


	//This handles the upload of signed-off form after a request is signed off
	$('#form_doc').submit(function(e) {
		e.preventDefault();

		$('#loader_doc').css("display", "block");
		$('#doc_error').css("display", "block");


		var data = new FormData(this); // <-- 'this' is your form element
		$.ajax({
			url: "<?php echo site_url(); ?>/app/insertSignedDocuments",
			data: data,
			cache: false,
			contentType: false,
			processData: false,
			type: "POST",
			success: function(response) {
				if (response.trim() == ("Document Name is required").trim() || response.trim() == ("You must upload atleast one document").trim() || response.trim() == ("File is too large max size is 70MB").trim()) {
					$('#loader_doc').css("display", "none");
					$('#doc_error').html(response);
					setTimeout(function() {
						$('#doc_error').hide();
					}, 5000);

				} else {

					$('#loader_doc').css("display", "none");
					$('#doc_data').html(response); //
					alert("Document Uploaded Successfully");
					$('#form_doc')[0].reset();
					//$('#doc_error').show().html(response);

				}
			}
		});
	});
</script>

<script>
	//disables all input fields inside this div--> #disable-fields
	$(document).ready(function() {
		$('#disable-fields :input').attr('disabled', true);
	});

	function disableall1() {
		$('#disable-fields :input').removeAttr('disabled');
		$('#btn-s').css("display", "block");
	}
</script>