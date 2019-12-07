<?php
/**
 * iDayDream Volunteer Update Status Form
 * Original Author:    Dallas Sloan
 * Last Modified by:   Dallas Sloan
 * Creation Date:      11/30/2019
 * Last Modified Date: 11/30/2019
 *  Filename:          updateStatusVol.php
 */


//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

$user = posix_getpwuid(posix_getuid());
$userDir = $user['dir'];
require ("$userDir/connect.php");

// connect 2 was used to create changes locally
//require('connect2.php');

var_dump($_POST);

$status = $_POST["status"];
$vID = $_POST["vID"];
$status = mysqli_real_escape_string($cnxn, $status);
$vID = mysqli_real_escape_string($cnxn, $vID);

$sql = "UPDATE volunteers
        SET active = '$status'
        WHERE id = '$vID'";

$result = mysqli_query($cnxn, $sql);

if($result){
    echo "<br>Successful";
}

