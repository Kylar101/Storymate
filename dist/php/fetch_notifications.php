<?php

$notesql = "SELECT * FROM notifications WHERE recieverID = $currentUser";
$notesres = mysqli_query($conn, $notesql);
$notifications = mysqli_fetch_array($notesres);

?>