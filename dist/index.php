<?php

  include ('php/connector.php');
  session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST"){
 

	$username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['pwd']);

  $sql = "SELECT * from users WHERE email = '$username' AND password = '$password'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	#$active = $row['active'];	

  	$count = mysqli_num_rows($result);

  	if($count == 1)
  	{
  		#session_register("username");
  		$_SESSION['login_user'] = $username;

  		header("location: profile.php");
  	}
  	else
  	{
  		$error = "Your username or pasword is invalid";
  	}
  }

?>
<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="css/style.css">


</head>

<body>
  <div class="form login-form">

      <ul class="tab-group">
        <li class="tab"><a href="#login">Log In</a></li>
        <li class="tab active"><a href="#signup">Sign Up</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <h1>Sign Up</h1>

          <form action="php/signup.php" method="post">

          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="fname" />
            </div>

            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="lname"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="subEmail"/>
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="subPass"/>
          </div>

          <button type="submit" class="button button-block"/>Get Started</button>

          </form>

        </div>

        <div id="login">
          <h1>Welcome Back!</h1>

          <form action="php/login.php" method="post">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="username"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="pwd"/>
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <button name='submit' class="button button-block"/>Log In</button>

          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="bundle.js"></script>

</body>
</html>
