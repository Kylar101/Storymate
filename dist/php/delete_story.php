<?php
session_start();
include('connector.php');
$storyID = $_GET['storyID'];

$storysql = "UPDATE stories SET trash='1' WHERE storyID='$storyID'";
mysqli_query($conn,$storysql);

//header("location: ../profile.php");

?>