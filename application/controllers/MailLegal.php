<?php

//error_reporting(E_ERROR|E_WARNING);
error_reporting(0);

ob_start();
class MailLegal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->library('form_validation');
		//$this->load->library('encryption');
		$this->load->library('encrypt');
		$this->load->library('session');
		$this->load->model('app_model');
		
		$ud = $this->session->userdata('userid');
        if ($ud < 1)
        {
              redirect('Account','refresh');
        }
		
	}
	
	
	
	function notifyLegal()
	{
		$officer_name = "Ralph Harding";
		
		/*$requesterName = $this->session->userdata('Name');
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'musideendauda@gmail.com',
		'smtp_pass' => 'Dauda@Musideen',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1',
		'wordwrap'	=> TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
	
		$this->email->from('legservice@netcomafrica.com', 'Netcom Africa Limited');
		//$list = array('mdauda@otandtconsulting.com','dr_da4real@yahoo.com');
		$this->email->to("muziyindojava@gmail.com"); //();
		$this->email->cc('dr_da4real@yahoo.com');//sales supervisor will be added here.
		//$this->email->reply_to('my-email@gmail.com', 'Explendid Videos');
		$this->email->subject('Contract Pending Action');
		$this->email->message('Hi '.$officer_name.'<p>You have a contract request pending '.$action.'. Kindly login to the legal platform to action it.</p><p>Regards,</p><p>Netcom Africa</p>');
		$this->email->send();*/
		
		$this->load->config('email');
        $this->load->library('email');
        
        $from = $this->config->item('smtp_user');
        $to = "muziyindojava@gmail.com";
        $subject = "Text mail";
        $message = "Text Message";

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
		
		
		
		
		
	}
	
	
	
	

}
	ob_clean();
?>
