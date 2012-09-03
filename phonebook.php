<?php
require("./config.php");


$sql = "SELECT
		id,
                first_name,
                last_name,
                mobile,
                home,
                business
        FROM
                phonebook
	WHERE
		user_id = " . $_SESSION["user_id"] . "
	ORDER BY
		first_name ASC";

$result = $db->query($sql);
if (!$result) {
    die ('Etwas stimmte mit dem Query nicht: '.$db->error);
}


echo "<h2>Telefonbuch</h2>";
echo "<table>";
echo "<tr><th>Vorname</th><th>Nachname</th><th>Mobile</th><th>Home</th><th>Business</th><th>tools</th>";
while ($row = $result->fetch_assoc()) {  // NULL ist äquivalent zu false
    // $row ist nun das Array mit den Werten
    echo "<tr><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td><a href=\"?nummer=" . str_replace("+", "00", $row["mobile"]) ."\">" . $row["mobile"] . "</a></td><td><a href=\"?nummer=" . str_replace("+", "00", $row["home"]) ."\">" . $row["home"] . "</a></td><td><a href=\"?nummer=" . str_replace("+", "00", $row["home"]) ."\">" . $row["home"] . "</a></td><td><a href=\"\">bearbeiten</a> / <a href=\"\" onclick=\"verify_deletion('" . $row["id"] . "', '" . $row["first_name"] . " " . $row["last_name"] ."')\">l&ouml;schen</a></td></tr>";
}
echo "</table>";
$result->close();
unset($result); // und referenz zum objekt löschen, brauchen wir ja nicht mehr...
?>
