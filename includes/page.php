<?php
function pagination($num_rec_per_page,$start_from,$total_records,$link)
{
  $total_pages = ceil($total_records / $num_rec_per_page); 
    
  $pagination="<li class='page-item'><a class='page-link' href='$link?page=1'>Previous</a></li> "; 

  
  for ($i=1; $i<=$total_pages; $i++)
 { 
            $pagination.="<li class='page-item'><a class='page-link' href='$link?page=".$i."'>".$i."</a></li>"; 

      } 
        $pagination.="<li class='page-item'><a class='page-link' href='$link?page=$total_pages'>".'Next'."</a></li>"; // Goto last page

        return($pagination);
  
} 
function pagination($num_rec_per_page,$start_from,$total_records,$link)
{
  $total_pages = ceil($total_records / $num_rec_per_page); 
  // $class="";  
    
  $pagination="<li class='page-item'><a class='page-link' href='$link?page'".$i-1">Previous</a></li>"; 
  if (isset($_GET["page"]))
  { 
    $page  = $_GET["page"];  
  } 
  else 
  { 
    $page=1;

  };

  for ($i=1; $i<=$total_pages; $i++)
 {     
    
     if($page==$i)
     {
            $pagination.="<li class='page-item'><a class='page-link active' href='$link?page=".$i."'>".$i."</a></li>"; 
      }
      else
      {
           $pagination.="<li class='page-item'><a class='page-link' href='$link?page=".$i."'>".$i."</a></li>";
      }
 } 
        $pagination.="<li class='page-item'><a class='page-link' href='$link?page=".$i+1"'>".$i."</a></li>"; // Goto last page
        return($pagination);
  
} 
?>