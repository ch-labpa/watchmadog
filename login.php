<?php
    include("includes/conn.php");
    session_start();
    $error = '';
    if(isset($_SESSION['login_user'])) header("location: ./");
    
    if(isset($_POST['login'])) {
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db,$_POST['password']);

        $password = md5($password); //password encryption
        
        $sql = "SELECT id FROM suscriptores WHERE email = '$email' and pass = '$password'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);     
        $count = mysqli_num_rows($result);
        mysqli_free_result($result);
            
        if($count == 1) {
            $_SESSION['login_user'] = $email;
            header("location: ./");
        } else {
            $error = "El email o la contraseña son incorrectos. Intenta nuevamente.";
        }
    }
?>
