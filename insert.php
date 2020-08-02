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
     $region= $_POST['region'];
      $sno= $_POST['sno'];
       $aiker= $_POST['aiker'];
        $type= $_POST['type'];
         $crop= $_POST['crop'];
         
        
          $stage= $_POST['stage'];
          $humidity= $_POST['humidity'];
          $date1= $_POST['date1'];



$sql1 ="insert into farmerinfo(name,address,mobile1,region,sno,aiker,type,crop,imgname,pdfname,stage,humidity,date1) values ('$name','$address','$mobile1','$region','$sno','$aiker','$type','$crop','$imgname','$filename','$stage','$humidity','$date1')";


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
body {
  background-image: url('img.jpeg');
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

<style>
input,textarea{width:200px}
input[type=radio],input[type=checkbox]{width:10px}
input[type=submit],input[type=reset]{width:100px}
</style>
</head>

<body >
<form method="post" enctype="multipart/form-data">
<h3><a href="dashboard1.php">Dashboard</a> 
| <a href="view1.php">view inserted New Record</a> 
| <a href="logout.php">Logout</a></h3>
<h1>Insert Your Info</h1>
<table width="500" border="1"align="center">

 <tr>
    <td colspan="2"><?php echo @$msg; ?></td>
 </tr>
  <tr>
    <td width="159">Enter Your Name</td>
    <td width="218">
    <input type="text" placeholder="Your Name"  name="name" pattern="[a-z A-Z]*" required /></td>
  </tr>
  <tr>
    <td>Enter your Address</td>
    <td><textarea name="address" placeholder="Your Address" ></textarea></td>
  </tr>
   <tr>
    <td>Enter Your Mobile</td>
    <td><input type="text"  name="mobile1" pattern="[0-9]*" required/></td>
  </tr> 
  </tr>
  <tr>
    <td height="23">Select Your Region</td>
    <td>
  Nagar<input type="radio" name="region" value="nagar"/>
  Nashik<input type="radio" name="region" value="nashik"/>
  Akole<input type="radio" name="region" value="akole"/>
  Sangamner<input type="radio" name="region" value="sangamner"/>
  </td>
  </tr>
    <tr>
    <td>Enter Your(7/12) Number</td>
    <td><input type="text" pattern="[0-9]*" name="sno" /></td>
  </tr>
  <tr>
    <td>Enter Your Farm  Details In Acre</td>
    <td><input type="text" pattern="[0-9]*" name="aiker" /></td>
  </tr>
    <tr>
    <td>Choose Farm Type</td>
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
    <td>Choose crop Type</td>
    <td>
  Wheat<input type="radio" name="crop" value="Wheat"/>
  Onion<input type="radio" name="crop" value="Onion"/>
  Bajra<input type="radio" name="crop" value="Bajra"/>
  Jawar<input type="radio" name="crop" value="Jawar"/>
  Cotton<input type="radio" name="crop" value="Cotton"/>

  </td>
  </tr>
  <tr>
    <td>
     Select image to upload:
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
    <td height="23">Select your crop stage</td>
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
    <input type="submit"name="submit" class="btn btn-success"  value="Submit"><a href="dashboard1.php"></a></input>
    <input type="reset" name="reset" class="btn btn-success"></input>";
  
    </td>
  </tr>
 
</table>
</body>
</html>
