<!DOCTYPE html>
<html>

<head>
      <title>Sign Up</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
      <div class="loginbox">
            <div class="header">
                  <h1>Login</h1>
            </div>
            <form method="POST" action="">
                  <div id="display" style="color:red"><?php echo $msg ?></div>
                  <div class="textbox">

                        <i class="fas fa-user"></i>
                        <input type="text" name="f_name" placeholder="First Name" value="">
                  </div>
                  <div class="textbox">
                        <i class="fas fa-user"></i>
                        <input type="text" name="l_name" placeholder="Last Name">
                  </div>
                  <div class="textbox">

                        <i class="fas fa-user"></i>
                        <input type="text" name="emailid" placeholder="EmailId">
                  </div>
                  <div class="textbox">

                        <i class="fas fa-user"></i>
                        <input type="text" name="dob" placeholder="Date of Birth">
                  </div>
                  <div class="textbox">
                        <input type="radio" name="gender" value="male" checked> Male<br>
                        <input type="radio" name="gender" value="female"> Female<br>
                        <input type="radio" name="gender" value="other"> Other
                  </div>

                  <div class="textbox">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="passwd" placeholder="Password">
                  </div>
                  <input type="checkbox" name="remember_me" checked="checked">Remember Me<br />
                  <!--  <div id="display" style="color:red"><?php echo $msg ?></div> -->
                  <input type="submit" class="btn" name="submit" value="Sign in">
                  <input type="button" class="btn" value="Close"><br>
                  <p class="lnk">Not a member?<a href="#"> SIGN UP</a></p><br>
                  <p class="lnk">Forgot <a href="#">Password?</a></p>

            </form>
      </div>
</body>

</html>