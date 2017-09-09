<?php
session_start();
 include(connector.php);

 	$_SESSION = array();

 	session_destroy();

header("Location: ../index.php");

?>