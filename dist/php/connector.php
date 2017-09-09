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

// TODO - uncomment for deployment

// // Force HTTPS for security
// if($_SERVER["HTTPS"] != "on") {
//     $pageURL = "Location: https://";
//     if ($_SERVER["SERVER_PORT"] != "80") {
//         $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
//     } else {
//         $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
//     }
//     header($pageURL);
// }



?>