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

// header("location: ../view-story.php?storyID=".$storyID);

?>