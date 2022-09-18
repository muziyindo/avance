<?php

//error_reporting(E_ERROR|E_WARNING);
error_reporting(0);

ob_start();
class App extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('encryption');
		//$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->model('app_model');
		
		$ud = $this->session->userdata('userid');
        if ($ud < 1)
        {
            redirect('Account','refresh');
        }
		
	}
	
	function index()
	{
		
		$data['title'] = 'Dashboard';
		$data['page_title'] = 'Dashboard';
		$data['pendingReviewCount'] = $this->app_model->getPendingReviewCount();
		$data['pendingValidationCount'] = $this->app_model->getPendingValidationCount();
		$data['pendingSignoffCount'] = $this->app_model->getPendingSignoffCount();
		
		$data['failReviewCount'] = $this->app_model->getFailReviewCount();
		$data['failValidationCount'] = $this->app_model->getFailValidationCount();
		$data['failSignoffCount'] = $this->app_model->getFailSignoffCount();
		
		$data['signedoffCount'] = $this->app_model->getSignedoffCount();
		$data['expiredCount'] = $this->app_model->getExpiredCount();
		$data['totalCount'] = $this->app_model->getTotalCount();
		
		$this->load_view($data,$content='dashboard');

		
		
	}
	
	function add()
	{
		$data['title'] = 'New Document';
		$data['page_title'] = 'New Document';
		$data['productList'] = $this->getProductList();
		$this->load_view($data,$content='add_contract');	
	}

	function getProductList()
	{
		$query = $this->db->query("select product_type from product_type");
		return $query->result();

	}
	
	function insertContract()
	{
		//$this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		$document_type = $this->input->post("document_type");
		
		if($document_type == "Letter")
		{
			$this->form_validation->set_message('required', 'The %s field must be filled');
			$this->form_validation->set_rules('document_type', 'Document Type', 'trim|required');
			//$this->form_validation->set_rules('doc_number', 'Document Number', 'trim|required');
			$this->form_validation->set_rules('activity', 'Activity', 'trim|required');
			$this->form_validation->set_rules('product_type', 'Product Type', 'trim|required');
			$this->form_validation->set_rules('requester_name', 'Requester Name', 'trim|required');
			$this->form_validation->set_rules('requester_dept', 'Department', 'trim|required');

			$this->form_validation->set_rules('other_party_name_signatory', 'Authorized Signatory Name', 'trim|required');
			$this->form_validation->set_rules('other_party_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('service_location', 'Service Location', 'trim|required');
			$this->form_validation->set_rules('other_party_position', 'Authorized Signatory Position', 'trim|required');
			$this->form_validation->set_rules('phone_no', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');


			$this->form_validation->set_rules('purpose_of_letter', 'Purpose of Letter', 'trim|required');
		}
		else
		{
			$this->form_validation->set_message('required', 'The %s field must be filled');
			$this->form_validation->set_rules('document_type', 'Document Type', 'trim|required');
			//$this->form_validation->set_rules('doc_number', 'Document Number', 'trim|required');
			$this->form_validation->set_rules('activity', 'Activity', 'trim|required');
			$this->form_validation->set_rules('product_type', 'Product Type', 'trim|required');
			$this->form_validation->set_rules('requester_name', 'Requester Name', 'trim|required');
			$this->form_validation->set_rules('requester_dept', 'Department', 'trim|required');
			
			$this->form_validation->set_rules('other_party_name_signatory', 'Authorized Signatory Name', 'trim|required');
			$this->form_validation->set_rules('other_party_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('service_location', 'Service Location', 'trim|required');
			$this->form_validation->set_rules('other_party_position', 'Authorized Signatory Position', 'trim|required');
			$this->form_validation->set_rules('phone_no', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');


			$this->form_validation->set_rules('contract_duration', 'Contract Duration', 'trim|required');
			$this->form_validation->set_rules('proposed_start_date', 'Proposed Start Date', 'trim|required');
			
			$this->form_validation->set_rules('proposed_end_date', 'Proposed End Date', 'trim|required');
			if (empty($_FILES['doc_']['name']))
			{
				$this->form_validation->set_rules('doc_', 'Proposal Agreed Upon Document', 'required');
			}
			$this->form_validation->set_rules('termination_notice', 'Termination Notice', 'trim|required');
			$this->form_validation->set_rules('payment_term', 'Payment Term', 'trim|required');
			$this->form_validation->set_rules('sale_of_equipment', 'Lease or sale of equipment', 'trim|required');	
		}
		


		if ($this->form_validation->run() == FALSE)
		{
			//$this->addUser();
			echo validation_errors();
		}
		else
		{
				
				$insertId = $this->app_model->insertContract();
				$num_inserts = $this->db->affected_rows();
				if($num_inserts=="1")
				{
					/*$email = $this->input->post("email");
					$name = $this->input->post("fullname");
					$password = $this->input->post("password1");
					$message = "Hi ".$name.", <p>Your account has been successfully created, kindly find your login credentials below:</p>"."<p>Address: www.wtcooperative.com</p> <p>Username: ".$email."</p><p>Password: ".$password."<br><br>Regards,<br> WTCooperative";
					
					$this->mail_staff($email,$message);*/
					$activity = $this->input->post('activity');
					//$this->notifyLegal($activity);
					$storeFolder = './uploads/contracts/';
					if ($_FILES["doc_"]["error"]!=4)
					{
						$max_filesize=50000000 ; //50mb
						$base_uploadSize = $_FILES['doc_']['size'];
						if($base_uploadSize < $max_filesize)
						{
							$base_tempFile = $_FILES['doc_']['tmp_name'];
							
							//moving the base image
							$targetPath =$storeFolder;
							$temp = explode(".", $_FILES["doc_"]["name"]);
							$base_filename = time().$_FILES["doc_"]["name"];
							$targetFile =  $targetPath. $base_filename;
		
							//move file to directory
							move_uploaded_file($base_tempFile,$targetFile); 
							$base_path=$file_name='uploads/contracts/'.$base_filename;
							$this->db->query("update contract set proposal_agreed_upon='$base_path' where id='$insertId'");
						}
					}
					echo $insertId;
					/*$this->session->set_flashdata('message', 'success');
					redirect('admin/addUser');*/
				}
				else
				{
					echo "There is an issue with the user creation";
				}
		}
	}
	
	
	
	function contracts($status)
	{
		if(!empty($status))
		{
			$data['contracts'] = $this->app_model->getContracts($status);
			$data['title'] = 'View_Contracts';
			$data['page_title'] = 'View Contracts';
			$data['productList'] = $this->getProductList();
			$this->load_view($data,$content='view_contracts');
		}
	}

	function graphicalReport($status)
	{
		
		$data['pendingReviewCount'] = $this->app_model->getPendingReviewCount();
		$data['pendingValidationCount'] = $this->app_model->getPendingValidationCount();
		$data['pendingSignoffCount'] = $this->app_model->getPendingSignoffCount();
		
		$data['failReviewCount'] = $this->app_model->getFailReviewCount();
		$data['failValidationCount'] = $this->app_model->getFailValidationCount();
		$data['failSignoffCount'] = $this->app_model->getFailSignoffCount();
		
		$data['signedoffCount'] = $this->app_model->getSignedoffCount();
		$data['expiredCount'] = $this->app_model->getExpiredCount();
		$data['totalCount'] = $this->app_model->getTotalCount();

		$data['contracts'] = $this->app_model->getContracts($status);
		$data['title'] = 'View_Contracts';
		$data['page_title'] = 'View Contracts';
		$this->load_view($data,$content='graphical_report');
		
	}

	
	
	function contractDetails($id)
	{
		
		error_reporting(0);
		if(!empty($id)){
		$data['contract_details'] = $this->app_model->getContractDetails($id);
		$data['docs'] = $this->app_model->getContractDocuments($id);
		$data['role'] = $this->session->userdata('role');
		$data['title'] = 'Contract Details';
		$data['productList'] = $this->getProductList();
		$data['page_title'] = $data['contract_details']['other_party_name']." Contract Details";
		$this->load_view($data,$content='contract_details');
		}
	}
	
	function updateContract()
	{
		$role = $this->session->userdata('role');
		$id = $this->uri->segment(3);
		
		if($role=="Legal Officer")
		{	
			$returnedId = $this->app_model->updateContract($id);
			echo $returnedId ;
		}
		else if($role=="Contract Requestor")
		{
			$status = $this->input->post('status');
			
			$document_type = $this->input->post("document_type");
			if($document_type == "Letter")
			{
				$this->form_validation->set_message('required', 'The %s field must be filled');
				$this->form_validation->set_rules('document_type', 'Document Type', 'trim|required');
				//$this->form_validation->set_rules('doc_number', 'Document Number', 'trim|required');
				$this->form_validation->set_rules('activity', 'Activity', 'trim|required');
				$this->form_validation->set_rules('product_type', 'Product Type', 'trim|required');
				$this->form_validation->set_rules('requester_name', 'Requester Name', 'trim|required');
				$this->form_validation->set_rules('requester_dept', 'Department', 'trim|required');


				$this->form_validation->set_rules('other_party_name_signatory', 'Authorized Signatory Name', 'trim|required');
			$this->form_validation->set_rules('other_party_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('service_location', 'Service Location', 'trim|required');
			$this->form_validation->set_rules('other_party_position', 'Authorized Signatory Position', 'trim|required');
			$this->form_validation->set_rules('phone_no', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');


				$this->form_validation->set_rules('purpose_of_letter', 'Purpose of Letter', 'trim|required');
			}
			else
			{
				$this->form_validation->set_message('required', 'The %s field must be filled');
				$this->form_validation->set_rules('document_type', 'Document Type', 'trim|required');
				//$this->form_validation->set_rules('doc_number', 'Document Number', 'trim|required');
				$this->form_validation->set_rules('activity', 'Activity', 'trim|required');
				$this->form_validation->set_rules('product_type', 'Product Type', 'trim|required');
				$this->form_validation->set_rules('requester_name', 'Requester Name', 'trim|required');
				$this->form_validation->set_rules('requester_dept', 'Department', 'trim|required');

				$this->form_validation->set_rules('other_party_name_signatory', 'Authorized Signatory Name', 'trim|required');
			$this->form_validation->set_rules('other_party_name', 'Name', 'trim|required');
			$this->form_validation->set_rules('service_location', 'Service Location', 'trim|required');
			$this->form_validation->set_rules('other_party_position', 'Authorized Signatory Position', 'trim|required');
			$this->form_validation->set_rules('phone_no', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required');



				$this->form_validation->set_rules('contract_duration', 'Contract Duration', 'trim|required');
				$this->form_validation->set_rules('proposed_start_date', 'Proposed Start Date', 'trim|required');
				$this->form_validation->set_rules('proposed_end_date', 'Proposed End Date', 'trim|required');
				/*if (empty($_FILES['doc_']['name']))
				{
					$this->form_validation->set_rules('doc_', 'Proposal Agreed Upon Document', 'required');
				}*/
				$this->form_validation->set_rules('termination_notice', 'Termination Notice', 'trim|required');
				$this->form_validation->set_rules('payment_term', 'Payment Term', 'trim|required');
				$this->form_validation->set_rules('sale_of_equipment', 'Lease or sale of equipment', 'trim|required');	
			}
		

			if ($this->form_validation->run() == FALSE)
			{
				//$this->addUser();
				echo validation_errors();
			}
			else
			{
				$id = $this->uri->segment(3);
				$this->app_model->updateContract($id);
				$num_inserts = $this->db->affected_rows();
				
				if($num_inserts=="1" || $_FILES["doc_"]["error"]!=4)
				{
					/*$email = $this->input->post("email");
					$name = $this->input->post("fullname");
					$password = $this->input->post("password1");
					$message = "Hi ".$name.", <p>Your account has been successfully created, kindly find your login credentials below:</p>"."<p>Address: www.wtcooperative.com</p> <p>Username: ".$email."</p><p>Password: ".$password."<br><br>Regards,<br> WTCooperative";
					
					$this->mail_staff($email,$message);*/
					$storeFolder = './uploads/contracts/';
					if ($_FILES["doc_"]["error"]!=4)
					{
						$max_filesize=50000000 ; //50mb
						$base_uploadSize = $_FILES['doc_']['size'];
						if($base_uploadSize < $max_filesize)
						{
							$base_tempFile = $_FILES['doc_']['tmp_name'];
							
							//moving the base image
							$targetPath =$storeFolder;
							$temp = explode(".", $_FILES["doc_"]["name"]);
							$base_filename = time().$_FILES["doc_"]["name"];
							$targetFile =  $targetPath. $base_filename;
		
							//move file to directory
							move_uploaded_file($base_tempFile,$targetFile); 
							$base_path=$file_name='uploads/contracts/'.$base_filename;
							$this->db->query("update contract set proposal_agreed_upon='$base_path' where id='$id'");
						}
					}
					
					
					if($status=="Fail_Review")
						$status_ = "Pending_Review" ;
					else if($status=="Fail_Creation")
						$status_ = "Pending_Creation" ;
					else if($status=="Fail_Signoff")
					$status_ = "Pending_Signoff" ;
					
					$date = date('Y-m-d');
					
					$this->db->query("update contract set status='$status_',last_modified='$date' where id='$id'");
					echo 1 ;
					/*$this->session->set_flashdata('message', 'success');
					redirect('admin/addUser');*/
				}
				else
				{
					echo 10;
				}
			}
		
		}
		
	}
	
	function uploadDoc()
	{
		$uniqueId = $this->generateUniqueId();
		$data['title'] = 'Upload Document';
		$data['page_title'] = 'Upload Documents';
		$data['uniqueId'] = $uniqueId ;
		$this->load_view($data,$content='upload_doc');	
	}
	
	function documents()
	{
		
			$data['docs'] = $this->app_model->getDocuments();
			$data['title'] = 'View_Documents';
			$data['page_title'] = 'View Documents';
			$this->load_view($data,$content='view_docs');
	}
	
	
	//This function saves uploaded document to a folder and store the path in a database table - used by file management module
	function insertDocuments()
	{	
			
			//error_reporting(E_ALL);
			$uniqueId = $this->input->post('insertId3');
            $uploaded = 0 ;
            $storeFolder = './uploads/pfiles/';
			
			$doc_name = $this->input->post('doc_name');
			//echo $doc_name;
			if (empty($doc_name))
			{
				echo "Document Name is required";
				
			}
			else
			{
				if ($_FILES["doc_"]["error"]!=4)
				{
					$max_filesize=90000000 ; //90mb
					$base_uploadSize = $_FILES['doc_']['size'];
					if($base_uploadSize < $max_filesize)
					{
						
						
						
						echo '<link href="'.base_url().'assets/vendors/base/vendors.bundle.css" rel="stylesheet">';
						echo '<link href="'.base_url().'assets/demo/default/base/style.bundle.css" rel="stylesheet">';
						echo '<link href="'.base_url().'assets/demo/default/base/custom.css" rel="stylesheet">';
						
						
						//echo '<link href="'.base_url().'assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">';
						
						echo '<link href="'.base_url().'assets/css/fontawesome/font-awesome.min.css" rel="stylesheet">';
						echo '<script src="'.base_url().'assets/js_/jquery.min.js"> </script>';
						echo '<script src="'.base_url().'assets/js_/bootstrap.min.js"> </script>';
						
						$base_tempFile = $_FILES['doc_']['tmp_name'];
						
						//moving the base image
						$targetPath =$storeFolder;
						$temp = explode(".", $_FILES["doc_"]["name"]);
						$base_filename = time().$_FILES["doc_"]["name"];
						$targetFile =  $targetPath. $base_filename;
	
						
						
						//move file to directory
						move_uploaded_file($base_tempFile,$targetFile); 
						$base_path=$file_name='uploads/pfiles/'.$base_filename;
	
						$data = array(
						'unique_id' => $uniqueId,
						'doc_name' => $this->input->post('doc_name'),
						'doc_description' => $this->input->post('doc_description'),
						'path' =>$base_path,
						"date_added" => date('Y-m-d'),
						"date_modified" => date('Y-m-d'),
						"modified_by" => $this->session->userdata('name'),
							);
						$this->db->insert('documents', $data);
						$num_inserts = $this->db->affected_rows();
						if($num_inserts=="1")
						{
							$query = $this->db->query("select id,doc_name,path from documents where unique_id='$uniqueId'");
							$count = 1 ;
							//echo $insertId;
							echo '<table class="table table-striped"><tr><th>S/N</th><th>Document Name</th><th>File Name</th><th>Delete</th><th>Download</th></tr>';
							foreach($query->result() as $value)
							{
								echo '<tr><td>'.$count.'</td><td>'.$value->doc_name.'</td><td>'.$value->path.'</td><td><a href="#" id='.'"aaa'.$value->id.'"><span  class="fa fa-trash-o"></span></a></td><td><a href="'.site_url().'/app/download_documents/'.$value->id.'"><span class="fa fa-download"></span></a></td></tr>';
								$count++ ;
							}
							echo '</table>';
							
							echo '<script>';
							echo '$(function() {';
							foreach($query->result() as $value2){
								echo '$("#aaa'.$value2->id.'").on("click",function(e){'.
									'$.post( "'.site_url().'/app/removeDocument/'.$value2->id.'", function( data ) {'.
										'$("#doc_data").html(data);'.
										'alert("Document successfully deleted");'.
									'});'.
									
								'});';
								
							}
							echo '});';
							echo '</script>';
						}
					}
				
				}
				
				
			}
			
	}//end function insert documents
	
	
	function insertSignedDocuments()
	{	
			
			//error_reporting(E_ALL);
			$uniqueId = $this->input->post('insertId3'); //obtaining the contract id
			$auth_party = $this->input->post('auth_party'); //obtaining the contract id
            $uploaded = 0 ;
            $storeFolder = './uploads/signedoff/';
			
			
			//echo $doc_name;
			if (empty($uniqueId))
			{
				echo "Document Name is required";
				
			}
			else
			{
				if ($_FILES["signed_doc"]["error"]!=4)
				{
					
					$max_filesize=90000000 ; //90mb
					$base_uploadSize = $_FILES['signed_doc']['size'];
					if($base_uploadSize < $max_filesize)
					{
						
						echo '<link href="'.base_url().'assets/vendors/base/vendors.bundle.css" rel="stylesheet">';
						echo '<link href="'.base_url().'assets/demo/default/base/style.bundle.css" rel="stylesheet">';
						echo '<link href="'.base_url().'assets/demo/default/base/custom.css" rel="stylesheet">';
						
						echo '<link href="'.base_url().'assets/css/fontawesome/font-awesome.min.css" rel="stylesheet">';
						echo '<script src="'.base_url().'assets/js_/jquery.min.js"> </script>';
						echo '<script src="'.base_url().'assets/js_/bootstrap.min.js"> </script>';
						
						$base_tempFile = $_FILES['signed_doc']['tmp_name'];
						
						//moving the base image
						$targetPath =$storeFolder;
						$temp = explode(".", $_FILES["signed_doc"]["name"]);
						$base_filename = time().$_FILES["signed_doc"]["name"];
						$targetFile =  $targetPath. $base_filename;
	
						
						
						//move file to directory
						move_uploaded_file($base_tempFile,$targetFile); 
						$base_path=$file_name='uploads/signedoff/'.$base_filename;
						
						
						//remove previously uploaded file from folder and database
						
						$this->db->query("delete from signed_documents where contract_id='$uniqueId'");
						if($this->db->affected_rows())
						{
							unlink(FCPATH.$base_path);
						}
						$data = array(
						'contract_id' => $uniqueId,
						'path' =>$base_path,
						"date_added" => date('Y-m-d'),
						"date_modified" => date('Y-m-d'),
						"modified_by" => $this->session->userdata('name'),
							);
						$this->db->insert('signed_documents', $data);
						$num_inserts = $this->db->affected_rows();
						if($num_inserts=="1")
						{

							$query = $this->db->query("select id,path from signed_documents where contract_id='$uniqueId'");
							$count = 1 ;
							//echo $insertId;
							echo '<table class="table table-striped">';
							foreach($query->result() as $value)
							{
								echo '<tr><td><a href="'.site_url().'/app/download_signed_documents/'.$value->id.'">Download signed document<span class="fa fa-download"></span></a></td></tr>';
								$count++ ;
								$this->mailSignedDoc($uniqueId,$value->id, $auth_party);
							}
							echo '</table>';
							
						}
					}
				}
			}
			
	}//end function insert signed documents

	function mailSignedDoc($contractID,$docID, $auth_party)
	{
		$query = $this->db->query("select requester_email,requester_name from contract where id = '$contractID'");
		$requester_email = ""; $requester_name="";

		foreach($query->result() as $value)
		{
			$requester_email = $value->requester_email ;
			$requester_name = $value->requester_name ;
		}

		$query2 = $this->db->query("select path from signed_documents where id = '$docID'");
		

		foreach($query2->result() as $value2)
		{
			$path = $value2->path ;
		}
		
		
		
		$message = 'Hi ' . $requester_name . '<p>View or Download signed off form from the link below.</p><br/><a target="_blanck" href="' . site_url() . '/downloader/download_signed_documents/'.$docID.'">Click to download</a><br/><br/><a target="_blanck" href="'.base_url().$path. '">Click to view</a><p>Regards,</p><p>Netcom Africa</p>';
		$requester = $this->session->userdata('name');

		

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_port' => 587,
			'smtp_user' => 'netcomlegal@gmail.com',
			'smtp_pass' => 'N3tc0m@123__',
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1',
			'wordwrap'	=> TRUE,
			'smtp_crypto'	=> 'tls'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('notification@netcomafrica.com', 'Netcom Africa Limited');
		$list = array($requester_email);
		//$list = array('o.olarewaju@netcomafrica.com', 'c.eki@netcomafrica.com', 'n.jacob@netcomafrica.com');
		$this->email->to($list); //();
		//$this->email->cc('dr_da4real@yahoo.com');//sales supervisor will be added here.
		//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
		$this->email->subject('Download Signoff Form - '.$auth_party);
		$this->email->message($message);
		$this->email->send();
		//echo $this->email->print_debugger();

	}
	
	
	
	function insertContractDocuments()
	{	
			
			//error_reporting(E_ALL);
			$contractId = $this->input->post('insertId2');
            $uploaded = 0 ;
            $storeFolder = './uploads/pfiles/';
			
			$doc_name = $this->input->post('doc_name');
			//echo $doc_name;
			if (empty($doc_name))
			{
				echo "Document Name is required";
				
			}
			else
			{
				if ($_FILES["doc_"]["error"]!=4)
				{
					$max_filesize=90000000 ; //90mb
					$base_uploadSize = $_FILES['doc_']['size'];
					if($base_uploadSize < $max_filesize)
					{
						
						
						
						echo '<link href="'.base_url().'assets/vendors/base/vendors.bundle.css" rel="stylesheet">';
						echo '<link href="'.base_url().'assets/demo/default/base/style.bundle.css" rel="stylesheet">';
						echo '<link href="'.base_url().'assets/demo/default/base/custom.css" rel="stylesheet">';
						
						
						//echo '<link href="'.base_url().'assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">';
						
						echo '<link href="'.base_url().'assets/css/fontawesome/font-awesome.min.css" rel="stylesheet">';
						echo '<script src="'.base_url().'assets/js_/jquery.min.js"> </script>';
						echo '<script src="'.base_url().'assets/js_/bootstrap.min.js"> </script>';
						
						$base_tempFile = $_FILES['doc_']['tmp_name'];
						
						//moving the base image
						$targetPath =$storeFolder;
						$temp = explode(".", $_FILES["doc_"]["name"]);
						$base_filename = time().$_FILES["doc_"]["name"];
						$targetFile =  $targetPath. $base_filename;
	
						
						
						//move file to directory
						move_uploaded_file($base_tempFile,$targetFile); 
						$base_path=$file_name='uploads/pfiles/'.$base_filename;
	
						$data = array(
						'contract_id' => $contractId,
						'doc_name' => $this->input->post('doc_name'),
						'path' =>$base_path,
						"date_added" => date('Y-m-d'),
						"date_modified" => date('Y-m-d'),
						"modified_by" => $this->session->userdata('name'),
							);
						$this->db->insert('documents_upload', $data);
						$num_inserts = $this->db->affected_rows();
						if($num_inserts=="1")
						{
							$query = $this->db->query("select id,doc_name,path from documents_upload where contract_id='$contractId'");
							$count = 1 ;
							//echo $insertId;
							echo '<table class="table table-striped"><tr><th>S/N</th><th>Document Name</th><th>File Name</th><th>Delete</th><th>Download</th></tr>';
							foreach($query->result() as $value)
							{
								echo '<tr><td>'.$count.'</td><td>'.$value->doc_name.'</td><td>'.$value->path.'</td><td><a href="#" id='.'"aaa'.$value->id.'"><span  class="fa fa-trash-o"></span></a></td><td><a href="'.site_url().'/app/download_documents_/'.$value->id.'"><span class="fa fa-download"></span></a></td></tr>';
								$count++ ;
							}
							echo '</table>';
							
							echo '<script>';
							echo '$(function() {';
							foreach($query->result() as $value2){
								echo '$("#aaa'.$value2->id.'").on("click",function(e){'.
									'$.post( "'.site_url().'/app/removeDocument_/'.$value2->id.'", function( data ) {'.
										'$("#doc_data").html(data);'.
										'alert("Document successfully deleted");'.
									'});'.
									
								'});';
								
							}
							echo '});';
							echo '</script>';
						}
					}
				
				}
				
				
			}
			
	}//end function insert documents
	
	//Download from document section of the contract form
	function download_documents_($encrypted_key)
	{
		$docId = $encrypted_key;
		$query = $this->db->query("select path from documents_upload where id = '$docId'");
		foreach($query->result() as $value)
		{
			$path = $value->path;
		}
		
		//replace white spaces in file name with html whitespaces
		$path = str_replace(' ','%20',$path);
		
		$filePAthArray = explode("/",$path) ;
		
		$this->load->helper('file');
		$this->load->helper('download');
		
		ob_clean();
		$data = file_get_contents(base_url().$path);
		
		$exten = explode(".",$filePAthArray[2]) ;
		
		//echo $filePAthArray[2] ;
		
	    if($exten[1]=="jpg")
		{
			$name = 'document.jpg';
		}
		else if($exten[1]=="png")
		{
			$name = 'document.png';
		}
		else if($exten[1]=="doc")
		{
			$name = 'document.doc';
		}
		else if($exten[1]=="docx")
		{
			$name = $exten[0].'.docx';
		}
		else if($exten[1]=="xlsx")
		{
			$name = 'document.xlsx';
		}
		else if($exten[1]=="pdf")
		{
			$name = 'document.pdf';
		}
		else if($exten[1]=="ppt")
		{
			$name = 'document.ppt';
		}
		else if($exten[1]=="pptx")
		{
			$name = 'document.pptx';
		}
		//$name = 'document.docx';
		force_download($name,$data); 
	}
	
	
	
	
	//Download from document management module
	function download_documents($encrypted_key)
	{
		$docId = $encrypted_key;
		$query = $this->db->query("select path from documents where id = '$docId'");
		foreach($query->result() as $value)
		{
			$path = $value->path;
		}
		
		//replace white spaces in file name with html whitespaces
		$path = str_replace(' ','%20',$path);
		
		$filePAthArray = explode("/",$path) ;
		
		$this->load->helper('file');
		$this->load->helper('download');
		
		ob_clean();
		$data = file_get_contents(base_url().$path);
		
		$exten = explode(".",$filePAthArray[2]) ;
		
		//echo $filePAthArray[2] ;
		
	    if($exten[1]=="jpg")
		{
			$name = 'document.jpg';
		}
		else if($exten[1]=="png")
		{
			$name = 'document.png';
		}
		else if($exten[1]=="doc")
		{
			$name = 'document.doc';
		}
		else if($exten[1]=="docx")
		{
			$name = $exten[0].'.docx';
		}
		else if($exten[1]=="xlsx")
		{
			$name = 'document.xlsx';
		}
		else if($exten[1]=="pdf")
		{
			$name = 'document.pdf';
		}
		else if($exten[1]=="ppt")
		{
			$name = 'document.ppt';
		}
		else if($exten[1]=="pptx")
		{
			$name = 'document.pptx';
		}
		//$name = 'document.docx';
		force_download($name,$data); 
	}
	
	
	//Download after document has been signed off
	function download_signed_documents($encrypted_key)
	{
		$docId = $encrypted_key;
		$query = $this->db->query("select path from signed_documents where id = '$docId'");
		foreach($query->result() as $value)
		{
			$path = $value->path;
		}
		
		//replace white spaces in file name with html whitespaces
		$path = str_replace(' ','%20',$path);
		
		$filePAthArray = explode("/",$path) ;
		
		$this->load->helper('file');
		$this->load->helper('download');
		
		ob_clean();
		$data = file_get_contents(base_url().$path);
		
		$exten = explode(".",$filePAthArray[2]) ;
		
		//echo $filePAthArray[2] ;
		
	    if($exten[1]=="jpg")
		{
			$name = 'document.jpg';
		}
		else if($exten[1]=="png")
		{
			$name = 'document.png';
		}
		else if($exten[1]=="doc")
		{
			$name = 'document.doc';
		}
		else if($exten[1]=="docx")
		{
			$name = $exten[0].'.docx';
		}
		else if($exten[1]=="xlsx")
		{
			$name = 'document.xlsx';
		}
		else if($exten[1]=="pdf")
		{
			$name = 'document.pdf';
		}
		else if($exten[1]=="ppt")
		{
			$name = 'document.ppt';
		}
		else if($exten[1]=="pptx")
		{
			$name = 'document.pptx';
		}
		//$name = 'document.docx';
		force_download($name,$data); 
	}
	
	//remove document from the contract form document upload section
	function removeDocument_($encrypted_key)
	{
		echo '<link href="'.base_url().'assets/vendors/base/vendors.bundle.css" rel="stylesheet">';
		echo '<link href="'.base_url().'assets/demo/default/base/style.bundle.css" rel="stylesheet">';
		echo '<link href="'.base_url().'assets/demo/default/base/custom.css" rel="stylesheet">';
		
		
		//echo '<link href="'.base_url().'assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">';
		
		echo '<link href="'.base_url().'assets/css/fontawesome/font-awesome.min.css" rel="stylesheet">';
		echo '<script src="'.base_url().'assets/js_/jquery.min.js"> </script>';
		echo '<script src="'.base_url().'assets/js_/bootstrap.min.js"> </script>';
		
		
		
		$docId = $encrypted_key;
		$query = $this->db->query("select path,contract_id from documents_upload where id = '$docId'");
		
		foreach($query->result() as $value)
		{
			$path = $value->path;
			$contractId = $value->contract_id;
		}
		//remove file from folder and database
		unlink(FCPATH.$path);
		$query = $this->db->query("delete from documents_upload where id = '$docId'");
		
		//fetch new documents record
		$query_ = $this->db->query("select id,contract_id,doc_name,path from documents_upload where contract_id='$contractId'");
		$count = 1 ;
		//echo $insertId;
		echo '<table class="table table-striped"><tr><th>S/N</th><th>Document Name</th><th>File Name</th><th>Delete</th><th>Download</th></tr>';
		foreach($query_->result() as $value_)
		{
			echo '<tr><td>'.$count.'</td><td>'.$value_->doc_name.'</td><td>'.$value_->path.'</td><td><a href="#" id='.'"aaa'.$value_->id.'"><span  class="fa fa-trash-o"></span></a></td><td><a href="'.site_url().'/app/download_documents_/'.$value_->id.'"><span class="fa fa-download"></span></a></td></tr>';
			$count++ ;
		}
		echo '</table>';
		
		echo '<script>';
		
		echo '$(function() {';
		
		foreach($query_->result() as $value2){
		
			echo '$("#aaa'.$value2->id.'").on("click",function(e){'.
				'$.post( "'.site_url().'/app/removeDocument_/'.$value2->id.'", function( data ) {'.
					'$("#doc_data").html(data);'.
					'alert("Document successfully deleted");'.
				'});'.
				
			'});';
			
		 }
		 
		echo '});';
		 
		echo '</script>';
		
	}
	
	function removeDocument($encrypted_key)
	{
		echo '<link href="'.base_url().'assets/vendors/base/vendors.bundle.css" rel="stylesheet">';
		echo '<link href="'.base_url().'assets/demo/default/base/style.bundle.css" rel="stylesheet">';
		echo '<link href="'.base_url().'assets/demo/default/base/custom.css" rel="stylesheet">';
		
		
		//echo '<link href="'.base_url().'assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">';
		
		echo '<link href="'.base_url().'assets/css/fontawesome/font-awesome.min.css" rel="stylesheet">';
		echo '<script src="'.base_url().'assets/js_/jquery.min.js"> </script>';
		echo '<script src="'.base_url().'assets/js_/bootstrap.min.js"> </script>';
		
		
		
		$docId = $encrypted_key;
		$query = $this->db->query("select path,unique_id from documents where id = '$docId'");
		
		foreach($query->result() as $value)
		{
			$path = $value->path;
			$uniqueId = $value->unique_id;
		}
		//remove file from folder and database
		unlink(FCPATH.$path);
		$query = $this->db->query("delete from documents where id = '$docId'");
		
		//fetch new documents record
		$query_ = $this->db->query("select id,unique_id,doc_name,path from documents where unique_id='$uniqueId'");
		$count = 1 ;
		//echo $insertId;
		echo '<table class="table table-striped"><tr><th>S/N</th><th>Document Name</th><th>File Name</th><th>Delete</th><th>Download</th></tr>';
		foreach($query_->result() as $value_)
		{
			echo '<tr><td>'.$count.'</td><td>'.$value_->doc_name.'</td><td>'.$value_->path.'</td><td><a href="#" id='.'"aaa'.$value_->id.'"><span  class="fa fa-trash-o"></span></a></td><td><a href="'.site_url().'/app/download_documents/'.$value_->id.'"><span class="fa fa-download"></span></a></td></tr>';
			$count++ ;
		}
		echo '</table>';
		
		echo '<script>';
		
		echo '$(function() {';
		
		foreach($query_->result() as $value2){
		
			echo '$("#aaa'.$value2->id.'").on("click",function(e){'.
				'$.post( "'.site_url().'/app/removeDocument/'.$value2->id.'", function( data ) {'.
					'$("#doc_data").html(data);'.
					'alert("Document successfully deleted");'.
				'});'.
				
			'});';
			
		 }
		 
		echo '});';
		 
		echo '</script>';
		
	}
	
	//this is used in the the documents view page
	function removeDoc($encodedId)
	{
		$id = base64_decode(urldecode($encodedId));
		
		$query = $this->db->query("select path from documents where id = '$id'");
		
		foreach($query->result() as $value)
		{
			$path = $value->path;
			//remove file from folder and database
			unlink(FCPATH.$path);
			$query = $this->db->query("delete from documents where id = '$id'");
		}
		
		$this->session->set_flashdata('message', 'deleted');
		redirect('app/documents');
		
	}
	
	//download from contract details
	function downloadDoc()
	{
		$p1=$this->uri->segment(3);
		$p2=$this->uri->segment(4);
		$p3=$this->uri->segment(5);
		$full_path = $p1."/".$p2."/".$p3;
		echo $full_path." ".base_url().$full_path;
		
		$this->load->helper('file');
		$this->load->helper('download');
		
		ob_clean();
		$data = file_get_contents(base_url().$full_path);
		$name = $p3 ;
		force_download($name,$data);
	}
	
	
	function generateUniqueId() 
	{
		$character_set_array = array();
		$character_set_array[] = array('count' => 3, 'characters' => 'abcdef');
		$character_set_array[] = array('count' => 1, 'characters' => '0123456789');
		$temp_array = array();
		foreach ($character_set_array as $character_set) {
			for ($i = 0; $i < 3; $i++) {
				$temp_array[] = $character_set['characters'][rand(0, strlen($character_set['characters']) - 1)];
			}
		}
		// shuffle($temp_array);
		return strtoupper(implode('', $temp_array));
	}
	
	function changePassword()
	{
		$userid = $this->session->userdata('userid');
		$data['title'] = 'Change Your Password';
		$data['page_title'] = 'Change Password';
		$data['userid'] = $userid ;
		$this->load_view($data,$content='change_password');	
	}

	function updatePassword($id)
	{
		//$this->form_validation->set_error_delimiters('<div class="error" style="color: red">', '</div>');
		$this->form_validation->set_message('matches', 'Passwords do not match');
		$this->form_validation->set_message('required', 'The %s field must be filled');
		$this->form_validation->set_rules('old_password', 'Old Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]|matches[retype_password]');
        $this->form_validation->set_rules('retype_password', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			//$this->addUser();
			echo validation_errors();
		}
		else
		{
			$old_password_db=$this->app_model->get_old_password($id);
			//$old_password_db=$this->encrypt->decode($old_password_db['password']);
			 $old_password=$this->input->post('old_password');
			 $verify = password_verify($old_password,$old_password_db['password']);
			if($verify==1)
			{
			  $this->app_model->update_password($id); 

			  $num_inserts = $this->db->affected_rows();
			  if($num_inserts=="0")
			  {
				echo 1 ;
			  }
			  else
			  {
				echo 1 ;
			  }
			}
			else
			{
			   echo "The old password entered is incorrect";
			}
		}
	}
	
	function load_view($data,$content)
	{
		#$data['title'] = 'Dashboard';
		$this->load->view('template/header',$data);
		$this->load->view('template/top_nav',$data);
		$this->load->view('template/side_nav',$data);
		$this->load->view('content/'.$content,$data);
		$this->load->view('template/footer',$data);
	}
	
	function notifyLegal($action)
	{
		//$action = $this->input->post('activity');
		$officer_name = "Legal Officer";
		$officer_email = "m.dauda@netcomafrica.com";
		$message='Hi '.$officer_name.'<p>You have a contract request pending '.$action.'. Kindly login to the legal platform to action it.</p><br/><a target="_blanck" href="'.site_url().'/Account">Click here to login to legal platform</a><p>Regards,</p><p>Netcom Africa</p>';
		$requester = $this->session->userdata('name');
		
		/*$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'mail.wtcooperative.com',
		'smtp_port' => 25,
		'smtp_user' => 'notification@wtcooperative.com',
		'smtp_pass' => 'Default@123',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1',
		'wordwrap'	=> TRUE
		);
		
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('notification@wtcooperative.com', 'Legal System Notification');
		$this->email->set_newline("\r\n");
		$this->email->to($officer_email); //();
		
		//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
		$this->email->subject('Contract '.$action.' request from '.$requester.' pending');
		$this->email->message($message);
		$this->email->send();
		echo 1 ;
		if ($this->email->send()) {
           echo 1 ;
		} else {
           show_error($this->email->print_debugger());
		}*/


		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_port' => 587,
			'smtp_user' => 'netcomlegal@gmail.com',
			'smtp_pass' => 'oimjykzxpyuysrkw', //'N3tc0m@123__',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap'	=> TRUE,
			'smtp_crypto'	=> 'tls'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
		
			$this->email->from('notification@netcomafrica.com', 'Netcom Africa Limited');
			$list = array('m.dauda@netcomafrica.com');
			//$list = array('o.olarewaju@netcomafrica.com','c.eki@netcomafrica.com','n.jacob@netcomafrica.com');
			$this->email->to($list); //();
			//$this->email->cc('dr_da4real@yahoo.com');//sales supervisor will be added here.
			//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
			$this->email->subject('Contract '.$action.' request from '.$requester.' pending');
			$this->email->message($message);
			$this->email->send();
			echo 1 ;
			// if ($this->email->send()) {
			// 	echo 1 ;
			//  } else {
			// 	show_error($this->email->print_debugger());
			//  }	
			
	}

	function search($page)
	{
		//get form search parameters and validate
		$filterBy = $this->input->post("filterBy");
		$data['filterBy'] = $this->input->post("filterBy");
		$data['startDate'] = $this->input->post("startDate");
		$data['endDate'] = $this->input->post("endDate");

		
		$this->form_validation->set_rules('filterBy', 'Filter By', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['contracts'] = $this->app_model->getContracts("all");
		}
		else
		{
			$data['contracts'] = $this->app_model->search();
		}

		//return view
		$data['title'] = 'View_Contracts';
		
		if($page === "spool")
		{
			$data['page_title'] = 'Spool Report';
			$this->load_view($data,$content='view_contracts');
		}
		else if($page === "graph")
		{
			$data['page_title'] = 'Chart Report';
			$data['graphData'] = $this->getGraphData($this->app_model->search());
			$this->load_view($data,$content='graphical_report');

		}

	}

	function getGraphData($records)
	{
		
		$documentStatusCount = array();

		//get pending Review Count
		$pendingReviewCount = 0 ;
		foreach($records as $record)
		{
			//echo $record->status ;
			if($record->status === "Pending_Review")
			{
				$pendingReviewCount++ ;
			}
		}
		$documentStatusCount["pendingReviewCount"] = $pendingReviewCount ;
		

		//get pending Signoff Count
		$pendingSignoffCount = 0 ;
		foreach($records as $record)
		{
			//echo $record->status ;
			if($record->status === "Pending_Signoff")
			{
				$pendingSignoffCount++ ;
			}
		}
		$documentStatusCount["pendingSignoffCount"] = $pendingSignoffCount ;

		//get pending Creation Count
		$pendingCreationCount = 0 ;
		foreach($records as $record)
		{
			//echo $record->status ;
			if($record->status === "Pending_Creation")
			{
				$pendingCreationCount++ ;
			}
		}
		$documentStatusCount["pendingCreationCount"] = $pendingCreationCount;

		//get Signedoff Count
		$signedOffCount = 0 ;
		foreach($records as $record)
		{
			//echo $record->status ;
			if($record->status === "Signed_Off")
			{
				$signedOffCount++ ;
			}
		}
		$documentStatusCount["signedOffCount"] = $signedOffCount;

		//get expired or terminated Count
		$expiredCount = 0 ;
		foreach($records as $record)
		{
			//echo $record->status ;
			if($record->status === "expired" || $record->status === "terminated")
			{
				$expiredCount++ ;
			}
		}
		$documentStatusCount["expiredCount"] = $expiredCount;
		
		return $documentStatusCount ;

	}


	function testEmail()
	{
		$url = "https://legal.godicham.com/index.php/SendEmail/notifyRequesterApi";
		$message = 'Hi Mueez <p>View or Download signed off form from the link below.</p><br/><a target="_blanck" href="' . site_url() . '/downloader/download_signed_documents/5">Click to download</a><br/><br/><a target="_blanck" href="'.base_url().$path. '">Click to view</a><p>Regards,</p><p>Netcom Africa</p>';
		
		$data = array(
			"recipientEmail" => "muziyindojava@gmail.com",
			"subject" => "Second Test",
			"message" => htmlspecialchars($message) ,
		);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		//curl_setopt($curl, CURLOPT_USERPWD, "username:password");

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec($curl);

		curl_close($curl);

		var_dump($result);
		

		
		/*$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.office365.com',
			'smtp_port' => 587,
			'smtp_user' => 'servicerequest@netcomafrica.com',
			'smtp_pass' => 'gbxrjlfrjwlthpfb',//'N3tc0m@123__',
			'mailtype'  => 'html',
			'charset'   => 'utf-8', //iso-8859-1
			'crlf' => 'rn',
			'newline' => 'rn', 
			'wordwrap'	=> TRUE,
			'smtp_crypto'	=> 'tls',
			'smtp_timeout' => 5
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		$this->email->from('servicerequest@netcomafrica.com', 'Netcom Africa Limited');
		$list = array('muziyindojava@gmail.com');
		//$list = array('o.olarewaju@netcomafrica.com', 'c.eki@netcomafrica.com', 'n.jacob@netcomafrica.com');
		$this->email->to($list); //();
		//$this->email->cc('dr_da4real@yahoo.com');//sales supervisor will be added here.
		//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
		$this->email->subject('Test ');
		$this->email->message('Test Message');
		$this->email->send();
		echo $this->email->print_debugger();*/

	}
	
	
	
	

}
	ob_clean();
?>
