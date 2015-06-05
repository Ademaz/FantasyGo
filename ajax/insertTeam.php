<?php
	session_start();
	$con = mysql_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1");

	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("119897-fantasyleague", $con);

	$teamName = $_POST['teamname'];

	$teamName = mysql_real_escape_string($teamName);

	$queryID = "SELECT userID FROM users WHERE username = '" . $_SESSION['username'] . "'";
	$result=mysql_query($queryID);

	while ($row = mysql_fetch_assoc($result)) {
		$userLogic = $row['userID'];
	}

	$query = "
	INSERT INTO `119897-fantasyleague`.`teams` (`userID`, `teamName`, `player1ID`, `player2ID`, `player3ID`, `player4ID`, `player5ID`, `budget`, `fantasyPoints`)
	VALUES ('" . $userLogic . "', '$teamName', '1', '1', '1', '1', '1', '5000', '100');";

	mysql_query($query);

	mysql_close($con);

	header("Location: ../pickPlayers.php");
 
	exit;
?>