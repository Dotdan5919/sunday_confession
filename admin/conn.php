<?php


/*
$conn = new mysqli("localhost", "root", "", "prediction_website");
 
 //Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
 
// Print host information
  //echo "Connect Successfully. Host info: " . $conn->host_info;
 
// Close connection
//$conn->close();
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname="sunday_confession";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";






?>