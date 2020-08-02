<?php
require('db.php');

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
<style>
body {
  background-image: url('agriculture.jpeg');
  background-repeat: no-repeat;
  background-attachment:fixed;
  background-size:cover;
  height:600px;
}
table,tr{
  border:1px solid black;
  
  border-spacing:5px;
  background-color:#dfcfbe;
}
td
{
  font-family:Arial;
  font-size:15pt;
}
</style>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body style="background-color:grey;">
<div class="form">
<h2 align="center"><a href="dashboard1.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></h2>
<h1 align='center'>Update Record</h1>
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
$crop =$_REQUEST['crop'];
$stage =$_REQUEST['stage'];
$update="update farmerinfo set aiker='".$aiker."', type='".$type."', crop='".$crop."', stage='".$stage."'where mobile1='".$mobile1."'";
mysqli_query($conn, $update) or die(mysqli_error($conn));
$status = "Record Updated Successfully. </br></br>
<a href='view1.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<table align='center'>
<tr>
<td>
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
</td>
</tr>
<tr>
<td>
<h4>Enter Acre<input type="text" name="aiker" placeholder="Enter Acre Details" 
required value="<?php echo $row['aiker'];?>" /></h4>
</td>
</tr>

<tr>
<td>
<h4>Enter Crop<input type="text" name="crop" placeholder="Enter Crop" 
required value="<?php echo $row['crop'];?>" /></h2>
</td>
</tr>
<tr>
<td>
<h4>Enter Stage<input type="text" name="stage" placeholder="Enter Crop Stage" 
required value="<?php echo $row['stage'];?>" /></h4>
</td>
</tr>
<tr>
<td>
<h4 align="center"><input name="submit" type="submit" class="btn btn-success"value="Update" /></h4>
</td>
</tr></table>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
