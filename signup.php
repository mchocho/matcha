<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Registration | Cupid</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="manifest" href="manifest.webmanifest">
		<!-- Use inline css -->
				<!-- Or link external file -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
		<link rel="stylesheet" href="css/style.css" media="all" />		
		<style>
			body {
				background: url('images/wallpaper_1.jpg');
			}

			h2 {
				margin-top: -5%;
			}
			
			.btn-group {
				margin-left: 40px;
			}
			
			#gender_group {
				margin-left: 60px;
			}
		</style>
	</head>
	<body>
		<!-- Content goes here -->
		<?php
			include('includes/header.php');
		?>
		<div class="wrapper" align="center">
			<h2>Register to find your true love!</h2>
			<form method="POST" action="includes/signup.inc.php">
				<label>
					Username
					<?php
						if (isset($_GET['error1']))
							echo '<span>Please enter your username.</span>';
						else if (isset($_GET['error11']))
							echo '<span>Username already exits</span>';
					?>
					<input type="text" name="username" class="txt" required />
				</label>
				<label>
					First name
					<?php
						if (isset($_GET['error2']))
							echo '<span>Please enter your first name.</span>';
					?>
					<input type="text" name="f_name" class="txt" required />
				</label>
				<label>
					Last name
					<?php
						if (isset($_GET['error3']))
							echo '<span>Please enter your last name</span>';
					?>
					<input type="text" name="l_name" class="txt" required />
				</label>
				<label>
					Gender
					<?php
						if (isset($_GET['error4']))
							echo '<span>Please select your gender.</span>';
					?>
					<div id="gender_group" class="btn-group" role="group" aria-label="Gender">
	  					<button type="button" class="btn btn-secondary">Female</button>
	  					<button type="button" class="btn btn-secondary">Male</button>
					</div>
					<input type="hidden" id="gender" name="gender" value="" />
				</label>
				<label>
					Sexual preference
					<?php
						if (isset($_GET['error5']))
							echo '<span>Please select your preferences.</span>';
					?>
					<div id="preference_group" class="btn-group" role="group" aria-label="preferences">
	  					<button type="button" class="btn btn-secondary">Female</button>
	  					<button type="button" class="btn btn-secondary">Male</button>
	  					<button type="button" class="btn btn-secondary">Both</button>
					</div>
					<input type="hidden" id="preference" name="preference" value="" />
				</label>
				<label>
					Date of birth
					<?php
						if (isset($_GET['error6']))
							echo '<span>Please enter your date of birth.</span>';
					?>
					<input type="text" id="dob" name="dob" class="txt" placeholder="Select a date..." required/>
				<label>
				<label>
					Email
					<?php
						if (isset($_GET['error7']))
							echo '<span>Please enter your email.</span>';
						else if (isset($_GET['errors10']))
							echo '<span>Email already exists</span>';
					?>
					<input type="email" name="email" class="txt" required />
				</label>
				<label>
					Password
					<?php
						if (isset($_GET['error8']))
							echo '<span>Please enter your password.</span>';
					?>
					<input type="password" name="password" class="txt" required />
				</label>
				<label>
					Password confirmation
					<?php
						if (isset($_GET['error9']))
							echo '<span>The passwords provided don\'t match</span>';
					?>
					<input type="password" name="password_confirm" class="txt" required />
				</label>
				<input type="submit" name="cupid" value="Submit" />
			</form>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
		<script type="text/javascript" >
			function script() {
				const dob = document.getElementById('dob'),
					gender_btns = document.getElementById('gender_group').childNodes,
					preference_btns = document.getElementById('preference_group').childNodes;
				flatpickr(dob, {});

				function isNode(el) {
					return (el instanceof Element);
				}

				for (let i = 0, n = gender_btns.length; i < n; i++) {
					gender_btns[i].addEventListener('click', function(e) {
						document.getElementById('gender').setAttribute('value', e.target.textContent);
						gender_btns.forEach(function(value){
							if (isNode(value) && value.classList.contains('option'))
								value.classList.remove('option');
						});
						e.target.classList.add('option');
					});
				}

				for (let i = 0, n = preference_btns.length; i < n; i++) {
					preference_btns[i].addEventListener('click', function(e) {
						document.getElementById('preference').setAttribute('value', e.target.textContent);
						preference_btns.forEach(function(value) {
							if (isNode(value) && value.classList.contains('option'))
								value.classList.remove('option');
						});
						e.target.classList.add('option');
					});
				}
			}
			document.addEventListener("DOMContentLoaded", script);
		</script>
	</body>
</html>
