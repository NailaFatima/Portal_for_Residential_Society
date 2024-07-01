<?php
  include_once 'includes/connect_db.php';
  include_once 'includes/functions.php';

session_start();
if(isset($_SESSION['emailid']) && $_SESSION['emailid']!="")
{
  // echo "Welcome ".$_SESSION['fname'].$_SESSION['lname'];
  // echo "<br /> Your emailID ".$_SESSION['emailid'];
//   if(isAdmin())
//   {
//     echo "visible";
//   } 
// else
// {
//   echo "invisible";
// }
  
}
else
{
  header("Location: login_form.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->
  <link rel="stylesheet" type="text/css" href="css/styleaht.css">
  <link href="admin/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="fonts/social-media-icon/css/social-icon-style.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <!-- <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script> -->
  
</head>
<body>
      <header>
        <div class="container">
           <div class="row">
             <!-- Navigation Bar  -->
           <nav class="navbar navbar-default" role="navigation">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Toggle navigation</span>
                <!--  Navigation-icon -->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
             </button>          
      
          <a href="#" class="navbar-brand">AHT</a>


      

          <div id="menu" class="navbar-collapse collapse"">       
          <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php">HOME</a></li>
            <li><a href="#">Timeline</a></li>
           <li><a href="community.php">Community</a></li>
            <li><a href="account.php">My Account</a></li>
            <li><a href="business.php">Business Directory</a></li>
            <li class="<?php if(isAdmin()) echo "visible";else echo "invisible";?>"><a href="admin/manage_members.php">Admin</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
         </div>
        </nav>
             
           </div>
      </div>
        </header>  
         <main>