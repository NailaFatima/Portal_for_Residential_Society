<?php
   session_start();
   

   


?>

 

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
  <nav>
        <div class="container-fluid">
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
              <li><a href="#">HOME</a></li>
            <li><a href="#">Timeline</a></li>
           <li><a href="#">Community</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="#">CONTACT US</a></li>
          </ul>
         </div>
        </nav>  
        
        </div>                
    
  </nav>
	<?php
     if(isset($_SESSION['username']) && $_SESSION['username']!="")
   {

	?>
  <h1>Welcome <?php echo $_SESSION['username']; ?> to AHT Webpage</h1>
  <h3>Email Id: <?php echo $_SESSION['emailid'] ?></h3>
  <?php }
    else{ header("Location: login_form.php"); }
    ?>
    <a href="logout.php">Logout</a>

</body>
</html>