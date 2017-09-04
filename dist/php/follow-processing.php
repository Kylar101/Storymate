<?php

session_start();
include('connector.php');

$storyID = $_GET['storyID'];
$authorID = $_GET['authorID'];
$currUser = $_SESSION['login_user'];
$follow = $_GET['follow'];

$us = "SELECT * FROM users WHERE email = '$currUser'";
$userRes = mysqli_query($conn,$us);
if (!$userRes) {
	die(mysql_error($conn));
}
$userRow = mysqli_fetch_array($userRes);
$userID = $userRow['userID'];

echo $follow.'<br><br>';

$sql = '';

if ($follow) {
	$sql = "INSERT INTO following (userID, followingID, follows) VALUES ('$userID', '$authorID', 1)";
} else {
	$sql = "DELETE FROM following WHERE userID='$userID' AND followingID='$authorID'";
}

echo $sql;

$result = mysqli_query($conn, $sql);
if (!$result) {
	die(mysqli_error($conn));	
}
$sql = '';

header("location: ../view-story.php?storyID=$storyID");

?>