<?php 

$con = mysqli_connect('localhost','root','','completeregistration');
if($con){
    // echo  "connection successful";
}


$servername = "localhost";
$username = "root";
$password = ""; // default for XAMPP
$dbname = "completeregistration"; // change this

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

?>