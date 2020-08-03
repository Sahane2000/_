<html>
 <body>
  <head>
   <title>
     run
   </title>
  </head>
<form method="post" onsubmit="submit">
	<label>Enter your Registered Mobile No</label>
	<input type=text name="mobile1">
	 <input type="submit"name="submit" class="button" value="Submit">
   </form>
 </body>
</html>

<?php
//$command = escapeshellcmd('C:\Users\LENOVO\PycharmProjects\PDFExtract\extract1.py');
//$output = shell_exec($command);
//echo $output;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agriculture";
	if(isset($_POST['submit']))
	{
		#$output=shell_exec("python C:\Users\LENOVO\PycharmProjects\PDFExtract\extract1.py");
		#echo $output;
		#echo"success";
		$mobile1 = $_POST['mobile1'];
	}
$conn = new mysqli($servername, $username, $password, $dbname);
$count=1;
$sel_query="Select user from farmerinfo where mobile1=$mobile1";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
    if($row[0]='valid')
    {
    echo'the data you entered is validated and accepted';
    header("Location:1.php");	
    }	
    elseif($row[0]='invalid')
    {
      echo'validation fails please update your data with filling correct information about survey no';
      header("Location:update1.php");
    }
 }

?>
