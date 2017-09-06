<?php
session_start();
include('php/connector.php');
$curUser = $_SESSION['login_user'];
$usersql = "SELECT * FROM users WHERE email = '$curUser'";
$userRes = mysqli_query($conn,$usersql);
$userRow = mysqli_fetch_array($userRes);

?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Search</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">


</head>

<body>

	<!-- Top bar -->
	<header>
		<section id="top-bar">
			<div class="user-bar">
				<p class="user-name"><a href="profile.php"><?php echo $userRow['firstName'].' '.$userRow['lastName']; ?></a></p>
			</div>
		</section>
	</header>

	<!-- Main content -->
	<div id="main-content-front">
		<article id="front-content search">
			<div class="search-header">
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
						<p class="advance-button">Advanced Search</p>
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
				<div class="search-wrapper">
				<?php
					if(isset($_POST['search'])){

						$term = mysqli_real_escape_string($conn, $_POST['search']);
					 	$sql = "SELECT * FROM stories INNER JOIN users ON stories.authorID = users.userID WHERE title LIKE '%$term%' OR  description LIKE '%$term%' OR firstName LIKE '%$term%' OR lastName LIKE '%$term%' ORDER BY title";
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
							<img src="<?php echo $path; ?>">
							<div class="story-info">
								<h3 class="title"><?php echo $stories['title']; ?></h3>
								<p class="excerpt"><?php echo $stories['description']; ?></p>
								<h4 class="author-name"><?php echo $stories['firstName'].' '.$stories['lastName'] ?></h4>
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
						$sql = "SELECT * FROM stories INNER JOIN users ON stories.authorID = users.userID ORDER BY storyID Desc LIMIT 10";
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
							<img src="<?php echo $path; ?>">
							<div class="story-info">
								<h3 class="title"><?php echo $stories['title']; ?></h3>
								<p class="excerpt"><?php echo $stories['description']; ?></p>
								<h4 class="author-name"><?php echo $stories['firstName'].' '.$stories['lastName'] ?></h4>
								<div class="story-extra">
									<div class="likes">27 <span class="feature-likes"> <i class="fa fa-thumbs-up" aria-hidden="true"></span></i></div>
									<a href="view-story.php?storyID=<?php echo $stories['storyID'];?>" class="btn comments-button view-story">View Story</a>
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
