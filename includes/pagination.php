<?php

// include_once("includes/connect_db.php");
$dblink=mysqli_connect("localhost","root","","mystore");


function pagination($num_rec_per_page,$start_from,$total_records,$link)
{
  $total_pages = ceil($total_records / $num_rec_per_page); 
    
  $pagination="<a href='$link?page=1'>".' First '."</a> "; 
  
  for ($i=1; $i<=$total_pages; $i++)
 { 
            $pagination.="<a href='$link?page=".$i."'>".$i."</a> "; 
      } 
        $pagination.="<a href='$link?page=$total_pages'>".' Last '."</a> "; // Goto last page
        return($pagination);
  
} 

$num_rec_per_page=10;
//$link=$_SERVER['PHP_SELF'];

$link="http://localhost/demo/pagination1.php";

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 

$start_from = ($page-1) * $num_rec_per_page; 


$sql = "SELECT prod_id FROM tbl_product"; 
$rs_result = mysqli_query($dblink,$sql); //run the query

$total_records = mysqli_num_rows($rs_result);  //count number of records



$sql = "SELECT * FROM tbl_product LIMIT $start_from, $num_rec_per_page"; 

$rs_result = mysqli_query ($dblink,$sql); //run the query
?> 
<table border="1">
<tr><td>Sr.No.</td><td>Name</td><td>Phone</td></tr>
<?php 
$srno=1;
while ($row = mysqli_fetch_assoc($rs_result)) { 
?> 
            <tr>
              <td><?php echo $srno;?></td>
            <td><?php echo $row['prod_name']; ?></td>
            <td><?php echo $row['prod_author']; ?></td>            
            </tr>
<?php
$srno++; 
}
?> 
<tr><td colspan="3" align="center"><?php echo pagination($num_rec_per_page,$start_from,$total_records,$link);?></td></tr>
</table>
