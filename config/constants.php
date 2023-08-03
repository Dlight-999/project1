<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    //start session
    session_start();
    ob_start();
    define('siteurl','http://localhost/Project1/');
    define('LOCALHOST','localhost');
    define('db_uname','root');
    define('db_pass','');
    define('db_name','project1');


    $conn = mysqli_connect(LOCALHOST,db_uname,db_pass, db_name) or die(mysqli_error($conn));
    $db_select = mysqli_select_db($conn,'project1');
?>