<?php
	include("includes/conn.php");
	session_start();

	if(isset($_SESSION['user'])) header("location: ./");
	mysqli_query($db, "SET FOREIGN_KEY_CHECKS=0");
    $user_id = '';
    $_id = '';
	
	$host = "localhost";
	$user = "root";
	$pwd = "";
    $db = "WatchMaDog";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("Unable to connect to the database");

	$query = "SELECT p.`pet_id` AS pid, p.`pet` AS ppet, p.`name` AS pname, p.`size` AS psize, p.`pic_name` AS ppic, p.`calendar` AS pcalendar, p.`max_price` AS pmaxp, p.`owner_id` AS powner FROM `Pets`";
	$result = mysqli_query($conn, $query);

	while($row = mysqli_fetch_array($result)){
		$id = $row['pet_id'];
		$pet = $row['ppet'];
		$name = $row['pname'];
		$size = $row['psize'];
		$pic = $row['ppic'];
	
		$return_arr[] = array("id" => $id,
						"pet" => $pet,
						"name" => $name,
						$pic = $row['ppic'],
						"size" => $size);
	}
	echo json_encode($return_arr);
?>