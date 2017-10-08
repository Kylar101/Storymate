<?php

$notesql = "SELECT * FROM notifications WHERE userID = $currentUser";
$notesres = mysqli_query($conn, $notesql);
$notifications = mysqli_fetch_array($notesres);

?>