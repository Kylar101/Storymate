<?php

session_start();
include('connector.php');

$comment = mysqli_real_escape_string($conn,$_POST['comment']);

$username = $_SESSION['login_user'];
$getID = "SELECT userID FROM users WHERE email = '$username'";
$authorRes = mysqli_query($conn,$getID);
$authorRow = mysqli_fetch_array($authorRes);
$authorID = $authorRow[0];

$storyID = $_GET['storyID'];

$sql = "INSERT INTO comments (storyID, authorID, commentBody) VALUES ('$storyID','$authorID','$comment')";
$result = mysqli_query($conn,$sql);
if (!$result) {
	die (mysqli_error($conn));
}

##handle notifications##
$storysql = "SELECT * FROM stories where storyID = $storyID";
$story = mysqli_query($conn, $storysql);
$storyrow = mysqli_fetch_array($story);
$storytitle = $storyrow['title'];

$receiverID = $storyrow['authorID']; 
$senderID = $authorID;
$storyID = $storyID;

$stdnotif = ' Has commented on your story, ';
$notifmsg = $username . $stdnotif . $storytitle;

include('create_notification.php');


header("location: ../view-story.php?storyID=".$storyID);

?>