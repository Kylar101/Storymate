<?php

session_start();
include('connector.php');

$Title = mysqli_real_escape_string($conn,$_POST['title']);
$Description = mysqli_real_escape_string($conn,$_POST['description']);
$Images = mysqli_real_escape_string($conn,$_POST['images']);
$Text= mysqli_real_escape_string($conn,$_POST['text']);
#$pubSet = mysqli_real_escape_string($conn,$_POST['public']);
$username = get_current_user();

$getID = "SELECT userID FROM users WHERE email = '$username'";
$authorID = mysqli_query($conn,$getID);

/*
$catname = mysqli_real_escape_string($conn,$_POST['category']);
$getCatID = "SELECT categoryID FROM categories WHERE categoryName = '$catname'";
$catID = mysqli_query($conn,$getCatID);

$tagName = mysqli_real_escape_string($conn,$_POST['tag']);
$getTagID = "SELECT categoryID FROM categories WHERE tagName = '$tagName'";
$tagID = mysqli_query($conn,$getTagID);
*/

$sql = "INSERT INTO stories (title, description, authorID) VALUES ('$Title', '$Description', '$authorID')";

mysqli_query($conn,$sql);

header("location: ../profile.html");

?>