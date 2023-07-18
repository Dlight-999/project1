<?php
    //start session
    session_start();
    ob_start();
    define('siteurl','http://localhost/Project1/');
    define('LOCALHOST','localhost');
    define('db_uname','root');
    define('db_pass','');
    define('db_name','project1');


    $conn = mysqli_connect('localhost','root','') or die(mysqli_error($conn));
    $db_select = mysqli_select_db($conn,'project1');
?>