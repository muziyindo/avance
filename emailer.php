<?php


// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer;

$mail->isSMTP();                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
$mail->SMTPAuth = true;               // Enable SMTP authentication
$mail->Username = 'netcomlegal@gmail.com';   // SMTP username
$mail->Password = 'gsruklbjezudzsan';   // SMTP password
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                    // TCP port to connect to

// Sender info
$mail->setFrom('netcomlegal@gmail.com', 'Netcom Legal');
$mail->addReplyTo('netcomlegal@gmail.com', 'Netcom Legal');

// Add a recipient
$mail->addAddress('muziyindojava@gmail.com');

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// Set email format to HTML
$mail->isHTML(true);

// Mail subject
$mail->Subject = $subject_ ;

// Mail body content
//$bodyContent = '<h1>'.$other_party_name.' Contract to expire in '.$date_diff_in_days.'</h1>';
$bodyContent = $message ;

$mail->Body  = $bodyContent;

// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
}


?>