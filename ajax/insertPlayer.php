<?php
	session_start();
	$con = mysql_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1");

	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("119897-fantasyleague", $con);

	if(!isset($_SESSION['id'])){
		$_SESSION['id'] = 1;
	}

	$result = '';

	if($_POST['action'] == 'getCurrent') {
		$data = mysql_query("SELECT * FROM teams WHERE userID ='" . $_SESSION['userID'] . "' ") or die(mysql_error());


			while($info = mysql_fetch_array( $data )) {

			$dataPlayer = mysql_query("SELECT * FROM players WHERE playerID IN ('" . $info['player1ID'] . "', '" . $info['player2ID'] . "', '" . $info['player3ID'] . "', '" . $info['player4ID'] . "' ,'" . $info['player5ID'] . "')  ") or die(mysql_error());

			while($infoPlayer = mysql_fetch_array( $dataPlayer )) {


				$result = "
				<div class='large-4 columns playerCard' id='{$infoPlayer['playerID']}'>
				<ul>
				<li><strong>{$infoPlayer['playerName']}</strong></li>
				<li><i>{$infoPlayer['playerTeam']}</i></li><br>
				<li>FP: {$infoPlayer['playerFantasyPoints']}</li>
				<li>Value: {$infoPlayer['value']}</li>
				<input type='hidden' value='{$infoPlayer['playerID']}'>
				</ul>

				<img src='{$infoPlayer['image']}'>
				<button class='button1' data-userID='{$infoPlayer['playerID']}'>Remove</button>
				</div>";
			}
		}

		header('Content-type: application/json');
		echo json_encode($result);
	}

	if($_POST['action'] == 'addPlayer') {
		$data = mysql_query("SELECT * FROM players WHERE playerID = '" . $_POST['add'] . "' ") or die(mysql_error());

		if($_SESSION['id'] >= 6){
			$_SESSION['id'] = 1;
		}

		while($info = mysql_fetch_array( $data )) {
			$result = "
			<div class='large-4 columns playerCard' id='{$info['playerID']}'>
			<ul>
			<li><strong>{$info['playerName']}</strong></li>
			<li><i>{$info['playerTeam']}</i></li><br>
			<li>FP: {$info['playerFantasyPoints']}</li>
			<li>Value: {$info['value']}</li>
			</ul>
			<input type='hidden' value='{$info['playerID']}' name='hiddenValue". $_SESSION['id'] ."' id='hiddenValue". $_SESSION['id'] ."'>

			<img src='{$info['image']}'>
			<button class='button1' data-userID='{$info['playerID']}'>Remove</button>
			</div>";
			$_SESSION['id']++;
		}


			header('Content-type: application/json');
			echo json_encode($result);
	}
	if($_POST['action'] == 'addTeam') {

		echo $_POST['add1'];

		$data = mysql_query("UPDATE teams SET player1ID='" . $_POST['add1'] . "', player2ID='" . $_POST['add2'] . "', player3ID='" . $_POST['add3'] . "', player4ID='" . $_POST['add4'] . "', player5ID='" . $_POST['add5'] . "' WHERE userID = 1");

	}

	mysql_close($con);

 
	exit;
?>