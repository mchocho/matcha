<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Awesome Title</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="manifest" href="manifest.webmanifest">
		<!-- Use inline css -->
		<!-- <style></style> -->
		<!-- Or link external file -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
		<link rel="stylesheet" href="css/style.css" media="all" />
		<style>
			body {
				background: url('images/wallpaper_1.jpg');
				background-repeat: no-repeat;
				background-size: cover;
			}
		</style>
	</head>
	<body>
		<!-- Content goes here -->
		<?php 
			include('includes/header.php');
		?>
		<div class="wrapper" align="center">
			<h2>Meet and fall in love!</h2>
			<form method="POST" action="includes/signup.inc.php">
				<?php
					if (isset($_GET['error3']))
						echo '<span>Your emmail or password was incorrect</span>';
				?>
				<label>
					Username
					<?php
						if (isset($_GET['error1']))
							echo '<span>Please enter your username.</span>';
					?>
					<input type="text" name="username" class="txt" required />
				</label>
				<label>
					Password
					<?php
						if (isset($_GET['error2']))
							echo '<span>Please enter your password.</span>';
					?>
					<input type="password" name="password" class="txt" required />
				</label>
				<input type="submit" name="cupid" value="Submit" />
			</form>
		</div>
	</body>
</html>
