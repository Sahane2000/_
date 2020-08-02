<?php
require('db.php');
$mobile1=$_REQUEST['mobile1'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agriculture";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$mobile1=$_REQUEST['mobile1'];
$query = "DELETE FROM farmerinfo WHERE mobile1=$mobile1"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: view1.php"); 
?>
