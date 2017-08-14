<?php

session_start();
include('connector.php');

$firstName = mysqli_real_escape_string($conn,$_POST['first-name']);
$lastName = mysqli_real_escape_string($conn,$_POST['last-name']);
$phoneNumber = mysqli_real_escape_string($conn,$_POST['phone-number']);

$username = $_SESSION['login_user'];

$getID = "SELECT userID FROM users WHERE email = '$username'";
$authorID = mysqli_query($conn,$getID);


$sql = "UPDATE users SET firstName='$firstName', lastName='$lastName', phone='$phoneNumber' WHERE email='$username'";

$result = mysqli_query($conn,$sql);
if (!$result) {
	die(mysql_error($result, $conn));
}

header("location: ../profile.php");

?>