<!DOCTYPE html>

<?php
  include ('php/connector.php');
  session_start();

$username = $_SESSION['login_user'];

$getID = "SELECT userID FROM users WHERE email = '$username'";
$user = mysqli_query($conn,$getID);
$userRow = mysqli_fetch_array($user);
$userID = $userRow['userID'];

$sql = "SELECT * FROM users WHERE userID = '$userID'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$editMode = '';
$storyID = '';
$storyActive = '';

if (isset($_GET['edit'])) :

	$editMode = $_GET['edit'];
	$storyID = $_GET['story'];

	$getStory = "SELECT * FROM stories WHERE storyID = '$storyID'";
	$storyResult = mysqli_query($conn, $getStory);
	$storyRow = mysqli_fetch_array($storyResult);

	if (!$storyResult) {
		die(mysqli_error($conn));
	}

	if ($editMode) {
		$storyActive = 'active';
	}

endif;

?>

<html>

<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css">


</head>

<body>

	<!-- Top bar -->
	<header>
		<section id="top-bar">
			<div class="user-bar">
				<p class="user-name"><a href="profile.php"><?php echo $row['firstName'];echo ' '; echo $row['lastName']; ?></a></p>
			</div>
		</section>
	</header>

	<!-- Main content -->
	<div id="main-content">
		<nav id="side-bar">
			<ul>
        <li class="manage-story"><a href="profile.php"><i class="fa fa-list-ul" aria-hidden="true"></i> My Account</a></li>
        <li class="post-story active"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post Story</a></li>

			</ul>
		</nav>
		<article id="page-content">
			<div id="post-story">
				<div class="title-wrapper">
					<?php if (!$editMode) : ?>
						<h1 class="title">Post Story</h1>
					<?php else : ?>
						<h1 class="title">Edit "<?php echo $storyRow['title'] ?>"</h1>
					<?php endif; ?>
				</div>
				<div class="post-form form">
					<?php if (!$editMode) : ?>
					<form action="php/story_processing.php" method="post">
					<?php else : ?>
					<form action="php/story_updating.php?story=<?php echo $storyID ?>" method="post">
					<?php endif; ?>

						<div class="field-wrap">
							<label class="post-story <?php echo $storyActive; ?>">
									Title<span class="req">*</span>
								</label>
							<?php if (!$editMode) : ?>
							<input type="text" name="title" required autocomplete="off"/>
							<?php else : ?>
							<input type="text" name="title" required autocomplete="off" value="<?php echo $storyRow['title']?>"/>
							<?php endif; ?>
						</div>

						<div class="field-wrap">
							<label class="post-story text <?php echo $storyActive; ?>">
									Description<span class="req">*</span>
								</label>
							<?php if (!$editMode) : ?>
							<textarea rows="1" name="description" required></textarea>
							<?php else : ?>
							<textarea rows="1" name="description" required><?php echo $storyRow['description']?></textarea>
							<?php endif; ?>
						</div>

						<div class="field-wrap">
							<p class="small-label">
								Add content <span class="req">*</span>
							</p>
              <button type="button" class="btn story-type-button" data-type="text"><span>Text</span></button>
              <button type="button" class="btn story-type-button" data-type="images"><span>Images</span></button>
							<button id="audio-button" type="button" class="btn story-type-button" data-type="audio"><span>Audio</span></button>
						</div>

            <div class="field-wrap story-text">
              <label class="post-story text">
                  Text <span class="req">*</span>
                </label>
              <textarea rows="8" name="text"></textarea>
            </div>

						<div class="field-wrap story-images">
							<p class="small-label">
								Images <span class="req">*</span>
							</p>
							<input type="file" name="images" accept="image/*" multiple>
						</div>



						<div class="field-wrap story-audio">
							<div id='gUMArea'>
						      <div style="display: none;">
						      Record:
						        <input type="radio" name="media" value="video" id='mediaVideo'>Video
						        <input type="radio" name="media" value="audio" checked>audio
						      </div>
						      <button type="button" class="btn btn-default"  id='gUMbtn'>Show Recorder</button>
						    </div>
						    <div id='btns'>
						      <button type="button" class="btn audio-button" id='start'>Start Recording</button>
						      <button  type="button"  class="btn delete-button" id='stop'>Stop Recording</button>
						    </div>
						    <div>
						      <div  class="list-unstyled" id='ul'></div>
						    </div>
						</div>

						<div class="field-wrap">
							<?php if (!$editMode) : ?>
							<button type="submit" class="btn draft-button">Save Draft</button>
              <button type="submit" class="btn view-button"><i class="fa fa-check" aria-hidden="true"></i> Post Story</button>

							<?php else : ?>
							<button type="submit" class="btn view-button"><i class="fa fa-check" aria-hidden="true"></i> Update Story</button>
							<?php endif; ?>
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



	<!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
	<script src="bundle.js"></script>
</body>

</html>
