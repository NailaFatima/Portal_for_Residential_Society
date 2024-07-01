<?php

// echo session_id();
ob_start();
  include_once 'header.php';
//   include_once 'sidebar.php';
//   include_once 'nav.php';
  include_once 'includes/functions.php';
  include_once 'includes/image_resize.php';
  define ("MAX_SIZE","10");
  $upd_mem_id= $_SESSION['id'];
    $errphno ="";
    $error_counter=0;
    $counter=0;
    $err_photo_msg="";
    $errph2="";
    $errt_mem="";
    $msg="";
    $featured="";
   if(isset($upd_mem_id))
   {
    $result= get_member_details($upd_mem_id,$dblink);
        if(is_array($result))
        {
            // echo "<pre>";
            // print_r($result);
            // echo "</pre>";
            // die();
            $flatno=$result['flatno'];
            $bldno=$result['bldno'];
            $fname=$result['fname'];
            $lname=$result['lname'];
            $email=$result['email_id'];
            $no_members=$result['total_mem_house'];
            $status=$result['status'];
            $phone_no= $result['phone1'] ;
            $phone_no2= $result['phone2'];
            $cur_image= $result['profile_pic'];
            if($cur_image!="nopic.jpg")
             {
             $extension= get_ext($cur_image);   
             $thumbimage="images/mem_thumb_".$upd_mem_id.".".$extension ;         
            }
            else
            {
                $thumbimage="images/nopic_thumb.jpg" ;
            }
    
        // echo "$thumbimage";
        // exit;
    // $thumbimage="images/"."nopic_thumb.jpg";
     $company=$result['Title'];
        $side_title=$result['Side_title'];
    $prof_email=$result['email'];
    $street=$result['street'];
    $landmark=$result['landmark'];
    $city=$result['city'];
    $postal=$result['postal'];
    $phone_prof= $result['phone_no'];
    $facebook=$result['facebook_url'];
    $twitter=$result['twitter_url'];
    $insta=$result['instagram_url'];
    $google_url=$result['google_url'];
    if($result['display']=='no')
    {
        $featured= 'off';
    }
    else
    {
        $featured='on';
    }
    $prof_pic=$result['images'];

    if($prof_pic!="default.jpg")
             {
             $extension= get_ext($prof_pic);   
             
             $prof_pic="images/businessImg/busi_".$result['member_id'].".".$extension ;         
            }
            else
            {
                $prof_pic="images/businessImg/default.jpg" ;
            }
    
    // $featured= $_POST['featured'];
    // $upd_mem_id=$_POST['member_id'];
    $discpt= $result['description'];
    }
   }
