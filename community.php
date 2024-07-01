<?php
  include_once 'header.php';
   include_once 'side.php';
   include_once 'includes/functions.php';
   $msg="";
   
   if(isset($_REQUEST['succ']))
   {
    $succ= $_REQUEST['succ'];
       if($succ==0)
       {
        $msg="Friend Request has already been sent";
       }
     else if($succ==1)
     {
       $msg="You are already friends";
     }
      else if($succ==2)
      {
        $msg="Friend request is sent";
      }
      else
      {
        $msg= "Could not process the request";
      }
}
else
{
  $succ="";
}
if(isset($_REQUEST['aprd']))
{
  $approved= $_REQUEST['aprd'];
  if($approved==1)
  {
    echo "<script>
        $('.accept').closest('li').fadeout();
        

    </script>";
    $msg= "Friend request is approved";
  }
else if($approved==0)
  {
    echo "<script>
        
        $('.decline').closest('li').fadeout();

    </script>";
    $msg= "Friend request is declined";
  }
else
{
  $msg="Could not Process request";
}
}
   
?>

<section id="content" class="col-md-8">
        <div class="row">
            <div class="header">
                      <h4 class="title">Members</h4>
                      <h4 style="color:red;"><?php echo $msg; ?></h4>
                    </div>

          </div>
          <hr>
          <!-- <div id="banner"> -->
            <div class="row">
              <!-- <img src="images/pine.jpg" alt="pinetrees img"> -->
              <?php
              $num_rec_per_page=20;
        $link="community.php";
        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; } 
             $start_from = ($page-1) * $num_rec_per_page;
                  $sel_sql_mem= "select fname, lname, member_id, profile_pic from tbl_members where status='active'";
                  $res_sel_mem= mysqli_query($dblink, $sel_sql_mem);
                  $num_rows=mysqli_num_rows($res_sel_mem);
                  $sel_sql_mem= "Select fname, lname, member_id, profile_pic from tbl_members where status='active' LIMIT $start_from,$num_rec_per_page";
                  // echo $sel_sql_mem;
                  // exit;
                  $res_sel_mem= mysqli_query($dblink, $sel_sql_mem);
                  if(mysqli_num_rows($res_sel_mem)>0)
                  {
                    while ($member_data=mysqli_fetch_assoc($res_sel_mem))
                    {
                      if($member_data['member_id']!=$_SESSION['id'])
                      {
                      $fname=$member_data['fname'];
                      $lname=$member_data['lname'];
                      $mem_id=$member_data['member_id'];
                      $profile_pic=$member_data['profile_pic'];
                      // echo "<pre>";
                      //         print_r($member_data);
                      //          echo "</pre>";
                              // die();
                 ?>     
                   
              <div class="card col-md-2">
                <img width="100px" height="100px" class="card-img-top pimg" src="images/<?php echo $profile_pic; ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $fname.$lname; ?></h5>
                  
                  <a href="#" class="card-link"><i class="pe-7s-mail"></i></a>
                  <a href="request.php?id=<?php echo $mem_id; ?>" class="card-link"><i class="pe-7s-add-user"></i></a>
                </div>
              </div>
              <?php
            }
               }
                  }
              ?>
              
            </div>
            <div style="text-align: center;" class="row">
              <ul  class="pagination">
                                
                                <?php echo pagination($num_rec_per_page,$start_from,$num_rows,$link); ?>
                                
                              </ul> 
            </div>
          <!-- </div> -->          
        </section>
            </div>
          </div>
          
        </main>
        <?php
          include_once 'footer.php';
        ?>