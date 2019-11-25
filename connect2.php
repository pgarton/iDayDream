<?php
$servername = "localhost";
$database = "dsloangr_idaydream";
$username = "dsloangr_adminuser";
$password = "Monday!99";

// Create connection

$cnxn = mysqli_connect($servername, $username, $password, $database);

// Check connection

echo "Connection attempt";


if ($cnxn->connect_error) {
    echo "Connection Error";
    die("Connection failed: " . $conn->connect_error);
}
