<?php
	session_start();
	$con = mysql_connect("mysql16.citynetwork.se", "119897-sx52251", "Ademaz_1");

	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("119897-fantasyleague", $con);

	if($_POST['action'] == 'logout') {
		session_destroy();
		$data = "noSession";
		header('Content-type: application/json');
		echo json_encode($data);
	}

	if($_POST['action'] == 'login') {
		$query = "SELECT password FROM users WHERE username = '" . $_POST['username'] . "'";
		$result = mysql_query($query);

		while ($row = mysql_fetch_assoc($result)) {
			$userLogic = $row['password'];
		}

		if ($userLogic === $_POST['password']) {
			session_start();
			$_SESSION["username"] = $_POST['username'];

			$queryUserID = "SELECT userID FROM users WHERE username = '" . $_POST['username'] . "'";
			$result = mysql_query($queryUserID);
			
			while ($row = mysql_fetch_assoc($result)) {
				$userLogic = $row['userID'];
			}

			$_SESSION["userID"] = $userLogic;

		} else {
			$data = "fail";
			header('Content-type: application/json');
			echo json_encode($data);
		}
	}
	
?>