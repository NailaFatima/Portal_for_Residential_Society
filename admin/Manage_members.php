<?php
  include_once 'header.php';
  include_once 'sidebar.php';
  include_once 'nav.php';
  include_once '../includes/functions.php';
  $msg="";
if(isset($_REQUEST['delmsg']))
{
    $delmsg=$_REQUEST['delmsg'];
    if($delmsg=="succ")
    {
        $msg="Member deleted....";
    }
}
?>
<script type="text/javascript">
function delete_member(memberid,ext)
{
    //alert("hi");
    if(memberid!="")
    {
        var delconf;
        delconf=confirm("Are you sure to delete the member?");
        //alert(delconf);
        if(delconf)
        {
            window.location.href="delete_member.php?delmemid="+memberid+"&extension="+ext;
        }            }}</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    	<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Manage Members</h4>
                                <p style="color: red;"> <?php echo $msg; ?></p>
                                 <a href="add_member.php" class="btn btn-lg pull-right" name="add_new">Add New Member</a>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Flat_no</th>
                                    	<th>Name</th>
                                    	<th>Image</th>
                                    	<th>Phone no</th>
                                    	<th>Rented/Owner</th>
                                    	<th>Action</th>
                                    </thead>
<tbody>
<?php
                    //*********** Fetch from database***********

                                        
                                        $num_rec_per_page=10;
                                        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
                                        $start_from = ($page-1) * $num_rec_per_page;
                                        $link= "manage_members.php"; 
                                        
                                    	$sql_sel_member="select * from tbl_members order by member_id desc";
                                    	$res_sel_member= mysqli_query($dblink,$sql_sel_member);
                                        $total_records=mysqli_num_rows($res_sel_member);
                                        $sql_sel_member = "select * from tbl_members ORDER BY member_id desc LIMIT $start_from, $num_rec_per_page"; 
                                        $res_sel_member = mysqli_query ($dblink,$sql_sel_member); //run the query
                                        
                                    	if(mysqli_num_rows($res_sel_member)>0)
                                    	{
                                    		while ($member_data=mysqli_fetch_assoc($res_sel_member))
                                    		 {
                                                if($member_data['profile_pic']!="nopic.jpg")
                                                 {
                                                     
                                                    $image_filename=$member_data['profile_pic'];
                                                    
                                                    $extension= get_ext("$image_filename");
                                                        
                                                     $thumbimage="../images/"."mem_thumb_".$member_data['member_id'].".".$extension;
                                                 }
                                                else {
                                                    $thumbimage="../images/"."nopic_thumb.jpg";
                                                    $extension=".jpg";
}   
                                            

?>
<tr>
                                            <td><?php echo $member_data['flatno'];  ?></td>
                                            <td><?php echo $member_data['fname']." ".$member_data['lname'];  ?></td>
                                            <td><img src="<?php echo $thumbimage; ?>"></td>
                                            <td><?php echo $member_data['phone1'];  ?></td>
                                            <td><?php echo $member_data['ac_type'];  ?></td>
                                            <td><a href="<?php echo 'update_member.php?member_id='.$member_data['member_id']; ?>">Modify</a>/<a href="#" onclick='delete_member(<?php echo $member_data['member_id'];?>,"<?php echo $extension; ?> ")'>Delete</a></td>
</tr>
<?php
    }
    }
?>
</tbody>
                                </table>
                            </div>
                            <!-- for pagination -->
                            <div style="text-align: center;">
                               <ul class="pagination">
                                
                                <?php echo pagination($num_rec_per_page,$start_from,$total_records,$link); ?>
                                
                              </ul> 
                            </div>
                        </div>          
                    </div>                    
                </div>       
            </div>
</div>
<?php
        include_once 'footer.php';
?>