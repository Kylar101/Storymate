<?php

DEFINE ('dbUser', 'root'); # will change when hosted
DEFINE ('dbPass', ''); # will change when hosted
DEFINE ('dbHost', 'localhost'); # will change when hosted
DEFINE ('dbName', 'storymate');


$conn = mysqli_connect(dbHost, dbUser, dbPass, dbName);

if ($conn == 'connect_error')
	{
		die("Connection Failed: " . $conn = connect_error);
	}

?>