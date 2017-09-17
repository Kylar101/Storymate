<?php
session_start();
include('php/connector.php');

if (!isset($_SESSION['login_user'])) {
	header('location: ./index.php');
}

$username = $_SESSION['login_user'];

$getID = "SELECT userID FROM users WHERE email = '$username'";
$user = mysqli_query($conn,$getID);
$userRow = mysqli_fetch_array($user);
$userID = $userRow['userID'];


$sql = "SELECT * FROM users WHERE userID = '$userID'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$curstoryID = $_GET['storyID'];


$getAuthor = "SELECT authorID FROM stories WHERE storyID = '$curstoryID'";
$getAuthorRes = mysqli_query($conn,$getAuthor);
$getAuthorRow = mysqli_fetch_array($getAuthorRes);

$authorSQL = "SELECT * FROM users WHERE userID = '$getAuthorRow[0]' ";
$authorRes = mysqli_query($conn,$authorSQL);
$authorRow = mysqli_fetch_array($authorRes);
$authorID = $authorRow['userID'];

$followingSQL = "SELECT * FROM following WHERE userID='$userID' AND followingID='$authorID'";
$followingRes = $storyRes = mysqli_query($conn,$followingSQL);
if (!$followingRes) {
	die (mysqli_error($conn));
}
$followingRow = mysqli_fetch_array($followingRes);

$flagSQL = "SELECT * FROM flags WHERE userID='$userID' AND storyID='$curstoryID'";
$flagRes = $storyRes = mysqli_query($conn,$flagSQL);
if (!$flagRes) {
	die (mysqli_error($conn));
}
$flagRow = mysqli_fetch_array($flagRes);

$storySQL = "SELECT * FROM stories WHERE storyID = '$curstoryID'";
$storyRes = mysqli_query($conn,$storySQL);
$storyRow = mysqli_fetch_array($storyRes);

if (!$storyRes) {
	die (mysqli_error($conn));
}

$contentsSQL = "SELECT * FROM storycontents WHERE storyID = '$curstoryID'";
$contentsRes = mysqli_query($conn,$contentsSQL);
$contentsRow = mysqli_fetch_array($contentsRes);

if (!$contentsRes) {
	die (mysqli_error($conn));
}


$asql = "SELECT * FROM audio WHERE storyID = '$curstoryID'";
$ares = mysqli_query($conn,$asql);
$audioRow = mysqli_fetch_array($ares);
//$audioID = $arow['aduioFILE'];
//$audioSQL = "SELECT * FROM audio WHERE audioID = '$audioID'";
//$audioRes = mysqli_query($conn, $audioSQL);

if (!$ares) {
	die (mysqli_error($conn));
}

//$audioRow = mysqli_fetch_array($audioRes);

$commentSQL = "SELECT * FROM comments WHERE storyID = $curstoryID";
$commRes = mysqli_query($conn,$commentSQL);

if (!$commRes) {
	die (mysqli_error($conn));
}

$imgsql = "SELECT * FROM images WHERE storyID = '$curstoryID'";
$imgRes = mysqli_query($conn,$imgsql);

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <title><?php echo $storyRow['title']; ?></title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">


</head>

