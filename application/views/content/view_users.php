




					
					<div class="m-content">
					
						<div class="row">
							<div class="col-lg-12">
							
							
							
							
							
							
							
						<!--begin::Portlet-->
						<div class="m-portlet">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Users
										</h3>
									</div>
								</div>
							</div>
							<div class="m-portlet__body">
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								<!--begin::Section-->
								<div class="m-section">
									<div class="m-section__content">
										<table class="table table-bordered table-striped <!--m-table m-table--border-brand m-table--head-bg-brand-->">
											<thead>
												<tr>
													<th>
														S/N
													</th>
													<th>
														Image
													</th>
													<th>
														Name
													</th>
													<th>
														Email
													</th>
													<th>
														Role
													</th>
													<th>
														Status
													</th>
													<th>
														Enable/Disable
													</th>
													<th>
														created
													</th>
													<th>
														modified
													</th>
													
													<!--<th>
													
													</th>-->
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach($users as $user) { ?>
												<tr>
													<th scope="row">
														<?php echo $i; ?>
													</th>
													<td>
														<img src="<?php echo base_url($user->profile_image); ?>" class="img-thumbnail img-rounded" width="80" height="80">
													</td>
													<td>
														<?php echo $user->fullname; ?>
													</td>
													<td>
														<?php echo $user->email; ?>
													</td>
													<td>
														<?php echo $user->role; ?>
													</td>
													<td>
														<?php 
															$status = $user->is_active ;
															if($status==1){
																
															?>
																<span class="m-badge m-badge--success"></span> 
															<?php 
															}	
															else{ 	
															?>
															<span class="m-badge m-badge--warning"></span> 
															<?php } ?>
															
													</td>


													<td>
														<?php 
															$status = $user->is_active ;
															if($status==1){	
															?>

														<a href="<?php echo site_url('Admin/disableUser/'.$user->id)  ?>" class="btn btn-outline-danger">
															Disable
														</a>

															<?php 
															}	
															else{ 	
															?>

														<a href="<?php echo site_url('Admin/enableUser/'.$user->id)  ?>" class="btn btn-outline-success">
															Enable
														</a> 

															<?php } ?>
															
													</td>



													<td>
														<?php echo $user->date_created; ?>
													</td>
													<td>
														<?php echo $user->last_modified; ?>
													</td>
													
													<!--<td>
														<a href="<?php echo site_url('App/contractDetails')  ?>" class="btn btn-accent m-btn m-btn--icon m-btn--pill m-btn--air">
															<span>
																<i class="la la-eye"></i>
																<span>
																	More
																</span>
															</span>
														</a>
													</td>-->
												</tr>
												<?php $i++; } ?>
												
												
											</tbody>
										</table>
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