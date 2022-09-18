<?php

//Include packages and files for PHPMailer and SMTP protocol:
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

//Initialize PHP Mailer and set SMTP as mailing protocol:
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

//et required parameters for making an SMTP connection like server, port and account credentials.
$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "netcomlegal@gmail.com";
$mail->Password   = "oimjykzxpyuysrkw";




















?>