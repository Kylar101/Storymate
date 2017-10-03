<?php 
include ('connector.php');

if( isset( $_GET['catID'] ) ) {
	$catID = $_GET['catID'];

	$delete = "DELETE FROM categories WHERE categoryID = '$catID'";
	$result = mysqli_query($conn,$delete);

	if (!$result) {
	    die(mysqli_error($conn));
	}

}

header("location: ../manage-categories.php");

?>




