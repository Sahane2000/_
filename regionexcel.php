<?php
$connect = mysqli_connect("localhost", "root", "", "agriculture");
$sql = "SELECT distinct(region),total_water FROM water";  
$result = mysqli_query($connect, $sql);
?>
<html>  
 <head>  
  <title>Region Wise Data</title>  
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
    <h2 align="center">Region Wise Data</h2><br /> 
    <table class="table" border="1|0" align='center'>
     <tr>  
                         <th>Region</th>  
                         <th>Total_Water Required(mm)</th>
                          
                              
      
                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
         <td>'.$row["region"].'</td>  
         <td>'.$row["total_water"].'</td>  
         
        
       </tr>  
        ';  
     }
     ?>
    </table>
    <br />
    <form method="post" action="exportregion.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
     <form method="post" action="alogout.php">
     <input type="submit" name="logout" class="btn btn-success" value="Logout" />
    </form>
   </div>  
  </div>  
 </body>   
</html>
