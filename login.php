<?php
session_start();
if (isset($_POST["submit"])) {
    include_once 'db.php';
    
    $mobile = $_POST['mobile'];
    $password =$_POST['password'];
    
    $database = new dbconnect();
    $conn = mysqli_connect("localhost", "root", "", "agriculture");
    
$sql= "SELECT * FROM logindemo WHERE mobile= '$mobile' AND password = '$password' ";
$result = mysqli_query($conn,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){
echo 'success';
header('location: dashboard1.php');
}else{
echo 'failure login use proper login details... ';
}
 $database->closeConnection();
    
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<script>
    function loginvalidation(){
        var mobile = document.getElementById('mobile').value;
        var password = document.getElementById('password').value;

        var valid = true;

        if(mobile== ""){
        	   valid = false;
            document.getElementById('mobile_error').innerHTML = "required.";
        }

        if(password == ""){
        	   valid = false;
            document.getElementById('password_error').innerHTML = "required.";
        }
        return valid;
    }
    </script>
</head>
<body>
    <div class="demo-content">
        <form action="" method="POST"
            onsubmit="return loginvalidation();">


            <div class="row">
                <label>Mobile</label> <span id="mobile_error"></span>
                <div>
                    <input type="text" name="mobile" id="mobile"
                        class="form-control"
                        placeholder="Enter your mobile number">
                </div>
            </div>

            <div class="row">
                <label>Password</label><span id="password_error"></span>
                <div>
                    <input type="Password" name="password" id="password"
                        class="form-control"
                        placeholder="Enter your password">

                </div>
            </div>
            <div class="row">
                <div>
                    <button type="submit" name="submit"
                        class="btn login">Login</button>
                </div>
            </div>
            <div class="row">
                <div>
                    <a href="index.php"><button type="button"
                            name="submit" class="btn signup">Signup</button></a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>