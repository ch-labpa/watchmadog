<?php
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   define('DB_SERVER', 'localhost:8889');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root');
   define('DB_DATABASE', 'doggybox');
   date_default_timezone_set('America/Panama');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   mysqli_query($db, "SET SESSION sql_mode = ''");
?>