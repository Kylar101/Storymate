<?php
session_start();
include('php/connector.php');
$curUser = $_SESSION['login_user'];
$usersql = "SELECT * FROM users WHERE email = '$curUser'";
$userRes = mysqli_query($conn,$usersql);
$row = mysqli_fetch_array($userRes);

?>

<!DOCTYPE html>
<html >
<head>

<html>
	<?php include 'includes/head.php'; ?>

<body>

	<!-- Top bar -->
	<header>
		<?php include 'includes/top-bar.php'; ?>
	</header>

	<!-- Main content -->
	<div id="main-content-front">
		<article id="front-content search">
			<div class="search-header">

					<!-- button linked to post story page -->
					<div class="post-story-search-link">
						<a href="post-story.php" class="post-story-search-link-button">Post Story</a>
					</div>

					<!-- Scroll button -->
					<a href="#title-search-content" id="scrolling-link"><div class="wrap">
						<div class="circle">

							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							viewBox="0 0 25 25" style="enable-background:new 0 0 25 25;" xml:space="preserve">
							<path class="arrow" d="M21.9644928,8.3267822l-8.0706987,8.0706997c-0.7697706,0.7697716-2.0178175,0.7697716-2.7875881,0
							L3.0355062,8.3267822"/>
							</svg>
						</div>
					</div>
				</a>

				<!-- Search bar -->
				<div class="search-options">

          <form class="form" action="search.php" method="POST">
						<div class="field-wrap">
			            	<label>
			                	Search our stories
			            	</label>
			            	<input class="search-bar" type="text" autocomplete="off" name="search"/>
	          </div>
						<button class="search-button edit-button"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>

          <div class="search-advanced">
						<!-- <p class="advance-button">Advanced Search</p> -->
						<div class="advanced-search-options">
							<div class="categories">
								<button type="button" class="btn advanced-options-button" data-type="lifestyle"><span>Lifestyle</span></button>
								<button type="button" class="btn advanced-options-button" data-type="health"><span>Health</span></button>
								<button type="button" class="btn advanced-options-button" data-type="time"><span>Time</span></button>
							</div>
						</div>
					</div>

				</div>

			</div>
			<div class="search-content">
				<div id="title-search-content">
					<h1>Our Stories</h1>
				</div>
				<div class="search-wrapper">
				<?php
					if(isset($_POST['search'])){

						$term = mysqli_real_escape_string($conn, $_POST['search']);
					 	$sql = "SELECT * FROM stories INNER JOIN users ON stories.authorID = users.userID WHERE (title LIKE '%$term%' OR  description LIKE '%$term%' OR firstName LIKE '%$term%' OR lastName LIKE '%$term%') AND stories.trash = '0' ORDER BY title";
					 	$searchQuery = mysqli_query($conn,$sql);
					 	$numResults = mysqli_num_rows($searchQuery);

						while($stories = mysqli_fetch_array($searchQuery)){

						 	$storyID = $stories['storyID'];

							$imageSQL = "SELECT * FROM images WHERE storyID = '$storyID' LIMIT 1";
							$fetchImage = mysqli_query($conn,$imageSQL);
							if (!$fetchImage) {
								die (mysqli_error($conn));
							}
							$imagePath = mysqli_fetch_array($fetchImage);
							$path = $imagePath['imagepath'] ? $imagePath['imagepath'] : 'img/pizzasheen.gif';


				?>
						<div class="first-item">
							<a href="view-story.php?storyID=<?php echo $stories['storyID'];?>" ><img src="<?php echo $path; ?>"></a>
							<div class="story-info">
								<h2 class="story-title"><?php echo $stories['title']; ?></h2>
								<p class="excerpt"><?php echo $stories['description']; ?></p>
								<h5 class="author-name"><?php echo $stories['firstName'].' '.$stories['lastName'] ?></h5>
								<div class="story-extra">
									<div class="likes">27 <span class="feature-likes"> <i class="fa fa-thumbs-up" aria-hidden="true"></span></i></div>
									<a href=view-story.php?storyID=<?php echo $stories['storyID'];?> class="btn comments-button view-story">View Story</a>
								</div>
							</div>
						</div>

				<?php
						}
					}
					else{

				?>

					<?php
						$sql = "SELECT * FROM stories INNER JOIN users ON stories.authorID = users.userID WHERE stories.trash = '0' ORDER BY storyID Desc LIMIT 10";
						$topRes = mysqli_query($conn,$sql);
						while($stories = mysqli_fetch_array($topRes)){

						 	$storyID = $stories['storyID'];

							$imageSQL = "SELECT * FROM images WHERE storyID = '$storyID' LIMIT 1";
							$fetchImage = mysqli_query($conn,$imageSQL);
							if (!$fetchImage) {
								die (mysqli_error($conn));
							}
							$imagePath = mysqli_fetch_array($fetchImage);
							$path = $imagePath['imagepath'] ? $imagePath['imagepath'] : 'img/pizzasheen.gif';

					?>
					<div class="first-item">
							<a href="view-story.php?storyID=<?php echo $stories['storyID'];?>" ><img src="<?php echo $path; ?>"></a>
							<div class="story-info">
								<h2 class="title"><?php echo $stories['title']; ?></h2>
								<p class="excerpt"><?php echo $stories['description']; ?></p>
								<hr>
								<h5 class="author-name"><?php echo $stories['firstName'].' '.$stories['lastName'] ?></h5>
								<div class="story-extra">
									<div class="likes">27 <span class="feature-likes"> <i class="fa fa-thumbs-up" aria-hidden="true"></span></i></div>
									<a href="view-story.php?storyID=<?php echo $stories['storyID'];?>" class="btn view-button-searched view-story">View Story</a>
								</div>
							</div>
						</div>


						<?php
							}
						?>
					</div>

					<?php
						}
					?>

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
