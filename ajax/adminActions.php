<?php
	session_start();
	$con = mysql_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1");

	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("119897-fantasyleague", $con);

	if($_POST['action'] == 'removeUser') {

		$queryRemove = "DELETE FROM users WHERE userID= '" . $_POST['test'] . "'";
		mysql_query($queryRemove);
		$queryTeamRemove = "DELETE FROM teams WHERE userID= '" . $_POST['test'] . "'";
		mysql_query($queryTeamRemove);

	}
?>