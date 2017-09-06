<?php

session_start();
include('connector.php');

$storyID = $_GET['story'];

$Title = mysqli_real_escape_string($conn,$_POST['title']);
$Description = mysqli_real_escape_string($conn,$_POST['description']);
// $Images = mysqli_real_escape_string($conn,$_POST['images']);
$Text= mysqli_real_escape_string($conn,$_POST['text']);
$old_images = $_POST['image-updated'] ? $_POST['image-updated'] : null;

$username = $_SESSION['login_user'];

$sql = "UPDATE stories SET title='$Title', description='$Description' WHERE storyID='$storyID'";
$sqlcontents = "UPDATE storycontents SET textfield='$Text' WHERE storyID='$storyID'";

$result = mysqli_query($conn,$sql);

if (!$result) {
    die(mysqli_error($conn));
}

$resultContents = mysqli_query($conn,$sqlcontents);

if (!$resultContents) {
    die(mysqli_error($conn));
}

if ($old_images != null) {

	foreach ($old_images as $image) {
		// echo $image.'<br>';
		$sql = "DELETE FROM images WHERE imageID='$image'";
		$result = mysqli_query($conn, $sql);
		if (!$result) {
			die(mysqli_error($conn));	
		}
	}

}

$target_dir = "./uploads/";
foreach($_FILES['images']['name'] as $k=>$name){
	$imgname = $_FILES['images']['name'][$k];

	$targetimg = $target_dir . basename($imgname);
	
	$tmpname=$_FILES['images']['tmp_name'][$k];
	move_uploaded_file($tmpname,$targetimg);

	if ($_FILES['images']['name'][$k] != '') {
		$imgsql = "INSERT INTO images (imagepath, storyID) VALUES ('$targetimg', $storyID)";
		$result = mysqli_query($conn,$imgsql);

		if (!$result) {
		    die(mysqli_error($conn));
		}
	}
	
}


header("location: ../profile.php");

?>