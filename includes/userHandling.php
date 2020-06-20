<?php
    include("conn.php");
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['password']);

        //$password = md5($password); //password encryption
        
        $sql = "SELECT id FROM Users WHERE email = '$email' and pass = '$password'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);     
            
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['user'] = $email;
            exit(json_encode(array('status' => '1', 'action' => 'redirect')));
        } else {
            exit(json_encode(array('status' => '0', 'error' => 'Email or password wrong. Please try again.')));
        }
        mysqli_free_result($result);
    } else {
        exit(json_encode(array('status' => '0')));
    }

    $user_id = '';
    $generic_id = '';
    if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty(['passwors'])){
        // user data
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $surname = mysqli_real_escape_string($db, $_POST['surname']);
        $province = mysqli_real_escape_string($db, $_POST['province']);
        $birthyear = mysqli_real_escape_string($db, $_POST['birthyear']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        $email_check="SELECT * FROM Users where (email='$email')";
        $res=mysqli_query($db,$email_check);
        if (mysqli_num_rows($res) == 0) {
            //$password = md5($password); // Password encryption halted
            $insert_user_data = "INSERT INTO Users (name, surname, province, birthyear, phone, email, pass) 
                    VALUES ('$name', '$surname', '$province', '$birthyear', '$phone', '$email', '$pass')";

            if (mysqli_query($db, $insert_user_data)) {
                $_SESSION['user'] = $email;
                $user_id = mysqli_insert_id($db);
            } else {
                exit(json_encode(array('status' => '0', 'error' => 'Something went wrong. Please try again later.')));
                // error with database (probs temporary)
            }
        } else {
            exit(json_encode(array('status' => '0', 'error' => 'Email is already taken. Please use another one.')));
        }
    } else {
        exit(json_encode(array('status' => '0')));
    }

    if (!empty($_POST['pet']) && !empty($_POST['petname'])){
        $pet = mysqli_real_escape_string($db, $_POST['pet']);
        $petname = mysqli_real_escape_string($db, $_POST['petname']);
        $size = mysqli_real_escape_string($db, $_POST['size']);
        //$calendar = mysqli_real_escape_string($db, $_POST['calendar']);
        $max_price = mysqli_real_escape_string($db, $_POST['hrpet']);

        $insert_pet_data = "INSERT INTO Pets (pet, size, calendar, name, max_price, owner_id) 
        VALUES ('$pet', '$size', '$calendar', '$petname', '$max_price', '$user_id')";

        if (mysqli_query($db, $insert_pet_data)) {
            $generic_id = mysqli_insert_id($db);
            updatePP();
        } else {
            exit(json_encode(array('status' => '0', 'error' => 'Something went wrong. Please try again later.')));
        }
    }

    if (!empty($_POST['pettosit']) && !empty($_POST['hrpetsitter'])){
        $pettosit = mysqli_real_escape_string($db, $_POST['pettosit']);
        $petname = mysqli_real_escape_string($db, $_POST['hrpetsitter']);

        $insert_pet_data = "INSERT INTO Dogsitters (pet, size, calendar, name, max_price, owner_id) 
        VALUES ('$pet', '$size', '$calendar', '$petname', '$max_price', '$user_id')";

        if (mysqli_query($db, $insert_pet_data)) {
            $generic_id = mysqli_insert_id($db);
            updatePPSitter();
        } else {
            exit(json_encode(array('status' => '0', 'error' => 'Something went wrong. Please try again later.')));
        }
    }

    function updatePP(){
        global $db, $generic_id;
        $target_dir = "../img/profilepics/"; // to be updated
        $temp = explode(".", $_FILES["petpic"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        if (move_uploaded_file($_FILES["petpic"]["tmp_name"], $target_dir . $newfilename)) {
            try {
                $update_pp = mysqli_query($db, "UPDATE Pets SET pic_name='$newfilename' WHERE pet_id='$generic_id'");
                if ($update_pp) success();
            } catch(Exception $e){
                exit(json_encode(array('status' => 0, 'error' => 'Something went wrong. Please try again later.')));
            }
        } else exit(json_encode(array('status' => 0, 'error' => 'Something went wrong. Please try again later.')));
    }

    function updatePPSitter(){
        global $db, $generic_id;
        $target_dir = "../img/profilepics/";
        $temp = explode(".", $_FILES["persitterpic"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        if (move_uploaded_file($_FILES["petsitterpic"]["tmp_name"], $target_dir . $newfilename)) {
            try {
                $update_pp = mysqli_query($db, "UPDATE Dogsitters SET pic_name='$newfilename' WHERE dogsitter_id='$generic_id'");
                if ($update_pp) success();
            } catch(Exception $e){
                exit(json_encode(array('status' => 0, 'error' => 'Something went wrong. Please try again later.')));
            }
        } else exit(json_encode(array('status' => 0, 'error' => 'Something went wrong. Please try again later.')));
    }

    function success(){
        exit(json_encode(array('status' => 1, 'action' => 'redirect')));
    }
?>
