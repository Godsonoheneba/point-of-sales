<?php 

include 'session.php';
include 'strings.php';




$hostname = "localhost"; // the hostname you created when creating the database
$username = "root";      // the username specified when setting up the database
$password = "";      // the password specified when setting up the database
$passwordSSSS = "godson@0548";      // the password specified when setting up the database
$database = "cshop";      // the database name chosen when setting up the database 

$conn = mysqli_connect($hostname, $username, $password, $database);
if (mysqli_connect_errno()) {
   die("Connect failed: %s\n" + mysqli_connect_error());
   exit();
   logout();
}




?>
