<?php
$servername = "localhost";
$database = "paulsbun_idaydream";
$username = "paulsbun_idd_app";
$password = "6kA3+Ap3yY53";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

echo "Connection attempt";


if ($conn->connect_error) {
  echo "Connection Error";
  die("Connection failed: " . $conn->connect_error);
}