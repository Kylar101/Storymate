<?php

$notifysql = "INSERT INTO notifications (receiverID, senderID, storyID, notification) VALUES ('$receiverID', '$senderID', '$storyID', '$notifmsg')";
$result = mysqli_query($conn,$notifysql);
if (!$result) {
	die (mysqli_error($conn));
}

?>