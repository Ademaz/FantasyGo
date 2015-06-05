<?php
include("inc/head.php");

if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
	header("Location: pickPlayers.php");
}
?>



<div class="row">
	<div class="large-12 columns box intro">
		<img src="img/logo.svg" class="big-logo">
		<div class="large-6 large-centered columns form">
			<p>FantasyGo lets you and your friends create a Counter Strike fantasy league. Draft a team, compete, win!</p>
			<p><strong>Login</strong></p>
				<input type="text" name="username" placeholder="Username" id="indexUsername">
				<input type="password" name="password" placeholder="Password" id="indexPassword">
				<input type="submit" value="Log in" class="button1" id="indexLoginBtn">
				<p id="dontHave">Dont have an account?</p>
			<br><br>
		</div>

		<div class="large-6 large-centered columns form registerform hidden">
			<p><strong>Register</strong></p>
			<input type="text" name="username" placeholder="Username" id="regUsername">
			<input type="password" name="password" placeholder="Password" id="regPassword">
			<input type="password" name="rePassword" placeholder="Repeat Password" id="regRePassword">
			<input type="submit" value="Register" class="button1" id="registerBtn">
			<p id="regError"></p>
		</div>
	</div>
</div>

<?php
include("inc/footer.php");
?>