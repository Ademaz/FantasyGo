<?php
	session_start();

	$q = intval($_GET['q']);

	$con = mysql_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1");
	if (!$con) {
	    die('Could not connect: ' . mysql_error($con));
	}

	mysql_select_db("119897-fantasyleague", $con);
	$query = mysql_query("SELECT * FROM players WHERE playerID = '".$q."'") or die(mysql_error());

	Print "<table>";
	
	while($row = mysql_fetch_array($query)) {
		echo "<input type='hidden' value=". $row['playerID'] . " name='hiddenValue' id='hiddenValue'>";
		echo "<tr><td>Player Name:</td><td>" . $row['playerName'] . "</td></tr>";
		echo "<tr><td>Team:</td><td>" . $row['playerTeam'] . "</td></tr>";
		echo "<tr><td>Games Played:</td><td><input type='number' id='inputGP' value='" . $row['gamesPlayed'] . "'></td></tr>";
		echo "<tr><td>Kills:</td><td><input type='number' id='inputKills' value='" . $row['kills'] . "'></td></tr>";
		echo "<tr><td>Assists:</td><td><input type='number' id='inputAssists' value='" . $row['assists'] . "'></td></tr>";
		echo "<tr><td>Deaths:</td><td><input type='number' id='inputDeaths' value='" . $row['deaths'] . "'></td></tr>";
		echo "<tr><td>First Kills:</td><td><input type='number' id='inputFK' value='" . $row['firstKills'] . "'></td></tr>";
		echo "<tr><td>Team Kills:</td><td><input type='number' id='inputTK' value='" . $row['teamKills'] . "'></td></tr>";
		echo "<tr><td>3K:</td><td><input type='number' id='input3k' value='" . $row['3k'] . "'></td></tr>";
		echo "<tr><td>4K:</td><td><input type='number' id='input4k' value='" . $row['4k'] . "'></td></tr>";
		echo "<tr><td>5K:</td><td><input type='number' id='input5k' value='" . $row['5k'] . "'></td></tr>";
		echo "<tr><td>Rounds Won:</td><td><input type='number' id='inputRW' value='" . $row['roundWin'] . "'></td></tr>";
		echo "<tr><td>Rounds Lost:</td><td><input type='number' id='inputRL' value='" . $row['roundLost'] . "'></td></tr>";
		echo "<tr><td>Fantasy Points:</td><td><input type='number' id='inputFP' value='" . $row['playerFantasyPoints'] . "'></td></tr>";
	}
	
	Print "</table>";
	mysql_close($con);
?>