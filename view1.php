<?php
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
table,tr{
  border:3px solid black;
  
  border-spacing:5px;
  background-color:#dfcfbe;
}
td
{
  font-family:Arial;
  font-size:15pt;
}
body {
  background-image: url('img.jpeg');
  background-repeat: no-repeat;
  background-attachment:fixed;
  background-size:cover;
  height:600px;
}
</style>
<meta charset="utf-8">
<h2><title align='center'>View Records</title></h2>
<link rel="stylesheet" href="css/styles.css" />
</head>
<body>
	<form method="post" onsubmit="submit">
	<table align='center'>
	<tr>
	<td>
	<label align='center'>Enter your Registered Mobile No</label>
	</td>
	<td>
	<input type=text aloign='center'name="mobile1">
	</td>
	</tr>
	<tr>
	<td>
	 <input type="submit"name="submit" class="button" value="Submit">
	 </td>
	 </tr>
	</form>
<div class="form">
<h2 align='center'><a href="index2.php">Home</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></h2>
<h2 align='center'>View Your Records </h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Name</strong></th>
<th><strong>Address</strong></th>
<th><strong>Mobile</strong></th>
<th><strong>Region</strong></th>
<th><strong>Satbara no</strong></th>
<th><strong>Aiker</strong></th>
<th><strong>Type</strong></th>
<th><strong>Crop</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agriculture";
if (isset($_REQUEST["submit"]))
{
  $mobile1 = $_POST['mobile1'];
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$count=1;
$sel_query="Select * from farmerinfo where mobile1 = '$mobile1'";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["name"]; ?></td>
<td align="center"><?php echo $row["address"]; ?></td>
<td align="center"><?php echo $row["mobile1"]; ?></td>
<td align="center"><?php echo $row["region"]; ?></td>
<td align="center"><?php echo $row["sno"]; ?></td>
<td align="center"><?php echo $row["aiker"]; ?></td>
<td align="center"><?php echo $row["type"]; ?></td>
<td align="center"><?php echo $row["crop"]; ?></td>




<td align="center">
<a href="edit.php?mobile1=<?php echo $row["mobile1"]; ?>">Edit</a>
</td>
<td align="center">
<a href="delete.php?mobile1=<?php echo $row["mobile1"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>
