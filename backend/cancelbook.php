<?php include '../config/constants.php' ?>

<?php


$id = $_GET['id'];


       
                $sql = "UPDATE booking SET status ='Cancled' where booking_id = '$id' ";
                $res = mysqli_query($conn,$sql);

                if($res==true){
                    $_SESSION['statuschanged']="Cancled";
                    header('location: ' . siteurl . 'backend/booking.php');

                }
                else{
                    $_SESSION['statuschanged']="Failed to cancel";
                    header('location: ' . siteurl . 'backend/booking.php');
                }

            

       
   
?>
