<?php

session_start();
include('connector.php');

$username = get_current_user();

$getID = "SELECT userID FROM users WHERE username = '$username'";
$userD = mysqli_query($conn,$getID);

$sql = " INSERT INTO likes (StoryID, userID) VALUES ('$storyID','$userID')";

mysqli_query($conn,$sql);

?>