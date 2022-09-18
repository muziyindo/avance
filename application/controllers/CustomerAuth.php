<?php

//error_reporting( E_ERROR|E_WARNING );
error_reporting( 0 );

ob_start();
require APPPATH . 'libraries/REST_Controller.php';

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH . 'libraries/PHPMailer/Exception.php';
require APPPATH . 'libraries/PHPMailer/PHPMailer.php';
require APPPATH . 'libraries/PHPMailer/SMTP.php';

class CustomerAuth extends REST_Controller
 {
    public function __construct()
 {
        header( 'Access-Control-Allow-Origin: *' );

        header( 'Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE' );

        parent::__construct();

        $this->load->database();
        $this->load->library( 'form_validation' );
        //$this->load->library( 'session' );
        // $this->load->model( 'customermodel' );
    }

 function customerSignUp_post()
 {
        $this->form_validation->set_message('matches', 'Passwords do not match');
		$this->form_validation->set_message('is_unique', 'User with %s already exists');
		$this->form_validation->set_message('required', 'The %s field must be filled');
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[customer.email]');
        $this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|is_unique[customer.phone]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[password_confirmation]');
        $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'required');

        if ($this->form_validation->run() == FALSE)
		{
            $message = array( 'response'=>validation_errors() );
            $this->response( $message, 406 );

			echo validation_errors();
		}
        else
        {

            //Get the api post data
            $input = $this->input->post();
            $client_code = $this->generateRandomString(15);
            $client_name = $input[ 'fname' ]." ".$input[ 'lname' ] ;
            $client_email = $input[ 'email' ] ;

            $password1 = $input[ 'password' ];
            $hashed_password = password_hash($password1,PASSWORD_DEFAULT);
            $data = array(
            'fname' => $input[ 'fname' ],
            'lname' => $input[ 'lname' ],
            'email' => $input[ 'email' ],
            'phone' => $input[ 'phone' ],
            'password' => $hashed_password ,
            'date_created' => date( 'Y-m-d' ),
            'last_modified' => date( 'Y-m-d' ),
            'is_active' => '0',
            'client_code' => $client_code
            );
            $this->db->insert( 'customer', $data );

            $num_inserts = $this->db->affected_rows();
            if ( $num_inserts == '1' )
            {
            //sends email verification link to client
            $this->sendEmailVerificationLink($client_email,$client_name,$client_code);

            $message = array( 'response'=>'success' );
            $this->response( $message, 200 );
            } else 
            {
                $message = array( 'response'=>'could not store record in database' );
                $this->response( $message, 400 );
            }

     }

    }

    function customerSignIn_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');

        $check = $this->db->query("SELECT * FROM customer WHERE email='$email' and is_active='1'");

		if ($check->num_rows() > 0) {

			$pword = $this->db->query("SELECT password FROM customer WHERE email='$email' and is_active='1'");
			$pword = $pword->result();

			//$decrypted_password = $this->encrypt->decode($pword[0]->password);

			$verify = password_verify($password, $pword[0]->password);

			if ($verify == 1) {

				//get user details
				foreach ($check->result() as $value) {
					$uid = $value->id;
					//$username = $value->username;
					$fname = $value->fname;
                    $lname = $value->lname;
					$phone = $value->phone;
					$email = $value->email;
					//$pimage = $value->profile_image;

				}

				//store user details in session
				$this->session->set_userdata('userid', $uid);
				//$this->session->set_userdata('uname', $username);
				$this->session->set_userdata('fname', $fname);
                $this->session->set_userdata('lname', $lname);
				$this->session->set_userdata('phone', $phone);
				$this->session->set_userdata('email', $email);
				//$this->session->set_userdata('pimage', $pimage);

				$message = array( 
                    'response'=>'success',
                    'userid'=>$uid,
                    'fname'=>$fname,
                    'lname'=>$lname,
                    'phone'=>$phone,
                    'email'=>$email
                 );
                 $this->response( $message, 200 );

			} else {
				
                $message = array( 'response'=>'Invalid Password' );
                $this->response( $message, 401 );
			}
		} else {

            $message = array( 'response'=>'Invalid User' );
            $this->response( $message, 401 );
		}


       

    } //end customer sign in function


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


    function sendEmailVerificationLink($client_email,$client_name,$client_code)
    {
        //Get the api post data
        $input = $this->input->post();
        $recipientEmail =  $client_email ;
        $subject =  "Email Verification Link" ;
        $message = 'Hi '.$client_name.'<p>Thank you for choosing avance, Kindly click on the link below to verify your email</p>
        <p>'.site_url("EmailSender/verifyEmailLink/".$client_code).'</p>
        <p>Regards,</p><p>Avance</p>';
        
        $mail = new PHPMailer;

        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.googlemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'netcomlegal@gmail.com';//SMTP UNAME
        $mail->Password = 'oimjykzxpyuysrkw';//SMTP password.
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        //$mail->setFrom('netcomlegal@gmail.com');//Here I put the SMTP username as email.
   
        $mail->isHTML(true);


        // Sender info
        $mail->setFrom('netcomlegal@gmail.com', 'Avance');
        $mail->addReplyTo('netcomlegal@gmail.com', 'Avance');

        // Add a recipient
        $mail->addAddress($recipientEmail);

        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Set email format to HTML
        $mail->isHTML(true);

        // Mail subject
        $mail->Subject = $subject ;

        //Mail Body
        $mail->Body  = $message ;

        // Send email 
        if(!$mail->send()) { 
            //echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
        } else { 
            //echo 'Message has been sent.'; 
        }
    }//end function sendEmailVerificationLink

    function forgetPassword_post()
	{
		$email = $this->post('email');
		$check = $this->db->query("SELECT * FROM customer WHERE email='$email' and is_active='1'");
		
		if($check->num_rows()>0)
		{ 
			$query = $this->db->query("select id,fname,lname from customer where email = '$email'");
			foreach($query->result() as $value)
			{
				$customer_name = $value->fname." ".$value->lname ;
				$customer_id = $value->id;
			}
			$this->send_reset_password_link($email,$customer_name,$customer_id);

            $message = array( 'response'=>'Password reset link sent successfully' );
            $this->response( $message, 200 );
			
		}
		else
		{
			$message = array( 'response'=>'Invalid User' );
            $this->response( $message, 401 );
		}
	}


    function send_reset_password_link($email,$customer_name,$customer_id)
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
		echo $this->email->print_debugger();








        $input = $this->input->post();
        $recipientEmail =  $client_email ;
        $subject =  "Password Reset Link" ;
        $message = 'Hi '.$applicant_name.'<p>Kindly click on the link below to reset your password</p>
        <p><a href="'.site_url().'/site/resetPassword/'.$applicant_id.'">Click to reset</a></p>
        <p>Regards,</p><p>Avance</p>';
        
        $mail = new PHPMailer;

        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.googlemail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'netcomlegal@gmail.com';//SMTP UNAME
        $mail->Password = 'oimjykzxpyuysrkw';//SMTP password.
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        //$mail->setFrom('netcomlegal@gmail.com');//Here I put the SMTP username as email.
   
        $mail->isHTML(true);


        // Sender info
        $mail->setFrom('netcomlegal@gmail.com', 'Avance');
        $mail->addReplyTo('netcomlegal@gmail.com', 'Avance');

        // Add a recipient
        $mail->addAddress($recipientEmail);

        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Set email format to HTML
        $mail->isHTML(true);

        // Mail subject
        $mail->Subject = $subject ;

        //Mail Body
        $mail->Body  = $message ;

        // Send email 
        if(!$mail->send()) { 
            //echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
        } else { 
            //echo 'Message has been sent.'; 
        }





	}


    

}
ob_clean();
