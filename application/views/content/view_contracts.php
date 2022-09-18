					<div class="m-content">

						<div class="row">
							<div class="col-lg-12">







								<!--begin::Portlet-->
								<div class="m-portlet">


									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<h3 class="m-portlet__head-text">
													View all records / Spool Report - <?php echo count($contracts)." record(s) returned "; ?>
												</h3>
											</div>
										</div>
									</div>


									<!--Search Start-->

									<div class="m-portlet__body" style="background:#f1f1f1">
										<p>
											<div id="doc_error" style="color:red; font-weight:bold; text-align:center"><?php echo validation_errors() ?? validation_errors(); ?></div>
										</p>

										<form action="<?php echo site_url('app/search/spool'); ?>" method="post" accept-charset="utf-8" >
											<div class="row">
												<div class="col-xs-12 col-sm-6 col-md-3">
													<label>Filter By</label>
													<select class="form-control" name="filterBy" required>
														<option value="">--select--</option>
														<option value="Date Created" <?php if($filterBy=="Date Created") echo "selected" ?> >Date Created</option>
														<option value="Contract Date" <?php if($filterBy=="Contract Date") echo "selected" ?> >Contract Date</option>


													</select>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-3">
													<label class="">
														Start Date:
													</label>
													<input type="text" class="form-control m-input" id="m_datepicker_1" data-date-format="yyyy/mm/dd" placeholder="Enter Start Date" name="startDate" value = "<?php echo $startDate ?? $startDate ; ?>" readonly />
												</div>
												<div class="col-xs-12 col-sm-6 col-md-3">
													<label class="">
														End Date:
													</label>
													<input type="text" class="form-control m-input" id="m_datepicker_2" data-date-format="yyyy/mm/dd" placeholder="Enter End Date" name="endDate" value = "<?php echo $endDate ?? $endDate ; ?>" readonly />
												</div>
												<div class="col-xs-12 col-sm-6 col-md-3">
													<label>.</label>
													<input type="submit" role="button" class="btn btn-default btn-block" value="Search" name="btn_search"></input>
												</div>

											</div>
										</form>

									</div>
									<!--end portlet-->

									<!--Search End-->


									<div class="m-portlet__body">
										<!--begin::Section-->
										<div class="m-section">
											<div class="m-section__content">
											<div style="overflow-x:auto;">
												<table id="example" class="<!--m-table m-table--border-brand m-table--head-bg-brand--> table-bordered table-striped">
													<thead>
														<tr>
															<th>
																#
															</th>
															<th>
																Requester
															</th>
															<th>
																Document Type
															</th>
															<th>
																Activity
															</th>
															<th>
																Product Type
															</th>
															<th>
																Other Party
															</th>
															<th>
																Duration
															</th>
															<th>
																Start Date
															</th>
															<th>
																End Date
															</th>

															<th>
																Date Requested/Created
															</th>

															<th>
																Status
															</th>

															<th>
																Service Location
															</th>
															<th>
																Authorized Signatory Position
															</th>
															<th>
																Authorized Signatory Name
															</th>
															<th>
																Authorized Signatory Email
															</th>
															<th>
																Authorized Signatory Phone
															</th>
															<th>
																Authorized Signatory Address
															</th>
															<th>
																Termination Notice
															</th>
															<th>
																Payment Terms
															</th>
															<th>
																Sale of equipment
															</th>
															<th>
																Purpose of Letter
															</th>

															<th>

															</th>
														</tr>
													</thead>
													<tbody>
														<?php $i = 1;
														foreach ($contracts as $contract) { ?>
															<tr>
																<th scope="row">
																	<?php echo $i; ?>
																</th>
																<td>
																<a href="<?php echo site_url('App/contractDetails/' . $contract->id)  ?>"><?php echo $contract->requester_name; ?></a>
																</td>
																<td>
																	<?php echo $contract->document_type; ?>
																</td>
																<td>
																	<?php echo $contract->activity; ?>
																</td>
																<td>
																	<?php echo $contract->product_type; ?>
																</td>
																<td>
																	<?php echo $contract->other_party_name; ?>
																</td>
																<td>
																	<?php echo $contract->contract_duration; ?>
																</td>
																<td>
																	<?php echo $contract->proposed_start_date; ?>
																</td>
																<td>
																	<?php echo $contract->proposed_end_date; ?>
																</td>
																<td>
																	<?php echo $contract->date_created; ?>
																</td>

																<td>
																	<?php echo $contract->status; ?>
																</td>

																<td>
																	<?php echo $contract->service_location; ?>
																</td>
																<td>
																	<?php echo $contract->other_party_position; ?>
																</td>
																<td>
																	<?php echo $contract->other_party_name_signatory; ?>
																</td>
																<td>
																	<?php echo $contract->email; ?>
																</td>
																<td>
																	<?php echo $contract->phone_no; ?>
																</td>
																<td>
																	<?php echo $contract->address; ?>
																</td>
																<td>
																	<?php echo $contract->termination_notice; ?>
																</td>
																<td>
																	<?php echo $contract->payment_term; ?>
																</td>
																<td>
																	<?php echo $contract->sale_of_equipment; ?>
																</td>
																<td>
																	<?php echo $contract->purpose_of_letter; ?>
																</td>





																<td>
																	<a href="<?php echo site_url('App/contractDetails/' . $contract->id)  ?>" class="btn btn-accent m-btn m-btn--icon m-btn--pill m-btn--air">
																		<span>
																			<i class="la la-eye"></i>
																			<span>
																				More
																			</span>
																		</span>
																	</a>
																</td>
															</tr>
														<?php $i++;
														} ?>


													</tbody>
												</table>
													</div>
											</div>
										</div>
										<!--end::Section-->


									</div>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->



							</div>
						</div>






































					</div>