<?php
session_start();
include('php/connector.php');
$username = $_SESSION['login_user'];

$getID = "SELECT userID FROM users WHERE email = '$username'";
$getuser = mysqli_query($conn,$getID);
$user = mysqli_fetch_array($getuser);
$currentUser = $user[0];

$sql = "SELECT * FROM users WHERE userID = '$currentUser'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html>
	<?php include 'includes/head.php'; ?>

<body>

	<!-- Top bar -->
	<header>
		<?php include('includes/top-bar.php'); ?>
	</header>

	<!-- Main content -->
	<div id="main-content">
		<?php include('includes/side-bar.php'); ?>
		<article id="page-content">
			<div class="profile-details">
				
				<div class="my-stories">
					<h2 class="title">All Categories</h2>
					<div class="new-users-location">

						<?php 

						$cat = "SELECT * FROM categories";
						$fetchCats = mysqli_query($conn,$cat);
						

						while($cats = mysqli_fetch_array($fetchCats)) :

						?>

						<div class="new-users">
							<div class="user-details">
								<h3 class="user-name"><?php echo $cats['categoryName']; ?></h3>
								<p class="user-email"><?php echo $cats['categoryDescription']; ?></p>
							</div>
							<div class="user-buttons">
								<a href="php/update-categories.php?catID=<?php echo $cats['categoryID'] ?>" class="delete-button user-icons"><i class="fa fa-times" aria-hidden="true"></i></a>
							</div>
						</div>

					<?php endwhile; ?>
					</div>
				</div>

				<div class="post-form form">
							<form action=php/add-category.php method="post">

								<div class="field-wrap">
									<label class="post-story text">
											Category Name<span class="req">*</span>
										</label>
									<input type="text" name='name' required autocomplete="off" />
								</div>

								<div class="field-wrap">
									<label class="post-story text">
											Description<span class="req">*</span>
										</label>
									<textarea rows="3" name="description" class="comment-text-area" required> </textarea>
								</div>
								<div class="field-wrap">
								<button type="submit" class="btn view-button"><i class="fa fa-check" aria-hidden="true"></i> Add Category</button>
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



  <script src="bundle.js"></script>
</body>
</html>
