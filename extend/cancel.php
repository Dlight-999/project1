<?php include '../config/constants.php' ?>

<?php


if(isset($_GET['mail'])){
      $mail = $_GET['mail'];
     $id = $_GET['id'];
}

       
                $sql = "UPDATE booking SET status ='Cancled' where u_email='$mail' AND booking_id='$id'";
                $res = mysqli_query($conn,$sql);

                if($res==true){
                    $_SESSION['statuschanged']="Cancled";
                    header('location: ' . siteurl . 'extend/history.php?mail='.$mail);

                }
                else{
                    $_SESSION['statuschanged']="Failed to cancel";
                    header('location: ' . siteurl . 'extend/history.php?mail='.$mail);
                }

            

       
   
?>
