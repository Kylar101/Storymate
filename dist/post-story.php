<!DOCTYPE html>

<?php
  include ('php/connector.php');
  session_start();

$username = get_current_user();

$getID = "SELECT userID FROM users WHERE username = '$username'";
$user = 1;#mysqli_query($conn,$getID);

$sql = "SELECT * FROM users WHERE userID = '$user'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

?>

<html>

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
				<p class="user-name"><?php echo $row['firstName']; ?></p>
			</div>
		</section>
	</header>

	<!-- Main content -->
	<div id="main-content">
		<nav id="side-bar">
			<ul>
				<li class="post-story active"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post Story</a></li>
				<li class="manage-story"><a href="profile.php"><i class="fa fa-list-ul" aria-hidden="true"></i> Manage Stories</a></li>
			</ul>
		</nav>
		<article id="page-content">
			<div id="post-story">
				<div class="title-wrapper">
					<h1 class="title">Post Story</h1>
				</div>
				<div class="post-form form">
					<form action="php/story_processing.php" method="post">

						<div class="field-wrap">
							<label class="post-story">
									Story Title<span class="req">*</span>
								</label>
							<input type="text" name="title" required autocomplete="off"/>
						</div>

						<div class="field-wrap">
							<label class="post-story text">
									Story Description<span class="req">*</span>
								</label>
							<textarea rows="3" name="description" required></textarea>
						</div>

						<div class="field-wrap">
							<p class="small-label">
								Story Type <span class="req">*</span>
							</p>
							<button type="button" class="btn story-type-button" data-type="images"><span>Images</span></button>
							<button type="button" class="btn story-type-button" data-type="text"><span>Text</span></button>
							<button type="button" class="btn story-type-button" data-type="audio"><span>Audio</span></button>
						</div> 

						<div class="field-wrap story-images">
							<p class="small-label">
								Images <span class="req">*</span>
							</p>
							<input type="file" name="images" accept="image/*" multiple>
						</div>

						<div class="field-wrap story-text">
							<label class="post-story text">
									Text <span class="req">*</span>
								</label>
							<textarea rows="8" name="text"></textarea>
						</div>

						<div class="field-wrap story-audio">
							<p class="small-label">
								Audio <span class="req">*</span>
							</p>
							<input type="file" name="audio" accept="audio/*">
						</div>

						<div class="field-wrap">
							<button type="submit" class="btn view-button"><i class="fa fa-check" aria-hidden="true"></i> Post Story</button>
						</div>

					</form>
				</div>
			</div>
		</article>
	</div>

	<!-- footer content -->
	<footer id="footer-content">
		<p class="copyright">Communify 2017</p>
	</footer>



	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="./js/index.js"></script>
</body>

</html>