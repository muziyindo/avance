					<div class="m-content">
					
						<div class="row">
							<div class="col-lg-12">
							
							<!--Modal for status change-->
									<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
									<div class="modal-dialog">
										<div class="modal-content" style="border-radius:0 !important">
											<div class="modal-header" style="background:#2a5290; color:#fff">
												NOTIFICATION
											</div>
											<div class="modal-body">
												<b>Contract successfully added and pending review by legal officer</b>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger btn-ok" style="background:#2a5290; border:0" data-dismiss="modal">Close</button>
												
											</div>
										</div>
									</div>
									</div>
									
									<p>
										<div id="doc_error" style="color:red; font-weight:bold; text-align:center"></div>
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
													Document Upload Section
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="form_doc" enctype="multipart/form-data" accept-charset="utf-8" method="post">
									
									
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
													</select>
													<span class="m-form__help">
														select document name
													</span>
												</div>
												
												<div class="col-lg-4">
													<label>
														Other Party:
													</label>
													<div class="input-group m-input-group m-input-group--square">
														<span class="input-group-addon">
															<i class="la la-book"></i>
														</span>
														<input type="text" name="doc_description" class="form-control m-input" placeholder="" required>
													</div>
													<span class="m-form__help">
														enter other party
													</span>
												</div>
												
												<input type="hidden" id="insertId3" name="insertId3" value="<?php  echo $uniqueId ; ?>"></input>
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
												
											</div>
											
											
										</div>
										
										
										
			
										<div class="m-portlet__head bg-light">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Document List
												</h3>
											</div>
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
															Save
														</button>
														<button type="reset" class="btn m-btn--pill m-btn--air         btn-secondary m-btn--wide">
															Cancel
														</button>
													</div>
													<div class="col-lg-4">
														<div style="font-weight:bold; font-size:17px; 	display:none" id="loader_doc">
														<img src="<?php echo base_url()."assets/img/page-loader.gif" ?>" class="img-responsive" style="width:80px; ">
														PLEASE WAIT .....
														</div>
														
													</div>
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
		
	function redirect_view() {
		$('#modal-user').modal('hide');
		window.location.replace('<?php echo site_url('App/contracts/pr') ?>');
	}
	
	$('#form_doc').submit(function(e) {
		e.preventDefault();
		 $('#loader_doc').css("display","block");
		 $('#doc_error').css("display","block");
		
            var data = new FormData(this); // <-- 'this' is your form element
            $.ajax({
                url: "<?php echo site_url(); ?>/app/insertDocuments",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                type: "POST",
                success: function(response) {
                    if(response.trim()==("Document Name is required").trim() || response.trim()==("You must upload atleast one document").trim() || response.trim()==("File is too large max size is 70MB").trim())
                    {
                         $('#loader_doc').css("display","none");
						$('#doc_error').html(response);
						setTimeout(function(){
                           $('#doc_error').hide();
                        },5000);
						
                     } 
                    else
                    {
						
                         $('#loader_doc').css("display","none");
						$('#doc_data').html(response); //
						alert("Document Uploaded Successfully");
						$('#form_doc')[0].reset();
						$("#doc_name").prop("selectedIndex", 0);
						//$('#doc_error').show().html(response);
                         
                    } 
                }
            }); 
        }); 
		
	
		
		
		
		
		
		
		
		
		
		
	});

</script>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
						
						
						
						
						
						
						
						
												
						
						
						
						
						
						
						
						
						
						
						
			
						
						
	</div>