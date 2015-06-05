<?php
include("inc/head.php");
	echo $_SESSION['username'];
?>

<div class="row">
	<div class="large-12 columns box createTeam">
		<img src="img/logo.svg" class="big-logo">
		<div class="large-6 large-centered columns">
			<p>Select a team name</p>
			<form action="ajax/insertTeam.php" method="post">
				<input type="text" name="teamname" placeholder="Team Name">
				<input type="submit" value="Create" class="button1">
			</form>
		</div>
	</div>
</div>

<?php
include("inc/footer.php");
?>