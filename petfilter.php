<?php
 	header("Access-Control-Allow-Origin: *");
	// include("includes/conn.php");
	// session_start();
	// if(isset($_SESSION['user'])) header("location: ./");
    // $user_id = '';
    // $_id = '';
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "WatchMaDog";
	// mysqli_query($db, "SET FOREIGN_KEY_CHECKS=0");
	// $pet = isset($_POST['pet']) ? $_POST['pet'] : array();
	// $size = isset($_POST['size']) ? $_POST['size'] : array();
	$pet = [];
	$size = [];
	if(isset($_POST['pet'])){
		if (is_array($_POST['pet'])) {
		  foreach($_POST['pet'] as $value) {
			array_push($pet,  $value);
		  }
		} else {
		  $value = $_POST['pet'];
		  echo $value;
		}
	}
	if(isset($_POST['size'])){
		if (is_array($_POST['size'])) {
		  foreach($_POST['size'] as $svalue) {
			array_push($size, $svalue);
		  }
		} else {
		  $svalue = $_POST['size'];
		  array_push($size, $svalue);
		}
	}
	$conn = mysqli_connect($host, $user, $pwd, $db) or die("Unable to connect to the database");

	echo print_r($pet) .print_r($size);
	$y = count($size);
    foreach($pet as $value) {
		for ($x = 0; $x < $y; $x=$x+1) {
			// $values = array_values($size);
			// echo print_r($size)."SIZ";
			// echo print_r($values) ."VAL";
			$thissize = $size[$x];
			echo $thissize."-thissize".$value."-pet\n";
			$query = "SELECT p.`pet_id` AS pid, p.`pet` AS ppet, p.`name` AS pname, p.`size` AS psize, p.`pic_name` AS ppic, p.`calendar` AS pcalendar, p.`max_price` AS pmaxp, p.`owner_id` AS powner FROM `Pets` as p WHERE p.`pet`='" .$value ."' AND p.`size` ='" .$thissize ."'";
			$result = mysqli_query($conn, $query);
			if (!$result) {
				printf("Error: %s\n", mysqli_error($conn));
				exit();
			}
			while($row = mysqli_fetch_array($result)){
				$id = $row['pid'];
				$pet = $row['ppet'];
				$name = $row['pname'];
				$size = $row['psize'];
				$pic = $row['ppic'];

				$return_arr[] = array("id" => $id,
						"pet" => $pet,
						"name" => $name,
						"pic" => $pic,
						"size" => $size);
			}
		}
	}
	$json_arr = json_encode($return_arr);
	echo $json_arr;
	// $query = "SELECT p.`pet_id` AS pid, p.`pet` AS ppet, p.`name` AS pname, p.`size` AS psize, p.`pic_name` AS ppic, p.`calendar` AS pcalendar, p.`max_price` AS pmaxp, p.`owner_id` AS powner FROM `Pets` as p";
	// $result = mysqli_query($conn, $query);

	
	// while($row = mysqli_fetch_array($to_ret)){
	// 	$id = $row['pid'];
	// 	$pet = $row['ppet'];
	// 	$name = $row['pname'];
	// 	$size = $row['psize'];
	// 	$pic = $row['ppic'];
	
	// 	$return_arr[] = array("id" => $id,
	// 					"pet" => $pet,
	// 					"name" => $name,
	// 					"pic" => $pic,
	// 					"size" => $size);
	// }
	//$myArr = array("John", "Mary", "Peter", "Sally");
	
	//echo "json_arr";
?>