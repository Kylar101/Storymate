<?php

session_start();
include('connector.php');

$Title = mysqli_real_escape_string($conn,$_POST['title']);
$Description = mysqli_real_escape_string($conn,$_POST['description']);
$Images = mysqli_real_escape_string($conn,$_POST['images']);
$Text= mysqli_real_escape_string($conn,$_POST['text']);
#$pubSet = mysqli_real_escape_string($conn,$_POST['public']);
$AudioID = mysqli_real_escape_string($conn,$_POST['audio']);
$username = $_SESSION['login_user'];

$getID = "SELECT userID FROM users WHERE email = '$username'";
$authorResult = mysqli_query($conn,$getID);
$authorRow = mysqli_fetch_array($authorResult);
$authorID = $authorRow['userID'];


/*
$catname = mysqli_real_escape_string($conn,$_POST['category']);
$getCatID = "SELECT categoryID FROM categories WHERE categoryName = '$catname'";
$catID = mysqli_query($conn,$getCatID);

$tagName = mysqli_real_escape_string($conn,$_POST['tag']);
$getTagID = "SELECT categoryID FROM categories WHERE tagName = '$tagName'";
$tagID = mysqli_query($conn,$getTagID);
*/

$sql = "INSERT INTO stories (title, description, authorID) VALUES ('$Title', '$Description', '$authorID')";
$result = mysqli_query($conn,$sql);

if (!$result) {
    die(mysqli_error($conn));
}

$storyID = mysqli_insert_id($conn);

$sql = "INSERT INTO storycontents (storyID, textfield, audioID) VALUES ('$storyID', '$Text', '$AudioID')";
$result = mysqli_query($conn,$sql);

if (!$result) {
    die(mysqli_error($conn));
}

header("location: ../profile.php");

?>