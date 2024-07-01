<?php
 include_once '../includes/connect_db.php';
 $del_mem_id=$_REQUEST['delmemid'];
 $extension=$_REQUEST['extension'];
// echo "<pre>";
// print_r($_REQUEST);
// exit;
 if(isset($del_mem_id))
 {
 	$sql_del_mem= "delete from tbl_members where member_id='$del_mem_id'";
 	$res_del_mem= mysqli_query($dblink,$sql_del_mem);
 	if($res_del_mem)
 	{
 		$imagefile= "../images/mem_".$del_mem_id.".".$extension;
 		if(file_exists($imagefile))// delete news image
        {
            unlink($imagefile);
            
            $thumbimagefile="../images/"."mem_thumb_".$del_mem_id.".".$extension;
            
            if(file_exists($thumbimagefile)) // delete thumbnail
            {
               
              unlink($thumbimagefile);
               
            }
        }
 		header("location:manage_members.php?delmsg=succ");
 	}
 }
?>