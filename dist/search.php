<!DOCTYPE html>
<?php
session_start();
include('php/connector.php');

$curUser = $_SESSION['login_user'];
$usersql = "SELECT * FROM users WHERE email = '$curUser'";
$userRes = mysqli_query($conn,$usersql);
$row = mysqli_fetch_array($userRes);

?>

<html>
	<?php 

if (!isset($_SESSION['login_user'])) {
	header('location: ./index.php');
}

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
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title><?php echo $title; ?></title>
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<!-- <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>

	<!-- Top bar -->
	<header class="search-top-bar">
		<?php include('includes/top-bar.php'); ?>
	</header>

	<!-- Main content -->
	<div id="main-content-front">

		<article id="front-content search">

			<div class="search-header">
				<!-- Search bar -->
				<div class="search-stories-tool">
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
						<!-- Advanced Search -->
	          
          <div class="search-advanced">
						<p class="advance-button">Advanced Search</p>
						
						<div class="advanced-search-options">
							<div class="categories">
								<?php 

								$cat = "SELECT * FROM categories";
								$fetchCats = mysqli_query($conn,$cat);
								

								while($cats = mysqli_fetch_array($fetchCats)) :

								?>
								<button name="<?php echo $cats['categoryName'] ?>" class="btn advanced-options-button" data-type="<?php echo $cats['categoryName'] ?>" value="<?php echo $cats['categoryID'] ?>"><span><?php echo $cats['categoryName'] ?></span></button>

							<?php endwhile; ?>
							</div>
						</div>

					</div>
					</div>
			</div>
				<!-- Post story Button -->
				<div class="post-story-search-link">
					<a href="post-story.php" class="post-story-search-link-button">Post Story</a>
				</div>
				<div class="slogan">
					<span>Your Stories, Our Community</span>
				</div>
				<!-- Scroll button -->
				<a href="#search-content-area" id="scrolling-link">
					<div class="wrap">
						<div class="circle">
							<i class="fa fa-angle-down" aria-hidden="true"></i>
						</div>
					</div>
				</a>

		</div>


				</div>

			</div>
			<!-- check for any results -->
				<?php
					if(isset($_POST['search'])){

						$term = mysqli_real_escape_string($conn, $_POST['search']);
					 	$sql = "SELECT * FROM stories INNER JOIN users ON stories.authorID = users.userID WHERE (title LIKE '%$term%' OR  description LIKE '%$term%' OR firstName LIKE '%$term%' OR lastName LIKE '%$term%') AND stories.trash = '0' AND stories.draft = '0' ORDER BY title";
					 	$searchQuery = mysqli_query($conn,$sql);
					 	$numResults = mysqli_num_rows($searchQuery);

					 ?>

			<div class="search-content" id="search-content-area">

				<?php if($numResults == 0) { ?>

					<div id="title-search-content">
					<h1>No Results Found</h1>
				</div>


				<?php } else { ?>

				<div id="title-search-content">
					<h1><?php echo $numResults ?> Stories Found</h1>
				</div>
				<?php } ?>
				<div class="search-wrapper">




					 <?php
						while($stories = mysqli_fetch_array($searchQuery)){

						 	$storyID = $stories['storyID'];

							$imageSQL = "SELECT * FROM images WHERE storyID = '$storyID' LIMIT 1";
							$fetchImage = mysqli_query($conn,$imageSQL);
							if (!$fetchImage) {
								die (mysqli_error($conn));
							}
							$imagePath = mysqli_fetch_array($fetchImage);
							$path = $imagePath['imagepath'] ? $imagePath['imagepath'] : 'img/pizzasheen.gif';

							$likesql = "SELECT * FROM likes WHERE storyID = '$storyID'";
							$likeres = mysqli_query($conn,$likesql);
							$likesqty = mysqli_num_rows($likeres);

				?>
						<div class="story-tile">
							<a href="view-story.php?storyID=<?php echo $stories['storyID'];?>" ><img src="<?php echo $path; ?>"></a>
							<div class="story-info">
            		<!-- <h3 class="story-title"><?php echo $stories['title']; ?></h3> -->
								<a href="view-story.php?storyID=<?php echo $stories['storyID'];?>" class="title-link"><h3><?php echo $stories['title']; ?></h3></a>
								<div class="story-tile-bottom">
									<div class="excerpt"><?php echo $stories['description']; ?></div>
									<h5 class="author-name"><?php echo $stories['firstName'].' '.$stories['lastName'] ?></h5>
									<div class="story-extra">
										<div class="likes"><?php echo $likesqty; ?> <span class="feature-likes"> <i class="fa fa-thumbs-up" aria-hidden="true"></span></i></div>
										<a href=view-story.php?storyID=<?php echo $stories['storyID'];?> class="btn comments-button view-story">View Story</a>
									</div>
							</div>
							</div>
						</div>

				<?php
						}
					}
					else{

				?>

					<?php
						$sql = "SELECT * FROM stories INNER JOIN users ON stories.authorID = users.userID WHERE stories.trash = '0' AND stories.draft = '0' ORDER BY storyID Desc LIMIT 10";
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

							$likesql = "SELECT * FROM likes WHERE storyID = '$storyID'";
							$likeres = mysqli_query($conn,$likesql);
							$likesqty = mysqli_num_rows($likeres);

					?>

					<div class="story-tile">
							<a href="view-story.php?storyID=<?php echo $stories['storyID'];?>" ><img src="<?php echo $path; ?>"></a>
							<div class="story-info">
								<a href="view-story.php?storyID=<?php echo $stories['storyID'];?>" class="title-link"><h3><?php echo $stories['title']; ?></h3></a>
								<p class="excerpt"><?php echo $stories['description']; ?></p>
								<hr class="divider-line">
								<div class="story-tile-bottom">
									<h6 class="author-name"><?php echo $stories['firstName'].' '.$stories['lastName'] ?></h6>
									<div class="story-extra">
										<div class="likes" id="likecoutner"><?php echo $likesqty; ?> <span class="feature-likes"> <i class="fa fa-thumbs-up" aria-hidden="true"></span></i></div>
										<!-- <a href="view-story.php?storyID=<?php echo $stories['storyID'];?>" class="btn view-button-searched view-story">View Story</a> -->
									</div>
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
