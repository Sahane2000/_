<?php
$connect = mysqli_connect("localhost", "root", "", "agriculture");
$sql = "SELECT name,sno,region,crop,aiker,stage,water_required FROM farmerinfo";  
$result = mysqli_query($connect, $sql);
?>
<html>  
 <head>  
  <title>Export MySQL data to Excel in PHP</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
   <h2><a href="regionexcel.php">View Region Wise Total Water Required</a></h2>
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br /> 
    <table class="table" border="1|0" align='center'>
     <tr>  
                         <th>Name</th>  
                         <th>Survey No</th>
                         <th>Region</th>  
                          <th>Crop</th>  
                           <th>Aiker</th>  
                            <th>Stage</th>  
                             <th>water Required</th>  
                              
      
                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
         <td>'.$row["name"].'</td>  
         <td>'.$row["sno"].'</td>  
         <td>'.$row["region"].'</td>  
          <td>'.$row["crop"].'</td> 
           <td>'.$row["aiker"].'</td> 
            <td>'.$row["stage"].'</td> 
             <td>'.$row["water_required"].'</td> 
        
       </tr>  
        ';  
     }
     ?>
    </table>
    <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
     <form method="post" action="alogout.php">
     <input type="submit" name="logout" class="btn btn-success" value="Logout" />
    </form>
   </div>  
  </div>  
 </body>  
</html>

