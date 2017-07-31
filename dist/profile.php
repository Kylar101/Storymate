<?php
session_start();
include('php/connector.php');
$username = $_SESSION['login_user'];

$getID = "SELECT userID FROM users WHERE email = '$username'";
$getuser = mysqli_query($conn,$getID);
$user = mysqli_fetch_array($getuser);
$currentUser = $user[0];

$sql = "SELECT * FROM users WHERE userID = '$currentUser'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">


</head>

<body>

	<!-- Top bar -->
	<header>
		<section id="top-bar">
			<div class="user-bar">
				<p class="user-name"><?php echo $row['email']; ?></p>
			</div>
		</section>
	</header>

	<!-- Main content -->
	<div id="main-content">
		<nav id="side-bar">
			<ul>
				<li class="post-story"><a href="post-story.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post Story</a></li>
				<li class="manage-story"><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i> Manage Stories</a></li>
			</ul>
		</nav>
		<article id="page-content">
			<div class="profile-header">
				<img src="img/profile-pic.gif" class="profile-picture">
				<div class="count-bg">
					<p class="story-count">3 stories</p>
				</div>
			</div>
			<div class="profile-details">
				<div class="personal-details">
					<h2 class="profile-heading">My Details</h2>
					<div class="my-details">
						<p class="name"><?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?></p>
						<p class="email"><?php echo $row['email']; ?></p>
						<p class="number"><?php echo $row['phone']; ?></p>
						<?php
							$arr = array('one', 'two', 'three');

							foreach ($arr as $value) {
						?>
						<p>hopefully <?php echo $value ?></p>
						<?php
						}
						?>

						<a href="#" class="btn edit-button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit Details</a>
					</div>
				</div>
				<div class="my-stories">
					<h2 class="profile-heading">My Stories</h2>
					<div class="story-card-location">
						<?php
							$storySQL = "SELECT * FROM stories where authorID = '$currentUser'";
							$fetchStories = mysqli_query($conn,$storySQL);
							
							while($stories = mysqli_fetch_array($fetchStories)){

								$title = $stories[1];

						?>
						<div class="story-card">
							<img src="img/pizzasheen.gif" class="story-card-image">
							<h3 class="story-title"><?php echo $title; ?></h3>
							<div class="story-card-buttons">
								<a href=view-story.php?story=<?php echo $stories[0] ?> class="view-button card-icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href="#" class="delete-button card-icons"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<a href="#" class="edit-button card-icons"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="#" class="comments-button card-icons"><i class="fa fa-comments" aria-hidden="true"></i></a>
							</div>
						</div>
						<?php
							}
						?>


						<div class="story-card">
							<img src="img/pizzasheen.gif" class="story-card-image">
							<h3 class="story-title">7 Years</h3>
							<div class="story-card-buttons">
								<a href="#" class="view-button card-icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href="#" class="delete-button card-icons"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<a href="#" class="edit-button card-icons"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="#" class="comments-button card-icons"><i class="fa fa-comments" aria-hidden="true"></i></a>
							</div>
						</div>
						<div class="story-card">
							<img src="img/unisheen.jpg" class="story-card-image">
							<h3 class="story-title">Stars</h3>
							<div class="story-card-buttons">
								<a href="#" class="view-button card-icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href="#" class="delete-button card-icons"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<a href="#" class="edit-button card-icons"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="#" class="comments-button card-icons"><i class="fa fa-comments" aria-hidden="true"></i></a>
							</div>
						</div>
						<div class="story-card">
							<img src="img/pusheen-burger.jpg" class="story-card-image">
							<h3 class="story-title">New Divide</h3>
							<div class="story-card-buttons">
								<a href="#" class="view-button card-icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href="#" class="delete-button card-icons"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<a href="#" class="edit-button card-icons"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								<a href="#" class="comments-button card-icons"><i class="fa fa-comments" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>

	<!-- footer content -->
	<footer id="footer-content">
		<p class="copyright">Communify 2017</p>
	</footer>



  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
</body>
</html>
