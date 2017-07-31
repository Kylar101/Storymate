<?php

session_start();
include('connector.php');

$Description = mysqli_real_escape_string($conn,$_POST['catDesc']);
$Name = mysqli_real_escape_string($conn,$_POST['catName']);

$sql = "INSERT INTO categories (categoryDescription,categoryName) VALUES ('$Description','$Name')";

mysqli_query($conn,$sql);

?>