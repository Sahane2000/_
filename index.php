<?php
if (isset($_POST["submit"])) {
    include_once 'db.php';
    
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    
    $database = new dbconnect();
    
    $db = $database->openConnection();
    $sql1 = "select name, mobile,password from logindemo where mobile='$mobile'";
    
    $user = $db->query($sql1);
    $result = $user->fetchAll();
    $_SESSION['mobile'] = $result[0]['mobile'];
    
    if (empty($result)) {
        $sql = "insert into logindemo (name,mobile, password) values('$name','$mobile','$password')";
        
        $db->exec($sql);
        
        $database->closeConnection();
        $response = array(
            "type" => "success",
            "message" => "You have registered successfully.<br/><a href='login.php'>Now Login</a>."
        );
    } else {
        $response = array(
            "type" => "error",
            "message" => "mobile already in use."
        );
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up</title>
<link rel="stylesheet" type="text/css" href="styles.css">
<script>
    function signupvalidation(){
        var name = document.getElementById('name').value;
        var mobile = document.getElementById('mobile').value;
        var password = document.getElementById('password').value;
        var confirm_pasword = document.getElementById('confirm_pasword').value;
        
        
        var valid=true;

        if(name == ""){
            valid = false;
            document.getElementById('name_error').innerHTML = "required.";
        }

        if(mobile == ""){
            valid = false;
            document.getElementById('mobile_error').innerHTML = "required.";
        
        }

        if(password == "" ){
            valid = false;
            document.getElementById('password_error').innerHTML = "required.";
        }
        if(confirm_pasword == "" ){
            valid = false;
            document.getElementById('confirm_password_error').innerHTML = "required.";
        }

        if(password != confirm_pasword){
            valid = false;
            document.getElementById('confirm_password_error').innerHTML = "Both passwords must be same.";
        }

        return valid;
    }
    </script>
</head>
<body>
    <div class="demo-content">
        <?php
        if (! empty($response)) {
            ?>
        <div id="response" class="<?php echo $response["type"]; ?>"><?php echo $response["message"]; ?></div>
        <?php
        }
        ?>
        <form action="" method="POST"
            onsubmit="return signupvalidation()">
            <div class="row">
                <label>Name</label><span id="name_error"></span>
                <div>
                    <input type="text" class="form-control" name="name"
                        id="name" placeholder="Enter your name">

                </div>
            </div>

            <div class="row">
                <label>Mobile</label><span id="mobile_error"></span>
                <div>
                    <input type="text" name="mobile" id="mobile"
                        class="form-control"
                        placeholder="Enter your Mobile Number">

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
                <label>Confirm Password</label><span
                    id="confirm_password_error"></span>
                <div>
                    <input type="password" name="confirm_pasword"
                        id="confirm_pasword" class="form-control"
                        placeholder="Re-enter your password">

                </div>
            </div>


            <div class="row">
                <div align="center">
                    <button type="submit" name="submit"
                        class="btn signup">Sign Up</button>
                </div>
            </div>

            <div class="row">
                <div>
                    <a href="login.php"><button type="button" name="submit"
                        class="btn login">Login</button></a>
                </div>
            </div>
    
    </div>



    </form>
    </div>
</body>
</html>

 

   

