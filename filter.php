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
	//mysqli_query($db, "SET FOREIGN_KEY_CHECKS=0");
	// $cat= $this->input->post('cat');
	// $dog=$this->input->post('dog');
	// $pet = isset($_POST['pet[]']) ? $_POST['pet[]'] : array();
	$pet = $_POST;
	//echo print_r($pet);
	// UNDEFINED OFFSET
	// TODO- get pet and size
	// $dog = $pet[0];
	// $cat = $pet[0];
	// echo $dog + " AAAAAAA " + $cat;

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("Unable to connect to the database");

	$query = "SELECT p.`pet_id` AS pid, p.`pet` AS ppet, p.`name` AS pname, p.`size` AS psize, p.`pic_name` AS ppic, p.`calendar` AS pcalendar, p.`max_price` AS pmaxp, p.`owner_id` AS powner FROM `Pets` as p";
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
	//$myArr = array("John", "Mary", "Peter", "Sally");
	$json_arr = json_encode($return_arr);
	//echo $json_arr;
?>