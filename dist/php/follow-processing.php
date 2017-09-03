<?php

session_start();
include('connector.php');

$storyID = $_GET['storyID'];
$authorID = $_GET['authorID'];
$currUser = $_SESSION['login_user'];

$us = "SELECT * FROM users WHERE email = '$currUser'";
$userRes = mysqli_query($conn,$us);
if (!$userRes) {
	die(mysql_error($conn));
}
$userRow = mysqli_fetch_array($userRes);
$userID = $userRow['userID'];

$sql = "INSERT INTO following (userID, followingID, follows) VALUES ('$userID', '$authorID', 1)";
$result = mysqli_query($conn, $sql);
if (!$result) {
	die(mysql_error($conn));	
}

header("location: ../view-story.php?storyID=$storyID");

?>