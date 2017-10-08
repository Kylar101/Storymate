<?php
/*
$notifysql = "INSERT INTO  notifications (userID, storyID, authorID, seen) VALUES ($usernote, $storynote, $authornote, $seen)";
$result = mysqli_query($conn,$notifysql);
if (!$result) {
	die (mysqli_error($conn));
}
*/
$notifysql = "INSERT INTO notifications (recieverID, senderID, storyID, notification) VALUES ('$recieverID', '$senderID', '$storyID', '$notifmsg')";
$result = mysqli_query($conn,$notifysql);
if (!$result) {
	die (mysqli_error($conn));
}

?>