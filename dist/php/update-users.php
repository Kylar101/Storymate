<?php 
include ('connector.php');

$userID = $_GET['userID'];
$method = $_GET['method'];

echo $method.'<br>'.$userID.'<br>Access:- ';

if ($method == 'delete') {
	$deleteSQL = "DELETE FROM users WHERE userID = '$userID'";
	$result = mysqli_query($conn,$deleteSQL);

	if (!$result) {
	    die(mysqli_error($conn));
	}
}

$getUser = "SELECT * FROM users WHERE userID='$userID'";
$user = mysqli_query($conn,$getUser);
if (!$user) {
    die(mysqli_error($conn));
}
$userDetails = mysqli_fetch_array($user);
$userAccess = $userDetails['userRole'];
if ($method == 'up') {
	$userAccess++;
} elseif ($method == 'down') {
	$userAccess--;
}
echo $userAccess;
$adminSQL = "UPDATE users SET userRole='$userAccess' WHERE userID='$userID'";
	$result = mysqli_query($conn,$adminSQL);

	if (!$result) {
	    die(mysqli_error($conn));
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