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

$storyNum = "SELECT count(storyID) AS num_stories FROM stories WHERE authorID = '$currentUser'";
$countResult = mysqli_query($conn,$storyNum);
$countRow = mysqli_fetch_array($countResult);

if (!$countResult) {
	die (mysql_error($countResult));
}

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
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
					<p class="story-count"><?php echo $countRow['num_stories']; ?> stories</p>
				</div>
			</div>
			<div class="profile-details">
				<div class="personal-details">
					<h2 class="profile-heading">My Details</h2>
					<div class="my-details">
						<p class="name"><?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?></p>
						<p class="email"><?php echo $row['email']; ?></p>
						<p class="number"><?php echo $row['phone']; ?></p>
						<button id="edit-user-details" class="btn edit-button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit Details</button>
					</div>
					
					<div id="change-user-details">
						<form action="php/edit-details.php" method="POST" class="form details-edit">
							<div class="field-wrap">
								<label class="active">
									First Name<span class="req">*</span>
								</label>
								<input type="text" name="first-name" required autocomplete="off" value="<?php echo $row['firstName']; ?>" />
							</div>
							<div class="field-wrap">
								<label class="active">
									Last Name<span class="req">*</span>
								</label>
								<input type="text" name="last-name" required autocomplete="off" value="<?php echo $row['lastName']; ?>" />
							</div>
							<div class="field-wrap">
								<label class="active">
									Phone Number
								</label>
								<input type="tel" name="phone-number" autocomplete="off" value="<?php echo $row['phone']; ?>" />
							</div>
							<button type="submit" class="btn view-button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Submit Changes</button>
							<span class="change-details-cancel">Cancel</span>
						</form>
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



  <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
  <script src="bundle.js"></script>
</body>
</html>
