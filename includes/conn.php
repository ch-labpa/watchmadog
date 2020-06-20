<?php
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   ini_set("default_charset", 'utf-8');
   define('DB_SERVER', 'localhost:8889');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root');
   define('DB_DATABASE', 'watchmadog');
   //date_default_timezone_set('Europe/Italy');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $db->set_charset("utf8");
   mysqli_query($db, "SET SESSION sql_mode = ''");
?>