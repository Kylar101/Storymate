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

$storyNum = "SELECT count(storyID) AS num_stories FROM stories WHERE authorID = '$currentUser' AND trash = '0'";
$countResult = mysqli_query($conn,$storyNum);
$countRow = mysqli_fetch_array($countResult);

if (!$countResult) {
	die (mysql_error($countResult));
}
include('php/fetch_notifications.php');
$notifications = mysqli_fetch_array($notesres);
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
			<div class="profile-header">
				<img src="img/profile.jpg" class="profile-picture">
				<div class="count-bg">
					<p class="story-count">You have
						<?php
							echo $countRow['num_stories'];
							if ($countRow['num_stories'] > 1 || $countRow['num_stories'] == 0) :
	    						echo " stories";
							else :
								echo " story";
							endif;
							?>
					</p>

				</div>
			</div>
			<div class="profile-details">
				<div class="personal-details">
					<h2 class="profile-heading">My Details</h2>
					<div class="my-details">
						<p class="name">Name: <?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?></p>
						<p class="email">E-mail: <?php echo $row['email']; ?></p>
						<p class="number">Phone: <?php echo $row['phone']; ?></p>
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




							<div class="submit-cancel">

							<button type="submit" class="btn view-button submit-changes-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Submit Changes</button>
							<button type="button" class="btn cancel-button change-details-cancel">Cancel</button>
						</div>


						</form>
					</div>
				</div>
				<div class="my-stories">
					<h2 class="profile-heading">My Stories</h2>
					<div class="story-card-location">
						<?php
							$storySQL = "SELECT * FROM stories WHERE authorID = '$currentUser' AND trash = '0'";
							$fetchStories = mysqli_query($conn,$storySQL);

							while($stories = mysqli_fetch_array($fetchStories)){

								$storyID = $stories['storyID'];

								$imageSQL = "SELECT * FROM images WHERE storyID = '$storyID' LIMIT 1";
								$fetchImage = mysqli_query($conn,$imageSQL);
								if (!$fetchImage) {
									die (mysqli_error($conn));
								}
								$imagePath = mysqli_fetch_array($fetchImage);
								$path = $imagePath['imagepath'] ? $imagePath['imagepath'] : 'img/pizzasheen.gif';


						?>
						<div class="story-card">
							<a href=view-story.php?storyID=<?php echo $stories['storyID'] ?>> <img src="<?php echo $path; ?>" class="story-card-image"> </a>
							<h5 class="story-title"><?php echo $stories['title']; ?></h5>
							<div class="story-card-buttons">
								<a href=view-story.php?storyID=<?php echo $stories['storyID'] ?> class="view-button card-icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
								<a href=php/delete_story.php?storyID=<?php echo $stories['storyID'] ?> class="delete-button card-icons"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								<a href=post-story.php?edit=true&story=<?php echo $stories['storyID'] ?> class="edit-button card-icons"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							</div>
						</div>
						<?php
							}
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



  <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
  <script src="bundle.js"></script>
</body>
</html>
