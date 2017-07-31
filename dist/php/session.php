<?php

	include('connector.php');
	session_start();

	$usercheck = $_SESSION['login_user'];

	$ses_sql = mysqli_query($conn, "SELECT username FROM users WHERE username = '$usercheck' ");
	$row = mysqli_fetch_array($ses_sql);

	$login_session = $row['username'];

	if(!isset($_SESSION['login_user']))
	{
		header("location:../index.html");
	}

?>