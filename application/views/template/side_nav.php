<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				
				
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
					<!-- BEGIN: Aside Menu -->
					<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
		data-menu-vertical="true"
		 data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
		>
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							
							<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
								<a  href="<?php echo site_url('App') ?>" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-line-graph"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Dashboard
											</span>
											<span class="m-menu__link-badge">
												<!--<span class="m-badge m-badge--danger">
													2
												</span>-->
											</span>
										</span>
									</span>
								</a>
							</li>
							<li class="m-menu__section">
								<h4 class="m-menu__section-text">
									Components
								</h4>
								<i class="m-menu__section-icon flaticon-more-v3"></i>
							</li>
							
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo site_url('App/add') ?>" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-share"></i>
									<span class="m-menu__link-text">
										New Document
									</span>
									<!--<i class="m-menu__ver-arrow la la-angle-right"></i>-->
								</a>
							</li>
							
							
							<!--<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo site_url('App/add') ?>" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">
										New Document
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
											<a  href="#" class="m-menu__link ">
												<span class="m-menu__link-text">
													Base
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('App/add') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Add
												</span>
											</a>
										</li>
										
									</ul>
								</div>
							</li>-->
							
							
							
							
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-share"></i>
									<span class="m-menu__link-text">
										View Documents
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('App/contracts/pr') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pending Review
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('App/contracts/pv') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pending Creation
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('App/contracts/ps') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Pending Sign-off
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('App/contracts/all') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													View All 
												</span>
											</a>
										</li>
										
									</ul>
								</div>
							</li>


							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-share"></i>
									<span class="m-menu__link-text">
										Report
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('App/search/graph') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Chart
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('App/contracts/all') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Spool Report
												</span>
											</a>
										</li>
									</ul>
								</div>
							</li>


							<?php if($this->session->userdata('role') == "Legal Officer" || $this->session->userdata('role') == "Admin"){ ?>
							<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-share"></i>
									<span class="m-menu__link-text">
										File Management
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
									<li class="m-menu__item " aria-haspopup="true" >
											<a  href="https://netcomng.sharepoint.com/sites/LegalFRDUpdate/Shared%20Documents/Forms/AllItems.aspx" target="_blanck" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													SharePoint
												</span>
											</a>
										</li>
										<!--<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('App/uploadDoc') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													Upload
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('App/documents') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													View
												</span>
											</a>
										</li>-->
										
										
									</ul>
								</div>
							</li>
							<?php } ?>

							<!--<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="<?php echo site_url('app/changePassword') ?>" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-share"></i>
									<span class="m-menu__link-text">
										Change Password
									</span>
									
								</a>
							</li>-->
							
							<?php //if($this->session->userdata('role') == "Admin" || $this->session->userdata('role') == "Legal Officer"){ ?>
							<?php if($this->session->userdata('role') == "Admin" || $this->session->userdata('role') == "Legal Officer" ){ ?>

							<!--<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
								<a  href="#" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-share"></i>
									<span class="m-menu__link-text">
										User Account
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('admin/addUser') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													New User
												</span>
											</a>
										</li>
										<li class="m-menu__item " aria-haspopup="true" >
											<a  href="<?php echo site_url('admin/viewUsers') ?>" class="m-menu__link ">
												<i class="m-menu__link-bullet m-menu__link-bullet--dot">
													<span></span>
												</i>
												<span class="m-menu__link-text">
													View Users
												</span>
											</a>
										</li>
										
										
									</ul>
								</div>
							</li>-->
							<?php } ?>
							
							
							
							
							
							
							
							
							
							
							
							
							
						</ul>
					</div>
					<!-- END: Aside Menu -->
				</div>
				<!-- END: Left Aside -->
				
				
				
				<!---Page Title----->
				
				<div class="m-grid__item m-grid__item--fluid m-wrapper html-content">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									<?php echo $page_title ?> 
									<?php if($title=="Contract Details"){ ?>
									<!--<span class="m-badge m-badge--success"></span> -->
									<span class="m-badge m-badge--warning" data-toggle="m-tooltip" title="<?php  echo $contract_details[status] ?>"></span>
									<!--<span class="m-badge m-badge--danger"></span>-->
									<?php } ?>
									
									<?php if($title=="Contract Details"){ ?>
										<?php if($role=="Contract Requestor"){ ?>
										
											<?php if($contract_details[status]=="Fail_Review" || $contract_details[status]=="Fail_Creation" || $contract_details[status]=="Fail_Signoff"){ ?>
												<button type="button" class="btn m-btn--pill    btn-metal" onclick="disableall1()">Edit</button>
											<?php } ?>
										<?php } ?>
											
										<!-- If contract is running, display button to terminate -->
										<?php if( ($contract_details[status]=="Signed_Off" && $this->session->userdata('role') == "Legal Officer") ){ ?>
												<button type="button" class="btn m-btn--pill    btn-danger" onclick="">Terminate</button>
										<?php } ?>

										<!-- If contract has expired, display button to renew -->
										<?php if( ($contract_details[status]=="expired" && $this->session->userdata('role') == "Contract Requestor") ){ ?>
												<button type="button" class="btn m-btn--pill    btn-success" onclick="">Renew</button>
										<?php } ?>
											
											
										
										
										
										
										
										
									
									<?php } ?>
								</h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="#" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?php  echo site_url('App') ?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Return
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?php  echo site_url('App') ?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Back
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="<?php  echo site_url('App') ?>" class="m-nav__link">
											<span class="m-nav__link-text">
												Dashboard
											</span>
										</a>
									</li>
								</ul>
							</div>
							<div>
								<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
									<span class="m-subheader__daterange-label">
										<span class="m-subheader__daterange-title"></span>
										<span class="m-subheader__daterange-date m--font-brand"></span>
									</span>
									<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
										<i class="la la-angle-down"></i>
									</a>
								</span>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->