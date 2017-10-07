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
<html>
	<?php include 'includes/head.php'; ?>

<body>

	<!-- Top bar -->
	<header>
		<?php include('includes/top-bar.php'); ?>
	</header>

	<!-- Main content -->
	<div id="main-content">

		<?php include('includes/side-bar.php'); ?>
		<article id="page-content">
			<div class="profile-details">
				
				<div class="my-stories">
					<h2 class="title">All Flagged Stories</h2>
					<div class="story-card-location">
						<?php
							$flagSQL = "SELECT * FROM flags";
							$fetchflags = mysqli_query($conn,$flagSQL);

							while($flags = mysqli_fetch_array($fetchflags)) :

								$storyID = $flags['storyID'];

								$storySQL = "SELECT * FROM stories WHERE storyID='$storyID'";
								$fetchStory = mysqli_query($conn, $storySQL);
								if (!$fetchStory) {
									die (mysqli_error($conn));
								}

								$stories = mysqli_fetch_array($fetchStory);

								$imageSQL = "SELECT * FROM images WHERE storyID = '$storyID' LIMIT 1";
								$fetchImage = mysqli_query($conn,$imageSQL);
								if (!$fetchImage) {
									die (mysqli_error($conn));
								}
								$imagePath = mysqli_fetch_array($fetchImage);
								$path = $imagePath['imagepath'] ? $imagePath['imagepath'] : 'img/pizzasheen.gif';

								$authorID = $stories['authorID'];
								$authorSQL = "SELECT * from users WHERE userID = '$authorID'";
								$fetchAuthor = mysqli_query($conn,$authorSQL);
								if (!$fetchAuthor) {
									die (mysqli_error($conn));
								}
								$authorDets = mysqli_fetch_array($fetchAuthor);

						?>
						<div class="story-card">
							<a href=view-story.php?storyID=<?php echo $stories['storyID'] ?>> <img src="<?php echo $path; ?>" class="story-card-image"> </a>
							<h3 class="story-title"><?php echo $stories['title']; ?></h3>
							<h6 class="story-title"><?php echo $authorDets['firstName'].' '.$authorDets['lastName']; ?></h6>
							<div class="story-card-buttons">
								<a href=view-story.php?storyID=<?php echo $stories['storyID'] ?> class="view-button card-icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href=php/delete_story.php?storyID=<?php echo $stories['storyID'] ?> class="delete-button card-icons"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<!-- <a href=post-story.php?edit=true&story=<?php echo $stories['storyID'] ?> class="edit-button card-icons"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> -->
							</div>
						</div>
						<?php
							endwhile;
						?>

					</div>
				</div>
			</div>
		</article>
	</div>

	<!-- footer content -->
	<footer id="footer-content">
		<p class="copyright">Communify 2017</p>
	</footer>



  <script src="bundle.js"></script>
</body>
</html>
