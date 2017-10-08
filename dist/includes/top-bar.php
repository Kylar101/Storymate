
		<section id="top-bar">
			<div class="user-bar">
				<div class="top-logo-wrapper">
					<a href="search.php"><img class="logo" src="img/logo.png"></a>
				</div>
				<?php
				$url = $_SERVER['REQUEST_URI'];

				if (strpos($url, 'profile') == true || strpos($url, 'post-story') == true || strpos($url, 'stories') == true || strpos($url, 'categories') == true || strpos($url, 'users') == true) :
					?>
					<div id="hamburger-menu">
						<button class="hamburger">&#9776;</button>
						<button class="cross">&#735;</button>
					</div>
				<?php endif; ?>
				<p class="user-name">
					<!-- <span class="notifications"><i class="fa fa-commenting-o" aria-hidden="true"></i></span> -->

					<?php 

					while($notice = mysqli_fetch_array($notesres)) :
						$msg = $notice['notification'];
					
					?>

					<!-- do fancy html stuff here-->

					<?php
						endwhile;
					?>
					<a href="profile.php">    <i class="fa fa-user" aria-hidden="true"></i>  <?php echo $row['firstName'] .' '. $row['lastName']; ?></a>
				</p>

			</div>
		</section>
