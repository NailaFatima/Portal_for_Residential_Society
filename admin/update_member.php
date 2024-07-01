<?php
    ob_start(); 
  include_once 'header.php';
  include_once 'sidebar.php';
  include_once 'nav.php';
  include_once '../includes/functions.php';
  include_once '../includes/image_resize.php';

  $up_mem_id=$_REQUEST['member_id'];
	  if(isset($up_mem_id))
	  {
	  	$result= get_details($up_mem_id,$dblink);
	  	if(is_array($result))
	  	{
	  		// echo "<pre>";
	  		// print_r($result);
	  		// echo "</pre>";
	  		// die();

	  		$member_id=$result['member_id'] ;
    		$email= $result['email_id'] ;
    		$fname= $result['fname'] ;
			$lname=$result['lname'] ;
			$flatno= $result['flatno'] ;
			$bldno= $result['bldno'];
			 $status= $result['status'] ;
			 $ac_type= $result['ac_type'] ;
			 $arrive_date= $result['arrival_date'] ;
			 $phone_no= $result['phone1'] ;
			$cur_image= $result['profile_pic'];
			 
			 if($cur_image!="nopic.jpg")
			 {
			 $extension= get_ext($cur_image);	
			 $thumbimage="../images/"."mem_thumb_".$result['member_id'].".".$extension ;		 
			}
			else
			{
				$thumbimage="../images/"."nopic_thumb.jpg" ;
			}
	  	}
	  }
	else
    {
	  $flatno= "";
    
	$fname="";
	$lname="";
	$email="";
    $bldno="";
	$phone_no="";
	$arrive_date="";
	$ac_type="";
	$status="";
	$cur_image="../images/"."nopic.jpg";
	}
	
	$msg="";
	$error_counter=0;
    $err_msg="";

   if(isset($_POST['update']))
   {

		  //  	$flatno=$_POST['flatno'];
		  // $fname=$_POST['fname'];
		  // $lname=$_POST['lname'];
		  // $email= $_POST['email_id'];
		  // $phone_no= $_POST['phone1'];
		  //$arrive_date= $_POST['arrival_date'];
          $bldno = $_POST['bldno'];
		  $ac_type= $_POST['ac_type'];
		  $status= $_POST['status'];
		  //$cur_image= $_POST['profile_pic'];
          
		  if ($_POST['flatno']=="")
			   	 {
			   		$msg="flat number is required";
			   		$error_counter=1;
			   	}
			   else{ $flatno= $_POST['flatno']; }
			   	 
			  
			   
			   	if ($_POST['email']=="")
			   	 {
			   		$msg="Email address is required";
			   		$error_counter=1;
			   	}
			   else
			   {
			   	 $email= $_POST['email'];
			   }
			   if ($_POST['fname']=="")
			   	 {
			   		$msg="First name is required";
			   		$error_counter=1;
			   	}
			   else
			   {
			   	 $fname= $_POST['fname'];
			   }
			   if ($_POST['lname']=="")
			   	 {
			   		$msg="last name is required";
			   		$error_counter=1;
			   	}
			   else
			   {
			   	 $lname= $_POST['lname'];
			   }
			   if ($_POST['phone1']=="")
			   	 {
			   		$msg="Phone number is required";
			   		$error_counter=1;
			   	}
			   else
			   {
			   	 $phone_no= $_POST['phone1'];
			   }
               
               
		if($error_counter==0)
		{

			$sql_udt_member="update tbl_members set flatno='".$flatno."',bldno='".$bldno."',email_id='".$email."',fname='".$fname."',lname='".$lname."',phone1='".$phone_no."',ac_type='".$ac_type."',status='".$status."' where member_id='".$up_mem_id."'";
			$res_updated_data= mysqli_query($dblink,$sql_udt_member);
			
			
				if ($res_updated_data) 
				{
                   if($_FILES['profile_pic']['name']!="")
                   {
                      $image_file= $_FILES['profile_pic']['name'];
                      $tmp_file= $_FILES['profile_pic']['tmp_name'];
                      $new_extension= get_ext($image_file);
                      $valid_array=array("jpg","jpeg","gif","png");
                      if (!in_array($new_extension,$valid_array)) 
                     {
                        
                        $err_msg=" Only jpg,jpeg,png,gif files are allowed ";
                        $error_counter=1;
                     }
                     else
                     {
                        $newwidth=1000;
                        $newwidth1=100;
                        if($cur_image!="nopic.jpg")
                        {
                            $current_img_file="../images/".$cur_image;
                            if (file_exists($current_img_file))
                             {
                                unlink($current_img_file);
                                $p_extension= get_ext($cur_image);
                                $current_thumb_img="../images/"."mem_thumb_".$up_mem_id.".".$p_extension;
                                if(file_exists($current_thumb_img))
                                {
                                    unlink($current_thumb_img);
                                }
                            }
                        }
                        $dest1="../images/"."mem_".$up_mem_id.".".$new_extension;
                        $dest2="../images/"."mem_thumb_".$up_mem_id.".".$new_extension;
                        $mem_pic_file="mem_".$up_mem_id.".".$new_extension;
                         $e_msg=image_resize($image_file, $tmp_file, $newwidth, $newwidth1, $dest1, $dest2,$new_extension);
                         if($e_msg==1)
                         {
                             $sql_upd_mem="update tbl_members set profile_pic='$mem_pic_file' where member_id='$up_mem_id'";
                             $res_updated_data= mysqli_query($dblink,$sql_upd_mem);
                            if($res_updated_data)
                            {
                                // $msg="Member is Updated......";
                                header("location:Manage_members.php");
                                ob_end_flush();
                            }
                         }
                          
                     }
                   }
               else
                {
                    if($res_updated_data)
                    {
                        // $msg="Member is Updated......";
                        header("location:Manage_members.php");
                        ob_end_flush();
                        
                    }
                }

			      // echo "<pre>";
         //          print_r($_FILES);
         //          echo "</pre>";
         //          exit;
					
				}
			
			
			else
			{
				$msg="error in query";	
			}
			
		}
}
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                                <p style="color: red;"><?php echo $msg; ?></p>
                            </div>
                            <div class="content">
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
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
                                                <!-- <input type="text" class="form-control" placeholder="Username" value="michael23"> -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email;?>">
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

                                  <!--   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                                            </div>
                                        </div>
                                    </div>
 -->
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

                                    <!-- <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                            </div>
                                        </div>
                                    </div> -->

                                    <button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <!-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/> -->
                                <img src="../images/backphoto.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <!-- <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/> -->
                                    <img id="p_pic" class="avatar border-gray" src="<?php echo $thumbimage; ?>" alt="<?php echo $fname."".$lname; ?>"/>
                                        <p style="color: red;"><?php echo $err_msg ?></p>
                                      <h4 class="title"><?php echo $fname."".$lname;?><br />
                                         <!-- <small>michael24</small> -->
                                      </h4>
                                    </a>
                                    <input class="form-control" type="file" onchange="readURL(this);" name="profile_pic"/>
                                    <input type="hidden" name="cur_image"/>
                                </form>
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