<?php
    require_once '../../sendMail/vendor/autoload.php';
    include('conn.php');
    if(isset($_POST["email_reset"]) && (!empty($_POST["email_reset"]))){
        $email = $_POST["email_reset"];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if ($email) {
            $sel_query = "SELECT * FROM `suscriptores` WHERE email='".$email."'";
            $res = mysqli_query($db,$sel_query);
            $row = mysqli_num_rows($res);
        } else {
            exit();
        }
    }
    if ($row != 0) {
        $key = mt_rand(100000,999999); 
        // Insert Temp Table
        mysqli_query($db, "INSERT INTO password_reset_temp (`email`, `key`) VALUES ('".$email."', '".$key."');");
    
        $transport = (new Swift_SmtpTransport('smtps.aruba.it', 465, 'ssl'))
        ->setUsername('noreply@doggyboxpty.com')
        ->setPassword('requests2020');

        $mailer = new Swift_Mailer($transport);
        // Create a message
        $message = (new Swift_Message('Cambiar contraseña - DoggyBox'))
        ->setFrom(['noreply@doggyboxpty.com' => 'DoggyBox Panamá'])
        ->setTo([$email]);
        
        $message->setBody(
            '<html>' .
            '<body style="text-align:center; font-family: sans-serif;">' .
            '<img style="height:60px" src="' . $message->embed(Swift_Image::fromPath('../../img/doggyboxlogoblack.png')) . '" alt="DoggyBox logo" />' .
            '<div style="display:block; background:#64BC90; color: #ffffff; text-align:center; padding: 2em; margin: 1em 0;"><h1>Querido humano,</h1></div>' .
            '<div style="padding: 0 2em; text-align:left;"><h4>Ve al siguiente link para poder cambiar tu contraseña.</h4>' .
            '<h1 style="colod: #F2A728; margin: 10px 0;" href="">'.$key.'</h1>' .
            '<p>Asegurate de copiar todo el link en tu browser. El link caducará después de 1 día por motivos de seguridad. Si no solicitaste el cambio de contraseña, ninguna acción es necesaria, tu contraseña no se restablecerá.</p>' .
            '<h5 style="margin: 10px 0 0">Gracias,</h5>' .
            '<h5>Team de DoggyBox</h5></div>' .
            ' </body>' .
            '</html>', 'text/html');
    }
    // Send the message
    $result = $mailer->send($message);
    header("location: ../login?r=reset-password&e=".$email);
?>