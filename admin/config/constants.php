<?php

    //start the session
    session_start();

    //Create constants to store Non Repeating values
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','food-order');
    define('SITEURL','http://localhost/final_project/');

 $conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD)or die(mysqli_error()); //Database Connection
 $db_select=mysqli_select_db($conn,DB_NAME)or die(mysqli_error());

?>