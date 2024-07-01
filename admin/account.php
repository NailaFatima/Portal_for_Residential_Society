<?php
ob_start();
  include_once 'header.php';
//   include_once 'sidebar.php';
//   include_once 'nav.php';
//   include_once '../includes/functions.php';
//   include_once '../includes/image_resize.php';
//   define ("MAX_SIZE","10");

    $flatno="";
    $bldno="";
    $fname="";
    $lname="";
    $email="";
    $msg="";
    $status="";
    $ac_type="";
    $error_counter=0;
    $err_photo_msg="";
    $thumbimage="../images/"."nopic_thumb.jpg";


//   if(isset($_POST['AddNew']))
//   {
//     if($_POST['flatno']=="")
//     {
//         $msg="Enter Flat number";
//         $error_counter=1;
//     }
//     else
//     {
//         $flatno=$_POST['flatno'];
//       }
//       if ($_POST['email_id']=="")
//        {
//         $msg="Enter Email address";
//          $error_counter=1;
//       }
//   else
//   {
//     $email=$_POST['email_id'];
//   }
//   if ($_POST['fname']=="")
//        {
//         $msg="Enter First name";
//          $error_counter=1;
//       }
//   else
//   {
//     $fname=$_POST['fname'];
//   }
//   if ($_POST['lname']=="")
//        {
//         $msg="Enter Last name";
//          $error_counter=1;
//       }
//   else
//   {
//     $lname=$_POST['lname'];
//   }
//   if ($_POST['phone1']=="")
//        {
//         $msg="Enter Phone number";
//          $error_counter=1;
//       }
//   else
//   {
//     $phone_no=$_POST['phone1'];
//   }
//   if($_FILES['profile_pic']['tmp_name']!="")
//     {  
//       $image_file=$_FILES['profile_pic']['name'];
//       $extension= get_ext($image_file);
//        $valid_array=array("jpg","jpeg","gif","png");

//         if (!in_array($extension,$valid_array)) 
//            {
                    
//             $msg=" Only jpg,jpeg,png,gif files are allowed ";
//             $error_counter=1;
//             }
//           else
//           {
//                 $size=filesize($_FILES['profile_pic']['tmp_name']);
 
//                     if ($size > (MAX_SIZE*1024*1024))
//                        {
//                         $err_photo_msg="You have exceeded the size limit";
//                         $error_counter=1;
//                         }

//           }
//     }
//   $status=$_POST['status'];
//   $ac_type=$_POST['ac_type'];
//   $bldno=$_POST['bldno'];
//     $arrive_date=$_POST['arrive_date'];
//     $registerd_date=date("Y-m-d H:i:s");
//     if($error_counter==0)
//     {
//         $sql_ins_mem= "insert into tbl_members (flatno,bldno,status,email_id,fname,lname,phone1,arrival_date,registered_date,ac_type) values ('$flatno','$bldno','$status','$email','$fname','$lname','$phone_no','$arrive_date','$registerd_date','$ac_type')";
//         $res_ins_mem= mysqli_query($dblink,$sql_ins_mem);
        
//         if($res_ins_mem)
//         {
//             $new_mem_id= mysqli_insert_id($dblink);

//             if($_FILES['profile_pic']['tmp_name']!="")
//             {
//                 $file_up=$_FILES['profile_pic']['name'];
//                   $tmpfile=$_FILES['profile_pic']['tmp_name'];
//                   $extension= get_ext($file_up);


//                         $newwidth=1000;
//                         $newwidth1=100;

//                         $dest1="../images/mem_".$new_mem_id.".".$extension;
//                         $dest2="../images/mem_thumb_".$new_mem_id.".".$extension;
                       
//                         $member_file="mem_".$new_mem_id.".".$extension;//database file name
//                         $er_msg= image_resize($file_up, $tmpfile, $newwidth, $newwidth1, $dest1, $dest2, $extension);
//                         if($er_msg=="1")
//                         {
//                             $sql_upd_mem="update tbl_members set profile_pic='$member_file' where member_id='$new_mem_id'";
//                             $res_upd_mem=mysqli_query($dblink,$sql_upd_mem);
//                             if($res_upd_mem)
//                             {
//                                 $msg="Member added......";
//                             }
//                             else
//                             {
//                                 $msg="Please try again......";
//                             }
//                         }
//                         else
//                         {
//                             $err_photo_msg=$er_msg;
//                         }         

//          }
//         header("location:Manage_members.php");
//           ob_end_flush();
//     }

// }
// }

?>
    <div class="content">
            <div class="container-fluid">
              <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="acard">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                                <p style="color: red;"><?php echo $msg; ?></p>
                            </div>
                            <div class="content">
                                
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Flat No</label>
                                                <input type="text" name="flatno" class="form-control"  placeholder="Flat No" value="<?php echo $flatno;?>">
                                                <input type="hidden" name="member_id" value="<?php echo $up_mem_id;?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bulding</label>
                                               
                                                <select name="bldno" class="form-control" style="display: block;">
                                                    <option value="a" <?php if($bldno=="a") echo "selected";?>>A</option>
                                                    <option value="b" <?php if($bldno=="b") echo "selected";?>>B</option>
                                                    <option value="c" <?php if($bldno=="c") echo "selected";?>>C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status" style="display: block;">
                                                	<option value="Active" <?php if($status=="Active") echo "selected";?>>Active</option>
                                                	<option value="Inactive" <?php if($status=="Inactive") echo "selected";?>>Inactive</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="email_id" class="form-control" placeholder="Email" value="<?php echo $email;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="fname" class="form-control" placeholder="Company" value="<?php echo $fname;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?php echo $lname;?>">
                                            </div>
                                        </div>
                                    </div>

                                  
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone number 1</label>
                                                <input type="number" name="phone1" class="form-control" placeholder="Phone number" value="<?php echo $phone_no;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Arrival Date</label>
                                                <input type="date" name="arrive_date" data-date-inline-picker="true" class="form-control" placeholder="Country" value="<?php echo $arrive_date;?>">

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Rented/Owner</label>
                                                <select class="form-control" name="ac_type" style="display: block;">
                                                	<option value="Owner" <?php if($ac_type=="Owner") echo "selected";?>>Owner</option>
                                                	<option value="Rented" <?php if($ac_type=="Rented") echo "selected";?>>Rented</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <button type="submit" name="AddNew" class="btn btn-info btn-fill pull-right">Add Profile</button>
                                    <div class="clearfix"></div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="acard card-user">
                            <div class="image">
                                <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/> -->
                                <img src="images/asset/photo.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img id="p_pic" class="avatar border-gray" src="<?php echo $thumbimage; ?>" alt="<?php echo $fname."".$lname; ?>"/>
                                        <p style="color: red;"><?php echo $err_photo_msg;?></p>
                                      <h4 class="title"><?php echo $fname."".$lname; ?>
                                      </h4>
                                    </a>
                                    <input class="form-control" onchange="readURL(this);"  type="file" name="profile_pic"/>
                                    <input type="hidden" name="cur_image"/>
                                
                                </div>                                
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
        <script type="text/javascript">
           function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#p_pic')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
<?php 
          include_once 'footer.php';
?>