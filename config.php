<?php
$db = @new mysqli('localhost', 'user', 'pass', 'db');
if (mysqli_connect_errno()) {
    die ('Konnte keine Verbindung zur Datenbank aufbauen: '.mysqli_connect_error().'('.mysqli_connect_errno().')');
}
?>
