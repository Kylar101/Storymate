<?php

session_start();
include('connector.php');

$storyID = $_GET['storyID'];
$flag = $_GET['flag'];
$currUser = $_SESSION['login_user'];

$us = "SELECT * FROM users WHERE email = '$currUser'";
$userRes = mysqli_query($conn,$us);
if (!$userRes) {
	die(mysql_error($conn));
}
$userRow = mysqli_fetch_array($userRes);
$userID = $userRow['userID'];

if ($flag) {
	$sql = "INSERT INTO flags (userID, storyID) VALUES ('$userID', '$storyID')";
} else {
	$sql = "DELETE FROM flags WHERE userID='$userID' AND storyID='$storyID'";
}

$result = mysqli_query($conn, $sql);
if (!$result) {
	die(mysqli_error($conn));	
}

header("location: ../view-story.php?storyID=$storyID");

?>