<body>

	<!-- Top bar -->
	<header>
		<section id="top-bar">
			<div class="user-bar">
				<div id="author-hamburger-menu">
					<button class="author-hamburger">&#9776;</button>
					<button class="author-cross">&#735;</button>
				</div>
				<p class="user-name"><a href="profile.php"><?php echo $row['firstName'].' '. $row['lastName']; ?></a></p>
			</div>
		</section>
	</header>

	<!-- Main content -->
	<div id="main-content-front">

			<div id="author-mobile">
				<div class="details">
					<div class="stay">
						<img src="img/profile-pic.gif" class="profile-picture">
						<h4 class="author-name"><?php echo $authorRow['firstName']; echo " "; echo $authorRow['lastName']; ?></h4>
						<p class="description"><?php echo $storyRow['description']; ?></p>
						<?php if (($authorRow['firstName'].' '.$authorRow['lastName']) == $row['firstName'] .' '. $row['lastName']) : ?>

						<?php elseif ($followingRow['follows'] != 1) : ?>
						<a href="php/follow-processing.php?storyID=<?php echo $curstoryID; ?>&authorID=<?php echo $authorRow['userID']; ?>&follow=1" class="btn view-button"><i class="fa fa-eye" aria-hidden="true"></i> Follow</a>
						<?php else : ?>
						<a href="php/follow-processing.php?storyID=<?php echo $curstoryID; ?>&authorID=<?php echo $authorRow['userID']; ?>&follow=0" class="btn view-button"><i class="fa fa-eye" aria-hidden="true"></i> Unfollow</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<article id="front-content">
			<!-- Go back button -->
			<div class="to-search">
				<a onclick="window.history.go(-1); return false;">Back to search</a>
			</div>

			<div class="story-content">
			<div class="slider">
			        <?php
			        	while($imgrow = mysqli_fetch_array($imgRes)){

			        ?>
		                <img class="slider-image" src=<?php echo "uploads/" . basename($imgrow['imagepath']); ?> />
			        <?php
			    		}
			        ?>
		        </div>
				<div class="story-article">
					<h1><?php echo $storyRow['title'] ?></h1>
					<div class="content">
						<?php if ($audioRow['audioFile']) : ?>
							<audio controls src="<?php echo $audioRow['audioFile'] ?>"></audio>
						<?php endif; ?>
						<p><?php echo $contentsRow['textfield'] ?></p>
					</div>
				</div>



				<div class="story-comments">
					<h2>Comments</h2>

				<?php

					while($comment = mysqli_fetch_array($commRes)){

						$comAuthID = $comment['authorID'];
						$comAuth = "SELECT * FROM users WHERE userID = '$comAuthID'";
						$comAuthRes = mysqli_query($conn,$comAuth);
						$comAuthRow = mysqli_fetch_array($comAuthRes);
				?>
					<div class="comment">
						<h4><?php echo $comAuthRow['firstName'] . " " . $comAuthRow['lastName']; ?></h4>
						<p class="comment-content"><?php echo $comment['commentBody']; ?></p>
					</div>

				<?php
					}
				?>
					<hr class="sections-divider">
					<!-- Add comment form -->
					<h4>Write a comment</h4>
					<div class="add-comment">
						<div class="post-form form">
							<form action=php/comment_processing.php?storyID=<?php echo $storyRow['storyID'];?> method="post">

								<div class="field-wrap">
									<label class="post-story">
											Your Name<span class="req">*</span>
										</label>
									<input type="text" required autocomplete="off" />
								</div>

								<div class="field-wrap">
									<label class="post-story text">
											Write your comment<span class="req">*</span>
										</label>
									<textarea rows="3" name="comment" required></textarea>
								</div>
								<div class="field-wrap">
								<button type="submit" class="btn view-button"><i class="fa fa-check" aria-hidden="true"></i> Post Comment</button>
							</div>
							</form>
						</div>
					</div>

					<form action=php/like_processing.php?storyID=<?php echo $curstoryID; ?> method="post">
						<button type="submit" class="btn view-button"><i class="fa fa-check" aria-hidden="true"></i> Like</button>
					</form>

				</div>


			</div>
			<div class="author-details">
				<div class="details">
					<div class="stay">
						<img src="img/profile-pic.gif" class="profile-picture">
						<h4 class="author-name"><?php echo $authorRow['firstName'].' '.$authorRow['lastName']; ?></h4>
						<p class="description"><?php echo $storyRow['description']; ?></p>
						<?php if (($authorRow['firstName'].' '.$authorRow['lastName']) == $row['firstName'] .' '. $row['lastName']) : ?>

						<?php elseif ($followingRow['follows'] != 1) : ?>
						<a href="php/follow-processing.php?storyID=<?php echo $curstoryID; ?>&authorID=<?php echo $authorRow['userID']; ?>&follow=1" class="btn view-button"><i class="fa fa-eye" aria-hidden="true"></i> Follow</a>
						<?php else : ?>
						<a href="php/follow-processing.php?storyID=<?php echo $curstoryID; ?>&authorID=<?php echo $authorRow['userID']; ?>&follow=0" class="btn view-button"><i class="fa fa-eye" aria-hidden="true"></i> Unfollow</a>
						<?php endif; ?>
						<?php if (!$flagRow['flagID']) : ?>
						<a href="php/flag-processing.php?storyID=<?php echo $curstoryID; ?>&flag=1" class="btn delete-button"><i class="fa fa-eye" aria-hidden="true"></i> Flag as inappropiate</a>
						<?php else : ?>
							<a href="php/flag-processing.php?storyID=<?php echo $curstoryID; ?>&flag=0" class="btn delete-button"><i class="fa fa-eye" aria-hidden="true"></i> Unflag as inappropiate</a>
						<?php endif; ?>
					</div>
				</div>
			</div>


		</article>
	</div>

	<!-- footer content -->
	<footer id="footer-content">
		<!-- <p class="copyright">Communify 2017</p> -->
	</footer>


  <script src="bundle.js"></script>
</body>
</html>
