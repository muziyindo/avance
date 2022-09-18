<?php

error_reporting(E_ERROR | E_WARNING);

class Account extends CI_Controller
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

	function index()
	{
		$data['title'] = 'Login Page';
		//$this->load->view('header/login_header',$data);
		$this->load->view('content/login', $data);
		//$this->load->view('footer/footer');

	}

	function authenticate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$check = $this->db->query("SELECT * FROM users WHERE username='$username' and is_active='1'");

		if ($check->num_rows() > 0) {

			$pword = $this->db->query("SELECT password FROM users WHERE username='$username' and is_active='1'");
			$pword = $pword->result();

			//$decrypted_password = $this->encrypt->decode($pword[0]->password);

			$verify = password_verify($password, $pword[0]->password);

			if ($verify == 1) {
				//if($decrypted_password==$password)
				//{

				//get user details
				foreach ($check->result() as $value) {
					$uid = $value->id;
					$username = $value->username;
					$name = $value->fullname;
					$role = $value->role;
					$email = $value->email;
					$pimage = $value->profile_image;
					//$lname = $value->lname ;


				}

				//store user details in session
				$this->session->set_userdata('userid', $uid);
				$this->session->set_userdata('uname', $username);
				$this->session->set_userdata('name', $name);
				$this->session->set_userdata('role', $role);
				$this->session->set_userdata('email', $email);
				$this->session->set_userdata('pimage', $pimage);

				//echo "success-2";

				redirect('App', 'refresh');
			} else {
				$this->session->set_flashdata('message', 'invalid_password');
				redirect('Account');
				//echo "success-3";


			}
		} else {
			$this->session->set_flashdata('message', 'invalid_user');
			redirect('Account');
			//echo "success-4";
		}
	}

	function ssoConfirmation()
	{
		if (array_key_exists('access_token', $_POST)) {

			//$_SESSION['t'] = $_POST['access_token'];
			$this->session->set_userdata('t', $_POST['access_token']);

			//$t = $_SESSION['t'];
			$t = $this->session->userdata('t');

			$ch = curl_init();

			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Authorization: Bearer ' . $t,

				'Conent-type: application/json'
			));

			curl_setopt($ch, CURLOPT_URL, "https://graph.microsoft.com/v1.0/me/");

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$rez = json_decode(curl_exec($ch), 1);

			//if microsoft session expired
			if (array_key_exists('error', $rez)) {
				//var_dump($rez['error']);
				$this->logout();
				die();
				
			} else {
				//$_SESSION['msatg'] = 1;  //auth and verified
				$this->session->set_userdata('msatg', 1);

				//$_SESSION['uname'] = $rez["displayName"];
				$this->session->set_userdata('uname', $rez["displayName"]);

				//$_SESSION['id'] = $rez["id"];
				$this->session->set_userdata('id', $rez["id"]);
				
				
				$this->session->set_userdata('email', $rez["mail"]);
			}

			curl_close($ch);
			header('https://legal.godicham.com/index.php/Account/ssoConfirmation');
		}

		$app = $this->session->userdata('msatg');
		$displayName = $this->session->userdata('uname');
		$email = $this->session->userdata('email');
		

		$query = $this->db->query("select id,role,profile_image from users where email = '$email'");
		
		//check if user record already exist on app user table, if true, set session, redirect user to the app
		if($query->num_rows() == 1)
		{
			//get user id from user table
			$result = $query->result();
			$uid = $result[0]->id ;
			$role = $result[0]->role ;
			$pimage = $result[0]->profile_image ;
			
			//set session
			 $this->session->set_userdata('userid', $uid);
			$this->session->set_userdata('name', $displayName);
			$this->session->set_userdata('role', $role);
			$this->session->set_userdata('email', $email);
			$this->session->set_userdata('pimage', $pimage);
			redirect('App', 'refresh');
		}
		else //insert user microsoft record on table, save it in session and redirect user to app
		{
			if ($email == "o.olarewaju@netcomafrica.com" || $email == "c.eki@netcomafrica.com" || $email == "n.jacob@netcomafrica.com")
			{
				$role = "Legal Officer";
			}
			else
			{
				$role = "Contract Requestor";
			}

			$data = array(
				"fullname" => $displayName,
				"email" => $email,
				"role" => $role,
				"profile_image" => "uploads/pimages/1653567332avatarq.png",
				"is_active" => 1,
				"date_created" => date('Y-m-d'),
				"last_modified" => date('Y-m-d'),
			);
			$this->db->insert("users", $data);
			$insertId = $this->db->insert_id();
			$pimage = "uploads/pimages/1653567332avatarq.png";

			//set session
			$this->session->set_userdata('userid', $insertId);
			$this->session->set_userdata('name', $displayName);
			$this->session->set_userdata('role', $role);
			$this->session->set_userdata('email', $email);
			$this->session->set_userdata('pimage', $pimage);
			redirect('App', 'refresh');

		}
		
		
	}

	function logout()
	{
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');

		//sso related
		$this->session->unset_userdata('msatg');
		$this->session->unset_userdata('uname');
		$this->session->unset_userdata('email');


		header('Location: https://www.office.com/estslogout?ru=%2F');
		//redirect(site_url('Account'));
	}
}//end controller class
