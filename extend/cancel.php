<?php include '../config/constants.php' ?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_GET['mail'])){
    $mail = $_GET['mail'];
    $id = $_GET['id'];
}


       
                $sql2 = "UPDATE users SET status ='Cancled' where email='$mail' AND booking_id='$id'";
                $res2 = mysqli_query($conn,$sql2);

                if($res2==true){
                    $_SESSION['statuschanged']="Cancled";
                    header('location: ' . siteurl . 'extend/history.php?mail='.$mail);

                }
                else{
                    $_SESSION['statuschanged']="Failed to cancel";
                    header('location: ' . siteurl . 'extend/history.php?mail='.$mail);
                }

            

       
   
?>
