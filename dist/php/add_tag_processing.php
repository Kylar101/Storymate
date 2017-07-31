<?php

session_start();
include('connector.php');

$Description = mysqli_real_escape_string($conn,$_POST['tagDesc']);
$Name = mysqli_real_escape_string($conn,$_POST['tagName']);

$sql = "INSERT INTO tags (tagDescription,tagName) VALUES ('$Description','$Name')";

mysqli_query($conn,$sql);

?>