<?php
    include('../config/constants.php');

    session_destroy();

    header('location:'.siteurl.'extend/login.php');

 ?>