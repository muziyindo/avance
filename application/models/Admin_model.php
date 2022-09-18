<?php

class Admin_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->library('encrypt');
		//$this->load->database();
	}

	
	function insert_user()
	{	
		$password1 = $this->input->post('password1');
		$hashed_password = password_hash($password1,PASSWORD_DEFAULT);
		$data = array(
		"fullname" => $this->input->post('fullname'),
		"email" => $this->input->post('email'),
		"role" => $this->input->post('role'),
		"username" => $this->input->post('email'),
		"password" => $hashed_password,
		"is_active" => $this->input->post('status'),
		"date_created" => date('Y-m-d'),
		"last_modified" => date('Y-m-d'),
		"action_type" => "insert",
		//"action_user" => "user", //$this->session->userdata('userid');
		);
		$this->db->insert("users",$data);
		$insertId = $this->db->insert_id();
		return $insertId ;
	}
	
	function storeMember()
	{
		
		$data = array(
		"name" => strtoupper($this->input->post('memberName')),
		"oracleNumber" => $this->input->post('oracleNumber'),
		"savingsStartingBalance" => $this->input->post('savingsBalance'),
		"loanStartingBalance" => $this->input->post('loanBalance'),
		"savingsBalance" => $this->input->post('savingsBalance'),
		"loanBalance" => $this->input->post('loanBalance'),
		"dateAdded" => date('Y-m-d'),
		"dateModified" => date('Y-m-d'),
		"ModifiedBy" => $this->session->userdata('userid'),
		"isActive" => "1"
		);
		return $this->db->insert("members",$data);
	}	
	
	function getUsers()
	{
		$sql = "select * from users";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
}
	
	
?>