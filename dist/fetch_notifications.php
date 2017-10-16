<?php

$notesql = "SELECT * FROM notifications WHERE recieverID = '$currentUser' LIMIT 5";
$notesres = mysqli_query($conn, $notesql);

if(mysqli_num_rows($notesres) > 0){

$notifications = mysqli_fetch_array($notesres);

}

?>