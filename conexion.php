<?php
$mysqli =new mysqli("localhost","root", "","deberweb");

if ($mysqli->connect_error) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}
$mysqli->set_charset("utf8");

// esto es un comment
?>
