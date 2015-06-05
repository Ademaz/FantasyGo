<!DOCTYPE html>

<?php
	session_start();

	if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
		$activeStatus = '<button class="button1" id="logoutBtn">Log out</button>';
	} else {
		$activeStatus = '<button class="button1" id="loginBtn">Login &#65516;</button>';
	}
?>

<html>
<head>
	<title>Fantasy League</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" href="css/foundation.css" />
	<link rel="stylesheet/less" type="text/css" href="css/main.less" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/less.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script src="js/vendor/modernizr.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="row nav-row">
	<div class="large-12 columns nav">
		<ul>
			<li><a href="pickPlayers.php">Your Team</a></li>
			<li><a href="teamStandings.php">Fantasy League Standings</a></li>
			<li><a href="proStandings.php">Pro Player Standings</a></li>
		</ul>

		<?php
			echo $activeStatus;
		?>

	</div>

	<div class="loginBox hidden">
		<input type="text" placeholder="Username" name="username" id="headerUsername">
		<input type="password" placeholder="Password" name="password" id="headerPassword">
		<button id="headerLoginBtn" class="button1">Login</button>
	</div>
</div>

