<?php
	session_start();

	$q = intval($_GET['q']);

	$con = mysqli_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1", "119897-fantasyleague");
	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con, "119897-fantasyleague");
	$sql="SELECT * FROM players WHERE playerName = '".$q."'";
	$result = mysqli_query($con,$sql);

	Print "<table>";
	
	while($row = mysqli_fetch_array($result)) {
		var_dump($row);
		echo "<tr><td>Player Name:</td><td>" . $row['playerName'] . "</td></tr>";
		echo "<tr><td>Team:</td><td>" . $row['playerTeam'] . "</td></tr>";
		echo "<tr><td>Value:</td><td>" . $row['value'] . "</td></tr>";
		echo "<tr><td>Games Played:</td><td>" . $row['gamesPlayed'] . "</td></tr>";
		echo "<tr><td>Kills:</td><td>" . $row['kills'] . "</td></tr>";
		echo "<tr><td>Assists:</td><td>" . $row['assists'] . "</td></tr>";
		echo "<tr><td>Deaths:</td><td>" . $row['deaths'] . "</td></tr>";
		echo "<tr><td>First Kills:</td><td>" . $row['firstKills'] . "</td></tr>";
		echo "<tr><td>Team Kills:</td><td>" . $row['teamKills'] . "</td></tr>";
		echo "<tr><td>3K:</td><td>" . $row['3k'] . "</td></tr>";
		echo "<tr><td>4K:</td><td>" . $row['4k'] . "</td></tr>";
		echo "<tr><td>5K:</td><td>" . $row['5k'] . "</td></tr>";
		echo "<tr><td>Rounds Won:</td><td>" . $row['roundWin'] . "</td></tr>";
		echo "<tr><td>Rounds Lost:</td><td>" . $row['roundLost'] . "</td></tr>";
	}
	
	Print "</table>";
	mysqli_close($con);
?>