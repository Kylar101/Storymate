<?php
session_start();
include('connector.php');

$fName = mysqli_real_escape_string($conn,$_POST['fname']);
$lName = mysqli_real_escape_string($conn,$_POST['lname']);
$email = mysqli_real_escape_string($conn,$_POST['subEmail']);

$pass = mysqli_real_escape_string($conn,$_POST['subPass']);
$hash = openssl_digest($pass, 'sha512');

$checkdups = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$checkdups);
$count = mysqli_num_rows($result);

if($count > 0) 
	{
		$_SESSION['message'] = 'User already exists';
	}
	else 
	{
		$sql = "INSERT INTO users (firstName, lastName, email, password) VALUES ('$fName', '$lName', '$email', '$hash')";

		if(mysqli_query($conn,$sql))
		{
/*
			$_SESSION['message'] = "An admin will review your application to sign up and you  will
									notified via email once your application has been assesed. Thankyou for your interest in StoryMate.";
*/
			header("location: ../index.php");
		}
	}

?>