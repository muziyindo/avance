					
					
					
					</style>
					
					
					<div class="m-content">
					
						<div class="row">
							<div class="col-lg-12">
							
							
							
							
							
							
							
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
									$message=$this->session->flashdata('message');
									if($message=="deleted")
									{
									?>
										<div class="alert alert-success"  role="alert">
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
														Other Party
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
													<th>
														Delete
													</th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach($docs as $contract) { ?>
												
												<?php
													$path = $contract->path;
													$filePAthArray = explode("/",$path) ;
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
														<?php echo substr($filename,10); ?>
													</td>
													<td>
														<?php echo $contract->doc_description; ?>
													</td>
													<td>
														<?php echo $contract->date_added; ?>
													</td>
													<td>
														<?php echo $contract->modified_by; ?>
													</td>
													<td>
														<a href="<?php echo site_url('App/download_documents/'.$contract->id)  ?>" class="btn btn-accent m-btn m-btn--icon m-btn--pill m-btn--air">
															<span>
																<i class="la la-download"></i>
																<span>
																	
																</span>
															</span>
														</a>
													</td>
													<td>
														<a href="<?php echo site_url('App/removeDoc/'.$id)  ?>" class="btn btn-danger m-btn m-btn--icon m-btn--pill m-btn--air">
															<span>
																<i class="la la-trash-o"></i>
																<span>
																	
																</span>
															</span>
														</a>
													</td>
													
												</tr>
												<?php $i++; } ?>
												
											</tbody>
										</table>
									</div>
								</div>
								<!--end::Section-->
							</div>
						</div>
						<!--end::Portlet-->
							
							
								
							</div>
						</div>
								
					
					
					
					
					
					
					
					
					
					
					
					
					
					
						
						
						
						
						
						
						
						
												
						
						
						
						
						
						
						
						
						
						
						
			
						
						
					</div>