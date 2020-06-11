<?php
    include("includes/conn.php");
    session_start();
    if(isset($_SESSION['user'])) header("location: ./");
    
    if(isset($_POST['login'])) {
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['password']);

        $password = md5($password); //password encryption
        
        $sql = "SELECT id FROM suscriptores WHERE email = '$email' and pass = '$password'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);     
            
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['login_user'] = $email;
            exit(json_encode(array('status' => '1')));
        } else {
            exit(json_encode(array('status' => '0', 'error' => 'Email or password wrong. Please try again.')));
        }
        mysqli_free_result($result);
    }
?>
