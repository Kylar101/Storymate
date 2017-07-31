<?php
session_start();
include('php/connector.php');
$_SESSION['curStoryID'] = $_GET['story'];
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sound of Silence</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
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
				<p class="user-name">Jeffery</p>
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
			            <div>
			                <img data-u="image" src="img/story-feature1.jpg" />
			            </div>
			            <div>
			                <img data-u="image" src="img/story-feature2.jpg" />
			            </div>
			            <div>
			                <img data-u="image" src="img/story-feature1.jpg" />
			            </div>
			            <div>
			                <img data-u="image" src="img/story-feature2.jpg" />
			            </div>
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
					<h1>Sound of Silence</h1>
					<div class="content">
						<p>Sweet brownie jelly. Candy lollipop donut chocolate cake pudding. Toffee carrot cake croissant. Sweet icing bear claw. Tart halvah icing pastry marshmallow croissant wafer tootsie roll. Sweet roll lemon drops sweet lemon drops sweet roll marzipan. Topping brownie apple pie brownie. </p>
						<p> Gingerbread cotton candy toffee apple pie croissant. Powder topping powder wafer chocolate bar. Powder chupa chups soufflé sweet roll. Jelly beans halvah toffee cake oat cake fruitcake oat cake caramels jelly. Chupa chups candy jelly beans donut bonbon oat cake muffin apple pie.</p>
					</div>
				</div>
				<div class="story-comments">
					<h2>Comments</h2>
					<div class="comment">
						<h4>Dean Winshester</h4>
						<p class="comment-content">SAMMY!!! Read this story.</p>
					</div>
					<div class="add-comment">
						<div class="post-form form">
							<form action="/" method="post">

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
									<textarea rows="3" name="description" required></textarea>
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
						<h4 class="author-name">Jack Black</h4>
						<p class="description">Cookie cake marshmallow cookie chocolate cake dessert jelly-o dragée. Cookie fruitcake cake chocolate.</p>
						<a href="#" class="btn view-button"><i class="fa fa-eye" aria-hidden="true"></i> Follow</a>
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