else
{
    
    
    $ac_type="";
    
    $company="";
    $prof_email="";
    $street="";
    $landmark="";
    $facebook="";
    $twitter="";
    $insta="";
    $google_url="";
    $no_members="";
    $discpt="";
    $side_title="";
    $phone_prof="";
       
}


   if(isset($_POST['update']))
   {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    
    
    if(preg_match( "/^[1-9][0-9]{9}$/", $_POST['phone2']))
    {
        $phone_no2= $_POST['phone2'];

    }
   else
   {
    $errph2= "Not a valid phone number";
    $counter=1;
   }
   if(preg_match("/^[1-9]$/", $_POST['total_members']))
   {
     $no_members= $_POST['total_members'];
   }
    else
    {
        $errt_mem= "Not Valid number";
        $counter=1;
    }
    if($counter==0)
    {
        $sql_upd_mem="update tbl_members set phone2='$phone_no2',  total_mem_house= '$no_members' where member_id='$upd_mem_id'";
        // echo $sql_upd_mem;
        $res_upd_mem= mysqli_query($dblink, $sql_upd_mem);
        if($res_upd_mem)
        {
            // echo "<pre>";
            // print_r($_FILES);
            // echo "</pre>";
                if($_FILES['profile_pic']['name']!="")
                   {
                      $image_file= $_FILES['profile_pic']['name'];
                      $tmp_file= $_FILES['profile_pic']['tmp_name'];
                      $new_extension= get_ext($image_file);
                      $valid_array=array("jpg","jpeg","gif","png");
                      if (!in_array($new_extension,$valid_array)) 
                     {
                        
                        $err_msg=" Only jpg,jpeg,png,gif files are allowed ";
                        $counter=1;
                     }
                     else
                     {
                        $newwidth=1000;
                        $newwidth1=100;
                        if($cur_image!="nopic.jpg")
                        {
                            $current_img_file="images/".$cur_image;
                            if (file_exists($current_img_file))
                             {
                                unlink($current_img_file);
                                $p_extension= get_ext($cur_image);
                                $current_thumb_img="images/"."mem_thumb_".$upd_mem_id.".".$p_extension;
                                if(file_exists($current_thumb_img))
                                {
                                    unlink($current_thumb_img);
                                }
                            }
                        }
                        $dest1="images/"."mem_".$upd_mem_id.".".$new_extension;
                        $dest2="images/"."mem_thumb_".$upd_mem_id.".".$new_extension;
                        $mem_pic_file="mem_".$upd_mem_id.".".$new_extension;
                         $e_msg=image_resize($image_file, $tmp_file, $newwidth, $newwidth1, $dest1, $dest2,$new_extension);
                         if($e_msg==1)
                         {
                             $sql_upd_mem="update tbl_members set profile_pic='$mem_pic_file' where member_id='$upd_mem_id'";
                             $res_updated_data= mysqli_query($dblink,$sql_upd_mem);
                            if($res_updated_data)
                            {
                                $msg="Member is Updated......";
                                // header("location:Manage_members.php");
                                ob_end_flush();
                            }
                         }
                          
                     }
                   }
               else
               {
                if($res_upd_mem)
                {
                     $msg= "updated";
                }
               }
            
        }
    }

   }

    
    
    
    if(isset($_POST['Add_prof']))
    {
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        // exit;
        $company=$_POST['company'];
        $side_title=$_POST['side_title'];
    $prof_email=$_POST['prof_email'];
    $street=$_POST['street'];
    $landmark=$_POST['landmark'];
    $city=$_POST['city'];
    $postal=$_POST['postal'];
    $phone_prof= $_POST['phone_prof'];
    $facebook=$_POST['facebook'];
    $twitter=$_POST['twitter'];
    $insta=$_POST['insta'];
    $google_url=$_POST['google_url'];
    //$featured_test=$_POST['featured'];
    if(isset($_POST['featured']))
    {
        $featured="Yes";
    }
    else
    {
        $featured="no";
    }
    
    // $featured= $_POST['featured'];
    $upd_mem_id=$_POST['member_id'];
    $discpt= $_POST['discpt'];
    if(is_array($_FILES))
    {
    
             if($_FILES['prof_pic']['tmp_name']!="")
        
             {
                $image_file= $_FILES['prof_pic']['name'];
                $extension= get_ext($image_file);
                $valid_array=array("jpg","jpeg","gif","png");
                if (!in_array($extension,$valid_array)) 
               {
                        
                $err_photo_msg=" Only jpg,jpeg,png,gif files are allowed ";
                $error_counter=1;
                }
                else
                {
                $size=filesize($_FILES['prof_pic']['tmp_name']);
     
                        if ($size > (MAX_SIZE*1024*1024))
                           {
                            $err_photo_msg="You have exceeded the size limit";
                            $error_counter=1;
                            }
            }
         }
     }
         // else
         // {
         //     $error_counter=0;
         // }

    
        
             if($error_counter==0)
             {
             $sql_ins_prof= "insert into  tbl_member_profession (member_id, title, Side_title, email, street, landmark, city, postal, phone_no, display, facebook_url, twitter_url, google_url, instagram_url, description) values ('$upd_mem_id', '$company', '$side_title', '$prof_email', '$street', '$landmark', '$city', '$postal', '$phone_prof', '$featured', '$facebook', '$twitter','$google_url', '$insta', '$discpt')";
             // echo $sql_ins_prof;
             $res_ins_prof= mysqli_query($dblink, $sql_ins_prof);
             if($res_ins_prof)
               {
                $new_prof_id= mysqli_insert_id($dblink);
                // echo "<pre>";
                // print_r($_FILES);
                // echo "</pre>"; 
                if($_FILES['prof_pic']['tmp_name']!="")
                {
                $file_up=$_FILES['prof_pic']['name'];
                  $tmpfile=$_FILES['prof_pic']['tmp_name'];
                  $extension= get_ext($file_up);
                   $dest="images/businessImg/busi_".$upd_mem_id.".".$extension;
                   $busi_image="busi_".$upd_mem_id.".".$extension;//database file name
                   if(move_uploaded_file($_FILES['prof_pic']['tmp_name'],$dest))
                        {
                            $sql_upt_prof= "update tbl_member_profession set images= '$busi_image' where mem_prof_id= '$new_prof_id'";
                   
                           $res_upt_prof= mysqli_query($dblink, $sql_upt_prof);
                           if($res_upt_prof)
                           {
                            $msg= "updated";
                           }
                           else
                           {
                            $msg= "try again";
                           }

                        }
                        else
                        {
                            $error_msg="There is an error while uploading ...............";
                        }
                   
              }
          else
          {
            if($res_ins_prof)
            {
                $msg="Updated";
            }
          }

        }
     }
     }

    // }



