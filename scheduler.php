<?php

//set db connection credentials
$servername = "localhost";
$username = "godiaxek_god";
$password = "N3tc0m@123__";
$dbname = "godiaxek_legal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "select proposed_end_date, other_party_name from contract where status = 'Signed_Off'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  $current_date = date('Y-m-d');
  $current_date =  strtotime($current_date);

  // output data of each row
  while ($row = $result->fetch_assoc()) {

    $proposed_end_date = $row["proposed_end_date"];
    $other_party_name = $row["other_party_name"];
    $id = $row["id"];

    $proposed_end_date =  strtotime($proposed_end_date);

    //this will compute date difference in seconds
    $date_diff_in_seconds = $proposed_end_date - $current_date;

    //this will compute number of days from seconds, 86400 seconds is in 1 day
    $date_diff_in_days = ($date_diff_in_seconds / 86400);

    /*echo $date_diff_in_days ;
    if($date_diff_in_days == 364)
    {
        
        $remaining_months_weeks = "3 Months";

        $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
        $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
        $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';

        require "emailer.php" ;
    }*/

    //in 3 months time
    if($date_diff_in_days == 90)
    {
        $remaining_months_weeks = "3 Months";
        
        $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
        $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
        $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';

    }
    //in 2 months, 3 weeks
    else if($date_diff_in_days == 83)
    {

      $remaining_months_weeks = "2 Months 3 Weeks";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';

    }
    //in 2 months, 2 weeks
    else if($date_diff_in_days == 76)
    {
      $remaining_months_weeks = "2 Months 2 Weeks";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';

    }
    //in 2 months, 1 week
    else if($date_diff_in_days == 69)
    {
      $remaining_months_weeks = "2 Months 1 Week";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';

    }
    //in 2 months
    else if($date_diff_in_days == 62)
    {
      $remaining_months_weeks = "2 Months";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';

    }
    //in 1 month, 3 weeks
    else if($date_diff_in_days == 55)
    {
      $remaining_months_weeks = "1 Month 3 Weeks";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';

    }
    //in 1 month, 2 weeks
    else if($date_diff_in_days == 48)
    {
      $remaining_months_weeks = "1 Month 2 Weeks";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';

    }
    //in 1 month, 1 week
    else if($date_diff_in_days == 41)
    {
      $remaining_months_weeks = "1 Months 1 Week";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';

    }
    //in 1 month
    else if($date_diff_in_days == 30)
    {
      $remaining_months_weeks = "2 Months";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';

    }
     //in 3 weeks
     else if($date_diff_in_days == 23)
     {
      $remaining_months_weeks = "3 Weeks";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';
 
     }
     //in 2 weeks
     else if($date_diff_in_days == 16)
     {
      $remaining_months_weeks = "2 Weeks";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';
 
     }
     //in 1 week
     else if($date_diff_in_days == 7)
     {
      $remaining_months_weeks = "1 Week";
      $subject_ = $other_party_name.' : Contract to expire in '.$remaining_months_weeks;
      $message = '<h1>'.$other_party_name.' Contract to expire in '.$remaining_months_weeks.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract will expire in '.$remaining_months_weeks.' time <br><br><b>Netcom Legal</b></p>';
 
     }
     //in 1 week
     else if($date_diff_in_days == 0)
     {
      $currenDate = date('Y-m-d');
      $subject_ = $other_party_name.' : Contract expires today ';
      $message = '<h1>'.$other_party_name.' Contract expires today - '.$currenDate.'</h1>';
      $message .= '<p>Hi, <br><br>Kindly be informed that '.$other_party_name.' Contract expires today <br><br><b>Netcom Legal</b></p>';

      $result = $conn->query("update contract set status = 'expired' where id = '$id'");
 
     }

  } //end while 

} //end if


$conn->close();
