<?php
require('db.php');
$idd=$_REQUEST['id'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agriculture";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT * from farmerinfo where mobile1='".$mobile1."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p><a href="dashboard1.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$name =$_REQUEST['name'];
$address =$_REQUEST['address'];
$mobile1 =$_REQUEST['mobile1'];
$region =$_REQUEST['region'];
$sno =$_REQUEST['sno'];
$aiker =$_REQUEST['aiker'];
$type =$_REQUEST['type'];
$crop1 =$_REQUEST['crop1'];
$update="update farmerinfo set name='".$name."', address='".$address."', mobile1='".$mobile1."', sno='".$sno."'where mobile1='".$mobile1."'";
mysqli_query($conn, $update) or die(mysqli_error($conn));
$status = "Record Updated Successfully. </br></br>
<a href='view1.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" 
required value="<?php echo $row['name'];?>" /></p>
<p><input type="text" name="address" placeholder="Enter Address" 
required value="<?php echo $row['address'];?>" /></p>
<p><input type="text" name="mobile1" placeholder="Enter Mobile" 
required value="<?php echo $row['mobile1'];?>" /></p>
<p><input type="text" name="sno" placeholder="Enter Satbara number" 
required value="<?php echo $row['sno'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>