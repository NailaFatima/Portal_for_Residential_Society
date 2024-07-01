<?php
  session_start();
  include_once("includes/connect_db.php");

  if(isset($_SESSION['emailid']) && $_SESSION['emailid']!="")
  {
     header("location: community.php");
          exit;
  }

     $msg= "";

    if(isset($_POST['submit']))
{
          // echo "in submit";
          $emailid= $_POST['emailid'];
          $password= $_POST['password'];

          if($emailid=="" || $password=="")
          {
               $msg= "Please fill all details";
          }
          else
          {
               // echo "in else";
             $md5_pass= md5($password);
              $sel_user= "select * from tbl_members where email_id='$emailid' and password='$md5_pass' ";
              $rec_user= mysqli_query($dblink,$sel_user);
              if($rec_user)
              {
                // echo "record is set";
                // exit;
                 if(mysqli_num_rows($rec_user)>0)
               {
                    

                    $data_user= mysqli_fetch_assoc($rec_user);
                    
                    if($data_user['status']=='Active')
                    {
                         // $_SESSION['email_id']=$data_user['email_id'];
                      $_SESSION['id']=$data_user['member_id'];
                         $_SESSION['fname']=$data_user['fname'];
                         $_SESSION['lname']=$data_user['lname'];
                         $_SESSION['emailid']= $data_user['email_id'];
                         $_SESSION['profile_pic']= $data_user['profile_pic'];
                         $_SESSION['isadmin']= $data_user['isadmin'];
                         header("LOCATION: community.php");
                         exit;

                    }
                    else
                    {
                         $msg="Your account is inactive, contact us";
                    }
                 }
                 else
                 {
                    $msg="No Record Found";
                 }

              }
              else
              {
                $msg="Invalid User";
               }
         }
     }


?>


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
     <link href="css/bootstrap.css" rel="stylesheet">
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.js"></script>
     <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
     <script type="text/javascript">


     function show_pwd()
     {
          var psw= document.getElementById("passwd");
          psw.type="text";
          
     }
     function hide_pwd()
     {
          var psw= document.getElementById("passwd");
          psw.type="password";
     }
</script>
<style type="text/css">
     body
     {
          background: url(images/asset/anthony-delanoix-16765-unsplash.jpg) no-repeat top left;
          background-size: cover;
          /*background: transparent;*/
     }
     .error
     {
          color: red;
     }

     .modal
     {
      display: block;
     }
</style>
</head>
<body>
     <div class="container">
          <div class="row">
               <!-- <button class="btn btn-success" data-target="#login_show" data-toggle="modal"> Login</button> -->
               <div class="modal" id="login_show">
                    <div  class="modal-dialog modal-sm">
                         <div class="modal-content">
                          <!-- <div class="front">
                            <p class="glyphicon glyphicon-king"></p>
                            <h1>This Content is for Members ONLY</h1>
                          </div>
                          <div class="back"></div> -->
                              <div class="modal-header bg-success">
                                   <h1 class="modal-title"> LOGIN</h1>
                                   <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                              </div>
                              <div class="modal-body">
                                   <form action="" method="POST">
                                        <div class="error"><p><?php echo $msg; ?></p></div>
                                        <label>Username/Email Id</label><br>
                                        <input type="text" name="emailid" class="form-control" placeholder="Enter Username here"><br>
                                        <label>Password</label><br>
                                        <div class="input-group">
                                             <input id="passwd" type="password" name="password" class="form-control" placeholder="Enter Password here"><br>
                                             <div class="input-group-addon" onmousedown="show_pwd()" onmouseup="hide_pwd()" style="cursor: pointer;">
                                                  <span class="glyphicon glyphicon-eye-open"></span>
                                             </div>
                                        </div>
                                        <!-- <input type="checkbox" name="remember_me" checked="checked">Remember Me -->
                                   
                              </div>
                              <div class="modal-footer">
                                   <input type="submit" name="submit" class="btn btn-success" value="Login" />
                                   <!-- <button type="submit" name="submit" class="btn btn-success"> Login</button> -->
                                   <!-- <button type="button"  class="btn btn-danger">Close</button> -->
                                   <!-- <p>Not a member?<a href="#"> SIGN UP</a></p>
                                   <p>Forgot <a href="#">Password</a></p>       -->      
                              </div>
                              </form>
                              
                         </div>
                    </div>
               </div>	
          </div>
     </div>

</body>
</html>