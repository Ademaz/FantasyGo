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

	if($_POST['action'] == 'updatePlayer') {

		$hiddenValue = $_POST['hidden1'];
		$queryUpdate = "UPDATE players SET gamesPlayed='" . $_POST['input1'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET kills='" . $_POST['input2'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET assists='" . $_POST['input3'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET deaths='" . $_POST['input4'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET firstKills='" . $_POST['input5'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET teamKills='" . $_POST['input6'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET 3k='" . $_POST['input7'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET 4k='" . $_POST['input8'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET 5k='" . $_POST['input9'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET roundWin='" . $_POST['input10'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET roundLost='" . $_POST['input11'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);
		$queryUpdate = "UPDATE players SET playerFantasyPoints='" . $_POST['input12'] . "' WHERE playerID= '" . $_POST['hidden1'] . "'";
		mysql_query($queryUpdate);

	}
?>