<?php

  include ('php/connector.php');
  session_start();

  $login = isset($_GET['login']) ? $_GET['login'] : null;

?>
<!DOCTYPE html>

<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->


      <link rel="stylesheet" href="css/style.css">


</head>

<body>
  <div class="form login-form">

      <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
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

            <p class="index">By signing up, you are agreeing to our <span id="tc-index" class="terms-conditions-link">Terms &amp; Conditions</span></p>

            <!-- <span id="tc-index" class="btn comments-button tc-button">View T&amp;C</span> -->

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
            <input type="password" required autocomplete="off" name="pwd"/>
          </div>
          <?php if ($login) : ?>
            <p class="incorrect">Either your username or password is incorrect</p>
          <?php endif; ?>
          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <button name='submit' class="button button-block"/>Log In</button>

          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
<!-- Show help in modal -->
        <div class="modal" id="tc-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Terms and Conditions</h4>
              </div>
              <div class="modal-body help-body">
                <p>Please read these Terms and Conditions carefully before using the <a href="http://www.storymate.com.au">Storymate</a> website operated by QUT researcher Dr. Dhaval Vyas.</p>
                <p>Your access to and use of this web application tool is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, registered users and any others who access our system.</p>
                <p><strong>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</strong></p>
                <p>Storymate allows you to create stories, attach content to them, such as Images, Text and Audio, as well as interact with other users by posting comments, liking stories, and following other users to be advised of any updates.</p>
                <h5>Access</h5>
                <p>In order to access some features of our web application, you will have to create a Storymate Account. You may never use another's account without permission. When creating your account, you must provide accurate and complete information. You are solely responsible for the activity that occurs on your account, and you must keep your account password secure. You must notify Storymate immediately of any breach of security or unauthorized use of your account.p</p>
                <p>Only members of Communify will have the chance to register to this online web application. Members of Communify who wish to register will need to enter the email address you provided to Communify.</p>
                <h5>Content</h5>
                <p>You shall be solely responsible for your own Content and the consequences of submitting and publishing your Content on the Service. You affirm, represent, and warrant that you own or have the necessary licenses, rights, consents, and permissions to publish Content you submit.</p>
                <p>Once the content of your story is published, StoryMate has the right to keep the story on the database system and use it only for research purposes and with your authorisation.</p>
                <h5>Language</h5>
                <p>You are responsible for to use an appropriate language when creating stories, as well as posting comments in other users stories. In addition, the graphic and audio material that you may use to create stories will also need to abide to this condition.</p>
                <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
                <h5>Account Termination Policy</h5>
                <p>Storymate will terminate a user's access to the Service if, under appropriate circumstances, the user is determined to be a repeat infringer.</p>
                <p>Storymate reserves the right to decide whether Content violates these Terms of Service for reasons other than copyright infringement, such as, but not limited to, pornography, obscenity, inappropriate language, any kind of discrimination, or excessive length. Storymate may at any time, without prior notice and in its sole discretion, remove such Content and/or terminate a user's account for submitting such material in violation of these Terms of Service.</p>
                <h5>Contact Us</h5>
                <p>If you have any questions about these Terms, please contact Dr. Dhaval Vyas at <a href="mailto:d.vyas@qut.edu.au">d.vyas@qut.edu.au</a>.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>  <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->

    <script src="./bundle.js"></script>

</body>
</html>
