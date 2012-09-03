<html>
<head>
<title>tel</title>
<link rel="stylesheet" type="text/css" href="screen.css">
<script type="text/javascript">
	function verify_deletion(id, name)
	{
		answer = confirm("Wirklich den Kontakt " + name + " loeschen?");

		if (answer)
		{
			location.href = "?action=delete&id= " + id;
			alert("");
		}
	}
</script>
</head>

<body>
<h1>tel - Anrufe &uuml;ber die fritz!box starten</h1>

<h2>Account</h2>
<?php include "login.php";

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_login"]))
{
?>

<h2>Dialer</h2>

<form>
<input type="text" name="nummer" value="+41 "/>

<input type="submit" value="anrufen" />
</form>

<?php
	$nummer = $_GET["nummer"];

	if (isset($nummer))
	{
		$nummer = str_replace("+", "00", $nummer);
		$nummer = str_replace(" ", "", $nummer);
		echo "<p>Rufaufbau " . $nummer . "</p>\n";
		exec("cd api && php5 ./fritzbox_ring_phone.php " . $nummer);
	}

	include "phonebook.php";
}
?>

</body>
</html>

