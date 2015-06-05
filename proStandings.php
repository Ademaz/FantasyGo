<?php
include("inc/head.php");
?>

<div class="row">
	<div class="large-12 columns box teamStandings">
		<img src="img/logo.svg" class="big-logo">
		<div class="large-6 large-centered columns">
			<p>Pro Player Standings!</p>
			<p>What players are performing the best? Or the worst?</p>
		</div>

		<div class="teamStandings">
			<?php
				mysql_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1") or die (mysql_error());

				mysql_select_db("119897-fantasyleague") or die (mysql_error());

				$data = mysql_query("SELECT * FROM players ORDER BY playerFantasyPoints DESC") or die(mysql_error());

				Print '<table>';
				Print '<th>Rank</th><th>Player</th><th>Team</th><th>Games Played</th><th>Kills</th><th>Assists</th><th>Deaths</th><th>First Kills</th><th>Team Kills</th><th>3K</th><th>4K</th><th>5K</th><th>Rounds Won</th><th>Rounds Lost</th><th>FantasyPoints</th>';
				
				$i = 1;

				while($info = mysql_fetch_array( $data )) {
					print '<tr>';
					Print '<td>' . $i . '</td>';
					Print '<td><strong>' . $info['playerName'] . '</strong></td>';
					Print '<td><i>' . $info['playerTeam'] . '</i></td>';
					Print '<td>' . $info['gamesPlayed'] . '</td>';
					Print '<td>' . $info['kills'] . '</td>';
					Print '<td>' . $info['assists'] . '</td>';
					Print '<td>' . $info['deaths'] . '</td>';
					Print '<td>' . $info['firstKills'] . '</td>';
					Print '<td>' . $info['teamKills'] . '</td>';
					Print '<td>' . $info['3k'] . '</td>';
					Print '<td>' . $info['4k'] . '</td>';
					Print '<td>' . $info['5k'] . '</td>';
					Print '<td>' . $info['roundWin'] . '</td>';
					Print '<td>' . $info['roundLost'] . '</td>';
					Print '<td>' . $info['playerFantasyPoints'] . '</td>';
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