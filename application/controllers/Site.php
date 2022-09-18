<?php

error_reporting(E_ERROR|E_WARNING);

class Site extends CI_Controller 
{

   public function __construct()
   {
       parent::__construct();

		$this->load->database();
       $this->load->library('encryption');
       //$this->load->library('session');
       $this->load->library('form_validation');
	   
   }
   
	function index()
	{
		$data['title'] = 'Login Page';
		//$this->load->view('header/login_header',$data);
		$this->load->view('content/login',$data);
		//$this->load->view('footer/footer');
		
	}
   
   function authenticate()
   {
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		$check = $this->db->query("SELECT * FROM users WHERE username='$username'");
		
		if($check->num_rows()>0)
		{ 
			$pword = $this->db->query("SELECT password FROM applicants WHERE username='$username'");
			$pword = $pword->result();
			
			//$decrypted_password = $this->encrypt->decode($pword[0]->password);
			$verify = password_verify($password,$pword[0]->password);
			
			if($verify==1)
			{
				//echo "correct";
				//get user details
				foreach($check->result() as $value)
				{
					$uid = $value->id ;
					$username = $value->username ;
					$name = $value->lname." ".$value->fname ;
					$job_position_id = $value->position_applied_for_id ;
					$email = $value->email ;
					$is_active = $value->is_active;
				}
				
				if($is_active == 1)
				{
				
					//echo $username." ".$name." ".$email." ".$uid;
					
					//store user details in session
					$this->session->set_userdata('userid', $uid);
					$this->session->set_userdata('uname', $username);
					$this->session->set_userdata('name', $name);
					$this->session->set_userdata('job_position_id', $job_position_id);
					$this->session->set_userdata('email', $email);
					
					//check if applicant has already taken the test
					/*$query = $this->db->query("SELECT * FROM iq_scores WHERE applicant_id='$uid' ");
					if($query->num_rows()>0)
					{
						foreach($query->result() as $value)
						{
							$submitted = $value->submitted;
							if($submitted == "yes")
							{
								redirect('app/existingNotice','refresh');
							}
							else
							{
								echo "You took this test but did not submit";
							}
							
						}
					}
					
					else
					{
						redirect('app/notice','refresh');
					}*/
					redirect('app/jobPosition','refresh');
				}
				else
				{
					//echo "You have not verify your account. Please check your email and click on the verification";
					redirect('site/unverifiedNotice','refresh');
				}
				
				
				//echo "login successful";
			}
			else
			{
				$this->session->set_flashdata('message', 'invalid_password');
				redirect('site');
			}
			
		}
		else
		{
			$this->session->set_flashdata('message', 'invalid_user');
			redirect('site');
		}
	}
	
	
	function register()
	{
		$data['title'] = 'Sign Up';
		$this->load->view('content/register', $data);
	}
	
