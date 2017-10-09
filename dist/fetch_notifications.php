<?php

$notesql = "SELECT * FROM notifications WHERE userID = '$currentUser' LIMIT 5";
$notesres = mysqli_query($conn, $notesql);
$notifications = mysqli_fetch_array($notesres);

?>