<?php
	ini_set("display_errors", 0);
	$host = "localhost";
	$user = "root";
	$pwd = "";
    $db = "WatchMaDog";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("Unable to connect to the database");
?>