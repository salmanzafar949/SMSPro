<?php

$user = "root";
$host = "localhost";
$pass = "";
$db   = "sms";
// Create connection
$conn = new mysqli($host, $user, $pass);

/// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";
?>