					<div class="m-content">
					
						<div class="row">
							<div class="col-lg-12">
							
							
							
							<!--begin::Portlet-->
								<div class="m-portlet">
									<div class="m-portlet__head bg-light">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													New user account
												</h3>
											</div>
										</div>
									</div>
									
									
									<!--Modal for status change-->
									<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
									<div class="modal-dialog">
										<div class="modal-content" style="border-radius:0 !important">
											<div class="modal-header" style="background:#2a5290; color:#fff">
												NOTIFICATION
											</div>
											<div class="modal-body">
												<b>User successfully Added</b>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger btn-ok" style="background:#2a5290; border:0" data-dismiss="modal">Close</button>
												
											</div>
										</div>
									</div>
									</div>
									
									<p>
										<div id="doc_error" style="color:red; font-weight:bold; text-align:center"><?php echo validation_errors();?></div>
									</p>
									
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="form_user" enctype="multipart/form-data" accept-charset="utf-8">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label>
														Full Name:
													</label>
													<input type="text" class="form-control m-input" placeholder="Enter full name" name="fullname" value="<?php echo set_value('fullname'); ?>" required>
													<span class="m-form__help">
														<!--Please enter your full name-->
													</span>
												</div>
												<div class="col-lg-6">
													<label class="">
														Email:
													</label>
													<input type="email" class="form-control m-input" placeholder="Enter your email" name="email" value="<?php echo set_value('email'); ?>" required>
													<span class="m-form__help">
														
													</span>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label>
														Role:
													</label>
													<select class="form-control m-input" name="role" required>
														<option value="">-select-</option>
														<option value="Contract Requestor">Contract Requestor</option>
														<option value="Legal Officer">Legal Officer</option>
														<option value="Admin">Admin</option>
														
													</select>
													<span class="m-form__help">
														
													</span>
												</div>
												<div class="col-lg-6">
													<label class="">
														Profile Image:
													</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="file" name="doc_" accept="image/*" class="form-control m-input" placeholder="" required>
														<span class="m-input-icon__icon m-input-icon__icon--right">
															<span>
																<!--<i class="la la-lock"></i>-->
															</span>
														</span>
													</div>
													<span class="m-form__help">
														
													</span>
												</div>
											</div>
											
												<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label class="">
														Password:
													</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="password" class="form-control m-input" placeholder="Enter password" name="password1" required>
														<span class="m-input-icon__icon m-input-icon__icon--right">
															<span>
																<i class="la la-lock"></i>
															</span>
														</span>
													</div>
													<span class="m-form__help">
														
													</span>
												</div>
												<div class="col-lg-6">
													<label>
														Confirm Password:
													</label>
													<div class="m-input-icon m-input-icon--right">
														<input type="password" class="form-control m-input" placeholder="Confirm Password" name="password2" required>
														<span class="m-input-icon__icon m-input-icon__icon--right">
															<span>
																<i class="la la-lock"></i>
															</span>
														</span>
													</div>
													<span class="m-form__help">
														
													</span>
												</div>
											
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-6">
													<label>
														Status:
													</label>
													<div class="m-radio-inline">
														<label class="m-radio m-radio--solid">
															<input type="radio" name="status" checked value="1">
															Enable
															<span></span>
														</label>
														<label class="m-radio m-radio--solid">
															<input type="radio" name="status" value="2">
															Disable
															<span></span>
														</label>
													</div>
													<span class="m-form__help">
														Please select user group
													</span>
												</div>
												
												<div class="col-lg-6">
													<div style="font-weight:bold; font-size:17px; 	display:none" id="loader_doc">
													<img src="<?php echo base_url()."assets/img/page-loader.gif" ?>" class="img-responsive" style="width:150px; ">
													PLEASE WAIT .....
													</div>
												</div>
												
												
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit" style="padding:10px">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-6">
														<button type="submit" class="btn btn-primary">
															Save
														</button>
														<button type="reset" class="btn btn-secondary">
															Cancel
														</button>
													</div>
													<!--<div class="col-lg-6 m--align-right">
														<button type="reset" class="btn btn-danger">
															Delete
														</button>
													</div>-->
												</div>
											</div>
										</div>
									</form>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->
							
							
								
							</div>
						</div>
						
						
						
<script type="text/javascript" src="<?php echo base_url('assets/') ?>js/plugins/jquery/jquery.min.js"></script>
						
<script>
	
	$(function() {
		
	$('#form_user').submit(function(e) {
		e.preventDefault();
		 $('#loader_doc').css("display","block");
		
            var data = new FormData(this); // <-- 'this' is your form element
            $.ajax({
                url: "<?php echo site_url(); ?>/admin/insert_user",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                type: "POST",
                success: function(response) {
                    if(response.trim()>0)
                    {
                         $('#loader_doc').css("display","none");
						 //Display modal for successful user creation
						 $('#modal-user').modal('show');
						 setTimeout(function(){$('#modal-user').modal('hide')},3000);
						 $("#form_user").trigger('reset');
                     } 
                    else
                    {
						
                         $('#loader_doc').css("display","none");
						$('#doc_error').show().html(response);
						window.scroll(0,0);
                        setTimeout(function(){
                            $('#doc_error').hide();
                        },20000);
                         
                    } 
                }
            });  
			
			
        }); 
		
		
	});

</script>
								
					
					
					
					
					
					
					
					
					
					
					
					
					
					
						
						
						
						
						
						
						
						
												
						
						
						
						
						
						
						
						
						
						
						
			
						
						
					</div>