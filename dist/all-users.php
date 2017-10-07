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
					<h2 class="title">All Users</h2>
					<div class="new-users-location">

						<?php 

						$users = "SELECT * FROM users";
						$fetchusers = mysqli_query($conn,$users);
						

						while($user = mysqli_fetch_array($fetchusers)) :

							$roleID = $user['userRole'];
							$SQL = "SELECT * FROM userroles WHERE rollID='$roleID'";
							$result = mysqli_query($conn, $SQL);
							if (!$result) {
							    die(mysqli_error($conn));
							}
							$roleName = mysqli_fetch_array($result);

						?>

						<div class="new-users">
							<div class="user-details">
								<h3 class="user-name"><?php echo $user['firstName'].' '.$user['lastName']; ?> - <span style="color: red;"><?php echo $roleName['roleName'] ?></span></h3>
								<p class="user-email"><?php echo $user['email']; ?></p>
							</div>
							<div class="user-buttons">
								<a href="php/update-users.php?userID=<?php echo $user['userID'] ?>&method=delete" class="delete-button user-icons"><i class="fa fa-times" aria-hidden="true"></i></a>
								<a href="php/update-users.php?userID=<?php echo $user['userID'] ?>&method=<?php echo $roleName['roleName'] ?>" class="edit-button user-icons"><i class="fa fa-arrows-h" aria-hidden="true"></i></a>
							</div>
						</div>

					<?php endwhile; ?>
					</div>
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
