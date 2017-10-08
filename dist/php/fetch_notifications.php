<?php

$notesql = "SELECT * FROM notifications WHERE receiverID = $currentUser";
$notesres = mysqli_query($conn, $notesql);
if (!$notesres) {
	die (mysql_error($conn));
}
// $notifications = mysqli_fetch_array($notesres);

?>