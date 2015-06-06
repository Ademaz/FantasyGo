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

			<script>
				function showPlayer(str) {
				if (str=="") {
						document.getElementById("txtHint").innerHTML="";
						return;
					} 
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp=new XMLHttpRequest();
					} else { // code for IE6, IE5
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					
					xmlhttp.onreadystatechange=function() {
						if (xmlhttp.readyState==4 && xmlhttp.status==200) {
							document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
						}

					}
					xmlhttp.open("GET","ajax/adminSelect.php?q="+str,true);
					xmlhttp.send();
				}
				</script>

			<form>
			<select name="users" onchange="showPlayer(this.value)">
				<?php
					$data = mysql_query("SELECT * FROM players ORDER BY playerName ASC") or die(mysql_error());

					while($info = mysql_fetch_array( $data )) {
						Print '<option value="'. $info['playerName'] .'">' . $info['playerName'] . '</option>';
					}
				?>
			</select>
			</form>

			<form>
				<div id="txtHint"><b>Player info will be listed here.</b></div>
				<input type="submit" value="Update" name="updatePlayer" class="button1">
			</form>

		</div>

		<div class="adminUsers hidden">
			<?php
				$data = mysql_query("SELECT * FROM users ORDER BY userID ASC") or die(mysql_error());

				Print '<table>';
				Print '<th>UserID</th><th>Username</th><th>Remove User</th>';
				
				$i = 1;

				while($info = mysql_fetch_array( $data )) {
					print '<tr id="' . $info['userID'] . '">';
					Print '<td>' . $info['userID'] . '</td>';
					Print '<td>' . $info['username'] . '</td>';
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