<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agriculture";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
include_once 'db.php';
 $database = new dbconnect();
    
    $db = $database->openConnection();
if (isset($_REQUEST["submit"]))
 {
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  $filename = $_FILES['myfile']['name'];
  $imgname=$_FILES['fileToUpload']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) 
    {
        echo "\nYou file extension must be .zip, .pdf or .docx";
    }
     elseif ($_FILES['myfile']['size'] > 1000000) 
     { // file shouldn't be larger than 1Megabyte
        echo "\nFile too large!";
    } 
    else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination))
         {
            $sql = "INSERT INTO files (name, size, downloads,imgname) VALUES ('$filename', $size, 0,'$imgname')";
            if (mysqli_query($conn, $sql))
             {
                echo "\nFile uploaded successfully";
            }
        } 
        else 
        {
            echo "\nFailed to upload file.";
        }
    }
  if($check !== false) 
  {
    echo "\nFile is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else 
  {
    echo "\nFile is not an image.";
    $uploadOk = 0;
  }
  if (file_exists($target_file))
 {
  echo "\nSorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000)
 {
  echo "\nSorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) 
{
  echo "\nSorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) 
{
  echo "\nSorry, your file was not uploaded.";
// if everything is ok, try to upload file
}
 else 
{
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
   {
    echo "\nThe image file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } 
  else 
  {
    echo "\nSorry, there was an error uploading your file.";
  }
}

     $name = $_POST['name'];
     $address = $_POST['address'];
     $mobile1 = $_POST['mobile1'];
      $region = $_GET['region'];
    
      
       $sno= $_POST['sno'];
        $aiker= $_POST['aiker'];
         $type= $_POST['type'];
          if (isset($_GET['crop'])) {
          $crop = $_GET['crop'];
          }
          $crop= $_POST['crop'];
           $stage= $_POST['stage'];
           $humidity= $_POST['humidity'];
           $date1= $_POST['date1'];
           $update="update farmerinfo set name='".$name."',address='".$address."'region='".$region."', sno='".$sno."',aiker='".$aiker."', type='".$type."', crop='".$crop."', stage='".$stage."',humidity='".$humidity."',date1='".$date1."', where mobile1='".$mobile1."'";
mysqli_query($conn, $update) or die(mysqli_error($conn));


$status = "Record Updated Successfully. </br></br>
<a href='view1.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';



if ($conn->query($sql1)=== TRUE) 
{
   echo "\nNew record created successfully.. .....";
} 
else 
{
    echo "Error: " . $conn->error;
}
}


$conn->close();
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Registration Form</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<style>
  div{
background-image: url(agriculture.jpg);
}
input,textarea{width:200px}
input[type=radio],input[type=checkbox]{width:10px}
input[type=submit],input[type=reset]{width:100px}
</style>
</head>

<body background="agriculture.jpg">
  <background src="agriculture.jpg" height="500%" width="300%" align="center"></background>

 
</table><form method="post" enctype="multipart/form-data">
<!--<h3><a href="dashboard1.php">Dashboard</a> 
| <a href="view1.php">view inserted New Record</a> 
| <a href="logout.php">Logout</a>
|<a href="upload.html">upload files</a></h3>-->
<h1>Insert Your Info</h1>
<table width="393" border="1"align="center" bgcolor="white">

 <tr>
 <td colspan="2"><?php echo @$msg; ?></td>
 </tr>
  <tr>
    <td width="159">Name</td>
    <td width="218">
    <input type="text" placeholder="name"  name="name" pattern="[a-z A-Z]*" required /></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><textarea name="address" placeholder="your address" ></textarea></td>
  </tr>
   <tr>
    <td> Enter your registerd Mobile No</td>
    <td><input type="text" pattern="[0-9]*" name="mobile1" /></td>
  </tr> name="mobile1" /></td>
  </tr>
  <tr>
    <td height="23">Select Region</td>
    <td>
  Nagar<input type="radio" name="region" value="nagar"/>
  Nashik<input type="radio" name="region" value="nashik"/>
  </td>
  </tr>
    <tr>
    <td> Survey No from 7/12</td>
    <td><input type="text" pattern="[0-9]*" name="sno" /></td>
  </tr>
  <tr>
    <td>farm  Area in acre</td>
    <td><input type="text" pattern="[0-9]*" name="aiker" /></td>
  </tr>
    <tr>
    <td>farm type</td>
    <td>
    <select id="farm" name="type">
    <option value="Plantation agriculture">Plantation agriculture</option>
     <option value="wet land farming">Wet Land Farming</option>
      <option value="dry land farming">Dry Land Farming</option>
       <option value="intensive farming">Plantation agriculture</option>
        <option value="subsistence agriculture">subsistence agriculture</option>
  </td>
  </tr>
  <tr>
    <td>Choose crop type</td>
    <td>
    onion<input type="radio" name="crop" value="jawar"/>
  jawar<input type="radio" name="crop" value="jawar"/>
  wheat<input type="radio" name="crop" value="wheat"/>
  bajra<input type="radio" name="crop" value="bajra"/>
  </td>
  </tr>
  <tr>
    <td>
     Select image to upload:s
     </td>
     <td>
  <input type="file" name="fileToUpload" id="fileToUpload">
  </td>
  </tr>
  <tr>
  <td>
  select pdf file:
  </td>
  <td>
   <input type="file" name="myfile"> <br>
    </td>
    </tr>
  <tr>
    <td height="23">Select crop stage</td>
    <td>
  1st stage<input type="radio" name="stage" value="1st stage"/>
  2nd stage<input type="radio" name="stage" value="2nd stage"/>
  3rd stage<input type="radio" name="stage" value="3rd stage"/>
  4th stage<input type="radio" name="stage" value="4th stage"/>
  </td>
  </tr>
  <tr>
    <td>Enter humidity in Region</td>
    <td><input type="text" pattern="[0-9]*" name="humidity" /></td>
  </tr>
  <tr>
  <tr>
    <td>Enter your date of crop landing</td>
    <td><input type="text" pattern="[0-9]*" name="date1" /></td>
  </tr>
    <td colspan="4" align="center">
    <input type="submit"name="submit" class="button" value="Submit"<a href="dashboard1.php"></a></input>
    <input type="reset" name="reset" class="button<a href='view1.php'>View Inserted  Record</a>";
  
    </td>
  </tr>
</body>
</html>