?>
    
            <div class="container">
              <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-8">
                        <div class="acard">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                                <p style="color: red;"><?php echo $msg; ?></p>
                            </div>
                            <hr>
                            <div class="content">
                                
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Flat No</label>
                                                <input type="text" name="flatno" class="form-control" disabled placeholder="Flat No" value="<?php echo $flatno;?>">
                                                <input type="hidden" name="member_id" value="<?php echo $upd_mem_id;?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bulding</label>
                                               
                                                <select name="bldno" class="form-control" disabled style="display: block;">
                                                    <option value="a" <?php if($bldno=="a") echo "selected";?>>A</option>
                                                    <option value="b" <?php if($bldno=="b") echo "selected";?>>B</option>
                                                    <option value="c" <?php if($bldno=="c") echo "selected";?>>C</option>
                                                </select>
                                            </div>
                                        </div>
                         
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" disabled name="email_id" class="form-control" placeholder="Email" value="<?php echo $email;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" disabled name="fname" class="form-control" placeholder="Company" value="<?php echo $fname;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" disabled name="lname" class="form-control" placeholder="Last Name" value="<?php echo $lname;?>">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="Password" name="pass" class="form-control" placeholder="Password" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="cpass" class="form-control" placeholder="confirm Password" value="">
                                            </div>
                                        </div>
                                    </div>

                                  
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone number 1</label>
                                                <input type="text" disabled name="phone1" class="form-control" placeholder="Phone number" value="<?php echo $phone_no;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Phone number 2</label>
                                                <input type="text" name="phone2" class="form-control" placeholder="Phone number" value="<?php echo $phone_no2;?>">
                                                <span class="help-block <?php if($errph2) echo 'invalid'; ?>" id="errph2"><?php echo $errph2;?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Total members</label>
                                                <input type="text" name="total_members" class="form-control" placeholder="Members in Family" value="<?php echo $no_members;?>">
                                                <span class="help-block <?php if($errt_mem) echo 'invalid'; ?>" id="errt_mem"><?php echo $errt_mem;?></span>

                                            </div>
                                        </div>
                          
                                    </div>
                                    <button type="submit" name="update" class="btn btn-info btn-fill pull-right">Update</button>
                                    <div class="clearfix"></div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="acard card-user">
                            <div class="image">
                              
                                <img src="images/asset/photo.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                 <div class="author">
                                     <a href="#">
                                    <img id="p_pic" class="pimg border-gray" src="<?php echo $thumbimage; ?>" alt="<?php echo $fname."".$lname; ?>"/>
                                        <span style="color: red;"><?php echo $err_photo_msg;?></span>
                                      <h4 class="title"><?php echo $fname."".$lname; ?>
                                      </h4>
                                    </a>
                                    <input class="form-control" onchange="readURL(this);"  type="file" name="profile_pic"/>
                                    <input type="hidden" name="cur_image"/>
                                
                                </div> 
                                          
                            </div>
                            <hr>
                                 <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="socicon-facebook"></i></button>
                                <button href="#" class="btn btn-simple"><i class="socicon-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="socicon-googleplus"></i></button>
                                <button href="#" class="btn btn-simple"><i class="socicon-instagram"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
                </form>
            </div>
            <hr>
            <div class="container">

                <div class="row">
                    <div class="content">
            
                    <div class="col-md-12">
                        <div class="acard">
                            <div class="header">
                                <h4 class="title">Display Your business or Shop(optional)</h4>
                            </div>
                            <hr>
                            <div class="content">
                                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Company</label>
                                                <input name="company" type="text" class="form-control" placeholder="Company" value="<?php echo $company; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Side Title</label>
                                                <input name="side_title" type="text" class="form-control" placeholder="Company_title" value="<?php echo $side_title; ?>">
                                            </div>
                                        </div>
                                
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input name="prof_email" type="email" class="form-control" placeholder="Email" value="<?php echo $prof_email; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input name="prof_pic" type="file" class="form-control" placeholder="Image here" value="<?php echo $prof_pic; ?>">
                                            </div>
                                         </div> 
                                    </div>

          

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Street</label>
                                                <input name="street" type="text" class="form-control" placeholder="Home Address" value="<?php echo $street; ?>">
                                            </div>
                                        </div>
                                    <!-- </div>

                                    <div class="row"> -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Landmark</label>
                                                <input name="landmark" type="text" class="form-control" placeholder="Street name" value="<?php echo $landmark; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input name="city" type="text" class="form-control" placeholder="City" value="<?php echo $city; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input name="postal" type="text" class="form-control" placeholder="ZIP Code" value="<?php echo $postal; ?>">
                                            </div>
                                        </div>
                                    </div>
                                              <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Facebook URL</label>
                                                <input type="url" name="facebook" class="form-control"  placeholder="Facebook" value="<?php echo $facebook;?>">
                                                <input type="hidden" name="member_id" value="<?php echo $upd_mem_id;?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Twitter URL</label>
                                                <input type="url" name="twitter" class="form-control"  placeholder="Twitter" value="<?php echo $twitter;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Instagram URL</label>
                                                <input type="url" name="insta" class="form-control"  placeholder="Instagram" value="<?php echo $insta;?>">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">google+ URL</label>
                                                <input type="url" name="google_url" class="form-control" placeholder="Google+" value="<?php echo $google_url;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>About Shop <small>(In few words)</small></label>
                                                <textarea name="discpt" rows="1" class="form-control" placeholder="Here can be your description" value="<?php echo $discpt; ?>"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Phone number </label>
                                                <input type="text" name="phone_prof" class="form-control" placeholder="Phone number" value="<?php echo $phone_prof;?>">
                                                <span class="help-block <?php if($errphpf) echo 'invalid'; ?>" id="errphpf"><?php echo $errphno?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                
                                                <input name="featured" value="display" type="checkbox">
                                                <label>Display on Website</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <button id="Add_prof" name="Add_prof" type="submit" onclick="actionHide()" class="btn btn-info btn-fill pull-right">Add Profile</button>
                                                <button id="upd_prof" name="updt_prof" style="display: none;" type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="clearfix"></div>
                                </form>
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

        function actionHide()
        {

            document.getElementById('Add_prof').style.display = 'none';
document.getElementById('upd_prof').style.display = 'block';
        }
        </script>
<?php 
          include_once 'footer.php';
?>