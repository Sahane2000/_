<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "agriculture");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT region,total_water FROM water";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                          <th>Region</th>  
                         <th>Total water Required(mm)</th>  
                          
      
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
            <td>'.$row["region"].'</td>  
         <td>'.$row["total_water"].'</td> 
         
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=region_download.xls');
  echo $output;
 }
}
?>


