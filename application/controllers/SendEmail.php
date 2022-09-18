<?php

//error_reporting(E_ERROR|E_WARNING);
error_reporting(0);

ob_start();
require APPPATH . 'libraries/REST_Controller.php';

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require APPPATH . 'libraries/PHPMailer/Exception.php';
require APPPATH . 'libraries/PHPMailer/PHPMailer.php';
require APPPATH . 'libraries/PHPMailer/SMTP.php';

class SendEmail extends REST_Controller
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');

        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

        parent::__construct();

        $this->load->database();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        //$this->load->library('encrypt');
        $this->load->library('session');
        //$this->load->model('app_model');

        $ud = $this->session->userdata('userid');
        if ($ud < 1) {
            //redirect('Account','refresh');
        }
    }




   /* function notifyRequesterApi_post()
    {

        $input = $this->input->post();
         //$message = $this->post('message');
         //$subject = $this->post('subject');
         //$recipientEmail = $this->post('recipientEmail');
         
        //$input = json_decode($input);
        

       $recipientEmail =  $input["recipientEmail"] ;
       $subject =  $input["subject"] ;
       $message = $input["message"] ;
       
       //$message = json_decode($message);

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.office365.com',
            'smtp_port' => 587,
            'smtp_user' => 'servicerequest@netcomafrica.com',
            'smtp_pass' => 'gbxrjlfrjwlthpfb', //'N3tc0m@123__',
            'mailtype'  => 'html',
            'charset'   => 'utf-8', //iso-8859-1
            'crlf' => "r\n",
            'newline' => "r\n",
            'wordwrap'    => TRUE,
            'smtp_crypto'    => 'tls', //'tls',
            'smtp_timeout' => 10
        );
    
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('servicerequest@netcomafrica.com', 'Netcom Legal');
        $list = array($recipientEmail);
        //$list = array('o.olarewaju@netcomafrica.com', 'c.eki@netcomafrica.com', 'n.jacob@netcomafrica.com');
        $this->email->to($list); //();
        //$this->email->cc('dr_da4real@yahoo.com');//sales supervisor will be added here.
        //$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        //echo $this->email->print_debugger();

        $data1["result"] = $this->email->print_debugger();
        
        $this->response($data1, 200);
        //$this->response($message, 200);
    }*/
    

    /*function notifyLegalApi_post()
    {


        $input = $this->input->post();
        //$data = json_decode($input,true);

       $recipientEmail1 =  $input["recipientEmail1"] ;
       $recipientEmail2 =  $input["recipientEmail2"] ;
       $recipientEmail3 =  $input["recipientEmail3"] ;
       $subject =  $input["subject"] ;
       $message = $input["message"] ;

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.office365.com',
            'smtp_port' => 587,
            'smtp_user' => 'servicerequest@netcomafrica.com',
            'smtp_pass' => 'ckdqpyvfhyyffbvc', //'gbxrjlfrjwlthpfb',
            'mailtype'  => 'html',
            'charset'   => 'utf-8', //iso-8859-1
            'crlf' => 'rn',
            'newline' => 'rn',
            'wordwrap'    => TRUE,
            'smtp_crypto'    => 'tls',
            'smtp_timeout' => 10
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('servicerequest@netcomafrica.com', 'Netcom Legal');
        $list = array($recipientEmail1, $recipientEmail2, $recipientEmail3);
        //$list = array('o.olarewaju@netcomafrica.com', 'c.eki@netcomafrica.com', 'n.jacob@netcomafrica.com');
        $this->email->to($list); //();
        //$this->email->cc('dr_da4real@yahoo.com');//sales supervisor will be added here.
        //$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
        //echo $this->email->print_debugger();

        //$data1["result"] = $this->email->print_debugger();
        //$this->response($data1, 200);
    }*/
    
    function notifyRequesterApi_post()
    {
        //Get the api post data
        $input = $this->input->post();
        $recipientEmail =  $input["recipientEmail"] ;
        $subject =  $input["subject"] ;
        $message = $input["message"] ;
        
        $mail = new PHPMailer;

        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'servicerequest@netcomafrica.com';//SMTP UNAME
        $mail->Password = 'ckdqpyvfhyyffbvc';//SMTP password.
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('');//Here I put the SMTP username as email.
   
        $mail->isHTML(true);


        // Sender info
        $mail->setFrom('servicerequest@netcomafrica.com', 'Netcom Legal');
        $mail->addReplyTo('servicerequest@netcomafrica.com', 'Netcom Legal');

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
    }//end function notifyRequesterApi
    
    
    function notifyLegalApi_post()
    {
        //Get the api post data
        $input = $this->input->post();
        $recipientEmail1 =  $input["recipientEmail1"] ;
        $recipientEmail2 =  $input["recipientEmail2"] ;
        $recipientEmail3 =  $input["recipientEmail3"] ;
        $subject =  $input["subject"] ;
        $message = $input["message"] ;
        
        $mail = new PHPMailer;

        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'servicerequest@netcomafrica.com';//SMTP UNAME
        $mail->Password = 'gbxrjlfrjwlthpfb';//SMTP password.
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('');//Here I put the SMTP username as email.
   
        $mail->isHTML(true);


        // Sender info
        $mail->setFrom('servicerequest@netcomafrica.com', 'Netcom Legal');
        $mail->addReplyTo('servicerequest@netcomafrica.com', 'Netcom Legal');

        // Add a recipient
        $mail->addAddress($recipientEmail1);
        $mail->addAddress($recipientEmail2);
        $mail->addAddress($recipientEmail3);

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
    }//end function notifyRequesterApi
    
    
}
ob_clean();
