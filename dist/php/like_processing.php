<?php

session_start();
include('connector.php');

$username = $_SESSION['login_user'];

$getID = "SELECT userID FROM users WHERE email = '$username'";
$userres = mysqli_query($conn,$getID);
$userrow = mysqli_fetch_array($userres);
$userID = $userrow['userID'];

$storyID= $_GET['storyID'];

$sql = " INSERT INTO likes (storyID, userID) VALUES ('$storyID','$userID')";

mysqli_query($conn,$sql);

header("Location: ../view-story.php?storyID=$storyID");

?>