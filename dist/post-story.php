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

	$getStory = "SELECT * FROM stories,storycontents WHERE stories.storyID = '$storyID' AND storycontents.storyID = '$storyID'";
	$storyResult = mysqli_query($conn, $getStory);
	$storyRow = mysqli_fetch_array($storyResult);

	if (!$storyResult) {
		die(mysqli_error($conn));
	}

	$imgsql = "SELECT * FROM images WHERE storyID = '$storyID'";
	$imgRes = mysqli_query($conn,$imgsql);
	if (!$imgRes) {
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
	<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	<!-- <link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body>

	<!-- Top bar -->
	<header>
		<section id="top-bar">
			<div class="user-bar">
				<p class="user-name"><a href="profile.php"><?php echo $row['firstName'].' '. $row['lastName']; ?></a></p>
			</div>
		</section>
	</header>

	<!-- Main content -->
	<div id="main-content">
		<?php include('includes/side-bar.php'); ?>
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
					<form action="php/story_processing.php" method="post" enctype="multipart/form-data">
					<?php else : ?>
					<form action="php/story_updating.php?story=<?php echo $storyID ?>" method="post" enctype="multipart/form-data">
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
			                <?php if (!$editMode) : ?>
				             <textarea rows="8" name="text"></textarea>
							<?php else : ?>
							<textarea rows="8" name="text"><?php echo $storyRow['textfield']?></textarea>
							<?php endif; ?>
			            </div>

						<div class="field-wrap story-images">
							<p class="small-label">
								Images <span class="req">*</span>
							</p>

							<div class="edit-image-wrapper">
						        <?php
					        	if ($editMode):
					        		?>
					        		<h4>Current Images</h4>
					        		<p>Please select the images you would like to remove</p>
					        		<input type="checkbox" name="image-updated[]" value="0" style="display: none;" checked="checked">
					        	<?php
						        	while($imgrow = mysqli_fetch_array($imgRes)){

						        ?>
							        <!-- <div class="container"> -->
						                <input type="checkbox" name="image-updated[]" value="<?php echo $imgrow['imageID']; ?>">
						                <img class="edit-story-image" src=<?php echo "uploads/" . basename($imgrow['imagepath']); ?> />
					                <!-- </div> -->
						        <?php
						    		}
					    		endif;
						        ?>
					        </div>
							<input type="file" name="images[]" accept="image/*" multiple>
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
						    <div id="progress-timer"></div>
						    <div>
						      <div  class="list-unstyled" id='ul'></div>
						    </div>
						    <input id="audioID" type="text" name="audio">
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
