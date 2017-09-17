
		<section id="top-bar">
			<div class="user-bar">
				<div class="top-logo-wrapper">
					<img class="logo" src="img/logo.png">
				</div>
				<?php 

				$url = $_SERVER['REQUEST_URI'];

				if (strpos($url, 'profile') == true || strpos($url, 'post-story') == true) :
					?>
					<div id="hamburger-menu">
						<button class="hamburger">&#9776;</button>
						<button class="cross">&#735;</button>
					</div>
				<?php endif; ?>
				<p class="user-name"><a href="profile.php"><?php echo $row['firstName'] .' '. $row['lastName']; ?></a></p>
			</div>
		</section>