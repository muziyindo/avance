<?php

class App_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		//$this->load->database();
	}
	
	function getPendingReviewCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Pending_Review'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Pending_Review' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	//Pending creation is now represented as pending validation in this code section
	function getPendingValidationCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Pending_Creation'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Pending_Creation' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getPendingSignoffCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Pending_Signoff'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Pending_Signoff' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getExpiredCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='expired' or status='terminated'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='expired' or status='terminated' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getTotalCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	
	
	
	function getFailReviewCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Fail_Review'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Fail_Review' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getFailValidationCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Fail_Creation'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Fail_Creation' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getFailSignoffCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Fail_Signoff'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Fail_Signoff' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	function getSignedoffCount()
	{
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			$query = $this->db->query("select id from contract where status='Signed_Off'");
			return $query->num_rows();
		}
		else
		{
			$query = $this->db->query("select id from contract where status='Signed_Off' and requester_id='$requester_id'");
			return $query->num_rows();
		}
	}
	
	
	function insertContract()
	{	
		$activity = $this->input->post('activity');
		
		if ($activity == "Creation")
		{
			$status = "Pending_Creation";	
		}
		else if ($activity == "Review")
		{
			$status = "Pending_Review";
		}
		
		$data = array(
		"document_type" =>$this->input->post('document_type'), 
		"activity" =>$this->input->post('activity'),
		"requester_id" =>$this->session->userdata('userid'), 
		"requester_title" =>$this->input->post('requester_title'),  
		"requester_name" =>$this->input->post('requester_name'),
		"requester_dept" =>$this->input->post('requester_dept'),
		"other_party_title" =>$this->input->post('other_party_title'),
		"other_party_name" =>$this->input->post('other_party_name'),
		"service_location" =>$this->input->post('service_location'),
		"authorized_signatory" =>$this->input->post('authorized_signatory'),
		"phone_no" =>$this->input->post('phone_no'),
		"email" =>$this->input->post('email'),
		"address" =>$this->input->post('address'),
		"contract_duration" =>$this->input->post('contract_duration'),
		"proposed_start_date" =>$this->input->post('proposed_start_date'),
		"proposed_end_date" =>$this->input->post('proposed_end_date'),
		"proposal_agreed_upon" =>$this->input->post('proposal_agreed_upon'),
		"termination_notice" =>$this->input->post('termination_notice'),
		"payment_term" =>$this->input->post('payment_term'),
		"sale_of_equipment" =>$this->input->post('sale_of_equipment'),
		"status" =>$status,
		"date_created" =>date('Y-m-d'),
		"last_modified" =>date('Y-m-d'),
		"modified_by" =>$this->session->userdata('userid'),
		);
		$this->db->insert("contract",$data);
		$insertId = $this->db->insert_id();
		return $insertId ;
	}
	
	function getContracts($status)
	{
		if($status=="pr")
			$status="Pending_Review";
		else if($status=="pv")
			$status="Pending_Creation";
		else if($status=="ps")
			$status="Pending_Signoff";
		else if($status=="fr")
			$status="Fail_Review";
		else if($status=="fv")
			$status="Fail_Creation";
		else if($status=="fs")
			$status="Fail_Signoff";
		else if($status=="so")
			$status="Signed_Off";
		
		
			
		$role = $this->session->userdata('role');
		$requester_id = $this->session->userdata('userid');
		if ($role=="Legal Officer" || $role=="Admin")
		{
			if($status == "all")
			{
				$sql = "select * from contract";
				$query = $this->db->query($sql);
			}
			else
			{
				$sql = "select * from contract where status='$status'";
				$query = $this->db->query($sql);
			}
		}
		else
		{
			if($status == "all")
			{
				$sql = "select * from contract where requester_id='$requester_id'";
				$query = $this->db->query($sql);
			}
			else
			{
				$sql = "select * from contract where status='$status' and requester_id = '$requester_id'";
				$query = $this->db->query($sql);
			}
		}
		
		
		
		
		return $query->result();
	}
	
	function getContractDetails($id)
	{
		$query = $this->db->query("select * from contract where id='$id'");
		return $query->row_array();
	}
	
	function updateContract($id)
	{
		$role = $this->session->userdata('role');
		if($role == "Legal Officer")
		{
			$activity = $this->input->post('activity');
			
			$review = $this->input->post('review');
			//$validate = $this->input->post('validate');
			$signoff = $this->input->post('signoff');
			
			$review_comment = $this->input->post('review_comment');
			//$validate_comment = $this->input->post('validate_comment');
			$signoff_comment = $this->input->post('signoff_comment');
			//echo $review." ".$validate." Hello";
			
			$review_comment = str_replace("'","\'",$this->input->post('review_comment'));
			//$validate_comment = str_replace("'","\'",$this->input->post('validate_comment'));
			$signoff_comment = str_replace("'","\'",$this->input->post('signoff_comment'));
			
			if(empty($review))
			{
				return 10 ; //no update 
			}
			else if($review == 1 &&  empty($signoff))
			{
				//update as pending validation
				$this->db->query("update contract set status='Pending_Signoff',review_comment='$review_comment' where id='$id'");
				
				$status="Pending_Signoff";
				$this->notify($activity,$status);
				
				//upload review comment doc
				$storeFolder = './uploads/contracts/';
				if ($_FILES["review_doc"]["error"]!=4)
				{
					$max_filesize=50000000 ; //50mb
					$base_uploadSize = $_FILES['review_doc']['size'];
					if($base_uploadSize < $max_filesize)
					{
						$base_tempFile = $_FILES['review_doc']['tmp_name'];
						
						//moving the base image
						$targetPath =$storeFolder;
						$temp = explode(".", $_FILES["review_doc"]["name"]);
						$base_filename = time().$_FILES["review_doc"]["name"];
						$targetFile =  $targetPath. $base_filename;
		
						//move file to directory
						move_uploaded_file($base_tempFile,$targetFile); 
						$base_path=$file_name='uploads/contracts/'.$base_filename;
						$this->db->query("update contract set review_doc='$base_path' where id='$id'");
					}
				}
				
				
				
				return 1 ; //updated
			}
			else if($review == 2 &&  empty($signoff))
			{
				if($activity=="Review"){
				//update as fail review
				$this->db->query("update contract set status='Fail_Review', review_comment='$review_comment' where id='$id'");
				
					$status="Fail_Review";
					$this->notify($activity,$status);
				
				} else if($activity=="Creation"){
				//update as fail creation
				$this->db->query("update contract set status='Fail_Creation', review_comment='$review_comment' where id='$id'");
				
					$status="Fail_Creation";
					$this->notify($activity,$status);
				}
				
				
				
				//upload review comment doc
				$storeFolder = './uploads/contracts/';
				if ($_FILES["review_doc"]["error"]!=4)
				{
					$max_filesize=50000000 ; //50mb
					$base_uploadSize = $_FILES['review_doc']['size'];
					if($base_uploadSize < $max_filesize)
					{
						$base_tempFile = $_FILES['review_doc']['tmp_name'];
						
						//moving the base image
						$targetPath =$storeFolder;
						$temp = explode(".", $_FILES["review_doc"]["name"]);
						$base_filename = time().$_FILES["review_doc"]["name"];
						$targetFile =  $targetPath. $base_filename;
		
						//move file to directory
						move_uploaded_file($base_tempFile,$targetFile); 
						$base_path=$file_name='uploads/contracts/'.$base_filename;
						$this->db->query("update contract set review_doc='$base_path' where id='$id'");
					}
				}
				
				return 1 ; //updated
			}
			
			
			else if($signoff == 1)
			{
				//update as signed off
				$this->db->query("update contract set status='Signed_Off', signoff_comment='$signoff_comment' where id='$id'");
				
				$status="Signed_Off";
				$this->notify($activity,$status);
				
				//upload signoff comment doc
				$storeFolder = './uploads/contracts/';
				if ($_FILES["signoff_doc"]["error"]!=4)
				{
					$max_filesize=50000000 ; //50mb
					$base_uploadSize = $_FILES['signoff_doc']['size'];
					if($base_uploadSize < $max_filesize)
					{
						$base_tempFile = $_FILES['signoff_doc']['tmp_name'];
						
						//moving the base image
						$targetPath =$storeFolder;
						$temp = explode(".", $_FILES["signoff_doc"]["name"]);
						$base_filename = time().$_FILES["signoff_doc"]["name"];
						$targetFile =  $targetPath. $base_filename;
		
						//move file to directory
						move_uploaded_file($base_tempFile,$targetFile); 
						$base_path=$file_name='uploads/contracts/'.$base_filename;
						$this->db->query("update contract set signoff_doc='$base_path' where id='$id'");
					}
				}
				
				return 1 ; //updated
			}
			else if($signoff == 2)
			{
				//update as fail signoff
				$this->db->query("update contract set status='Fail_Signoff', signoff_comment='$signoff_comment' where id='$id'");
				
				$status="Fail_Signoff";
				$this->notify($activity,$status);
				
				//upload signoff comment doc
				$storeFolder = './uploads/contracts/';
				if ($_FILES["signoff_doc"]["error"]!=4)
				{
					$max_filesize=50000000 ; //50mb
					$base_uploadSize = $_FILES['signoff_doc']['size'];
					if($base_uploadSize < $max_filesize)
					{
						$base_tempFile = $_FILES['signoff_doc']['tmp_name'];
						
						//moving the base image
						$targetPath =$storeFolder;
						$temp = explode(".", $_FILES["signoff_doc"]["name"]);
						$base_filename = time().$_FILES["signoff_doc"]["name"];
						$targetFile =  $targetPath. $base_filename;
		
						//move file to directory
						move_uploaded_file($base_tempFile,$targetFile); 
						$base_path=$file_name='uploads/contracts/'.$base_filename;
						$this->db->query("update contract set signoff_doc='$base_path' where id='$id'");
					}
				}
				
				return 1 ; //updated
			}
			else
			{
				return 10 ;
			}	
		} 
		else if($role == "Contract Requestor")
		{
			$activity = $this->input->post('activity');
			
			$status = $this->input->post('status');
			if($status=="Fail_Review")
				$status_ = "Pending_Review" ;
			else if($status=="Fail_Creation")
				$status_ = "Pending_Creation" ;
			else if($status=="Fail_Signoff")
				$status_ = "Pending_Signoff" ;
				
			$this->notifyLegal($activity);
				
			$data = array(
			"document_type" =>$this->input->post('document_type'),
			"activity" =>$this->input->post('activity'),  
			"requester_id" =>$this->session->userdata('userid'), 
			"requester_title" =>$this->input->post('requester_title'),  
			"requester_name" =>$this->input->post('requester_name'),
			"requester_dept" =>$this->input->post('requester_dept'),
			"other_party_title" =>$this->input->post('other_party_title'),
			"other_party_name" =>$this->input->post('other_party_name'),
			"service_location" =>$this->input->post('service_location'),
			"authorized_signatory" =>$this->input->post('authorized_signatory'),
			"phone_no" =>$this->input->post('phone_no'),
			"email" =>$this->input->post('email'),
			"address" =>$this->input->post('address'),
			"contract_duration" =>$this->input->post('contract_duration'),
			"proposed_start_date" =>$this->input->post('proposed_start_date'),
			"proposed_end_date" =>$this->input->post('proposed_end_date'),
			//"proposal_agreed_upon" =>$this->input->post('proposal_agreed_upon'),
			"termination_notice" =>$this->input->post('termination_notice'),
			"payment_term" =>$this->input->post('payment_term'),
			"sale_of_equipment" =>$this->input->post('sale_of_equipment'),
			//"status" =>$status_,
			//"last_modified" =>date('Y-m-d'),
			//"modified_by" =>$this->session->userdata('userid'),
			);
			$this->db->where('id', $id);
			return $this->db->update('contract', $data);
			
		}
	}
	
	//for document upload section
	function getDocuments()
	{
		$sql = "select * from documents";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function getContractDocuments($contractId)
	{
		$sql = "select * from documents_upload where contract_id='$contractId'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function notify($activity,$status)
	{
		
		
		//$action = $this->input->post('activity');
		$officer_name = "Legal Officer";
		$officer_email = "m.dauda@netcomafrica.com";
		
		if($status=="Pending_Signoff")
		{
			$message='Hi, <p>Your contract '.$activity.' request has been approved.</p><p>Regards,</p><p>Netcom Africa</p>';
			$requester = $this->session->userdata('name');
			$subject = 'Contract '.$activity.' request Approved';
		}
		else if($status=="Fail_Review")
		{
			$message='Hi, <p>Your contract '.$activity.' request was not approved. Please check the comments section of request form for more details. </p><p>Regards,</p><p>Netcom Africa</p>';
			$requester = $this->session->userdata('name');
			
			$subject = 'Contract '.$activity.' request rejected';
			
		}
		else if($status=="Fail_Creation")
		{
			$message='Hi, <p>Your contract '.$activity.' request was not approved. Please check the comments section of request form for more details. </p><p>Regards,</p><p>Netcom Africa</p>';
			$requester = $this->session->userdata('name');
			$subject = 'Contract '.$activity.' request rejected';
			
		}
		else if($status=="Signed_Off")
		{
			$message='Hi, <p>Your contract '.$activity.' request has been approved for sign off by the legal Team. A copy of the signed form will be sent to you, kindly sign and send back. </p><p>Regards,</p><p>Netcom Africa</p>';
			$requester = $this->session->userdata('name');
			$subject = 'Contract '.$activity.' approve for Sign off';
			
		}
		else if($status=="Fail_Signoff")
		{
			$message='Hi, <p>Your contract '.$activity.' request was not approved for sign off by the legal Team. Please check the comments section of request form for more details. </p><p>Regards,</p><p>Netcom Africa</p>';
			$requester = $this->session->userdata('name');
			$subject = 'Contract '.$activity.' / Sign off rejected';
		}
		
		$config = Array(
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
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		//echo 1 ;
		/*if ($this->email->send()) {
           echo 1 ;
		} else {
           show_error($this->email->print_debugger());
		}*/
	}
	
	
	function notifyLegal($action)
	{
		//$action = $this->input->post('activity');
		$officer_name = "Legal Officer";
		$officer_email = "m.dauda@netcomafrica.com";
		$message='Hi '.$officer_name.'<p>You have a contract request pending '.$action.'. Kindly login to the legal platform to action it.</p><p>Regards,</p><p>Netcom Africa</p>';
		$requester = $this->session->userdata('name');
		
		$config = Array(
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
		/*if ($this->email->send()) {
           echo 1 ;
		} else {
           show_error($this->email->print_debugger());
		}*/
	}
}
	
	
?>