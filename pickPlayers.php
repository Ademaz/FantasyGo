<?php
include("inc/head.php");
?>

<div class="row">
	<div class="large-12 columns box createTeam">
		<img src="img/logo.svg" class="big-logo">
		<div class="large-6 large-centered columns help">
			<p class="heading">Time to pick your team!</p>
			<p>Choose players by clicking the "Pick Player" button on each player card. Your budget is limited so keep an eye on the money.</p>
		</div>

		<p class="heading">Your Team</p>
		<p>Budget: $</p>
		<div class="row">
			<form id="insertTeam">
				<div class="yourTeam">

					<script type="text/javascript">
						$.ajax({
						type: "POST",
						url: 'ajax/insertPlayer.php',
						data:{action:'getCurrent'},
						success:function(data) {
							for (i = 0; i < 5; i++) { 
									$('.yourTeam').append(data);
								}
							}
						});
					</script>


				</div>
				<input type="button" class="button1" id="submitTeam" value="Submit Team"/>
			</form>
		</div>

		<p class="heading topSpace">Player List</p>
		<div class="row">
			<div class="pickingPlayers">
				<?php
					mysql_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1") or die (mysql_error());

					mysql_select_db("119897-fantasyleague") or die (mysql_error());

					$data = mysql_query("SELECT * FROM players ORDER BY playerTeam ASC") or die(mysql_error());

					while($info = mysql_fetch_array( $data )) {
						Print '<div class="large-4 columns playerCard">';
						Print '<ul>';
						Print '<li><strong>' . $info['playerName'] . '</strong></li>';
						Print '<li><i>' . $info['playerTeam'] . '</i></li><br>';
						Print '<li>FP: ' . $info['playerFantasyPoints'] . '</li>';
						Print '<li>Value: $' . $info['value'] . '</li>';
						Print '</ul>';

						Print '<img src="' . $info['image'] . '">';
						Print '<button class="button1 addPlayer" id="' . $info['playerID'] .'" data-userID="' . $info['playerID'] . '">Pick Player</button>';
						Print "</div>";
					}
				?>

				<!-- <div class="large-4 columns playerCard">
					<ul>
						<li>Player Name</li>
						<li>Team</li>
						<li>Value: $</li>
						<li>Fantasy Points: 23</li>
					</ul>

					<img src="img/friberg.jpg">

					<input type="submit" value="Pick Player" class="button1">
				</div>

				<div class="large-4 columns playerCard">
					<ul>
						<li>Player Name</li>
						<li>Team</li>
						<li>Value: $</li>
						<li>Fantasy Points: 23</li>
					</ul>

					<img src="img/friberg.jpg">

					<input type="submit" value="Pick Player" class="button1">
				</div>

				<div class="large-4 columns playerCard">
					<ul>
						<li>Player Name</li>
						<li>Team</li>
						<li>Value: $</li>
						<li>Fantasy Points: 23</li>
					</ul>

					<img src="img/friberg.jpg">

					<input type="submit" value="Pick Player" class="button1">
				</div> -->
			</div>
		</div>

	</div>
</div>

<?php
include("inc/footer.php");
?>