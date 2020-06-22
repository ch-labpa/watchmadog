<?php
	header("Access-Control-Allow-Origin: *");
	include('conn.php');
	session_start();
	//$this_id = $_SESSION['user_id'];
	// $first_query = "SELECT p.`pet` AS pettype FROM `Users` as u, `Pets` as p WHERE u.`id`= p.`owner_id` AND p.`dogsitter_id` = u.`user_id`";
	// $first_result = mysqli_query($conn, $first_query);
	$price;
	if(isset($_POST['price'])){
		$price = $_POST['price'];
	} 
	$query = "SELECT u.`name` AS name, u.`birthyear` AS year, p.`price` AS price, p.`pic_name` AS img FROM `Dogsitters` as p, `Users` as u WHERE p.`price`<='" .$price ."' AND p.`dogsitter_id` = u.`user_id`";
	$result = mysqli_query($db, $query);
	if (!$result) {
		printf("Error: %s\n", mysqli_error($db));
		exit();
	}
	while($row = mysqli_fetch_array($result)){
			$name = $row['name'];
			$birth = $row['year'];
			$price = $row['price'];
			$img = $row['img'];

			$return_arr[] = array(
					"name" => $name,
					"birth" => $birth,
					"name" => $name,
					"img" => $img,
					"price" => $price

			);
	}
	if (!isset($return_arr)) {
		echo "nr";
	} else {
	$json_arr = json_encode($return_arr);
	echo $json_arr;
	}
?>
