<?php
/*  iDayDream Youth Summary
    Original Author:    Elijah Maret
    Last Modified by:   Elijah Maret
    Creation Date:      11/18/2019
    Last Modified Date: 11/22/2019
    Filename:           youthSummary.php
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Confirm Mass Email</title>

    <link rel="stylesheet" href="styles/confirmation.css">
</head>
<body>

<?php

require ('/home/paulsbun/connect.php');
//require ('connect.php');


$dreamers = $_POST['dreamerMode'];
$volunteers = $_POST['volunteerMode'];
$subject = $_POST['emailSubject'];
$body = $_POST['emailBody'];
$isValid = true;
$finalSuccess = true;
$mode = '';

if ($dreamers == 'yes'){
    if($volunteers == 'yes'){
        $mode = 'ALL';

    } else {
        $mode = "DREAMERS";

    }
}
else if ($volunteers == 'yes'){
    $mode = "VOLUNTEERS";

} else {
    $isValid = false;
}



// echo $sql; //copy/paste into phpMyAdmin to test

if ($mode == "DREAMERS" OR $mode == "ALL") {

    $sql = "SELECT email, guardian_email FROM `v_youth` WHERE active = 1;";
    $result = mysqli_query($cnxn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $dreamer = $row['email'];
        $guardian = $row['guardian_email'];
        $dreamer = trim($dreamer);
        $guardian = trim($guardian);

        $to = "$dreamer, $guardian";
    
        echo "<p> $to </p>";

        $headers = "From: Emaret2@mail.greenriver.edu\r\n";
        $headers .= "Reply-To: Emaret2@mail.greenriver.edu \r\n";


        $success = mail($to, $subject, $body, $headers);
        if (!$success) {
            $finalSuccess = false;
            echo "<p> Email failed to send to $to";
        }

    }
}
if ($mode == "VOLUNTEERS" OR $mode == "ALL"){

    $sql = "SELECT email FROM `v_volunteers` WHERE active = 1;";
    $result = mysqli_query($cnxn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $volunteer = $row['email'];
        $volunteer = trim($to);
        
        $to = "$volunteer";
        
        echo "<p> $to </p>";
        
        $headers = "From: Emaret2@mail.greenriver.edu\r\n";
        $headers .= "Reply-To: Emaret2@mail.greenriver.edu \r\n";

        $success = mail($to, $subject, $body, $headers);
        if (!$success) {
            $finalSuccess = false;
            echo "<p> Email failed to send to $to";
        }

    }
}

if($finalSuccess){
    echo "<p> All emails have been sent</p>";
}



?>

</body>
</html>

