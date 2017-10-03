<?php

session_start();
include('connector.php');

$storyID = $_GET['story'];

$Title = mysqli_real_escape_string($conn,$_POST['title']);
$Description = mysqli_real_escape_string($conn,$_POST['description']);
// $Images = mysqli_real_escape_string($conn,$_POST['images']);
$Text= mysqli_real_escape_string($conn,$_POST['text']);
$categoryID = mysqli_real_escape_string($conn,$_POST['category']);
$old_images = $_POST['image-updated'] ? $_POST['image-updated'] : null;

$username = $_SESSION['login_user'];

if(isset($_POST['draft'])){
	$draft = 1;
	echo "draft";

}else{
	$draft = 0;
}

$sql = "UPDATE stories SET title='$Title', description='$Description', categoryID='$categoryID' WHERE storyID='$storyID'";
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

	$targetimg = basename($imgname);
	
	$tmpname=$_FILES['images']['tmp_name'][$k];
	if (move_uploaded_file( $tmpname,'.'.$target_dir . $targetimg )) {
		 echo "woking";
	} else {
		echo "not wokring";
	}
	if ($_FILES['images']['name'][$k] != '') {
		$filepath = $target_dir.$targetimg;
		$imgsql = "INSERT INTO images (imagepath, storyID) VALUES ('$filepath', $storyID)";
		$result = mysqli_query($conn,$imgsql);

		if (!$result) {
		    die(mysqli_error($conn));
		}
	}
}


header("location: ../profile.php");

?>