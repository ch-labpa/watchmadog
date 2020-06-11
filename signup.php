<?php
    include("includes/conn.php");
    session_start();
    if(isset($_SESSION['user'])) header("location: ./");
    mysqli_query($db, "SET FOREIGN_KEY_CHECKS=0");
    $user_id = '';
    $_id = '';
    if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty(['passwors'])){
        // user data
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $surname = mysqli_real_escape_string($db, $_POST['surname']);
        $region = mysqli_real_escape_string($db, $_POST['region']);
        $birthyear = mysqli_real_escape_string($db, $_POST['birthyear']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        $sql="SELECT * FROM suscriptores where (email='$email')";
        $res=mysqli_query($db,$sql);
        if (mysqli_num_rows($res) == 0) {
            $password = md5($password);
            $insert_doggy_data = "INSERT INTO Users (name, surname, region, birthyear, phone, email, password, necesidades_especiales) 
                    VALUES ('$doggy', '$plan', '$cumple', '$gender', '$size', '$dieta', '$specialDiet', '$specialNeeds')";

            if (mysqli_query($db, $insert_doggy_data)) {
                $_SESSION['user'] = $email;
                exit(json_encode(array('status' => '1', 'fb' => 'login')));
            } else {
                exit(json_encode(array('status' => '0')));
                // error with login (probs database)
            }
        } else {
            exit(json_encode(array('status' => '0', 'error' => 'Email is already taken.')));
        }

        if (!empty($_POST['pet']) && !empty($_POST['petname'])){
            $pet = mysqli_real_escape_string($db, $_POST['pet']);
            $petname = mysqli_real_escape_string($db, $_POST['petname']);
            //$pic_name = mysqli_real_escape_string($db, $_POST['']);
            $size = mysqli_real_escape_string($db, $_POST['region']);
            $calendar = mysqli_real_escape_string($db, $_POST['birthyear']);
            $max_price = mysqli_real_escape_string($db, $_POST['birthyear']);
        }
    } else {
        echo 'form failed';
    }
?>
