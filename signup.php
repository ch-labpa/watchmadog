<?php
    include("includes/conn.php");
    session_start();
    if(isset($_SESSION['login_user'])) header("location: ./");
    mysqli_query($db, "SET FOREIGN_KEY_CHECKS=0");
    $doggy_id = '';
    $human_id = '';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['doggyName']) && !empty($_POST['cumple']) && !empty($_POST['nombresuscriptor']) && !empty(['email']) && !empty(['celular']) && !empty(['password'])){
            // dog data
            $doggy = mysqli_real_escape_string($db, $_POST['doggyName']);
            $plan = mysqli_real_escape_string($db, $_POST['plan']);
            $cumple = date("Y-m-d");
            $gender = mysqli_real_escape_string($db, $_POST['gender']);
            $size = mysqli_real_escape_string($db, $_POST['doggySize']);

            if (!empty($_POST['dieta'])) {
                $dieta = mysqli_real_escape_string($db, $_POST['dieta']);
            } else {
                $dieta = 'No especificado';
            }

            if (!empty($_POST['specialDiet'])) {
                $specialDiet = mysqli_real_escape_string($db, $_POST['specialDiet']);
            } else {
                $specialDiet = 'No especificado';
            }

            if (!empty($_POST['specialNeeds'])) {
                $specialNeeds = mysqli_real_escape_string($db, $_POST['specialNeeds']);
            } else {
                $specialNeeds = 'No especificado';
            }

            // human data
            $nombre = mysqli_real_escape_string($db, $_POST['nombresuscriptor']);
            $email = mysqli_real_escape_string($db, $_POST['email']);
            $celular = mysqli_real_escape_string($db, $_POST['celular']);
            $password = mysqli_real_escape_string($db, $_POST['pass']);

            // human address
            $direccionpostal = mysqli_real_escape_string($db, $_POST['direccionpostal']);
            $ciudad = mysqli_real_escape_string($db, $_POST['ciudad']);
            $provincia = mysqli_real_escape_string($db, $_POST['provincia']);
            $pais = mysqli_real_escape_string($db, $_POST['pais']);

            $sql="SELECT * FROM suscriptores where (email='$email')";
            $res=mysqli_query($db,$sql);
            if (mysqli_num_rows($res) == 0) {
                $password = md5($password);

                $insert_doggy_data = "INSERT INTO doggies (doggy, plan, cumple, gender, size, dieta, dieta_especial, necesidades_especiales) 
                        VALUES ('$doggy', '$plan', '$cumple', '$gender', '$size', '$dieta', '$specialDiet', '$specialNeeds')";
                
                if (mysqli_query($db, $insert_doggy_data)) {
                    // redirect to user profile
                    // login user
                } else {
                    exit("Hubo un problema.");
                }
            } else {
                // display email is already registered error
            }
        } else {
            echo 'form failed';
        }
    }
?>