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
                                                Change your password
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
                                            <b>Password successfully changed, The system will log you out. Please login back with your new password</b>
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
                                    
                                            
                                            <div class="form-group m-form__group row">
                                            <div class="col-lg-4">
                                                <label class="">
                                                    Old Password:
                                                </label>
                                                <div class="m-input-icon m-input-icon--right">
                                                    <input type="password" class="form-control m-input" placeholder="Enter password" name="old_password" required>
                                                    <span class="m-input-icon__icon m-input-icon__icon--right">
                                                        <span>
                                                            <i class="la la-lock"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <span class="m-form__help">
                                                    
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    New Password:
                                                </label>
                                                <div class="m-input-icon m-input-icon--right">
                                                    <input type="password" class="form-control m-input" placeholder="Confirm Password" name="new_password" required>
                                                    <span class="m-input-icon__icon m-input-icon__icon--right">
                                                        <span>
                                                            <i class="la la-lock"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <span class="m-form__help">
                                                    
                                                </span>
                                            </div>
                                            <div class="col-lg-4">
                                                <label>
                                                    Confirm New Password:
                                                </label>
                                                <div class="m-input-icon m-input-icon--right">
                                                    <input type="password" class="form-control m-input" placeholder="Confirm Password" name="retype_password" required>
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
            url: "<?php echo site_url(); ?>/app/updatePassword/<?php echo $userid ?>",
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
                     setTimeout(function(){window.location.href = "<?php echo site_url('account/logout') ?>"; },4000);
                     
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