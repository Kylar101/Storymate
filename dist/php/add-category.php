<?php

session_start();
include('connector.php');

$Name = mysqli_real_escape_string($conn,$_POST['name']);
$Description = mysqli_real_escape_string($conn,$_POST['description']);

$sql = "INSERT INTO categories (categoryName, categoryDescription) VALUES ('$Name', '$Description')";
$result = mysqli_query($conn,$sql);

if (!$result) {
    die(mysqli_error($conn));
}


header("location: ../manage-categories.php");

?>
