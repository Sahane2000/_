<?php
require('db.php');
$id=$_REQUEST['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agriculture";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$id=$_REQUEST['id'];
$query = "DELETE FROM farmerinfo WHERE id=$id"; 
$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: view1.php"); 
?>