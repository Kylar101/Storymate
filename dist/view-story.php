<?php
session_start();
include('php/connector.php');

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

$audioID = $contentsRow['audioID'];
$audioSQL = "SELECT * FROM audio WHERE audioID = '$audioID'";
$audioRes = mysqli_query($conn, $audioSQL);

if (!$audioRes) {
	die (mysqli_error($conn));
}

$audioRow = mysqli_fetch_array($audioRes);

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
  <title><?php echo $storyRow['title']; ?></title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">


</head>

<body>

<!-- #region Jssor Slider Begin -->
    <!-- Generator: Jssor Slider Maker -->
    <!-- Source: https://www.jssor.com -->
    <script src="./js/jssor.slider-25.2.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 5000,
              $SlideEasing: $Jease$.$InOutSine,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/
            /*remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 980);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <style>
        /* jssor slider loading skin double-tail-spin css */

        .jssorl-004-double-tail-spin img {
            animation-name: jssorl-004-double-tail-spin;
            animation-duration: 1.2s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-004-double-tail-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        .jssorb052 .i {position:absolute;cursor:pointer;}
        .jssorb052 .i .b {fill:#000;fill-opacity:0.3;stroke:#fff;stroke-width:400;stroke-miterlimit:10;stroke-opacity:0.7;}
        .jssorb052 .i:hover .b {fill-opacity:.7;}
        .jssorb052 .iav .b {fill-opacity: 1;}
        .jssorb052 .i.idn {opacity:.3;}

        .jssora053 {display:block;position:absolute;cursor:pointer;}
        .jssora053 .a {fill:none;stroke:#fff;stroke-width:640;stroke-miterlimit:10;}
        .jssora053:hover {opacity:.8;}
        .jssora053.jssora053dn {opacity:.5;}
        .jssora053.jssora053ds {opacity:.3;pointer-events:none;}
    </style>

	<!-- Top bar -->
	<header>
		<section id="top-bar">
			<div class="user-bar">
				<p class="user-name"><a href="profile.php"><?php echo $row['firstName'].' '. $row['lastName']; ?></a></p>
			</div>
		</section>
	</header>

	<!-- Main content -->
	<div id="main-content-front">
		<article id="front-content">
			<div class="story-content">
				<div id="jssor_1" style="margin:0 auto;height:380px;overflow:hidden;visibility:hidden;">
			        <!-- Loading Screen -->
			        <div data-u="loading" class="jssorl-004-double-tail-spin" style="position:absolute;top:0px;left:0px;text-align:center;background-color:rgba(0,0,0,0.7);">
			            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/double-tail-spin.svg" />
			        </div>
			        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">

			        <?php
			        	while($imgrow = mysqli_fetch_array($imgRes)){

			        ?>
			            <div>
			                <img data-u="image" src=<?php echo "uploads/" . basename($imgrow['imagepath']); ?> />
			            </div>
			        <?php
			    		}
			        ?>
			        </div>
			        <!-- Bullet Navigator -->
			        <div data-u="navigator" class="jssorb052" style="position:absolute;top:350px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
			            <div data-u="prototype" class="i" style="width:16px;height:16px;">
			                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
			                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
			                </svg>
			            </div>
			        </div>
			        <!-- Arrow Navigator -->
			        <div data-u="arrowleft" class="jssora053" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
			            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
			                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
			            </svg>
			        </div>
			        <div data-u="arrowright" class="jssora053" style="width:55px;height:55px;top:0px;left:875px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
			            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
			                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
			            </svg>
			        </div>
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
											Comment<span class="req">*</span>
										</label>
									<textarea rows="3" name="comment" required></textarea>
								</div>
								<div class="field-wrap">
								<button type="submit" class="btn view-button"><i class="fa fa-check" aria-hidden="true"></i> Post Comment</button>
							</div>
							</form>
						</div>
					</div>
				</div>	
			</div>
			<div class="author-details">
				<div class="details">
					<div class="stay">
						<img src="img/profile-pic.gif" class="profile-picture">
						<h4 class="author-name"><?php echo $authorRow['firstName']; echo " "; echo $authorRow['lastName']; ?></h4>
						<p class="description"><?php echo $storyRow['description']; ?></p>
						<?php if ($followingRow['follows'] != 1) : ?>
						<a href="php/follow-processing.php?storyID=<?php echo $curstoryID; ?>&authorID=<?php echo $authorRow['userID']; ?>&follow=true" class="btn view-button"><i class="fa fa-eye" aria-hidden="true"></i> Follow</a>
						<?php else : ?>
						<a href="php/follow-processing.php?storyID=<?php echo $curstoryID; ?>&authorID=<?php echo $authorRow['userID']; ?>&follow=false" class="btn view-button"><i class="fa fa-eye" aria-hidden="true"></i> Unfollow</a>
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

<script type="text/javascript">jssor_1_slider_init();</script>

  <script src="bundle.js"></script>
</body>
</html>
