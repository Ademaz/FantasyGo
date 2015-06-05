<?php
include("inc/head.php");
?>

<?php
mysql_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1") or die (mysql_error());

mysql_select_db("119897-fantasyleague") or die (mysql_error());
?>

<div class="row">
	<div class="large-12 columns box admin">
		<img src="img/logo.svg" class="big-logo">
		<div class="large-6 large-centered columns">
			<p>Admin Page</p>
		</div>

		<div class="large-12 colums adminNav">
			<ul>
				<li id="updateNav">Update Players</li>
				<li id="usersNav">Users</li>
			</ul>
		</div>

		<div class="adminUpdate">
			<select>
				<?php
					$data = mysql_query("SELECT * FROM players ORDER BY playerName ASC") or die(mysql_error());

					while($info = mysql_fetch_array( $data )) {
						Print '<option>' . $info['playerName'] . '</option>';
					}
				?>
			</select>

			<form>
				<table>
					<tr><td>Player Name:</td><td></td></tr>
					<tr><td>Team:</td><td></td></tr>
					<tr><td>Value:</td><td></td></tr>
					<tr><td>Games Played:</td><td></td></tr>
					<tr><td>Kills:</td><td></td></tr>
					<tr><td>Assists:</td><td></td></tr>
					<tr><td>Deaths:</td><td></td></tr>
					<tr><td>First Kills:</td><td></td></tr>
					<tr><td>Team Kills:</td><td></td></tr>
					<tr><td>3K:</td><td></td></tr>
					<tr><td>4K:</td><td></td></tr>
					<tr><td>5K:</td><td></td></tr>
					<tr><td>Rounds Won:</td><td></td></tr>
					<tr><td>Rounds Lost:</td><td></td></tr>
				</table>
				<input type="submit" value="Update" name="updatePlayer" class="button1">
			</form>

		</div>

		<div class="adminUsers hidden">
			<?php
				$data = mysql_query("SELECT * FROM users ORDER BY userID ASC") or die(mysql_error());

				Print '<table>';
				Print '<th>UserID</th><th>Username</th><th>Team Name</th><th>Remove User</th>';
				
				$i = 1;

				while($info = mysql_fetch_array( $data )) {
					print '<tr id="' . $info['userID'] . '">';
					Print '<td>' . $info['userID'] . '</td>';
					Print '<td>' . $info['username'] . '</td>';
					Print '<td>' . $info['teamName'] . '</td>';
					Print '<td><input type="submit" value="Remove" name="removeUser" class="button1 removeUserBtn" data-userID="' . $info['userID'] . '"></td>';
					print '</tr>';
				}
				
				Print '</table>';
			?>
		</div>

		<div class="adminTeams hidden">
			<?php
				$data = mysql_query("SELECT * FROM teams ORDER BY teamName ASC") or die(mysql_error());

				Print '<table>';
				Print '<th>UserID</th><th>Team Name</th><th>Remove User</th>';
				
				$i = 1;

				while($info = mysql_fetch_array( $data )) {
					print '<tr>';
					Print '<td>' . $info['userID'] . '</td>';
					Print '<td>' . $info['teamName'] . '</td>';
					Print '<td><input type="submit" value="Remove" name="removeUser" class="button1"></td>';
					print '</tr>';
				}
				
				Print '</table>';
			?>
		</div>
	</div>
</div>

<?php
include("inc/footer.php");
?>