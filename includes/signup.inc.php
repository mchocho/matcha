<?php
session_start();
require ('ft_util.php');
require_once ('sql_connect.php');
scream();

if (!p_action() || isset($_SESSION['id']))
	ft_redirectuser('../index.php');

$errors = "../signup.php?";

if (isset($_POST['username']))
	$user = $_POST['username'];
else
	$errors .= 'error1=1&';

if (isset($_POST['f_name']))
	$f_name = $_POST['f_name'];
else
	$errors .= 'error2=1&';

if (isset($_POST['l_name']))
	$l_name = $_POST['l_name'];
else
	$errors .= 'error3=1&';

if (isset($_POST['gender'])) {
	if ($_POST['gender'] === 'Male' || $_POST['gender'] === 'Female')
		$gender = substr($_POST['gender'], 0, 1);
	else
		$errors .= 'error4=1&';
} else
	$errors .= 'error4=1&';

if (isset($_POST['preference'])) {
	if ($_POST['preference'] === 'Female' ||  $_POST['preference'] === 'Male' || $_POST['preference'] === 'Both')
		$preference = substr($_POST['preference'], 0, 1);
	else
		$errors .= 'error5=1&';
} else
	$errors .= 'error5=1&';

if (isset($_POST['dob']))
	$dob = $_POST['dob'];
else
	$errors .= 'error6=1&';

if (isset($_POST['email']) && is_email($_POST['email']))
	$email = $_POST['email'];
else
	$errors .='error7=1&';

if (isset($_POST['password'])) {
	$pass = $_POST['password'];
	if (isset($_POST['password_confirm'])) {
		if ($pass !== $_POST['password_confirm'])
			$errors .= 'error9=1&';
	}
} else
	$errors .= 'error8=1&';

if (strpos($errors, 'error')) {
	ft_redirectuser($errors);
	die();
}

try {
	$q      = 'SELECT id FROM users WHERE email = ?';
	$result = $dbc->prepare($q);
	$result->execute([$email]);
	$result = $result->fetch(PDO::FETCH_ASSOC);

	if (is_array($result))
		ft_redirectuser($errors . 'error10=1');

	$q      = 'SELECT id FROM users WHERE username = ?';
	$result = $dbc->prepare($q);
	$result->execute([$username]);
	$result = $result->fetch(PDO::FETCH_ASSOC);

	if (is_array($result))
		ft_redirectuser($errors . 'error11=1');

	$q		= 'INSERT INTO users (username, first_name, last_name, gender, preferences, DOB, email, password, online, verified, biography) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
	$result = $dbc->prepare($q);
	$result->execute([$user, $f_name, $l_name, $gender, $preference, $dob, $email, hash_password($password), 'F', 'F', '']);
	ft_redirectuser('../verify_email.php');
} catch (PDOException $err) {
	echo "Something went wrong!<br />";
	print_r($err);
}
