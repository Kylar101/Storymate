<?php

session_start();
include('connector.php');

$Title = mysqli_real_escape_string($conn,$_POST['title']);
$Description = mysqli_real_escape_string($conn,$_POST['description']);
//$Images = mysqli_real_escape_string($conn,$_POST['images']);
$Text= mysqli_real_escape_string($conn,$_POST['text']);
#$pubSet = mysqli_real_escape_string($conn,$_POST['public']);
$AudioID = mysqli_real_escape_string($conn,$_POST['audio']);
$username = $_SESSION['login_user'];

$getID = "SELECT userID FROM users WHERE email = '$username'";
$authorResult = mysqli_query($conn,$getID);
$authorRow = mysqli_fetch_array($authorResult);
$authorID = $authorRow['userID'];

if(isset($_POST['draft'];)){
	$draft = 1;

}else{
	$draft = 0;
}

/*
$catname = mysqli_real_escape_string($conn,$_POST['category']);
$getCatID = "SELECT categoryID FROM categories WHERE categoryName = '$catname'";
$catID = mysqli_query($conn,$getCatID);

$tagName = mysqli_real_escape_string($conn,$_POST['tag']);
$getTagID = "SELECT categoryID FROM categories WHERE tagName = '$tagName'";
$tagID = mysqli_query($conn,$getTagID);
*/

$sql = "INSERT INTO stories (title, description, authorID) VALUES ('$Title', '$Description', '$authorID')";
$result = mysqli_query($conn,$sql);

if (!$result) {
    die(mysqli_error($conn));
}

$storyID = mysqli_insert_id($conn);

$sql = "INSERT INTO storycontents (storyID, textfield, audioID) VALUES ('$storyID', '$Text', '$AudioID')";
$result = mysqli_query($conn,$sql);

if (!$result) {
    die(mysqli_error($conn));
}


$target_dir = "./uploads/";
foreach($_FILES['images']['name'] as $k=>$name){

	$imgname = $_FILES['images']['name'][$k];	
	$targetimg = basename($imgname);
	$tmpname = $_FILES['images']['tmp_name'][$k];
	echo '.'.$target_dir.$tmpname.'<br>';
	if (move_uploaded_file( $tmpname,'.'.$target_dir . $targetimg )) {
		 echo "working";
	} else {
		echo "not working";
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
##################################################

foreach($_FILES['aduio']['name'] as $k=>$name){

	$audname = $_FILES['audio']['name'][$k];	
	$targetaud = basename($audname);
	$tmpname = $_FILES['aduio']['tmp_name'][$k];
	echo '.'.$target_dir.$tmpname.'<br>';
	if (move_uploaded_file( $tmpname,'.'.$target_dir . $targetaud )) {
		 echo "working";
	} else {
		echo "not working";
	}
	if ($_FILES['audio']['name'][$k] != '') {
		$filepath = $target_dir.$targetaud;
		$audsql = "INSERT INTO audio(audiopath, storyID) VALUES ('$filepath', $storyID)";
		$result = mysqli_query($conn,$audsql);

		if (!$result) {
		    die(mysqli_error($conn));
		}
	}
}

###################################################


header("location: ../profile.php");

?>
