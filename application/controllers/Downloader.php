<?php

//error_reporting(E_ERROR|E_WARNING);
error_reporting(0);

ob_start();
class Downloader extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('form_validation');
		//$this->load->library('encryption');
		$this->load->library('encrypt');
		$this->load->library('session');
	}

	//Download after document has been signed off
	function download_signed_documents($encrypted_key)
	{
		$docId = $encrypted_key;
		$query = $this->db->query("select path from signed_documents where id = '$docId'");
		foreach ($query->result() as $value) {
			$path = $value->path;
		}

		//replace white spaces in file name with html whitespaces
		$path = str_replace(' ', '%20', $path);

		$filePAthArray = explode("/", $path);

		$this->load->helper('file');
		$this->load->helper('download');

		ob_clean();
		$data = file_get_contents(base_url() . $path);

		$exten = explode(".", $filePAthArray[2]);

		//echo $filePAthArray[2] ;

		if ($exten[1] == "jpg") {
			$name = 'document.jpg';
		} else if ($exten[1] == "png") {
			$name = 'document.png';
		} else if ($exten[1] == "doc") {
			$name = 'document.doc';
		} else if ($exten[1] == "docx") {
			$name = $exten[0] . '.docx';
		} else if ($exten[1] == "xlsx") {
			$name = 'document.xlsx';
		} else if ($exten[1] == "pdf") {
			$name = 'document.pdf';
		} else if ($exten[1] == "ppt") {
			$name = 'document.ppt';
		} else if ($exten[1] == "pptx") {
			$name = 'document.pptx';
		}
		//$name = 'document.docx';
		force_download($name, $data);
	}


	function view_signed_documents($encrypted_key)
	{
		$docId = $encrypted_key;
		$query = $this->db->query("select path from signed_documents where id = '$docId'");
		foreach ($query->result() as $value) {
			$path = $value->path;
		}

		//replace white spaces in file name with html whitespaces
		$path = str_replace(' ', '%20', $path);

		$filePAthArray = explode("/", $path);

		$this->load->helper('file');
		$this->load->helper('download');

		ob_clean();
		$data = file_get_contents(base_url() . $path);

		$exten = explode(".", $filePAthArray[2]);

		//echo $filePAthArray[2] ;

		if ($exten[1] == "jpg") {
			$name = 'document.jpg';
		} else if ($exten[1] == "png") {
			$name = 'document.png';
		} else if ($exten[1] == "doc") {
			$name = 'document.doc';
		} else if ($exten[1] == "docx") {
			$name = $exten[0] . '.docx';
		} else if ($exten[1] == "xlsx") {
			$name = 'document.xlsx';
		} else if ($exten[1] == "pdf") {
			$name = 'document.pdf';
		} else if ($exten[1] == "ppt") {
			$name = 'document.ppt';
		} else if ($exten[1] == "pptx") {
			$name = 'document.pptx';
		}
		//$name = 'document.docx';
		//force_download($name,$data); 
		//echo base_url() . $path;

		// The location of the PDF file
		// on the server
		$filename = base_url() . $path;
		
		
		//echo (filesize($filename)."qq");
		echo $filename ;
		// Header content type
		//header("Content-type: application/pdf");

		//header("Content-Length: " . filesize($filename));

		// Send the file to the browser.
		//readfile($filename);
	}
}
