<?php
  include('connector.php');

	session_start(); 

  	$username = $_POST['username'];
  	$password = $_POST['pwd'];

  	$sql = "SELECT userID from users WHERE email = '$username' AND password = '$password'";
  	$result = mysqli_query($conn,$sql);
  	// $row = mysqli_fetch_array($result);

	if (!$result) {
		die(mysqli_error($conn));
	}

  	$count = mysqli_num_rows($result);

  	if($count == 1)
  	{
  		// session_register("username");
  		$_SESSION['login_user'] = $username;

  		header("location: ../profile.php");
  	}
  	else
  	{
  		$error = "Your username or pasword is invalid";
  	}

?>