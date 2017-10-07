<?php

if ($row['userRole'] != 1) {
	header("location: ../profile.php");
}