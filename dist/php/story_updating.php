<?php

session_start();
include('connector.php');

$storyID = $_GET['story'];

$Title = mysqli_real_escape_string($conn,$_POST['title']);
$Description = mysqli_real_escape_string($conn,$_POST['description']);
$Images = mysqli_real_escape_string($conn,$_POST['images']);
$Text= mysqli_real_escape_string($conn,$_POST['text']);
#$pubSet = mysqli_real_escape_string($conn,$_POST['public']);
$username = $_SESSION['login_user'];

$sql = "UPDATE stories SET title='$Title', description='$Description' WHERE storyID='$storyID'";

$result = mysqli_query($conn,$sql);

if (!$result) {
    die(mysqli_error($conn));
}

header("location: ../profile.php");

?>