<?php

$username = get_current_user();

$getID = "SELECT userID FROM users WHERE username = '$username'";
$user = mysqli_query($conn,$getID);

$sql = "SELECT * FROM users WHERE userID = '$user'";
$result = mysql_fetch_array($sql);

?>