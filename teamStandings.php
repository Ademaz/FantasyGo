<?php
include("inc/head.php");
?>

<div class="row">
	<div class="large-12 columns box teamStandings">
		<img src="img/logo.svg" class="big-logo">
		<div class="large-6 large-centered columns">
			<p>Standings!</p>
			<p>Check how your team is fairing below.</p>
		</div>

		<div class="teamStandings">
			<?php
				mysql_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1") or die (mysql_error());

				mysql_select_db("119897-fantasyleague") or die (mysql_error());

				$data = mysql_query("SELECT * FROM teams ORDER BY fantasyPoints DESC") or die(mysql_error());

				Print '<table>';
				Print '<th>Rank</th><th>Team Name</th><th>Team Owner</th><th>Player 1</th><th>Player 2</th><th>Player 3</th><th>Player 4</th><th>Player 5</th><th>Budget</th><th>Fantasy Points</th>';
				
				$i = 1;

				while($info = mysql_fetch_array( $data )) {
					print '<tr>';
					Print '<td>' . $i . '</td>';
					Print '<td>' . $info['teamName'] . '</td>';
					Print '<td>' . $info['userID'] . '</td>';
					Print '<td>' . $info['player1ID'] . '</td>';
					Print '<td>' . $info['player2ID'] . '</td>';
					Print '<td>' . $info['player3ID'] . '</td>';
					Print '<td>' . $info['player4ID'] . '</td>';
					Print '<td>' . $info['player5ID'] . '</td>';
					Print '<td>' . $info['budget'] . '</td>';
					Print '<td>' . $info['fantasyPoints'] . '</td>';
					print '</tr>';
					$i++;
				}
				
				Print '</table>';
			?>
		</div>
	</div>
</div>

<?php
include("inc/footer.php");
?>