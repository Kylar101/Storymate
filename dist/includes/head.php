<?php 

 $url = $_SERVER['REQUEST_URI'];
 $pattern = "/([a-z-]+).php/";

 $title = preg_match($pattern, $url, $match);
 $title = $match[0];
 $title = str_replace(".php", "", $title);
 $title = str_replace("-", " ", $title);
 $title = ucwords($title);
 
?>


<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title><?php echo $title; ?></title>
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<!-- <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>