	function registeri()
	{
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[applicants.email]');
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->register();
			//echo validation_errors();
		}
		else
		{
			$applicant_email = $this->input->post('email');
			$applicant_name = $this->input->post('fname')." ".$this->input->post('lname');
			$applicant_code = $this->generateRandomString();
			$this->load->model('site_model');
			$this->site_model->registeri($applicant_code);
            $num_inserts = $this->db->affected_rows();
            if($num_inserts=="1")
            {
				//$this->send_verification_link($applicant_email,$applicant_name, $applicant_code);
				//echo "success";
                redirect('site/signUpResponse');
			}
			else
			{
				echo "There is an issue";
			}
		}
	}
	
	function resetPasswordI($applicant_id)
	{
		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->resetPassword($applicant_id);
			//echo validation_errors();
		}
		else
		{
			
			$this->load->model('site_model');
			$this->site_model->updatePassword($applicant_id);
            $num_inserts = $this->db->affected_rows();
            if($num_inserts=="1")
            {
				$this->session->set_flashdata('message', 'reset_success');
                redirect('http://192.168.101.28/assessment/');
			}
			else
			{
				echo "There is an issue";
			}
		}
	}
	
	function signUpResponse()
	{
		$data['title'] = 'Assessment Portal';
		//$this->load->view('header/login_header',$data);
		$this->load->view('content/signup_response',$data);
		//$this->load->view('footer/footer');
	}
	
	function send_verification_link($applicant_email,$applicant_name,$applicant_code)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		/*'smtp_user' => 'primeracredit2017@gmail.com',
		'smtp_pass' => 'Default@123',*/
		'smtp_user' => 'musideendauda@gmail.com',
		'smtp_pass' => 'Dauda@Musideen',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1',
		'wordwrap'	=> TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
	
		$this->email->from('hrd@netcomafrica.com', 'Netcom Africa Limited');
		//$list = array('mdauda@otandtconsulting.com','dr_da4real@yahoo.com');
		$this->email->to($applicant_email); //();
		$this->email->cc('dr_da4real@yahoo.com');//sales supervisor will be added here.
		//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
		$this->email->subject('Email Verification');
		$this->email->message('Hi '.$applicant_name.'<p>Kindly click on the link below to verify your email</p>
		    <p><a href="'.site_url().'/site/verifyEmail/'.$applicant_code.'">Click to verify</a></p>
		    <p>Regards,</p><p>Netcom Africa</p>');
		$this->email->send();
	}
	
	function send_reset_password_link($applicant_email,$applicant_name,$applicant_id)
	{
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		/*'smtp_user' => 'primeracredit2017@gmail.com',
		'smtp_pass' => 'Default@123',*/
		'smtp_user' => 'musideendauda@gmail.com',
		'smtp_pass' => 'Dauda@Musideen',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1',
		'wordwrap'	=> TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
	
		$this->email->from('hrd@netcomafrica.com', 'Netcom Africa Limited');
		//$list = array('mdauda@otandtconsulting.com','dr_da4real@yahoo.com');
		$this->email->to($applicant_email); //();
		//$this->email->cc('dr_da4real@yahoo.com');//sales supervisor will be added here.
		//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
		$this->email->subject('Password Reset Link');
		$this->email->message('Hi '.$applicant_name.'<p>Kindly click on the link below to reset your password</p>
		    <p><a href="'.site_url().'/site/resetPassword/'.$applicant_id.'">Click to reset</a></p>
		    <p>Regards,</p><p>Netcom Africa</p>');
		$this->email->send();
	}
	
	function generateRandomString($length = 10)
	{
		//store all alpha numberic characters
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		//get length of $characters
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
	function verifyEmail()
    {
		$applicant_code = $this->uri->segment(3);
		$query = $this->db->query("select * from applicants where verification_code ='$applicant_code'");
		if($query->num_rows()>0)
		{
			foreach($query->result() as $value)
			{
				$active_status = $value->is_active ;
				
				if($active_status == 0)
				{
					$this->db->query("update applicants set is_active='1' where verification_code='$applicant_code'");
					
					$data['account_verification_response'] = 'Your account has been successfully verified, you can therefore login to take the assessment test';
					$this->load->view('content/account_verification_response',$data);
				}
				else
				{
					$data['account_verification_response'] = 'Your account has already been verified';
					$this->load->view('content/account_verification_response',$data);
					
				}
				
				
			}
		}
	}
	
	function unverifiedNotice()
	{
		$data['title'] = 'Notice';
		$this->load->view('content/unverified_response');
		$this->load->view('footer/footer');
	}
	
	function forgetPassword()
	{
		$data['title'] = 'Forget Password';
		$this->load->view('content/forget_password');
		$this->load->view('footer/footer');
	}
	
	function forgetPasswordI()
	{
		$username = $this->input->post('email');
		$check = $this->db->query("SELECT * FROM applicants WHERE username='$username'");
		
		if($check->num_rows()>0)
		{ 
			$query = $this->db->query("select id,fname,lname from applicants where email = '$username'");
			foreach($query->result() as $value)
			{
				$applicant_name = $value->fname." ".$value->lname ;
				$applicant_id = $value->id;
			}
			$this->send_reset_password_link($username,$applicant_name,$applicant_id);
			
			echo '<script language="javascript">';
			echo 'alert("Password reset link sent successfully")';
			echo '</script>';
			
			$this->session->set_flashdata('message', 'reset');
			redirect('http://192.168.101.28/assessment/');
			
		}
		else
		{
			$this->session->set_flashdata('message', 'invalid_user');
			redirect('site/forgetPassword');
		}
	}
	
	function resetPassword($applicant_id)
	{
		
		$data['title'] = 'Reset Password';
		$data['applicant_id'] = $applicant_id ;
		$this->load->view('content/reset_password',$data);
		$this->load->view('footer/footer');
	}
	
	function logout()
	{
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		redirect(site_url('site/index'));
	}
   
   
  

}//end controller class



?>