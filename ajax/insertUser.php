<?php
	session_start();
	$con = mysql_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1");

	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("119897-fantasyleague", $con);

	$username = $_POST['username'];
	$password = $_POST['password'];

	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);


	if($_POST['action'] == 'addUser') {

		$query = 	"INSERT INTO `119897-fantasyleague`.`users` (`userID`, `username`, `password`)
					VALUES (NULL, '" . $_POST['username'] . "', '" . $_POST['password'] . "');";

		mysql_query($query);

		$queryUserID = "SELECT userID FROM users WHERE username = '" . $_POST['username'] . "'";
			$result = mysql_query($queryUserID);
			$_SESSION["userID"] = $result;
	}

	$_SESSION["username"] = $username;
	mysql_close($con);
 
	exit;
?>