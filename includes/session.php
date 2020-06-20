<?php
   include('conn.php');
   session_start();
   
   $user = $_SESSION['user'];
   
   $ses_sql = mysqli_query($db,"SELECT * FROM Users WHERE email = '$user'");
   
   $user_info = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   if(!isset($_SESSION['user'])){
      header("location:./?a=login");
      die();
   }

   // file that determines if user is logged in
?>