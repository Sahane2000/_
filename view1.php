<?php
require('db.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/styles.css" />
</head>
<body>
	<form method="post" onsubmit="submit">
	<label>Enter your Registered Mobile No</label>
	<input type=text name="mobile1">
	 <input type="submit"name="submit" class="button" value="Submit">
	</form>
<div class="form">
<p><a href="index2.php">Home</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h2>View Records</h2>
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
$sel_query="Select * from farmerinfo where mobile1=$mobile1";
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
