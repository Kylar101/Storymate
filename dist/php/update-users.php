<?php 
include ('connector.php');

$userID = $_GET['userID'];
$method = $_GET['method'];

echo $method.'<br>'.$userID.'<br>';

if ($method == 'delete') {
	$deleteSQL = "DELETE FROM users WHERE userID = '$userID'";
	$result = mysqli_query($conn,$deleteSQL);

	if (!$result) {
	    die(mysqli_error($conn));
	}
}

if ($method == 'admin') {
	$adminSQL = "UPDATE users SET userRole='2' WHERE userID='$userID'";
	$result = mysqli_query($conn,$adminSQL);

	if (!$result) {
	    die(mysqli_error($conn));
	}
}

if ($method == 'User') {
	$adminSQL = "UPDATE users SET userRole='1' WHERE userID='$userID'";
	$result = mysqli_query($conn,$adminSQL);

	if (!$result) {
	    die(mysqli_error($conn));
	}
}

if ($method == '') {
	$adminSQL = "UPDATE users SET userRole='2' WHERE userID='$userID'";
	$result = mysqli_query($conn,$adminSQL);

	if (!$result) {
	    die(mysqli_error($conn));
	}
}

header("location: ../all-users.php");

?>