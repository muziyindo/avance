<?php

error_reporting(E_ERROR | E_WARNING);

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH . 'libraries/PHPMailer/Exception.php';
require APPPATH . 'libraries/PHPMailer/PHPMailer.php';
require APPPATH . 'libraries/PHPMailer/SMTP.php';


class EmailSender extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		//$this->load->library('encrypt');
		$this->load->library('encryption');

		$this->load->library('session');
		$this->load->library('form_validation');
	}

	function verifyEmailLink($client_code){

        $query = $this->db->query("select client_code from customer where client_code='$client_code'");
        if($query->num_rows() > 0){
            $query = $this->db->query("update customer set is_active='1' where client_code='$client_code'");
            $num_inserts = $this->db->affected_rows();
            if($num_inserts > 0){

                echo "update successful";
            }
        }

    }

    

	
}//end controller class
