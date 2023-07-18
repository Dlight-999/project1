 <?php
    include('../config/constants.php');

    session_destroy();

    header('location:'.siteurl.'backend/log.php');

 ?>