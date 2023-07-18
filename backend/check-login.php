<?php
if(!isset($_SESSION['user'])){
    $_SESSION['no-log'] = "Please login to access Admin Pannel";

    header('location:'.siteurl.'backend/log.php');
}

?>
