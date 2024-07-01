<?php


function get_details($mid,$dblink)
{
    // returns an array having all details of news for given $nid
    
    $sql_sel_mem="select * from tbl_members where member_id='".$mid."'";
    $res_sel_mem=mysqli_query($dblink,$sql_sel_mem);
        
    if($res_sel_mem)
    {
       $result=  mysqli_fetch_assoc($res_sel_mem);
    }
    else
    {
        $result="";
    }
    return($result);
}
function get_member_details($mid,$dblink)
{
   $sql_sel_mem="select * from tbl_members m left JOIN tbl_member_profession p on m.member_id= p.member_id where m.member_id='".$mid."'";
    $res_sel_mem=mysqli_query($dblink,$sql_sel_mem);
        
    if($res_sel_mem)
    {
       $result=  mysqli_fetch_assoc($res_sel_mem);
    }
    else
    {
        $result="";
    }
    return($result);
}

function get_ext($filename)
{
	if($filename!="")
	{
		$file_name_array = explode(".",$filename);
		$cnt=count($file_name_array);
		$cnt--;
        $extension = strtolower($file_name_array[$cnt]);
		return $extension;
	}
}

// type: 1 admin
//       2 user

      // $_SESSION['user_id']=$data_user['userid']// primary key of table
      // $_SESSION['user_emailID']=$data_user['emailid']
      // $_SESSION['fname']=$data_user['fname']
      // $_SESSION['user_type']=$data_user['type']

      function isAdmin()
      {
        if((isset($_SESSION['emailid']) && $_SESSION['emailid']!="") && 
           isset($_SESSION['isadmin']) && $_SESSION['isadmin']=='Yes')
            return 1;
        else
             return 0;

      }
      
 function isLogin()
      {
        if(isset($_SESSION['emailid']) && $_SESSION['emailid']!="")
            return 1;
        else
             return 0;

      }
      
      
    
function pagination($num_rec_per_page,$start_from,$total_records,$link)
{
  $total_pages = ceil($total_records / $num_rec_per_page); 
  // $class="";  
    
  $pagination="<li class='page-item'><a class='page-link' href='$link?page=1'>First</a></li>"; 
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
        $pagination.="<li class='page-item'><a class='page-link' href='$link?page=".$total_pages."'>Last</a></li>"; // Goto last page
        return($pagination);
  
} 
?>