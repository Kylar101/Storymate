<?php

$notesql = "SELECT * FROM notifications WHERE userID = $currentUser";
$notesres = mysqli_query($conn, $notesql);
if (!$notesres) {
	die (mysqli_error($conn));
}
// $notifications = mysqli_fetch_array($notesres);

?>