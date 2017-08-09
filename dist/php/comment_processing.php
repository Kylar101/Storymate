<?php

session_start();
include('connector.php');

$comment = mysqli_real_escape_string($conn,$_POST['comment']);

$username = $_SESSION['login_user'];
$getID = "SELECT userID FROM users WHERE email = '$username'";
$authorID = mysqli_query($conn,$getID);

$sql = "INSERT INTO comments (authorID, comment) VALUES ('$authorID','$comment')";
mysqli_query($conn,$sql);

header("location: ../profile.php");

?>