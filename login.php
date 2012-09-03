<?php
        require("./config.php");
	session_start();

	// logout
	if (isset($_GET["action"]) && $_GET["action"] == "logout")
	{
		session_destroy();
		header("Location: /");
	}


	// login
	if (isset($_POST["login"]) && isset($_POST["password"]))
	{
		$sql = 'SELECT
				id,
				login
			FROM
				user
			WHERE
				login = "' . mysql_real_escape_string($_POST["login"]) . '" AND password = "' . md5(mysql_real_escape_string($_POST["password"])) . '";';

		$result = $db->query($sql);
		if (!$result) {
		    die ('Etwas stimmte mit dem Query nicht: '.$db->error);
		}


		if ($result->num_rows)
		{
			$row = $result->fetch_assoc();
			$_SESSION["user_id"] = $row["id"];
			$_SESSION["user_login"] = $row["login"];
		}
	}


	// show login-form / logout-link
	if (isset($_SESSION["user_id"]) && isset($_SESSION["user_login"]))
	{
		echo "logged in as: " . $_SESSION["user_login"] . ". <a href=\"?action=logout\">logout</a>";
	}
	else
	{
		echo "<form method=\"post\">";
		echo "Benutzername: <input type=\"text\" name=\"login\" />";
		echo "Passwort: <input type=\"password\" name=\"password\" />";
		echo "<input type=\"submit\" value=\"login\" />";
		echo "</form>";
	}
?>

