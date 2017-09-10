<?php 

	$userRole = $row['userRole'];

	
?>

<nav id="side-bar">
	<ul>
		<li class="profile"><a href="profile.php"><i class="fa fa-list-ul" aria-hidden="true"></i> My Account</a></li>
		<li class="post-story"><a href="post-story.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post Story</a></li>
		<li class="search"><a href="search.php"><i class="fa fa-search" aria-hidden="true"></i> Search Stories</a></li>
		<li class="logout"><a href="./php/log_out.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a></li>
		<?php if ($userRole == 1) : ?>
		<li class="manage-stories"><a href="manage-stories.php"><i class="fa fa-list-ul" aria-hidden="true"></i> Manage Stories</a></li>
		<?php endif; ?>
	</ul>
</nav>
<nav id="side-bar-mobile">
	<ul>
		<li class="profile"><a href="profile.php"><i class="fa fa-list-ul" aria-hidden="true"></i> My Account</a></li>
		<li class="post-story"><a href="post-story.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post Story</a></li>
		<li class="search"><a href="search.php"><i class="fa fa-search" aria-hidden="true"></i> Search Stories</a></li>
		<li class="logout"><a href="./php/log_out.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a></li>
		<?php if ($userRole == 1) : ?>
		<li class="manage-stories"><a href="manage-stories.php"><i class="fa fa-list-ul" aria-hidden="true"></i> Manage Stories</a></li>
		<?php endif; ?>
	</ul>
</nav>