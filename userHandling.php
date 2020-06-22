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
            session_start();
            $_SESSION['user'] = $email;
            exit(json_encode(array('status' => '1', 'action' => 'redirect')));
        } else {
            exit(json_encode(array('status' => '0', 'error' => 'Email or password wrong. Please try again.')));
        }
        mysqli_free_result($result);
    } else if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['emailsu']) && !empty($_POST['passwordsu'])){
        // user data
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $surname = mysqli_real_escape_string($db, $_POST['surname']);
        $province = mysqli_real_escape_string($db, $_POST['province']);
        $birthyear = mysqli_real_escape_string($db, $_POST['birthyear']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $email = mysqli_real_escape_string($db, $_POST['emailsu']);
        $pass = mysqli_real_escape_string($db, $_POST['passwordsu']);
        
        $email_check="SELECT * FROM Users where (email='$email')";
        $res=mysqli_query($db,$email_check);
        if (mysqli_num_rows($res) == 0) {
            //$password = md5($password); // Password encryption halted
            $insert_user_data = "INSERT INTO Users (`name`, `surname`, `province`, `birthyear`, `phone`, `email`, `pass`) 
                    VALUES ('$name', '$surname', '$province', '$birthyear', '$phone', '$email', '$pass')";
            if (mysqli_query($db, $insert_user_data)) {
                session_start();
                $_SESSION['user'] = $email;
                $_SESSION['user_id'] = mysqli_insert_id($db);
                exit(json_encode(array('status' => '1')));
            } else {
                exit(json_encode(array('status' => '0', 'error' => 'Something went wrong. Try again later.')));
                // error with database (probs temporary)
            }
        } else {
            exit(json_encode(array('status' => '0', 'error' => 'Email is already taken. Please use another one.')));
        }
    } else if (!empty($_POST['pet']) && !empty($_POST['petname'])){
        session_start();
        $pet = mysqli_real_escape_string($db, $_POST['pet']);
        $petname = mysqli_real_escape_string($db, $_POST['petname']);
        $size = mysqli_real_escape_string($db, $_POST['size']);
        //$calendar = mysqli_real_escape_string($db, $_POST['calendar']);
        $max_price = mysqli_real_escape_string($db, $_POST['hrpet']);
        $target_dir = "../img/";
        if (isset($_FILES['file']['name'])) {
            $temp = explode(".", $_FILES['file']['name']);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $newfilename)) {
                $user_id = $_SESSION['user_id'];
                $insert_pet_data = "INSERT INTO Pets (pet, size, name, max_price, owner_id, pic_name) 
                VALUES ('$pet', '$size', '$petname', '$max_price', '$user_id', '$newfilename')";
                if (mysqli_query($db, $insert_pet_data)) {
                    exit(json_encode(array('status' => 1, 'action' => 'redirect')));
                }
            }
            exit(json_encode(array('status' => 0, 'error' => 'Something went wrong. Please try again later.')));
        }
    } else if (!empty($_POST['pettosit']) && !empty($_POST['hrpetsitter'])){
        session_start();
        $pettosit = mysqli_real_escape_string($db, $_POST['pettosit']);
        $hrrate = mysqli_real_escape_string($db, $_POST['hrpetsitter']);
        $target_dir = "../img/";
        if (isset($_FILES['file']['name'])) {
            $temp = explode(".", $_FILES['file']['name']);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $newfilename)) {
                $user_id = $_SESSION['user_id'];
                $insert_pet_data = "INSERT INTO Dogsitters (dogsitter_id, price, pet_wanted, pic_name) 
                VALUES ('$user_id', '$hrrate', '$pettosit', '$newfilename')";
                if (mysqli_query($db, $insert_pet_data)) {
                    exit(json_encode(array('status' => 1, 'action' => 'redirect')));
                }
            }
        }
    }
    
    exit(json_encode(array('status' => '0', 'error' => 'Something went wrong. Please try again later.')));
?>
