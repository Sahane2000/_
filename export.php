<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "agriculture");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT name,sno,region,crop,aiker,stage,water_required FROM farmerinfo";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                          <th>Name</th>  
                         <th>Survey No</th>  
                         <th>Region</th>  
                          <th>Crop</th>  
                           <th>Aiker</th>  
                            <th>Stage</th>  
                             <th>water Required</th>   
      
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
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
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=downloadfarmerdata.xls');
  echo $output;
 }
}
?>
