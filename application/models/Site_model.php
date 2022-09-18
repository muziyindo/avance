<?php

class Site_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		//$this->load->database();
	}
	
	function registeri($applicant_code)
	{		
			$password1 = $this->input->post('password1');
			//$encrypted_password = $this->encrypt->encode($password1);
			$hashed_password = password_hash($password1,PASSWORD_DEFAULT);
			$data = array(
			"fname" => $this->input->post('fname'),
			"lname" => $this->input->post('lname'),
			"position_applied_for_id" => $this->input->post('job_position'),
			"email" => $this->input->post('email'),
			"username" => $this->input->post('email'),
			"password" => $hashed_password,
			"date_created" => date('Y-m-d'),
			"last_modified" => date('Y-m-d'),
			"modified_by" => $this->input->post('fname')." ".$this->input->post('lname'),
			"is_active" => "1",
			"verification_code"=>$applicant_code
			);
			return $this->db->insert("applicants",$data);
	}
	
	function updatePassword($applicant_id)
	{		
			$password1 = $this->input->post('password1');
			//$encrypted_password = $this->encrypt->encode($password1);
			$hashed_password = password_hash($password1,PASSWORD_DEFAULT);
			$data = array(
			"password" => $hashed_password,
			"last_modified" => date('Y-m-d'),
			);
			
			$this->db->where("id",$applicant_id);
			$this->db->update("applicants",$data);
			
			
	}
	
	
	
}
	
	
?>